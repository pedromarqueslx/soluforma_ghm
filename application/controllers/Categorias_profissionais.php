<?php
class Categorias_profissionais extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('form_validation');
        $this->load->model('categorias_profissionais_model');
        $this->load->model('contactos_model');
        $this->load->helper("url");
        $this->load->helper('url_helper');
        $this->load->library('pagination');
    }


    public function index() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));            
          
            $data['categorias_profissionais'] = $this->categorias_profissionais_model->get_categorias_profissionais();
            $data['title'] = 'Registos de Rendas';

            $config = array();
            $config['base_url'] = base_url("/index.php/categorias_profissionais/index");
            $config["total_rows"] = $this->categorias_profissionais_model->record_count();
            $config["per_page"] = '';
            $config["uri_segment"] = 3;
            $config['cur_tag_open'] = '<li class="disabled"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
            $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->categorias_profissionais_model->fetch_categorias_profissionais($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();          

            $config["total_rows"] = $this->categorias_profissionais_model->record_count();

            if (empty($config["total_rows"])) {
            $this->load->view('templates/header', $data);
            $this->load->view('categorias_profissionais/view', $data);
            $this->load->view('templates/footer');
            }

            else {
            $this->load->view('templates/header', $data);
            $this->load->view('categorias_profissionais/index', $data);
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
         $result = $this->categorias_profissionais_model->get_autocomplete($search_data);

         if (!empty($result))
         {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                echo "<p class='slab'><a href='". base_url() ."index.php/"."categorias_profissionais/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
                echo "</td></tr>";
              endforeach;
            echo "</table>";

         }
         else
         {
            echo "<p class='slab-700 strong'>Nenhum resultado encontrado. Pesquise por um registo diferente <a href='". base_url() ."index.php/categorias_profissionais/create/'>ou crie um novo.</a></p>";
         }
    }


    /*
    public function view($slug = NULL)
        {
        $data['categorias_profissionais_item'] = $this->categorias_profissionais_model->get_categorias_profissionais($slug);

        if (empty($data['categorias_profissionais_item']))
        {
            show_404();
        }

        $data['title'] = $data['categorias_profissionais_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('categorias_profissionais/view', $data);
        $this->load->view('templates/footer');
        }
    */    

    public function create() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));  
          
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['login_date'] = $this->user->login_date(); 
            $data['title'] = 'Novo Registo';

            $this->form_validation->set_rules('title', 'Categoria Profissional', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('categorias_profissionais/create');
                $this->load->view('templates/footer');

            } else {
                $this->categorias_profissionais_model->set_categorias_profissionais();
                redirect( base_url() . 'index.php/categorias_profissionais');
            }

        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }


    public function edit() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {  

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));              

            $id = $this->uri->segment(3);
            
            if (empty($id)) {
                show_404();
            }
            
            $this->load->helper('form');
            $this->load->library('form_validation');
            
            $data['title'] = 'Editar Registo';
            $data['categorias_profissionais'] = $this->categorias_profissionais_model->get_categorias_profissionais_by_id($id);
                
            $this->form_validation->set_rules('title', 'Categoria Profissional', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('categorias_profissionais/edit', $data);
                $this->load->view('templates/footer');
            }
            else {
                $this->categorias_profissionais_model->set_categorias_profissionais($id);
                //$this->load->view('categorias_profissionais/success');
                redirect( base_url() . 'index.php/categorias_profissionais');
            }

        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }

   
    public function delete() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {  

            $id = $this->uri->segment(3);
            
            if (empty($id))
            {
                show_404();
            }
                    
            $categorias_profissionais_item = $this->categorias_profissionais_model->get_categorias_profissionais_by_id($id);
            $this->categorias_profissionais_model->delete_categorias_profissionais($id);        
            redirect( base_url() . 'index.php/categorias_profissionais');  

        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }


    public function total() {

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        //table width all "categorias_profissionaiss" :: COMMENT LATER
        $id = $this->uri->segment(3);

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['categorias_profissionais'] = $this->categorias_profissionais_model->get_categorias_profissionais_by_id($id);
        //$data['equipamentos'] = $this->equipamentos_model->get_equipamentos();
        $data['categorias_profissionais'] = $this->categorias_profissionais_model->get_categorias_profissionais_by_title();

        $data['show_table'] = $this->view_table();
        $this->load->view('templates/header', $data);
        $this->load->view('categorias_profissionais/total', $data);
        $this->load->view('templates/footer');
    }


    public function pdf() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {

            $this->load->helper('pdf_helper');
            $this->load->view('categorias_profissionais/pdf');

        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }

    // function to get all categorias_profissionais records :: COMMENT LATER
    public function view_table() {
        $result = $this->categorias_profissionais_model->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Por favor adicione um novo registo de Combustível !';
        }
    }

    public function select_id_and_date_range() {
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
        $id = $this->input->post('id');
        $data = array(
            'date1' => $date1,
            'date2' => $date2,
            'id' => $id
        );
        if ($date1 == "" || $date2 == "" || $id == "") {
            $data['date_range_error_message'] = "Por favor preencha os campos";
        } else {
            $result = $this->categorias_profissionais_model->select_id_and_date_range($data);
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "Não foram encontrados Registos !";
            }
        }
        $data['show_table'] = $this->view_table();
        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));  
                
        $this->load->view('templates/header', $data);
        $this->load->view('categorias_profissionais/total', $data);
        $this->load->view('templates/footer');
    }
}
?>