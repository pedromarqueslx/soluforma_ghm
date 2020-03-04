<?php
class Conteudos extends CI_Controller {
    public function __construct()
    {
    parent::__construct();
    $this->load->model('user');
    $this->load->model('conteudos_model');
    $this->load->helper("url");
    $this->load->helper('url_helper');
    $this->load->library('pagination');
    $this->load->helper('form');
    }

    public function index() {
    // check if user is loggedIn
    if ($this->session->userdata('isUserLoggedIn')) {  

    // Go to user model getRows
    $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));          
    $data['conteudos'] = $this->conteudos_model->get_conteudos();
    $data['title'] = 'Registo de Entidades';

    $config = array();
    $config['base_url'] = base_url("/index.php/conteudos/index");
    $config["total_rows"] = $this->conteudos_model->record_count();
    $config["per_page"] = '';
    $config["uri_segment"] = 3;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["results"] = $this->conteudos_model->fetch_conteudos($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();         

    $config["total_rows"] = $this->conteudos_model->record_count();
    if (empty($config["total_rows"])) {
    $this->load->view('templates/header', $data);
    $this->load->view('conteudos/view', $data);
    $this->load->view('templates/footer');
    } else {       
    $this->load->view('templates/header', $data);
    $this->load->view('conteudos/index', $data);
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
        $result = $this->conteudos_model->get_autocomplete($search_data);

        if (!empty($result)) {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                echo "<p class='slab'><a href='". base_url() ."index.php/"."conteudos/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
                echo "</td></tr>";
              endforeach;
            echo "</table><hr>";

        }
        else
        {
            echo "<p class='slab-700 strong'>Nenhum resultado encontrado. Pesquise por um registo diferente <a href='". base_url() ."index.php/conteudos/create/'>ou crie um novo.</a></p><hr>";
        }
     }

    public function view($slug = NULL) {
    $data['conteudos_item'] = $this->conteudos_model->get_conteudos($slug);

    if (empty($data['conteudos_item']))
    {
        show_404();
    }

    $data['title'] = $data['conteudos_item']['title'];
    $this->load->view('templates/header', $data);
    $this->load->view('conteudos/view', $data);
    $this->load->view('templates/footer');
    }

    public function create() {
    // check if user is loggedIn
    if ($this->session->userdata('isUserLoggedIn')) {          

    // Go to user model getRows
    $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));     

    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Novo Registo';
    $this->form_validation->set_rules('title', 'Área de Formação', 'required');
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('conteudos/create');
        $this->load->view('templates/footer');
    }
    else
    {
        $this->conteudos_model->set_conteudos();
        redirect( base_url() . 'index.php/conteudos');
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
        $checkEmail = $this->conteudos_model->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('title_check', 'O Conteúdo Programático introduzido já existe.');
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
    $data['conteudos_item'] = $this->conteudos_model->get_conteudos_by_id($id);
    //$data['funcionarios'] = $this->funcionarios_model->get_funcionarios();
    //$data['equipamentos'] = $this->equipamentos_model->get_equipamentos();    

    $this->form_validation->set_rules('title', 'Área de Formação', 'required');
 
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('conteudos/edit', $data);
        $this->load->view('templates/footer');
    }
    else
    {
        $this->conteudos_model->set_conteudos($id);
        //$this->load->view('formador/success');
        redirect( base_url() . 'index.php/conteudos');
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
        $data['title'] = 'Total conteudos';
        $data['conteudos_item'] = $this->conteudos_model->get_conteudos_by_title($id);
       
        $this->load->view('templates/header', $data);
        $this->load->view('conteudos/total', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        if (empty($id))
        {
            show_404();
        }
                
        $conteudos_item = $this->conteudos_model->get_conteudos_by_id($id);
        $this->conteudos_model->delete_conteudos($id);        
        redirect( base_url() . 'index.php/conteudos');        
    }
    public function pdf()
    {
        $this->load->helper('pdf_helper');
        $this->load->view('conteudos/pdf');
    }
}


?>