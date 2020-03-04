<?php
class Contactos extends CI_Controller {
    public function __construct()
    {
    parent::__construct();
    $this->load->model('user');
    $this->load->library('Pdf_Library');    
    $this->load->model('contactos_model');
    $this->load->model('funcionarios_model');
    $this->load->model('formacoes_model');    
    $this->load->helper("url");
    $this->load->helper('url_helper');
    //$this->load->library('pagination');
    $this->load->helper('form');
    $this->load->library('form_validation');
    }

    public function index() {
    // check if user is loggedIn
    if ($this->session->userdata('isUserLoggedIn')) {  

    // Go to user model getRows
    $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));          
    $data['contactos'] = $this->contactos_model->get_contactos();
    $data['title'] = 'Registo de Entidades';

    $config = array();
    $config['base_url'] = base_url("/index.php/contactos/index");
    $config["total_rows"] = $this->contactos_model->record_count();
    $config["per_page"] = '';
    $config["uri_segment"] = 3;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["results"] = $this->contactos_model->fetch_contactos($config["per_page"], $page);
    //$data['funcionarios'] = $this->contactos_model->count_funcionarios_by_empresa();

    $config["total_rows"] = $this->contactos_model->record_count();
    if (empty($config["total_rows"])) {
    $this->load->view('templates/header', $data);
    $this->load->view('contactos/view', $data);
    $this->load->view('templates/footer');
    } else {       
    $this->load->view('templates/header', $data);
    $this->load->view('contactos/index', $data);
    $this->load->view('templates/footer');
    }
    }else{
    // if user is NOT loggedIn redirect to homepage
    redirect( base_url() );
        }
    }

    public function autocomplete()
    {
        // load model
        $search_data = $this->input->post('search_data');
        $result = $this->contactos_model->get_autocomplete($search_data);

        if (!empty($result)) {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                echo "<p class='slab'><a href='". base_url() ."index.php/"."contactos/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
                echo "</td></tr>";
              endforeach;
            echo "</table><hr>";

        }
        else
        {
            echo "<p class='slab-700 strong'>Nenhum resultado encontrado. Pesquise por um registo diferente <a href='". base_url() ."index.php/contactos/create/'>ou crie um novo.</a></p><hr>";
        }
     }

    public function view($slug = NULL) {
    $data['contactos_item'] = $this->contactos_model->get_contactos($slug);

    if (empty($data['contactos_item']))
    {
        show_404();
    }

    $data['title'] = $data['contactos_item']['title'];
    $this->load->view('templates/header', $data);
    $this->load->view('contactos/view', $data);
    $this->load->view('templates/footer');
    }

    public function create() {
    // check if user is loggedIn
    if ($this->session->userdata('isUserLoggedIn')) {          

    // Go to user model getRows
    $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));     

    $data['title'] = 'Novo Registo';
    $this->form_validation->set_rules('title', 'Empresa', 'required|callback_title_check');
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('contactos/create');
        $this->load->view('templates/footer');
    } else {
        $this->contactos_model->set_contactos();
        redirect( base_url() . 'index.php/contactos');
    }
        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }


    // Check if Nome Contacto already exist during validation
    public function title_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('title'=>$str);
        $checkEmail = $this->contactos_model->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('title_check', 'O nome da Empresa introduzida já existe.');
            return FALSE;
        } else {
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
    $data['contactos_item'] = $this->contactos_model->get_contactos_by_id($id);
    //$data['funcionarios'] = $this->funcionarios_model->get_funcionarios();
    //$data['equipamentos'] = $this->equipamentos_model->get_equipamentos();    

    $this->form_validation->set_rules('title', 'Nome Cliente', 'required');
 
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('contactos/edit', $data);
        $this->load->view('templates/footer');
    }
    else
    {
        $this->contactos_model->set_contactos($id);
        //$this->load->view('contactos/success');
        redirect( base_url() . 'index.php/contactos');
    }
        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }

    public function total() {
        $id = $this->uri->segment(3);
        if (empty($id))
        {
            show_404();
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Total Contactos';
        $data['contactos_item'] = $this->contactos_model->get_contactos_by_title($id);
       
        $this->load->view('templates/header', $data);
        $this->load->view('contactos/total', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        if (empty($id))
        {
            show_404();
        }
                
        $contactos_item = $this->contactos_model->get_contactos_by_id($id);
        $this->contactos_model->delete_contactos($id);        
        redirect( base_url() . 'index.php/contactos');        
    }

    public function pdf()
    {
        $id = $this->uri->segment(3);
        $data['contactos'] = $this->contactos_model->select_contactos($id);
        $this->load->view('contactos/pdf', $data);
    }


}


?>