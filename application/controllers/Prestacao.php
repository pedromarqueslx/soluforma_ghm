<?php
class prestacao extends CI_Controller {

        public function __construct()
        {
        parent::__construct();
        $this->load->model('equipamentos_model');
        $this->load->model('prestacao_model');
        $this->load->helper("url");
        $this->load->helper('url_helper');
        $this->load->library('pagination');
        }

        public function index()
        {
        $data['prestacao'] = $this->prestacao_model->get_prestacao();
        $data['title'] = 'Prestação';

        $config = array();
        $config['base_url'] = base_url("/index.php/prestacao/index");
        $config["total_rows"] = $this->prestacao_model->record_count();
        $config["per_page"] = 12;
        $config["uri_segment"] = 3;
        $config['cur_tag_open'] = '<li class="disabled"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->prestacao_model->fetch_prestacao($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();          

        $config["total_rows"] = $this->prestacao_model->record_count();
        if (empty($config["total_rows"]))
        {
        $this->load->view('templates/header', $data);
        $this->load->view('prestacao/view', $data);
        $this->load->view('templates/footer');
        }
        else
        {
        $this->load->view('templates/header', $data);
        $this->load->view('prestacao/index', $data);
        $this->load->view('templates/footer');
        }
    }

        public function autocomplete()
    {
         // load model
         $search_data = $this->input->post('search_data');
         $result = $this->prestacao_model->get_autocomplete($search_data);

         if (!empty($result))
         {
            echo "<table class='ink-table hover alternating'>";
            foreach ($result as $row):
                echo "<tr><td>";
                echo "<p class='slab'><a href='". base_url() ."index.php/"."prestacao/"."edit/". $row->id ."'".">" . $row->title . "</a></p>";
                echo "</td></tr>";
              endforeach;
            echo "</table>";

         }
         else
         {
               echo "<p class='slab-700 strong'>Nenhum resultado encontrado... Por favor pesquise por um nome diferente.</p>";
         }
    }

        public function view($slug = NULL)
        {
        $data['prestacao_item'] = $this->prestacao_model->get_prestacao($slug);

        if (empty($data['prestacao_item']))
        {
            show_404();
        }

        $data['title'] = $data['prestacao_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('prestacao/view', $data);
        $this->load->view('templates/footer');
        }

    public function create()
    {
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['artigos'] = $this->equipamentos_model->get_equipamentos();
    $data['equipamentos'] = $this->equipamentos_model->get_equipamentos();
    $data['title'] = 'Registo Prestação';

    $this->form_validation->set_rules('title', 'Matrícula', 'required');
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

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('prestacao/create');
        $this->load->view('templates/footer');

    }
    else
    {
        $this->prestacao_model->set_prestacao();
        redirect( base_url() . 'index.php/prestacao');
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
        
    $data['title'] = 'Editar Registo Prestação';        
    $data['artigos'] = $this->prestacao_model->get_prestacao_by_id($id);
    $data['equipamentos'] = $this->equipamentos_model->get_equipamentos();
        
    $this->form_validation->set_rules('title', 'Matrícula', 'required');
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

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('prestacao/edit', $data);
            $this->load->view('templates/footer');
 
        }
        else
        {
            $this->prestacao_model->set_prestacao($id);
            //$this->load->view('prestacao/success');
            redirect( base_url() . 'index.php/prestacao');
        }
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
        $prestacao_item = $this->prestacao_model->get_prestacao_by_id($id);
        
        $this->prestacao_model->delete_prestacao($id);        
        redirect( base_url() . 'index.php/prestacao');        
    }
    
    public function total()
    {
        $data['prestacao'] = $this->prestacao_model->get_prestacao_by_title();
        $this->load->view('templates/header', $data);
        $this->load->view('prestacao/total', $data);
        $this->load->view('templates/footer');
    }
    public function pdf()
    {
        $this->load->helper('pdf_helper');
        $this->load->view('prestacao/pdf');
    }

}
?>