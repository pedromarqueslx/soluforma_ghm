<?php
class Multas extends CI_Controller {

        public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('Pdf_Library');
        $this->load->library('form_validation');
        $this->load->model('contactos_model');
        $this->load->model('funcionarios_model');
        $this->load->model('multas_model');
        $this->load->helper("url");
        $this->load->helper('url_helper');
        $this->load->library('pagination');
        }

        public function index() {
        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {  

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));  

        $data['multas'] = $this->multas_model->get_multas();
        $data['title'] = 'Registos de Multas';

        $config = array();
        $config['base_url'] = base_url("/index.php/multas/index");
        $config["total_rows"] = $this->multas_model->record_count();
        $config["per_page"] = '';
        $config["uri_segment"] = 3;
        $config['cur_tag_open'] = '<li class="disabled"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->multas_model->fetch_multas($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();         
        
        $config["total_rows"] = $this->multas_model->record_count();
        if (empty($config["total_rows"]))
        {
        $this->load->view('templates/header', $data);
        $this->load->view('multas/view', $data);
        $this->load->view('templates/footer');
        }
        else
        {
        $this->load->view('templates/header', $data);
        $this->load->view('multas/index', $data);
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
         $result = $this->multas_model->get_autocomplete($search_data);

         if (!empty($result))
         {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                echo "<p class='slab'><a href='". base_url() ."index.php/"."multas/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
                echo "</td></tr>";
              endforeach;
            echo "</table>";

         }
         else
         {
            echo "<p class='slab-700 strong'>Nenhum resultado encontrado. Pesquise por um registo diferente <a href='". base_url() ."index.php/multas/create/'>ou crie um novo.</a></p>";
         }
    }


/*
    public function view($slug = NULL)  {
        $data['multas_item'] = $this->multas_model->get_multas($slug);
        if (empty($data['multas_item'])) {
            show_404();
        }

        $data['title'] = $data['multas_item']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('multas/view', $data);
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
        $data['title'] = 'Novo Registo';
        $data['contactos'] = $this->contactos_model->get_contactos();
        $data['funcionarios'] = $this->funcionarios_model->get_funcionarios();
        //$data['login_date'] = $this->user->login_date();
        
        $this->form_validation->set_rules('title', 'Nome', 'required');
        $this->form_validation->set_rules('data', 'Data', 'required');
        $this->form_validation->set_rules('valor', 'Valor Multa', 'numeric');
        $this->form_validation->set_rules('valor_cobrado', 'Valor Cobrado', 'numeric');
        $this->form_validation->set_rules('custo_adv', 'Custo Advogado', 'numeric');
        $this->form_validation->set_rules('resultado', 'Resultado', 'numeric');                  

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('multas/create');
            $this->load->view('templates/footer');
        }else{
            $this->multas_model->set_multas();
            redirect( base_url() . 'index.php/multas');
        }

        }else{
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }



    // Check if Nome Contacto already exist during validation
    public function title_check_exist($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('title'=>$str);
        $checkEmail = $this->contactos_model->getRows($con);
        if($checkEmail == 0){
            $this->form_validation->set_message('title_check_exist', 'O Nome da Empresa não esta registado.</a>
');
            return FALSE;
        }else{
            return TRUE;
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
            $data['artigos'] = $this->multas_model->get_multas_by_id($id);
            
            $this->form_validation->set_rules('title', 'Nome', 'required');
            $this->form_validation->set_rules('data', 'Data', 'required');
            $this->form_validation->set_rules('valor', 'Valor Multa', 'numeric');
            $this->form_validation->set_rules('valor_cobrado', 'Valor Cobrado', '');
            $this->form_validation->set_rules('custo_adv', 'Custo Advogado', 'numeric');              
            $this->form_validation->set_rules('resultado', 'Resultado', 'numeric');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('multas/edit', $data);
                $this->load->view('templates/footer');
             }else{
                $this->multas_model->set_multas($id);
                //$this->load->view('multas/success');
                redirect( base_url() . 'index.php/multas');
            }

        }else{
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }




    public function delete() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {

            $id = $this->uri->segment(3);
            
            if (empty($id)) {
                show_404();
            }
                    
            $multas_item = $this->multas_model->get_multas_by_id($id);
            $this->multas_model->delete_multas($id);        
            redirect( base_url() . 'index.php/multas');  

        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }


    public function total() {
        //table width all "artigos" :: COMMENT LATER
        $id = $this->uri->segment(3);

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));          

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['artigos'] = $this->multas_model->get_multas_by_id($id);
        $data['equipamentos'] = $this->equipamentos_model->get_equipamentos();
        $data['multas'] = $this->multas_model->get_multas_by_title();

        $data['show_table'] = $this->view_table();
        $this->load->view('templates/header', $data);
        $this->load->view('multas/total', $data);
        $this->load->view('templates/footer');
    }

    
    public function pdf() {
            $id = $this->uri->segment(3);
            $data['artigos'] = $this->multas_model->get_multas_by_id($id);
            $this->load->view('multas/pdf', $data);
    }

/*
    public function pdf() {
    $id = $this->uri->segment(3);
    $data['multas'] = $this->multas_model->get_multas_by_id($id);
    $this->load->view('multas/pdf', $data);
    }    
*/

    // function to get all artigos records :: COMMENT LATER
    public function view_table() {
        $result = $this->multas_model->show_all_data();
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
            $result = $this->multas_model->select_id_and_date_range($data);
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
        $this->load->view('multas/total', $data);
        $this->load->view('templates/footer');
    }
}
?>