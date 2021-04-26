<?php
class Motoristas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('Pdf_Library');
        $this->load->model('motoristas_model');
        $this->load->model('contactos_model');
        $this->load->model('servicos_model');
        $this->load->model('categorias_profissionais_model');
        $this->load->helper("url");
        $this->load->helper('url_helper');
        //$this->load->library('pagination');
        $this->load->helper('form');
    }

    public function pdf() {
        $id = $this->uri->segment(3);
        $data['funcionarios'] = $this->motoristas_model->select_funcionarios($id);
        $this->load->view('motoristas/pdf', $data);
    }

    public function index() {
        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {

            // Go to user model getRows
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

            //$data['funcionarios'] = $this->motoristas_model->get_funcionarios();
            //$data['title'] = 'Registos de Funcionarios';
            $config = array();
            $config['base_url'] = base_url("/index.php/funcionarios/index");
            $config["total_rows"] = $this->motoristas_model->record_count();
            $config["per_page"] = '';
            $config["uri_segment"] = 3;
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->motoristas_model->fetch_funcionarios($config["per_page"], $page);
            $config["total_rows"] = $this->motoristas_model->record_count();

            if (empty($config["total_rows"])) {
                $this->load->view('templates/header', $data);
                $this->load->view('motoristas/view', $data);
                $this->load->view('templates/footer');
            }else {
                $this->load->view('templates/header', $data);
                $this->load->view('motoristas/index', $data);
                $this->load->view('templates/footer');
            }
        } else {
            // if user is NOT loggedIn redirect to homepage
            redirect( base_url() );
        }
    }

    public function autocomplete()
    {
        // load model
        $search_data = $this->input->post('search_data');
        $result = $this->motoristas_model->get_autocomplete($search_data);

        if (!empty($result))
        {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                echo "<p class='slab'><a href='". base_url() ."index.php/"."funcionarios/"."edit/". $row->id ."'".">" . $row->nome . "</a></p>";
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
            $data['title'] = 'Novo Registo';
            $data['categorias_profissionais'] = $this->categorias_profissionais_model->get_categorias_profissionais();
            $data['contactos'] = $this->contactos_model->get_contactos();

            $this->form_validation->set_rules('title', 'Nome', 'required');
            $this->form_validation->set_rules('empresa', 'Empresa', 'required');

            if ($this->form_validation->run() === FALSE){
                $this->load->view('templates/header', $data);
                $this->load->view('motoristas/create');
                $this->load->view('templates/footer');
            } else {
                $this->motoristas_model->set_funcionarios();
                redirect( base_url() . 'index.php/motoristas');
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
        $checkEmail = $this->motoristas_model->getRows($con);
        if($checkEmail > 0) {
            $this->form_validation->set_message('title_check', 'O Nome de Formando já foi introduzido.');
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

            if (empty($id)) {
                show_404();
            }

            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Editar Registo';

            $data['categorias_profissionais'] = $this->categorias_profissionais_model->get_categorias_profissionais();
            $data['funcionarios_item'] = $this->motoristas_model->get_funcionarios_by_id($id);
            $data['contactos'] = $this->contactos_model->get_contactos();
            // form validation
            $this->form_validation->set_rules('title', 'Nome', 'required');
            $this->form_validation->set_rules('empresa', 'Empresa', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('motoristas/edit', $data);
                $this->load->view('templates/footer');
            }else{
                $this->motoristas_model->set_funcionarios($id);
                redirect( base_url() . 'index.php/motoristas');
            }
        } else {
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
            //$data['funcionarios'] = $this->motoristas_model->get_funcionarios_by_title($id);
            //$data['servicos'] = $this->servicos_model->get_servicos_by_title();
            $data['equipamentos_item'] = $this->servicos_model->get_servicos_by_title($id);
            $data['servicos'] = $this->servicos_model->get_servicos_by_title();
            $data['show_table'] = $this->view_table();
            $this->load->view('templates/header', $data);
            $this->load->view('motoristas/total', $data);
            $this->load->view('templates/footer');
        } else {
            // if user is NOT loggedIn redirect to homepage
            redirect( base_url() );
        }
    }

    // function to get all artigos records :: COMMENT LATER
    public function view_table() {
        $result = $this->motoristas_model->show_all_data();
        if ($result != false) {
            return $result;
        }else{
            return 'Por favor adicione um novo registo de Intervenção !';
        }
    }

    public function delete() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {

            $id = $this->uri->segment(3);

            if (empty($id)) {
                show_404();
            }

            $funcionarios_item = $this->motoristas_model->get_funcionarios_by_id($id);

            $this->motoristas_model->delete_funcionarios($id);
            redirect( base_url() . 'index.php/motoristas');

        } else {
            // if user is NOT loggedIn redirect to homepage
            redirect( base_url() );
        }
    }

    public function getidbyempresa() {
        // POST data
        $postData = $this->input->post();
        // get data
        $data = $this->motoristas_model->getFuncionarios($postData);
        echo json_encode($data);
    }


    public function getidbydata_demissao() {
        // POST data
        $postData = $this->input->post();
        // get data
        $data = $this->motoristas_model->getdata_demissao($postData);
        echo json_encode($data);
    }

}
?>
