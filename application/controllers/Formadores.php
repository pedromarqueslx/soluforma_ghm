<?php
class Formadores extends CI_Controller {
    public function __construct()
    {
    parent::__construct();
    $this->load->model('user');
    $this->load->model('formadores_model');
    $this->load->helper("url");
    $this->load->helper('url_helper');
    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->library('form_validation');    
    }

    public function index() {
    // check if user is loggedIn
    if ($this->session->userdata('isUserLoggedIn')) {  

    // Go to user model getRows
    $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));          
    $data['formadores'] = $this->formadores_model->get_formadores();
    $data['title'] = 'Registo de Entidades';

    $config = array();
    $config['base_url'] = base_url("/index.php/formadores/index");
    $config["total_rows"] = $this->formadores_model->record_count();
    $config["per_page"] = '';
    $config["uri_segment"] = 3;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["results"] = $this->formadores_model->fetch_formadores($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();         

    $config["total_rows"] = $this->formadores_model->record_count();
    if (empty($config["total_rows"])) {
    $this->load->view('templates/header', $data);
    $this->load->view('formadores/view', $data);
    $this->load->view('templates/footer');
    } else {       
    $this->load->view('templates/header', $data);
    $this->load->view('formadores/index', $data);
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
        $result = $this->formadores_model->get_autocomplete($search_data);

        if (!empty($result)) {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                echo "<p class='slab'><a href='". base_url() ."index.php/"."formadores/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
                echo "</td></tr>";
              endforeach;
            echo "</table><hr>";

        }
        else
        {
            echo "<p class='slab-700 strong'>Nenhum resultado encontrado. Pesquise por um registo diferente <a href='". base_url() ."index.php/formadores/create/'>ou crie um novo.</a></p><hr>";
        }
     }

    public function view($slug = NULL) {
    $data['formadores_item'] = $this->formadores_model->get_formadores($slug);

    if (empty($data['formadores_item']))
    {
        show_404();
    }

    $data['title'] = $data['formadores_item']['title'];
    $this->load->view('templates/header', $data);
    $this->load->view('formadores/view', $data);
    $this->load->view('templates/footer');
    }

    public function create() {
    // check if user is loggedIn
    if ($this->session->userdata('isUserLoggedIn')) {          

    // Go to user model getRows
    $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));     

    $data['title'] = 'Novo Registo';
    $this->form_validation->set_rules('title', 'Nome Formadores', 'required|callback_title_check');
    $this->form_validation->set_rules('cap_formadores', 'CAP Formador', 'required');
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('formadores/create');
        $this->load->view('templates/footer');
    } else {
        $this->formadores_model->set_formadores();
        redirect( base_url() . 'index.php/formadores');
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
        $checkEmail = $this->formadores_model->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('title_check', 'O Nome Formador introduzido já existe.');
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

    $data['title'] = 'Editar Registo';        
    $data['formadores_item'] = $this->formadores_model->get_formadores_by_id($id);
    $this->form_validation->set_rules('title', 'Nome Formadores', 'required');
    $this->form_validation->set_rules('cap_formadores', 'CAP Formador', 'required'); 
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('formadores/edit', $data);
        $this->load->view('templates/footer');
    } else {
        $this->formadores_model->set_formadores($id);
        //$this->load->view('formador/success');
        redirect( base_url() . 'index.php/formadores');
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
        $data['title'] = 'Total formadores';
        $data['formadores_item'] = $this->formadores_model->get_formadores_by_title($id);
       
        $this->load->view('templates/header', $data);
        $this->load->view('formadores/total', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        if (empty($id))
        {
            show_404();
        }
                
        $formadores_item = $this->formadores_model->get_formadores_by_id($id);
        $this->formadores_model->delete_formadores($id);        
        redirect( base_url() . 'index.php/formadores');        
    }
    public function pdf()
    {
        $this->load->helper('pdf_helper');
        $this->load->view('formadores/pdf');
    }
}


?>