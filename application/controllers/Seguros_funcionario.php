<?php

class seguros_funcionario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('form_validation');
        $this->load->model('funcionarios_model');
        $this->load->model('seguros_funcionario_model');
        $this->load->model('contactos_model');        
        $this->load->helper("url");
        $this->load->helper('url_helper');
        $this->load->library('pagination');
        }

    public function index() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {    

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId'))); 

            $data['seguros_funcionario'] = $this->seguros_funcionario_model->get_seguros_funcionario();
            $data['title'] = 'Registos de Seguros Funcionarios';

            $config = array();
            $config['base_url'] = base_url("/index.php/seguros_funcionario/index");
            $config["total_rows"] = $this->seguros_funcionario_model->record_count();
            $config["per_page"] = '';
            $config["uri_segment"] = 3;
            $config['cur_tag_open'] = '<li class="disabled"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
            $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->seguros_funcionario_model->fetch_seguros_funcionario($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();        

            $config["total_rows"] = $this->seguros_funcionario_model->record_count();
            if (empty($config["total_rows"]))
            {
            $this->load->view('templates/header', $data);
            $this->load->view('seguros_funcionario/view', $data);
            $this->load->view('templates/footer');
            }else{
            $this->load->view('templates/header', $data);
            $this->load->view('seguros_funcionario/index', $data);
            $this->load->view('templates/footer');
            }

        } else {
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }

    public function autocomplete() {
         // load model
         $search_data = $this->input->post('search_data');
         $result = $this->seguros_funcionario_model->get_autocomplete($search_data);

         if (!empty($result)) {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                echo "<p class='slab'><a href='". base_url() ."index.php/"."seguros_funcionario/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
                echo "</td></tr>";
              endforeach;
            echo "</table>";

         }else{
            echo "<p class='slab-700 strong'>Nenhum resultado encontrado. Pesquise por um registo diferente <a href='". base_url() ."index.php/seguros_funcionario/create/'>ou crie um novo.</a></p>";
         }
    }


/*
    public function view($slug = NULL) {
        $data['seguros_funcionario_item'] = $this->seguros_funcionario_model->get_seguros_funcionario($slug);

        if (empty($data['seguros_funcionario_item'])) {
            show_404();
        }

        $data['title'] = $data['seguros_funcionario_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('seguros_funcionario/view', $data);
        $this->load->view('templates/footer');
    }
*/

    public function create() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) {

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));           

            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['funcionarios'] = $this->funcionarios_model->get_funcionarios();
            $data['contactos'] = $this->contactos_model->get_contactos();
            $data['login_date'] = $this->user->login_date();
            $data['title'] = 'Novo Registo';

            $this->form_validation->set_rules('title', 'Funcionário', 'required');
            $this->form_validation->set_rules('custo', 'Custo', 'required');
            $this->form_validation->set_rules('data', 'Data', 'required');
            $this->form_validation->set_rules('data_fim', 'Data Fim');
            $this->form_validation->set_rules('km', 'Km');
            $this->form_validation->set_rules('km_fim', 'Km Fim');
            $this->form_validation->set_rules('preco_artigo', 'Preço Artigo');
            $this->form_validation->set_rules('tipo_artigo', 'Tipo Artigo');
            $this->form_validation->set_rules('referencia_artigo', 'Referência Artigo');
            $this->form_validation->set_rules('nome_artigo', 'Nome Artigo');
            $this->form_validation->set_rules('quantidade_artigo', 'Quantidade Artigo');
            $this->form_validation->set_rules('posicao_artigo', 'Posição Artigo');
            $this->form_validation->set_rules('medida_artigo', 'Medida Artigo');
            $this->form_validation->set_rules('marca_artigo', 'Marca Artigo');
            $this->form_validation->set_rules('estado_artigo', 'Estado Artigo');
            $this->form_validation->set_rules('categoria_artigo', 'Categoria Artigo');
            $this->form_validation->set_rules('visivel_artigo', 'Visível Artigo');
            $this->form_validation->set_rules('utilizador_artigo', 'Utilizador Artigo');
            $this->form_validation->set_rules('criado_artigo', 'Criado Artigo');
            $this->form_validation->set_rules('modificado_artigo', 'Modificado Artigo');

            if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('seguros_funcionario/create');
            $this->load->view('templates/footer');
            }else{
            $this->seguros_funcionario_model->set_seguros_funcionario();
            redirect( base_url() . 'index.php/seguros_funcionario');
            }

        } else {
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
            
            $data['title'] = 'Editar Registo';        
            $data['artigos'] = $this->seguros_funcionario_model->get_seguros_funcionario_by_id($id);
            $data['funcionarios'] = $this->funcionarios_model->get_funcionarios();
            $data['contactos'] = $this->contactos_model->get_contactos();
        
            $this->form_validation->set_rules('title', 'Funcionário', 'required');
            $this->form_validation->set_rules('custo', 'Custo', 'required');
            $this->form_validation->set_rules('data', 'Data', 'required');
            $this->form_validation->set_rules('data_fim', 'Data Fim');      
            $this->form_validation->set_rules('km', 'Km');    
            $this->form_validation->set_rules('km_fim', 'Km Fim');
            $this->form_validation->set_rules('preco_artigo', 'Preço Artigo');
            $this->form_validation->set_rules('tipo_artigo', 'Tipo Artigo');
            $this->form_validation->set_rules('referencia_artigo', 'Referência Artigo');
            $this->form_validation->set_rules('nome_artigo', 'Nome Artigo');
            $this->form_validation->set_rules('quantidade_artigo', 'Quantidade Artigo');
            $this->form_validation->set_rules('posicao_artigo', 'Posição Artigo');
            $this->form_validation->set_rules('medida_artigo', 'Medida Artigo');     
            $this->form_validation->set_rules('marca_artigo', 'Marca Artigo');                
            $this->form_validation->set_rules('estado_artigo', 'Estado Artigo');
            $this->form_validation->set_rules('categoria_artigo', 'Categoria Artigo');    
            $this->form_validation->set_rules('visivel_artigo', 'Visível Artigo');    
            $this->form_validation->set_rules('utilizador_artigo', 'Utilizador Artigo');
            $this->form_validation->set_rules('criado_artigo', 'Criado Artigo');
            $this->form_validation->set_rules('modificado_artigo', 'Modificado Artigo');
     
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('seguros_funcionario/edit', $data);
                $this->load->view('templates/footer');
     
            }else{
                $this->seguros_funcionario_model->set_seguros_funcionario($id);
                //$this->load->view('seguros_funcionario/success');
                redirect( base_url() . 'index.php/seguros_funcionario');
            }

        }else{
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }
    


    public function delete() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) { 

            $id = $this->uri->segment(3);
            
            if (empty($id)) {
                show_404();
            }
                    
            $seguros_funcionario_item = $this->seguros_funcionario_model->get_seguros_funcionario_by_id($id);
            
            $this->seguros_funcionario_model->delete_seguros_funcionario($id);        
            redirect( base_url() . 'index.php/seguros_funcionario');     

        }else{
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }



    public function total() {
        //table width all "artigos" :: COMMENT LATER
        $id = $this->uri->segment(3);

        // Go to user model getRows
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));         

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['artigos'] = $this->seguros_funcionario_model->get_seguros_funcionario_by_id($id);
        $data['equipamentos'] = $this->equipamentos_model->get_equipamentos();
        $data['seguros_funcionario'] = $this->seguros_funcionario_model->get_seguros_funcionario_by_title();

        $data['show_table'] = $this->view_table();
        $this->load->view('templates/header', $data);
        $this->load->view('seguros_funcionario/total', $data);
        $this->load->view('templates/footer');
    }


    public function pdf() {

        // check if user is loggedIn
        if ($this->session->userdata('isUserLoggedIn')) { 
            
        $this->load->helper('pdf_helper');
        $this->load->view('seguros_funcionario/pdf');

        }else{
           // if user is NOT loggedIn redirect to homepage
           redirect( base_url() );
        }
    }

    // function to get all artigos records :: COMMENT LATER
    public function view_table() {
        $result = $this->seguros_funcionario_model->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Por favor adicione um novo registo de Combustível !';
        }
    }

    public function select_id_and_date_range() {
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
        $id = $this->input->post('id');
        $data = array(
            'date1' => $date1,
            'date2' => $date2,
            'id' => $id
        );
        if ($date1 == "" || $date2 == "" || $id == "") {
            $data['date_range_error_message'] = "Por favor preencha os campos";
        } else {
            $result = $this->seguros_funcionario_model->select_id_and_date_range($data);
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
        $this->load->view('seguros_funcionario/total', $data);
        $this->load->view('templates/footer');
    }
}
?>