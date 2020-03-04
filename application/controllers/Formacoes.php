<?php
class Formacoes extends CI_Controller {
    public function __construct() {
    parent::__construct();    
    $this->load->model('user');    
    $this->load->library('form_validation');
    $this->load->library('pagination');
    $this->load->library('Pdf_Library');
    $this->load->model('formacoes_model');
    $this->load->model('funcionarios_model');
    $this->load->model('contactos_model');
    $this->load->model('conteudos_model');
    $this->load->model('formadores_model');    
    $this->load->helper("url");
    $this->load->helper('url_helper');
    //$this->load->helper('string');
    $this->load->helper('text');
    }

    public function pdf() {
    $id = $this->uri->segment(3);
    $data['formacoes'] = $this->formacoes_model->get_formacoes_by_id($id);
    //$data['formacoes_item'] = $this->formacoes_model->get_formacoes_by_id($id);
    $data['funcionarios'] = $this->funcionarios_model->get_funcionarios_by_id($id);
    $data['conteudos'] = $this->conteudos_model->get_conteudos_by_id($id);
    $this->load->view('formacoes/pdf', $data);
    }

    public function index() {
    // check if user is loggedIn
    if ($this->session->userdata('isUserLoggedIn')) {
    // Go to user model getRows
    $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));    
    $data['title'] = 'Novo Registo';
    //load Contactos/Empresas
    $data['formacoes'] = $this->formacoes_model->get_formacoes_group();
    //$data['formacoes_item'] = $this->formacoes_model->get_formacoes_by_id();
    //$data['funcionarios'] = $this->funcionarios_model->getFuncionarios_by_empresa();

    if ($this->form_validation->run() === FALSE) {
    $this->load->view('templates/header', $data);
    $this->load->view('formacoes/index');
    $this->load->view('templates/footer');
    } else {
       // if user is NOT loggedIn redirect to homepage
       redirect( base_url() );
    } 
    }
    }

    public function autocomplete() {
    // load model
    $search_data = $this->input->post('search_data');
    $result = $this->formacoes_model->get_autocomplete($search_data);
    if (!empty($result)) {
    echo "<table class='ink-table hover alternating'>";
    foreach ($result as $row):
        echo "<tr><td>";
        echo "<p class='slab'><a href='". base_url() ."index.php/"."formacoes/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
        echo "</td></tr>";
    endforeach;
    echo "</table><hr>";
    } else {
        echo "<p class='slab-700 strong'>Nenhum resultado encontrado. Pesquise por um registo diferente <a href='". base_url() ."index.php/formacoes/create/'>ou crie um novo.</a></p><hr>";
    }
    }

    public function autocomplete_create() {
    // load model
    $search_data = $this->input->post('search_data');
    $result = $this->formacoes_model->get_autocomplete_create($search_data);
    if (!empty($result)) {
    echo "<table class='ink-table hover alternating'>";
    foreach ($result as $row):
    echo "<tr><td>";
    //echo "<p class='slab'><a href='". base_url() ."index.php/"."formacoes/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
    echo "<p class='slab'>$row->title</p>";
    echo "</td></tr>";
    endforeach;
    echo "</table><hr>";
    }else{
    echo "<p class='slab-700 strong'>Nenhum resultado encontrado. Pesquise por um registo diferente <a href='". base_url() ."index.php/contactos/create/'>ou crie um novo.</a></p><hr>";
    }
    }     

    public function view ($slug = NULL) {
    $data['formacoes_item'] = $this->formacoes_model->get_formacoes($slug);
    if (empty($data['formacoes_item'])) 
    {show_404();}
    $data['title'] = $data['formacoes_item']['title'];
    $this->load->view('templates/header', $data);
    $this->load->view('formacoes/view', $data);
    $this->load->view('templates/footer');
    }


    public function create() {
    // check if user is loggedIn
    if ($this->session->userdata('isUserLoggedIn')) {
    // Go to user model getRows
    $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));    
    $data['title'] = 'Novo Registo';
    //load Contactos/Empresas
    //$data['contactos'] = $this->contactos_model->getcontactos();
    $data['contactos'] = $this->contactos_model->get_contactos();
    $data['formacoes'] = $this->formacoes_model->get_formacoes();
    $data['conteudos'] = $this->conteudos_model->get_conteudos();
    $data['formadores'] = $this->formadores_model->get_formadores(); 
    $data['login_date'] = $this->user->login_date();
    //form validation
    $this->form_validation->set_rules('title', 'Empresa', 'required');
    $this->form_validation->set_rules('area_formacoes', 'Área de Formação', 'required');
    $this->form_validation->set_rules('formadores_formacoes', 'Formador', 'required');
    $this->form_validation->set_rules('data_formacoes', 'Data da Formação', 'required');
    $this->form_validation->set_rules('formandos_formacoes[]', 'Funcionários', 'required');
    $this->form_validation->set_rules('validade_identificacao_formacoes[]', 'Validade Identificação', 'required');

    if ($this->form_validation->run() === FALSE) {
    $this->load->view('templates/header', $data);
    $this->load->view('formacoes/create');
    $this->load->view('templates/footer');
    }else{
    //$this->contactos_model->set_contactos();
    $this->formacoes_model->set_formacoes();
    //$insert_id = $this->db->insert_id('formacoes');
    redirect( base_url() . 'index.php/formacoes/index/');
    }}else{
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
            $this->form_validation->set_message('title_check_exist', 'O Nome da Empresa não esta registado.</a>');
            return FALSE;
        }else{
            return TRUE;
        }
    }


    public function getFuncionariosbyempresa() {
        // POST data
        $postData = $this->input->post();
        // get data
        $data = $this->formacoes_model->getEmpresas($postData);
        echo json_encode($data);
    }

    public function getConteudosbyareaformacao() {
        // POST data
        $postData = $this->input->post();
        // get data
        $data = $this->formacoes_model->getConteudos($postData);
        echo json_encode($data);
    }


    public function edit() {
    // check if user is loggedIn
    if ($this->session->userdata('isUserLoggedIn')) { 
    // Go to user model getRows
    $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));    
    $id = $this->uri->segment(3);
    if (empty($id)) {show_404();}
    $data['title'] = 'Editar Registo';
    $data['formacoes_item'] = $this->formacoes_model->get_formacoes_by_slug($id);
    //$data['formacoes_title'] = $this->formacoes_model->get_formacoes_by_title($id);
    //$data['formacoes_item'] = $this->formacoes_model->get_formacoes_by_slug();
    //$data['funcionarios'] = $this->funcionarios_model->get_funcionarios_by_id($id);
    $this->load->view('templates/header', $data);
    $this->load->view('formacoes/edit', $data);
    $this->load->view('templates/footer');
    }else{
    // if user is NOT loggedIn redirect to homepage
    redirect( base_url() );
    }
    }


    public function funcionarios() {
    // check if user is loggedIn
    if ($this->session->userdata('isUserLoggedIn')) { 
    // Go to user model getRows
    $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));    
    $id = $this->uri->segment(3);
    if (empty($id)) {show_404();}
    $data['title'] = 'Editar Registo';
    $data['formacoes_item'] = $this->formacoes_model->get_funcionarios_sem_formacao_by_slug($id);
    //$data['formacoes_title'] = $this->formacoes_model->get_formacoes_by_title($id);
    //$data['formacoes_item'] = $this->formacoes_model->get_formacoes_by_slug();
    //$data['funcionarios'] = $this->funcionarios_model->get_funcionarios_by_id($id);
    $this->load->view('templates/header', $data);
    $this->load->view('formacoes/funcionarios', $data);
    $this->load->view('templates/footer');
    }else{
    // if user is NOT loggedIn redirect to homepage
    redirect( base_url() );
    }
    }

    public function total() {
    // check if user is loggedIn
    if ($this->session->userdata('isUserLoggedIn')) { 
    // Go to user model getRows
    $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));  
    $id = $this->uri->segment(3);
    //if (empty($id)) {
    //show_404();
    //}
    $data['title'] = 'Total Serviços';
    $data['equipamentos_item'] = $this->formacoes_model->get_formacoes_by_title($id);
    $data['formacoes'] = $this->formacoes_model->get_formacoes_by_title();
    $data['show_table'] = $this->view_table();
    $this->load->view('templates/header', $data);
    $this->load->view('formacoes/total', $data);
    $this->load->view('templates/footer');
    } else {
    // if user is NOT loggedIn redirect to homepage
    redirect( base_url() );
    }
    }

    public function delete() {
    $id = $this->uri->segment(3);
    if (empty($id)) {
        show_404();
    }
    $formacoes_item = $this->formacoes_model->get_formacoes_by_id($id);
    $this->formacoes_model->delete_formacoes($id);        
    redirect( base_url() . 'index.php/formacoes');        
    }

    // function to get all artigos records :: COMMENT LATER
    public function view_table() {
    $result = $this->formacoes_model->show_all_data();
    if ($result != false) {
    return $result;
    }else{
    return 'Por favor adicione um novo registo de Intervenção !';
    } 
    }

    public function select_id_and_date_range() {
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
        $id = $this->input->post('id');
        $fatura = $this->input->post('fatura');
        $data = array(
            'date1' => $date1,
            'date2' => $date2,
            'id' => $id,
            'fatura' => $fatura
        );
        if ($date1 == "" || $date2 == "" || $id == "") {
            $data['date_range_error_message'] = "Por favor preencha os campos";
            
        } else {
            $result = $this->formacoes_model->select_id_and_date_range($data);
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
        $this->load->view('formacoes/total', $data);
        $this->load->view('templates/footer');
    }
}
?>