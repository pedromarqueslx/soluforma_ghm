<?php

class Funcionarios_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->userTbl = 'funcionarios';
        //$this->userTbl = 'servicos';
    }

    public function select_funcionarios($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('funcionarios');
            return $query->result_array();
        }
        $query = $this->db->get_where('funcionarios', array('id' => $id));
        return $query->row_array();
    }    
    /*
    * get rows from the equipamentos table
    */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $query->num_rows();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
            }else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }

    public function get_autocomplete($search_data)
    {
        $this->db->select('nome, id');
        $this->db->like('nome', $search_data);
        return $this->db->get('funcionarios', 10)->result();
    }

	public function get_funcionarios($slug = FALSE)
	{
        if ($slug === FALSE)
        {
            $query = $this->db->get('funcionarios');
            return $query->result_array();
        }

        $query = $this->db->get_where('funcionarios', array('slug' => $slug));
        return $query->row_array();
	}

    public function get_funcionarios_by_id($funcionario_id = 0)
    {
        if ($funcionario_id === 0)
        {
            $query = $this->db->get('funcionarios');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('funcionarios', array('id' => $funcionario_id));
        return $query->row_array();
    }

    public function get_funcionarios_by_title($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('funcionarios');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('funcionarios', array('title' => $id));
        return $query->row_array();
    }

    public function set_funcionarios($id = 0) {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $empresa_slug = url_title($this->input->post('empresa'), 'dash', TRUE);

        $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'n_cliente' => $this->input->post('n_cliente'),
        'empresa' => $this->input->post('empresa'),
        'empresa_slug' => $empresa_slug,
        'cliente' => $this->input->post('cliente'),
        'cargo' => $this->input->post('cargo'),
        'data_inicio' => $this->input->post('data_inicio'), 
        'data_demissao' => $this->input->post('data_demissao'), 
        'sexo' => $this->input->post('sexo'),        
        'naturalidade' => $this->input->post('naturalidade'),
        'nacionalidade' => $this->input->post('nacionalidade'),
        'data_nascimento' => $this->input->post('data_nascimento'),
        'data_actual' => $this->input->post('data_actual'),
        'idade' => $this->input->post('idade'),

        'doc_identificacao' => $this->input->post('doc_identificacao'),
        'validade_identificacao' => $this->input->post('validade_identificacao'),
        'data_exame' => $this->input->post('data_exame'),
        'validade_exame_medico' => $this->input->post('validade_exame_medico'),
        'laboral' => $this->input->post('laboral'),
        'validade_cam' => $this->input->post('validade_cam'),
        'n_carta' => $this->input->post('n_carta'),      
        'validade_carta' => $this->input->post('validade_carta'),
        'validade_cartao_conducao' => $this->input->post('validade_cartao_conducao'),

        'docs_digitalizados' => $this->input->post('docs_digitalizados'),
        'telefone' => $this->input->post('telefone'),
        'telefone_pessoal' => $this->input->post('telefone_pessoal'),
        'email' => $this->input->post('email'),
        'descricao' => $this->input->post('descricao'),
        'visivel_funcionarios' => $this->input->post('visivel_funcionarios'),
        'utilizador_funcionarios' => $this->input->post('utilizador_funcionarios'),
        'criado_funcionarios' => $this->input->post('criado_funcionarios'),                
        'modificado_funcionarios' => $this->input->post('modificado_funcionarios')
        
        );
        
        if ($id == 0) {
            return $this->db->insert('funcionarios', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('funcionarios', $data);
        }
    }
    
    public function delete_funcionarios($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('funcionarios');
    }

    public function record_count() {
        return $this->db->count_all("funcionarios");
    }

    public function fetch_funcionarios($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get("funcionarios");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   } 
    

// Function to get all records from servicos
public function show_all_data() {
    $this->db->select('*');
    $query = $this->db->where('visivel_funcionarios', '1')->get('funcionarios');

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;
    }
}

    // Get Funcionarios
    function getFuncionarios($postData) {
        $response = array();
     
        // Select record
        $this->db->select('id,numero_cliente');
        $this->db->where('title', $postData['empresa']);
        $q = $this->db->get('contactos');
        $response = $q->result_array();

        return $response;
    }


    // Get Funcionarios by Empresa
    /*
    function getFuncionarios_by_empresa() {
        $response = array();
        // Select record
        $this->db->where('n_cliente!=','Saiu');
        //$this->db->where('empresa','Ambiponto - Valorização e Gestão de Residuos, Lda');
        //$this->db->select('id,title,empresa, COUNT(title) as empresa');
        $this->db->select('id, title, n_cliente, empresa, COUNT(n_cliente) as n_cliente');
        $q = $this->db->get('funcionarios');
        $response = $q->result_array();

        return $response;
    }   
    */

        // Get Funcionarios
    function getdata_demissao($postData) {
        $response = array();
     
        // Select record
        $this->db->select('id,numero_cliente');
        $this->db->where('data_demissao', $postData['empresa']);
        $q = $this->db->get('contactos');
        $response = $q->result_array();

        return $response;
    }


}

?>