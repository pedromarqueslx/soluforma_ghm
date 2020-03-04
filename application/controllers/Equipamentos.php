<?php
class Equipamentos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Pdf_Library');
        $this->load->model('user');
        $this->load->model('equipamentos_model');
        $this->load->model('contactos_model');
        $this->load->helper("url");
        $this->load->helper('url_helper');
        $this->load->library('pagination');
        $this->load->model('artigos_oficina_model');
    }

    public function pdf() {
        $id = $this->uri->segment(3);
        $data['equipamentos'] = $this->equipamentos_model->select_equipamentos($id);
        $this->load->view('equipamentos/pdf', $data);
    }

    public function index() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));              

            //$data = array();
            $data['equipamentos'] = $this->equipamentos_model->get_equipamentos();
            $data['title'] = 'Registos de Equipamentos';
            $config = array();
            $config['base_url'] = base_url("/index.php/equipamentos/index");
            $config["total_rows"] = $this->equipamentos_model->record_count();
            $config["per_page"] = '';
            $config["uri_segment"] = 3;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->equipamentos_model->fetch_equipamentos($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links(); 
            
            $config["total_rows"] = $this->equipamentos_model->record_count();
            if (empty($config["total_rows"])) {
            $this->load->view('templates/header', $data);
            $this->load->view('equipamentos/view', $data);
            $this->load->view('templates/footer');
            }
            else {       
            $this->load->view('templates/header', $data);
            $this->load->view('equipamentos/index', $data);
            $this->load->view('templates/footer');
            }

        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }


    public function autocomplete() {
         // load model
         $search_data = $this->input->post('search_data');
         $result = $this->equipamentos_model->get_autocomplete($search_data);

         if (!empty($result))
         {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                echo "<p class='slab'><a href='". base_url() ."index.php/"."equipamentos/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
                echo "</td></tr>";
              endforeach;
            echo "</table><hr>";

         } else {
            echo "<p class='slab-700 strong'>Nenhum resultado encontrado... Por favor pesquise por um nome diferente.</p><hr>";
         }
    }          

    public function create() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));              

            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['login_date'] = $this->user->login_date();
            $data['contactos'] = $this->contactos_model->get_contactos();

            $data['title'] = 'Novo Registo';
            $this->form_validation->set_rules('title', 'Matrícula', 'required|callback_title_check|strtoupper');
            $this->form_validation->set_rules('n_serie', 'Número Serie', 'required|strtoupper');            
            $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('equipamentos/create');
                $this->load->view('templates/footer');
            }
            else
            {
                $this->equipamentos_model->set_equipamentos();
                redirect( base_url() . 'index.php/equipamentos');
            }
        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }  

    /*
     * Existing title check during validation
     */
    public function title_check($str) {
        $con['returnType'] = 'count';
        $con['conditions'] = array('title'=>$str);
        $checkEmail = $this->equipamentos_model->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('title_check', 'A matrícula introduzida já existe.');
            return FALSE;
        }else {
            return TRUE;
        }
    }

    public function edit() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));  

            $id = $this->uri->segment(3);
            if (empty($id))
            {
                show_404();
            }
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Editar Registo';        
            $data['equipamentos_item'] = $this->equipamentos_model->get_equipamentos_by_id($id);
            $data['contactos'] = $this->contactos_model->get_contactos();
            
            $this->form_validation->set_rules('n_serie', 'Número Serie', 'required|strtoupper');
            $this->form_validation->set_rules('categoria', 'Categoria', 'required');
     
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('equipamentos/edit', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $this->equipamentos_model->set_equipamentos($id);
                //$this->load->view('equipamentos/success');
                redirect( base_url() . 'index.php/equipamentos');
            }

        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }  



    public function total() {
        
        $id = $this->uri->segment(3);
        /*
        if (empty($id))
        {
            show_404();
        }
        */

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));  

        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Total Equipamento';
        $data['equipamentos_item'] = $this->equipamentos_model->get_equipamentos_by_title($id);
       
        $this->load->view('templates/header', $data);
        $this->load->view('equipamentos/total', $data);
        $this->load->view('templates/footer');
    }



    public function delete() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {    
            
            $id = $this->uri->segment(3);
            if (empty($id))
            {
                show_404();
            }
            $equipamentos_item = $this->equipamentos_model->get_equipamentos_by_id($id);
            $this->equipamentos_model->delete_equipamentos($id);        
            redirect( base_url() . 'index.php/equipamentos');  


        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }  


}
?>