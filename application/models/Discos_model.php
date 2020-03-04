<?php

class Discos_model extends CI_Model {

public function __construct() {
    $this->load->database();
    $this->userTbl = 'discos';
    $this->userTbl = 'contactos';
    $this->userTbl = 'funcionarios';    
}

public function select_servicos($id = 0) {
    if ($id === 0) {
    $query = $this->db->get('discos');
    return $query->result_array();
    }
    $query = $this->db->get_where('discos', array('id' => $id));
    return $query->row_array();
}

function getRows($params = array()) {
    $this->db->select('*');
    $this->db->from($this->userTbl);
    
    //fetch data by conditions
    if (array_key_exists("conditions",$params)) {
    foreach ($params['conditions'] as $key => $value) {
        $this->db->where($key,$value);
    }
    }
    
    if (array_key_exists("id",$params)) {
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
    return $this->db->where('visivel_servicos', '1')->where('categoria_servicos', '1')->get('discos', 10)->result();
}

public function get_autocomplete_create($search_data) {
    $this->db->select('title, id');
    $this->db->like('title', $search_data);
    return $this->db->where('visivel_cliente', '1')->where('categoria_cliente', '1')->get('contactos', 10)->result();
}    

public function get_servicos($slug = FALSE) {
    if ($slug === FALSE) {
        $query = $this->db->get('discos');
        return $query->result_array();
    }
    $query = $this->db->get_where('discos', array('slug' => $slug));
    return $query->row_array();
}

public function get_servicos_by_id($id = 0) {
    if ($id === 0) {
        $query = $this->db->get('discos');
        return $query->result_array();
    }
    $query = $this->db->get_where('discos', array('id' => $id));
    return $query->row_array();
}

public function get_servicos_by_matricula($id = 0) {
    if ($id === 0) {
        $query = $this->db->get('discos');
        return $query->result_array();
    }
    $query = $this->db->get_where('discos', array('matricula_servicos' => $id));
    return $query->row_array();
}

public function get_servicos_by_title($id = 0) {
    if ($id === 0) {
        $query = $this->db->get('discos');
        return $query->result_array();
    }
    $query = $this->db->get_where('discos', array('title' => $id));
    return $query->row_array();
}    

public function set_servicos($data) {
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $empresa_id_servicos = $this->input->post('empresa_id_servicos'); //array of empresa_id_servicos
    $formandos_servicos = $this->input->post('formandos_servicos'); //array of formandos_servicos
    $nome_funcionario_servicos = $this->input->post('nome_funcionario_servicos'); //array of nome_funcionario_servicos
    $naturalidade_servicos = $this->input->post('naturalidade_servicos'); //array of naturalidade_servicos 
    $data_nascimento_servicos = $this->input->post('data_nascimento_servicos'); //array of data_nascimento_servicos
    $nacionalidade_servicos = $this->input->post('nacionalidade_servicos'); //array of nacionalidade_servicos  
    $doc_identificacao_servicos = $this->input->post('doc_identificacao_servicos'); //array of doc_identificacao_servicos  
    $validade_identificacao_servicos = $this->input->post('validade_identificacao_servicos'); //array of validade_identificacao_servicos
    $registo_do_dia = $this->input->post('registo_do_dia'); //array
    $registo_do_dia_1 = $this->input->post('registo_do_dia_1'); //array
    $registo_do_dia_2 = $this->input->post('registo_do_dia_2'); //array
    $registo_do_dia_3 = $this->input->post('registo_do_dia_3'); //array
    $id_infracao = $this->input->post('id_infracao'); //array
    $id_infracao_1 = $this->input->post('id_infracao_1'); //array
    $id_infracao_2 = $this->input->post('id_infracao_2'); //array
    $id_infracao_3 = $this->input->post('id_infracao_3'); //array

    $data = array();
        
        for($i = 0; $i < count($formandos_servicos); $i++) {
            $data[] = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'area_servicos' => $this->input->post('area_servicos'),
            'periodo_analise' => $this->input->post('periodo_analise'),
            'formadores_servicos' => $this->input->post('formadores_servicos'),
            'data_servicos' => $this->input->post('data_servicos'),
            'lblDataExtenso' => $this->input->post('lblDataExtenso'),
            'nome_servicos' => $this->input->post('nome_servicos'), 
            'horas_servicos' => $this->input->post('horas_servicos'),
            'local_formacao_servicos' => $this->input->post('local_formacao_servicos'),            
            'conteudos_servicos' => $this->input->post('conteudos_servicos'),
            'anotacoes_servicos' => $this->input->post('anotacoes_servicos'),
            'categoria_servicos' => $this->input->post('categoria_servicos'),
            'visivel_servicos' => $this->input->post('visivel_servicos'),
            'utilizador_servicos' => $this->input->post('utilizador_servicos'),
            'criado_servicos' => $this->input->post('criado_servicos'),
            'modificado_servicos' => $this->input->post('modificado_servicos'),
            'empresa_id_servicos' => $empresa_id_servicos[$i],
            'formandos_servicos' => $formandos_servicos[$i],
            'nome_funcionario_servicos' => $nome_funcionario_servicos[$i],
            'naturalidade_servicos' => $naturalidade_servicos[$i],
            'data_nascimento_servicos' => $data_nascimento_servicos[$i],
            'nacionalidade_servicos' => $nacionalidade_servicos[$i],
            'doc_identificacao_servicos' => $doc_identificacao_servicos[$i],
            'validade_identificacao_servicos' => $validade_identificacao_servicos[$i],
            'registo_do_dia' => $registo_do_dia[$i],
            'registo_do_dia_1' => $registo_do_dia_1[$i],
            'registo_do_dia_2' => $registo_do_dia_2[$i],
            'registo_do_dia_3' => $registo_do_dia_3[$i],
            'id_infracao' => $id_infracao[$i],
            'id_infracao_1' => $id_infracao_1[$i],
            'id_infracao_2' => $id_infracao_2[$i],
            'id_infracao_3' => $id_infracao_3[$i],
            );
        }        
    if ($data > 0) {
    return $this->db->insert_batch('discos', $data);
    //echo '<pre>';
    //print_r($data);
    //die();
    //echo '</pre>';   
    }
}

public function set_servicos_id($id = 0) {
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);
    $data = array(
    'title' => $this->input->post('title'),
    'slug' => $slug,
    'empresa_id_servicos' => $this->input->post('empresa_id_servicos'),
    'conteudos_servicos' => $this->input->post('conteudos_servicos'),
    'formadores_servicos' => $this->input->post('formadores_servicos'),
    'data_servicos' => $this->input->post('data_servicos'),
    'nome_servicos' => $this->input->post('nome_servicos'), 
    'horas_servicos' => $this->input->post('horas_servicos'),
    'conteudos_servicos' => $this->input->post('conteudos_servicos'),
    'formandos_servicos' => $this->input->post('formandos_servicos'),
    'anotacoes_servicos' => $this->input->post('anotacoes_servicos'),
    'categoria_servicos' => $this->input->post('categoria_servicos'),
    'visivel_servicos' => $this->input->post('visivel_servicos'),
    'utilizador_servicos' => $this->input->post('utilizador_servicos'),
    'criado_servicos' => $this->input->post('criado_servicos'),
    'modificado_servicos' => $this->input->post('modificado_servicos')
    );
    if ($id == 0) {
    return $this->db->insert('discos', $data);
    }else{
        $this->db->where('id', $id);
        return $this->db->update('discos', $data);
    }
}

public function delete_servicos($id) {
    $this->db->where('id', $id);
    return $this->db->delete('discos');
}

public function delete_servicos_matricula($id) {
    $this->db->where('matricula_servicos', $id);
    return $this->db->delete('discos');
}

public function record_count() {
    return $this->db->count_all("discos");
}

public function fetch_servicos($limit, $start) {
    $this->db->limit($limit, $start);
    $this->db->order_by("id", "desc");
    $query = $this->db->get("discos");
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
    $query = $this->db->where('visivel_servicos', '1')->where('categoria_servicos', '1')->get('discos');

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;
    }
}

public function select_id_and_date_range($data) {
    $condition = "(data_servicos BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'" . " ) " . " AND " . " title IN " . " ( " . "'" . $data['id'] . "'" . " )  ";
    $this->db->select('*');
    $this->db->from('discos');
    $this->db->where($condition)->where('visivel_servicos', '1')->where('categoria_servicos', '1');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;
    }
}

    // Get cities
    /*function getContactos(){
        $response = array();
        // Select record
        $this->db->select('*');
        $q = $this->db->get('contactos');
        $response = $q->result_array();
        return $response;
    }
  // Get City departments
  function getFuncionarios($postData){
    $response = array();
    // Select record
    $this->db->select('id,title');
    $this->db->where('empresa', $postData['empresa']);
    $q = $this->db->get('funcionarios');
    $response = $q->result_array();
    return $response;
  }
  */
    // Get Funcionarios
    function getEmpresas($postData) {
        $response = array();
        // Select record
        $this->db->where('n_cliente!=','Saiu');
        $this->db->select('id, title, n_cliente, laboral, naturalidade, data_nascimento, nacionalidade, doc_identificacao, validade_identificacao');
        $this->db->where('empresa', $postData['empresa']);
        $this->db->order_by('title', 'ASC');
        $q = $this->db->get('funcionarios');
        $response = $q->result_array();
        return $response;
    }

    // Get Conteudos
    function getConteudos($postData) {
        $response = array();
        // Select record
        $this->db->select('id,title,nome_conteudos,horas_conteudos,conteudos_conteudos');
        $this->db->where('title', $postData['title']);
        $this->db->limit(1);  // Produces: LIMIT 1
        $q = $this->db->get('conteudos');
        $response = $q->result_array();
        return $response;
    }

    // Get Conteudos
    function geInfracoes($postData) {
        $response = array();
        // Select record
        $this->db->select('id,title,nome_infracoes');
        $this->db->where('title', $postData['title']);
        $this->db->limit(1);  // Produces: LIMIT 1
        $q = $this->db->get('infracoes');
        $response = $q->result_array();
        return $response;
    }

    // Get Conteudos by ID
    function getConteudosbyID($postData) {
        $response = array();
        // Select record
        $this->db->select('id,title,nome_conteudos,horas_conteudos,conteudos_conteudos');
        $this->db->where('id', $postData['id']);
        $this->db->limit(1);  // Produces: LIMIT 1
        $q = $this->db->get('conteudos');
        $response = $q->result_array();
        return $response;
    }

    // Get Conteudos by ID
    function getInfracoesbyID($postData) {
        $response = array();
        // Select record
        $this->db->select('id,title,nome_infracoes,infracoes_infracoes');
        $this->db->where('id', $postData['id']);
        $this->db->limit(1);  // Produces: LIMIT 1
        $q = $this->db->get('infracoes');
        $response = $q->result_array();
        return $response;
    }
}
?>