<?php

class Formacoes_model extends CI_Model {

public function __construct() {
    $this->load->database();
    $this->userTbl = 'formacoes';   
    $this->userTbl = 'contactos';
    $this->userTbl = 'funcionarios';    
}

public function select_formacoes($id = 0) {
    if ($id === 0) {
    $query = $this->db->get('servicos');
    return $query->result_array();
    }
    $query = $this->db->get_where('servicos', array('id' => $id));
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
    return $this->db->where('visivel_servicos', '1')->where('categoria_servicos', '1')->get('servicos', 10)->result();
}

public function get_autocomplete_create($search_data) {
    $this->db->select('title, id');
    $this->db->like('title', $search_data);
    return $this->db->where('visivel_servicos', '1')->where('categoria_servicos', '1')->get('servicos', 10)->result();
}    

public function get_formacoes($slug = FALSE) {
    if ($slug === FALSE) {
        $query = $this->db->get('servicos');
        return $query->result_array();
    }
    $query = $this->db->get_where('servicos', array('slug' => $slug));
    return $query->row_array();
}

public function get_formacoes_by_id($id = 0) {
    if ($id === 0) {
        $query = $this->db->get('servicos');
        return $query->result_array();
    }
    $query = $this->db->get_where('servicos', array('id' => $id));
    return $query->row_array();
}

public function get_funcionarios_sem_formacao_by_slug($id = 0) {
    if ($id === 0) {
        $query = $this->db->get('servicos');
        return $query->result_array();
    }
    $funcionarios_com_formacao = $this->db->get('servicos')->result_array();
    foreach($funcionarios_com_formacao as $key => $record){
    $funcionarios_com_formacao[$key] = $record['nome_funcionario_servicos'];
    }
    //$funcionarios_com_formacao = array('João Manuel Diogo Lourenço');
    $this->db->select('*');
    $this->db->select('funcionarios.title AS nome_funcionario_servicos, funcionarios.cargo AS nome_servicos, funcionarios.data_inicio AS data_servicos, funcionarios.idade AS horas_servicos');
    $this->db->from('funcionarios', 'servicos.empresa_id_servicos');
    //$this->db->join('servicos', 'funcionarios.title = servicos.nome_funcionario_servicos');
    
    $this->db->where(array('funcionarios.n_cliente' => $id));
    //$this->db->where('funcionarios.n_cliente' != 'Saiu');
    $this->db->where_not_in('funcionarios.title', $funcionarios_com_formacao);
    $query = $this->db->get('');
    return $query->result_array();
}

public function get_formacoes_by_slug($id = 0) {
    if ($id === 0) {
        $query = $this->db->get('servicos');
        return $query->result_array();
    }
    // QUERY QUE FUNCIONA PARA FUNCIONARIOS COM FORMACAO
    $this->db->select('*');
    $this->db->select('servicos.nome_funcionario_servicos AS nome_funcionario_servicos, servicos.nome_servicos AS nome_servicos, servicos.data_servicos AS data_servicos, servicos.horas_servicos AS horas_servicos');
    $this->db->from('servicos');
    $this->db->where(array('empresa_id_servicos' => $id));
    $query = $this->db->get('');
    return $query->result_array();
    
}

public function get_formacoes_group($slug = FALSE) {
    if ($slug === FALSE) {
        $this->db->select('*');
        $this->db->select('COUNT(certificados.title) as n_certificados, SUM(certificados.horas_servicos) as horas_servicos');
        $this->db->from('contactos AS empresas');
        $this->db->from('servicos AS certificados');
        $this->db->where('certificados.title = empresas.title');
        $this->db->group_by('empresas.title'); 
        $query = $this->db->get('');
        return $query->result_array();

        $this->db->group_by('empresas.title'); 
        $query = $this->db->get('');
        return $query->result_array();
    }
    $query = $this->db->get_where('servicos', array('slug' => $slug));
    return $query->row_array();
}


public function get_formacoes_by_title($id = 0) {
    if ($id === 0) {
        $query = $this->db->get('servicos');
        return $query->result_array();
    }
    $query = $this->db->get_where('servicos', array('title' => $id));
    return $query->row_array();
}    

public function set_formacoes($id = 0) {
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array();
    $formandos_formacoes = $this->input->post('formandos_servicos');
    $nome_funcionario_formacoes = $this->input->post('nome_funcionario_servicos');
    $naturalidade_formacoes = $this->input->post('naturalidade_servicos');  
    $data_nascimento_formacoes = $this->input->post('data_nascimento_servicos');

    $nacionalidade_formacoes = $this->input->post('nacionalidade_servicos');
    $doc_identificacao_formacoes = $this->input->post('doc_identificacao_servicos');
    $validade_identificacao_formacoes = $this->input->post('validade_identificacao_servicos');
    
    for($i = 0; $i < count($formandos_formacoes); $i++)
    //$ii = $naturalidade_formacoes[0];
    //for($i = 0; $i < count($formandos_formacoes); $i++)
    {
        $data[] = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'area_servicos' => $this->input->post('area_servicos'),
            'formadores_servicos' => $this->input->post('formadores_servicos'),
            'data_servicos' => $this->input->post('data_servicos'),
            'nome_servicos' => $this->input->post('nome_servicos'), 
            'horas_servicos' => $this->input->post('horas_servicos'),
            'conteudos_servicos' => $this->input->post('conteudos_servicos'),

            'formandos_servicos' => $formandos_servicos[$i],
            'nome_funcionario_servicos' => $nome_funcionario_servicos[$i],
            'naturalidade_servicos' => $naturalidade_servicos[$i],
            'data_nascimento_servicos' => $data_nascimento_servicos[$i],
            'nacionalidade_servicos' => $nacionalidade_servicos[$i],
            'doc_identificacao_servicos' => $doc_identificacao_servicos[$i],
            'validade_identificacao_servicos' => $validade_identificacao_servicos[$i],

            'anotacoes_servicos' => $this->input->post('anotacoes_servicos'),
            'categoria_servicos' => $this->input->post('categoria_servicos'),
            'visivel_servicos' => $this->input->post('visivel_servicos'),
            'utilizador_servicos' => $this->input->post('utilizador_servicos'),
            'criado_servicos' => $this->input->post('criado_servicos'),
            'modificado_servicos' => $this->input->post('modificado_servicos')            
        );
    }

    if ($id == 0) {
    //return $this->db->insert('servicos', $data);
    return $this->db->insert_batch('servicos', $data);
    }else{
        $this->db->where('id', $id);
        return $this->db->update('servicos', $data);
    }
}

public function set_formacoes_id($id = 0) {
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);
    $data = array(
    'title' => $this->input->post('title'),
    'slug' => $slug,
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
    return $this->db->insert('servicos', $data);
    }else{
        $this->db->where('id', $id);
        return $this->db->update('servicos', $data);
    }
}

public function delete_formacoes($id) {
    $this->db->where('id', $id);
    return $this->db->delete('servicos');
}

public function delete_formacoes_matricula($id) {
    $this->db->where('matricula_servicos', $id);
    return $this->db->delete('servicos');
}

public function record_count() {
    return $this->db->count_all("servicos");
}

public function fetch_formacoes($limit, $start) {
    $this->db->limit($limit, $start);
    $query = $this->db->get("servicos");
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}

// Function to get all records from formacoes
public function show_all_data() {
    $this->db->select('*');
    $query = $this->db->where('visivel_servicos', '1')->where('categoria_servicos', '1')->get('servicos');

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;
    }
}

public function select_id_and_date_range($data) {
    $condition = "(data_servicos BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'" . " ) " . " AND " . " title IN " . " ( " . "'" . $data['id'] . "'" . " )  ";
    $this->db->select('*');
    $this->db->from('servicos');
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
        $this->db->select('id,title,n_cliente,laboral,naturalidade,data_nascimento,nacionalidade,doc_identificacao,validade_identificacao');
        $this->db->where('empresa', $postData['empresa']);
        //$this->db->where('n_cliente !=', 'Saiu');
        //$this->db->where('laboral =','Admitido');
        //$this->db->where('laboral !=', $laboral);
        $this->db->order_by('title', 'ASC');
        $q = $this->db->get('funcionarios');
        $response = $q->result_array();

        return $response;
    }

    // Get Funcionarios
    function getConteudos($postData) {
        $response = array();
        // Select record
        $this->db->select('id,title,nome_conteudos,horas_conteudos,conteudos_conteudos');
        $this->db->where('title', $postData['title']);
        $q = $this->db->get('conteudos');
        $response = $q->result_array();
        return $response;
    }
}
?>