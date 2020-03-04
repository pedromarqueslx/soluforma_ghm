<?php
class Pages extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('pages_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            $this->load->library('form_validation');
            $this->load->model('User');

        }
        public function index()
        {
            /*
            if($this->session->userdata('logged_in'))
            {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('templates/header');
            $this->load->view('pages/index');
            $this->load->view('templates/footer');
            }
            else
            {
              //If no session, redirect to login page
              redirect('login', 'refresh');
            }
              
         function logout()
          {
            $this->session->unset_userdata('logged_in');
            session_destroy();
            redirect('home', 'refresh');
          }
          */
            // metodo para ver todas as noticias
            //$data['equipamentos'] = $this->pages_model->get_equipamentoss();
            //$data['equipamentos'] = $this->pages_model->get_equipamentos();
            //$data['artigos_oficina'] = $this->pages_model->get_artigos_oficina();
            //variavel $data é passada para as views - necessario criar views para fazer render    
            //$this->load->view('templates/header');
            //$this->load->view('pages/index');
            $this->load->view('pages/login');
            $this->load->view('templates/footer');
        }
    public function pdf()
    {
        $this->load->helper('pdf_helper');
        $this->load->view('pages/pdf');
    }        
 }
?>