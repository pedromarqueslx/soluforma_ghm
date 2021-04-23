<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('contactos_model');
        $this->load->model('servicos2021_model');
        $this->load->model('servicos2020_model');
        $this->load->model('servicos2019_model');
        $this->load->model('servicos_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index() {
        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {
            // Go to user model getRows
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            $data['title'] = 'Registos de Utilizadores';
            $config = array();
            $config['base_url'] = base_url("/index.php/users/index");
            $config["total_rows"] = $this->user->record_count();
            $config["per_page"] = 12;
            $config["uri_segment"] = 3;
            $config['cur_tag_open'] = '<li class="disabled"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
            $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->user->fetch_users($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            $config["total_rows"] = $this->user->record_count();
            if (empty($config["total_rows"])) {
                $this->load->view('templates/header', $data);
                $this->load->view('users/view', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('users/index', $data);
                $this->load->view('templates/footer');
            }
        } else {
            redirect( base_url() );
        }
    }

    public function account() {
        if($this->session->userdata('isUserLoggedIn')) {
            // Go to user model getRows
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            $this->db->where('visivel_servicos', '1')->where('categoria_servicos', '1')->limit(40)->order_by("id", "desc");
            $data['servicos2021'] = $this->servicos2021_model->get_servicos();

            $this->db->where('visivel_servicos', '1')->where('categoria_servicos', '1')->limit(140)->order_by("id", "desc");
            $data['servicos2020'] = $this->servicos2020_model->get_servicos();

            $this->db->where('visivel_servicos', '1')->where('categoria_servicos', '1')->limit(140)->order_by("id", "desc");
            $data['servicos2019'] = $this->servicos2019_model->get_servicos();

            $this->db->where('visivel_servicos', '1')->where('categoria_servicos', '1')->limit(140)->order_by("id", "desc");
            $data['servicos'] = $this->servicos_model->get_servicos();

            $this->db->where('visivel_cliente', '1')->where('categoria_cliente', '1')->limit(6)->order_by("id", "desc");
            $data['contactos'] = $this->contactos_model->get_contactos();

            $this->load->view('templates/header', $data);
            $data['chart'] = $this->uri->segment(1);
            $this->load->view('pages/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect( base_url() );
        }
    }

    /* User login */
    public function login() {
        $data = array();

        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }

        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        if ($this->input->post('loginSubmit')) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('login_date', 'login_date');

            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array (
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );

                if ($this->input->post('login_date')) {
                    $logdata = array (
                        'login_date' => $this->input->post('login_date'),
                        'user_id' => $this->input->post('email'),
                    );
                    $this->db->insert('logs', $logdata);
                }

                $checkLogin = $this->user->getRows($con);
                if ($checkLogin) {
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    redirect('users/account/');
                } else {
                    //redirect('users/login/');
                    $data['error_msg'] = 'Endereço de E-mail ou Senha de Acesso errados, por favor tente novamente.';
                }
            }
        }
        $this->load->view('users/login', $data);
    }

    /* User registration */
    public function create() {
        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {
            // Go to user model getRows
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));//$data['artigos'] = $this->stock_material_model->get_artigos_oficina();
            $data['title'] = 'Novo Registo';
            $data['login_date'] = $this->user->login_date();
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('conf_password', 'Confirmar Password', 'required|matches[password]');
            $this->form_validation->set_rules('user_profile', 'Perfil de Utilizador', 'required');
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('users/create');
                $this->load->view('templates/footer');
            }else{
                $this->user->set_users();
                redirect( base_url() . 'index.php/users');
            }}else{
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
            $data['title'] = 'Editar Utilizador';
            $data['users'] = $this->user->get_users_by_id($id);

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Nova Password', 'required');
            $this->form_validation->set_rules('conf_password', 'Confirmar Nova Password', 'required|matches[password]');
            $this->form_validation->set_rules('user_profile', 'Perfil de Utilizador', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('users/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $this->user->set_users_by_id($id);
                redirect( base_url() . 'index.php/users');
            }

        }else{
            // if user is NOT loggedIn redirect to homepage
            redirect( base_url() );
        }
    }

    /*
     * User logout
     */
    public function logout() {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        //redirect('users/login/');
        $this->load->view('templates/header_login');
        redirect (base_url('index.php/users/login/'));
        //$this->load->view('users/logout');
        $this->load->view('templates/footer');
    }

    /*
     * Existing email check during validation
     */
    public function email_check($str) {
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->user->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'O e-mail introduzido já existe.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function delete() {
        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {

            $id = $this->uri->segment(3);

            if (empty($id)) {
                show_404();
            }

            $artigos_oficina_item = $this->user->get_users_by_id($id);
            $this->user->delete_users($id);
            redirect( base_url() . 'index.php/users');

        } else {
            // if user is NOT loggedIn redirect to homepage
            redirect( base_url() );
        }
    }

    public function pdf() {
        $this->load->helper('pdf_helper');
        $this->load->view('users/pdf');
    }
}
