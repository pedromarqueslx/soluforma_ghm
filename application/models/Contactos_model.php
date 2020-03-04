<?php
class Contactos_model extends CI_Model {
    public function __construct()
    {
    $this->load->database();
    $this->userTbl = 'contactos';
    }

     public function select_contactos($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('contactos');
            return $query->result_array();
        }
        $query = $this->db->get_where('contactos', array('id' => $id));
        return $query->row_array();
    }

    /*
    * get rows from the equipamentos table
    */
    function getRows($params = array()) {
        $this->db->select('*');
        $this->db->from($this->userTbl);
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("id",$params)) {
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


    public function get_autocomplete($search_data) {
        $this->db->select('title, id');
        $this->db->like('title', $search_data);
        return $this->db->where('visivel_cliente', '1')->where('categoria_cliente', '1')->get('contactos', 10)->result();
        return $this->db->get('contactos', 10)->result();
    }


	public function get_contactos($slug = FALSE) {
        
        if ($slug === FALSE) {
            $this->db->order_by('title', 'ASC');
            //$query = $this->db->get('equipamentos');
            $query = $this->db->where('visivel_cliente', '1')->where('categoria_cliente', '1')->get('contactos');
            return $query->result_array();
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('contactos', array('slug' => $slug));
        return $query->row_array();
    }


    public function get_contactos_by_id($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('contactos');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('contactos', array('id' => $id));
        return $query->row_array();
    }


    public function get_contactos_by_title($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('contactos');
            return $query->result_array();
        }
        $query = $this->db->get_where('contactos', array('title' => $id));
        return $query->row_array();
    }

    
    public function set_contactos($id = 0) {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
 
        $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'title' => $this->input->post('title'),        
        'numero_cliente' => $this->input->post('numero_cliente'),
        'endereco_cliente' => $this->input->post('endereco_cliente'),
        'localidade_cliente' => $this->input->post('localidade_cliente'),
        'codigopostal_cliente' => $this->input->post('codigopostal_cliente'),
        'cidade_cliente' => $this->input->post('cidade_cliente'),
        'contribuinte_cliente' => $this->input->post('contribuinte_cliente'),
        'pessoa_cliente' => $this->input->post('pessoa_cliente'),  
        'telefone_cliente' => $this->input->post('telefone_cliente'),
        'fax_cliente' => $this->input->post('fax_cliente'),        
        'telemovel_cliente' => $this->input->post('telemovel_cliente'),        
        'telemovel_alternativo_cliente' => $this->input->post('telemovel_alternativo_cliente'), 
        'email_cliente' => $this->input->post('email_cliente'),
        'pessoas_cliente' => $this->input->post('pessoas_cliente'),
        'contrato_cliente' => $this->input->post('contrato_cliente'),        
        'designacao_cliente' => $this->input->post('designacao_cliente'),        
        'valor_cliente' => $this->input->post('valor_cliente'), 
        'data_inicio_cliente' => $this->input->post('data_inicio_cliente'),
        'cliente_cliente' => $this->input->post('cliente_cliente'),
        'descricao_cliente' => $this->input->post('descricao_cliente'),
        'categoria_cliente' => $this->input->post('categoria_cliente'),
        'visivel_cliente' => $this->input->post('visivel_cliente'),        
        'utilizador_cliente' => $this->input->post('utilizador_cliente'),
        'criado_cliente' => $this->input->post('criado_cliente'),            
        'modificado_cliente' => $this->input->post('modificado_cliente')
        );
        if ($id == 0) {
            return $this->db->insert('contactos', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('contactos', $data);
        }
    }
    
    public function delete_contactos($id) {
        $this->db->where('id', $id);
        return $this->db->delete('contactos');
    }

    public function record_count() {
        $query = $this->db->where('visivel_cliente', '1')->where('categoria_cliente', '1')->get('contactos');
        return $query->num_rows();  
    }

    public function fetch_contactos() {

        $query = $this->db->select('*');
        $query = $this->db->from('funcionarios AS numero_funcionarios');
        $query = $this->db->where('numero_funcionarios.n_cliente!=','Saiu');
        $query = $this->db->join('contactos AS empresas', 'numero_funcionarios.empresa = empresas.title');
        $query = $this->db->where('empresas.visivel_cliente', 1)->where('empresas.categoria_cliente', 1);

        $query = $this->db->group_by('empresas.title');
        $query = $this->db->select('COUNT(n_cliente) as numero_funcionarios');

        $query = $this->db->order_by("empresas.id", "ASC"); 
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } 


    // Get Contactos/Empresas
    public function getcontactos() {

        $response = array();
        // Select record
        $this->db->select('*');
        $q = $this->db->get('contactos');
        $response = $q->result_array();

        return $response;
    }

    /*
    public function count_funcionarios_by_empresa() {
        
        $query = $this->db->select('COUNT(n_cliente) as numero_funcionarios, n_cliente, empresa as nomeempresa');
        $query = $this->db->where('n_cliente!=','Saiu');
        $query = $this->db->from('funcionarios');
        //$query = $this->db->where('empresa =','Camionagem Central Asseiceirense, Lda');
        $query = $this->db->group_by('empresa');
        $this->db->order_by('COUNT(n_cliente)', 'ASC');
        
        $query = $this->db->get('');
        return $query->result_array();
        $query = $this->db->get_where('funcionarios');
        return $query->row_array();
    }
    */
}
?>