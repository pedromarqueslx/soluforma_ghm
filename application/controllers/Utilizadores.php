<?php

class Utilizadores extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('utilizadores_model');
            $this->load->helper('url_helper');
        }

        public function index()
        {
        $data['utilizadores'] = $this->utilizadores_model->get_utilizadores();
        $data['title'] = 'Utilizadores';

        $this->load->view('templates/header', $data);
        $this->load->view('utilizadores/index', $data);
        $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
        $data['utilizadores_item'] = $this->utilizadores_model->get_utilizadores($slug);

        if (empty($data['utilizadores_item']))
        {
            show_404();
        }

        $data['title'] = $data['utilizadores_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('utilizadores/view', $data);
        $this->load->view('templates/footer');
        }

    public function create()
    {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Registo de Utilizador';

    $this->form_validation->set_rules('title', 'Utilizador', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confirmar', 'Confirmar', 'required');
    $this->form_validation->set_rules('email', 'E-mail', 'required');


    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('utilizadores/create');
        $this->load->view('templates/footer');

    }
    else
    {
        $this->utilizadores_model->set_utilizadores();
        redirect( base_url() . 'index.php/utilizadores');
    }
}


    public function edit()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Editar Utilizador';
        $data['utilizadores_item'] = $this->utilizadores_model->get_utilizadores_by_id($id);

    $this->form_validation->set_rules('title', 'Utilizador', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confirmar', 'Confirmar', 'required');
    $this->form_validation->set_rules('email', 'E-mail', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('utilizadores/edit', $data);
            $this->load->view('templates/footer');

        }
        else
        {
            $this->utilizadores_model->set_utilizadores($id);
            //$this->load->view('utilizadores/success');
            redirect( base_url() . 'index.php/utilizadores');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $utilizadores_item = $this->utilizadores_model->get_utilizadores_by_id($id);

        $this->utilizadores_model->delete_utilizadores($id);
        redirect( base_url() . 'index.php/utilizadores');
    }


    public function pdf()
    {
        $this->load->helper('pdf_helper');
        $this->load->view('utilizadores/pdf');
    }




}




?>
