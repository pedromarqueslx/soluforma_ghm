<?php
class Relatorios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('Pdf_Library');
        $this->load->model('relatorios_model');
        $this->load->model('funcionarios_model');
        $this->load->model('contactos_model');
        //$this->load->model('conteudos_model');
        $this->load->model('infracoes_model');
        //$this->load->model('formadores_model');
        $this->load->helper("url");
        $this->load->helper('url_helper');
    }

    public function pdf() {
        $id = $this->uri->segment(3);
        //$id_infracoes = $discos['id_infracao'];
        $data['discos'] = $this->relatorios_model->get_servicos_by_id($id);
        //$data['servicos_item'] = $this->relatorios_model->get_servicos_by_id($id);
        $data['funcionarios'] = $this->funcionarios_model->get_funcionarios_by_id($id);
        //$data['conteudos'] = $this->conteudos_model->get_conteudos_by_id($id);
        //$data['infracoes'] = $this->infracoes_model->get_infracoes_by_id($id_infracoes);
        $this->load->view('discos/pdf', $data);
    }

    public function pdf2() {
        $id = $this->uri->segment(3);
        $data['discos'] = $this->relatorios_model->get_servicos_by_id($id);
        //$data['servicos_item'] = $this->relatorios_model->get_servicos_by_id($id);
        $data['funcionarios'] = $this->funcionarios_model->get_funcionarios_by_id($id);
        //$data['conteudos'] = $this->conteudos_model->get_conteudos_by_id($id);
        $data['infracoes'] = $this->infracoes_model->get_infracoes_by_id($id);
        $this->load->view('discos/pdf2', $data);
    }

    public function index() {
        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {
            // Go to user model getRows
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            $data['title'] = 'Registos de Serviços';
            $config = array();
            $config['base_url'] = base_url("/index.php/discos/index");
            $config["total_rows"] = $this->relatorios_model->record_count();
            $config["per_page"] = '';
            $config["uri_segment"] = 3;
            $config['cur_tag_open'] = '<li class="disabled"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
            $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->relatorios_model->fetch_servicos($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            $config["total_rows"] = $this->relatorios_model->record_count();
            if (empty($config["total_rows"])) {
                $this->load->view('templates/header', $data);
                $this->load->view('discos/view', $data);
                $this->load->view('templates/footer');
            }else{
                $this->load->view('templates/header', $data);
                $this->load->view('discos/index', $data);
                $this->load->view('templates/footer');
            }
        }else{
            // if user is NOT loggedIn redirect to homepage
            redirect( base_url() );
        }
    }

    public function autocomplete() {
        // load model
        $search_data = $this->input->post('search_data');
        $result = $this->relatorios_model->get_autocomplete($search_data);
        if (!empty($result)) {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                echo "<p class='slab'><a href='". base_url() ."index.php/"."servicos/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
                echo "</td></tr>";
            endforeach;
            echo "</table><hr>";
        } else {
            echo "<p class='slab-700 strong'>Nenhum resultado encontrado. Pesquise por um registo diferente <a href='". base_url() ."index.php/servicos/create/'>ou crie um novo.</a></p><hr>";
        }
    }

    public function autocomplete_create() {
        // load model
        $search_data = $this->input->post('search_data');
        $result = $this->relatorios_model->get_autocomplete_create($search_data);
        if (!empty($result)) {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                //echo "<p class='slab'><a href='". base_url() ."index.php/"."servicos/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
                echo "<p class='slab'>$row->title</p>";
                echo "</td></tr>";
            endforeach;
            echo "</table><hr>";
        }else{
            echo "<p class='slab-700 strong'>Nenhum resultado encontrado. Pesquise por um registo diferente <a href='". base_url() ."index.php/contactos/create/'>ou crie um novo.</a></p><hr>";
        }
    }

    public function view ($slug = NULL) {
        $data['servicos_item'] = $this->relatorios_model->get_servicos($slug);
        if (empty($data['servicos_item']))
        {show_404();}
        $data['title'] = $data['servicos_item']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('servicos/view', $data);
        $this->load->view('templates/footer');
    }


    public function create() {
        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {
            // Go to user model getRows
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            $data['title'] = 'Novo Registo';

            //$data['conteudos'] = $this->conteudos_model->get_conteudos();
            $data['infracoes'] = $this->infracoes_model->get_infracoes();
            //$data['formadores'] = $this->formadores_model->get_formadores();
            $data['contactos'] = $this->contactos_model->get_contactos();
            $data['servicos'] = $this->relatorios_model->get_servicos();
            $data['login_date'] = $this->user->login_date();
            //form validation
            $this->form_validation->set_rules('title', 'Empresa', 'required');
            $this->form_validation->set_rules('data_servicos', 'Data da Formação', 'required');
            $this->form_validation->set_rules('periodo_analise', 'Período de Análise Mensal', 'required');
            //$this->form_validation->set_rules('formandos_servicos[]', 'Funcionários', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('discos/create');
                $this->load->view('templates/footer');
            } else {
                $this->relatorios_model->set_servicos($data);
                redirect( base_url() . 'index.php/discos/index/');
            }
        } else {
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
        $data = $this->relatorios_model->getEmpresas($postData);
        echo json_encode($data);
    }

    public function getConteudosbyareaformacao() {
        // POST data
        $postData = $this->input->post();
        // get data
        $data = $this->relatorios_model->getConteudos($postData);
        echo json_encode($data);
    }

    public function getInfracoesbyareaformacao() {
        // POST data
        $postData = $this->input->post();
        // get data
        $data = $this->relatorios_model->geInfracoes($postData);
        echo json_encode($data);
    }

    public function getConteudosbyIDareaformacao() {
        // POST data
        $postData = $this->input->post();
        // get data
        $data = $this->relatorios_model->getConteudosbyID($postData);
        echo json_encode($data);
    }

    public function getInfracoesbyIDareaformacao() {
        // POST data
        $postData = $this->input->post();
        // get data
        $data = $this->relatorios_model->getInfracoesbyID($postData);
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
            $data['servicos_item'] = $this->relatorios_model->get_servicos_by_id($id);
            //$data['conteudos'] = $this->conteudos_model->get_conteudos_by_id($id);
            $data['infracoes'] = $this->infracoes_model->get_infracoes_by_id($id);
            //form validation
            $this->form_validation->set_rules('title', 'Empresa', 'required|callback_title_check_exist');
            $this->form_validation->set_rules('area_servicos', 'Área de Formação', 'required');
            $this->form_validation->set_rules('formadores_servicos', 'Formador', 'required');
            $this->form_validation->set_rules('data_servicos', 'Data da Formação', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('discos/edit', $data);
                $this->load->view('templates/footer');
            }else{
                $this->relatorios_model->set_servicos_id($id);
                redirect( base_url() . 'index.php/discos/index/');
            }}else{
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
            $data['equipamentos_item'] = $this->relatorios_model->get_servicos_by_title($id);
            $data['servicos'] = $this->relatorios_model->get_servicos_by_title();
            $data['show_table'] = $this->view_table();
            $this->load->view('templates/header', $data);
            $this->load->view('servicos/total', $data);
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
        $servicos_item = $this->relatorios_model->get_servicos_by_id($id);
        $this->relatorios_model->delete_servicos($id);
        redirect( base_url() . 'index.php/discos');
    }

    // function to get all artigos records :: COMMENT LATER
    public function view_table() {
        $result = $this->relatorios_model->show_all_data();
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
            $result = $this->relatorios_model->select_id_and_date_range($data);
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
        $this->load->view('servicos/total', $data);
        $this->load->view('templates/footer');
    }
}
?>
