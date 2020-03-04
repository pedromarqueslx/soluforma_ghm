<?php
class infracoes extends CI_Controller {
    public function __construct()
    {
    parent::__construct();
    $this->load->model('user');
    $this->load->model('infracoes_model');
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
    $data['infracoes'] = $this->infracoes_model->get_infracoes();
    $data['title'] = 'Registo de Entidades';

    $config = array();
    $config['base_url'] = base_url("/index.php/infracoes/index");
    $config["total_rows"] = $this->infracoes_model->record_count();
    $config["per_page"] = '';
    $config["uri_segment"] = 3;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["results"] = $this->infracoes_model->fetch_infracoes($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();         

    $config["total_rows"] = $this->infracoes_model->record_count();
    if (empty($config["total_rows"])) {
    $this->load->view('templates/header', $data);
    $this->load->view('infracoes/view', $data);
    $this->load->view('templates/footer');
    } else {       
    $this->load->view('templates/header', $data);
    $this->load->view('infracoes/index', $data);
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
        $result = $this->infracoes_model->get_autocomplete($search_data);

        if (!empty($result)) {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                echo "<p class='slab'><a href='". base_url() ."index.php/"."infracoes/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
                echo "</td></tr>";
              endforeach;
            echo "</table><hr>";

        }
        else
        {
            echo "<p class='slab-700 strong'>Nenhum resultado encontrado. Pesquise por um registo diferente <a href='". base_url() ."index.php/infracoes/create/'>ou crie um novo.</a></p><hr>";
        }
     }

    public function view($slug = NULL) {
    $data['infracoes_item'] = $this->infracoes_model->get_infracoes($slug);

    if (empty($data['infracoes_item']))
    {
        show_404();
    }

    $data['title'] = $data['infracoes_item']['title'];
    $this->load->view('templates/header', $data);
    $this->load->view('infracoes/view', $data);
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
    $this->form_validation->set_rules('title', 'Título da Infracção', 'required');
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('infracoes/create');
        $this->load->view('templates/footer');
    }
    else
    {
        $this->infracoes_model->set_infracoes();
        redirect( base_url() . 'index.php/infracoes');
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
        $checkEmail = $this->infracoes_model->getRows($con);
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
    $data['infracoes_item'] = $this->infracoes_model->get_infracoes_by_id($id);
    //$data['funcionarios'] = $this->funcionarios_model->get_funcionarios();
    //$data['equipamentos'] = $this->equipamentos_model->get_equipamentos();    

    $this->form_validation->set_rules('title', 'Área de Formação', 'required');
 
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('infracoes/edit', $data);
        $this->load->view('templates/footer');
    }
    else
    {
        $this->infracoes_model->set_infracoes($id);
        //$this->load->view('formador/success');
        redirect( base_url() . 'index.php/infracoes');
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
        $data['title'] = 'Total infracoes';
        $data['infracoes_item'] = $this->infracoes_model->get_infracoes_by_title($id);
       
        $this->load->view('templates/header', $data);
        $this->load->view('infracoes/total', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        if (empty($id))
        {
            show_404();
        }
                
        $infracoes_item = $this->infracoes_model->get_infracoes_by_id($id);
        $this->infracoes_model->delete_infracoes($id);        
        redirect( base_url() . 'index.php/infracoes');        
    }
    public function pdf()
    {
        $this->load->helper('pdf_helper');
        $this->load->view('infracoes/pdf');
    }
}


?>