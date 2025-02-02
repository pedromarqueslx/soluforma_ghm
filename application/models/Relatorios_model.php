<?php

class Relatorios_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->userTbl = 'relatorios';
        $this->userTbl = 'contactos';
        $this->userTbl = 'funcionarios';
        $this->userTbl = 'infraccoes';
    }

    public function select_servicos($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('relatorios');
            return $query->result_array();
        }
        $query = $this->db->get_where('relatorios', array('id' => $id));
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
        return $this->db->where('visivel_servicos', '1')->where('categoria_servicos', '1')->get('relatorios', 10)->result();
    }

    public function get_autocomplete_create($search_data) {
        $this->db->select('title, id');
        $this->db->like('title', $search_data);
        return $this->db->where('visivel_cliente', '1')->where('categoria_cliente', '1')->get('contactos', 10)->result();
    }

    public function get_servicos($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('relatorios');
            return $query->result_array();
        }
        $query = $this->db->get_where('relatorios', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_servicos_by_id($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('relatorios');
            return $query->result_array();
        }
        $query = $this->db->get_where('relatorios', array('id' => $id));
        return $query->row_array();
    }

    public function get_servicos_by_matricula($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('relatorios');
            return $query->result_array();
        }
        $query = $this->db->get_where('relatorios', array('matricula_servicos' => $id));
        return $query->row_array();
    }

    public function get_servicos_by_title($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('relatorios');
            return $query->result_array();
        }
        $query = $this->db->get_where('relatorios', array('title' => $id));
        return $query->row_array();
    }

    public function set_relatorios($data) {
        $this->load->helper('url');
        $index = $this->input->post('index');
        $title = $this->input->post('title');
        $n_empresa = $this->input->post('n_empresa');
        /*
        echo '<pre>';
        var_dump($title);
        var_dump($n_empresa);
        echo '</pre>';
        */
        $data = array();
        //for($i = 0; $i < count($title); $i++ ) {
        foreach($index as $selected) {
            $data[] = array(
            'periodo_analise' => $this->input->post('periodo_analise'),
            'data_analise' => $this->input->post('data_analise'),
            'lblDataExtenso' => $this->input->post('lblDataExtenso'),
            'categoria_servicos' => $this->input->post('categoria_servicos'),
            'visivel_servicos' => $this->input->post('visivel_servicos'),
            'utilizador_servicos' => $this->input->post('utilizador_servicos'),
            'criado_servicos' => $this->input->post('criado_servicos'),
            'modificado_servicos' => $this->input->post('modificado_servicos'),
            //'index' => $selected,
            'title' => $title[$selected],
            'n_empresa' => $n_empresa[$selected],
            'numero_empresas' => count($index),
            );
        }

        if ($data > 0) {
            return $this->db->insert_batch('relatorios', $data);
/*          echo '<pre>';
            print_r($data);
            die();
            echo '</pre>';*/
        }
    }


    public function set_relatorios_infraccoes($data) {
        $this->load->helper('url');
        $index = $this->input->post('index');
        $title = $this->input->post('title');
        $n_empresa = $this->input->post('n_empresa');
        /*
        echo '<pre>';
        var_dump($title);
        var_dump($n_empresa);
        echo '</pre>';
        */
        $data = array();
        //for($i = 0; $i < count($title); $i++ ) {
        foreach($index as $selected) {
            $data[] = array(
                //'periodo_analise' => $this->input->post('periodo_analise'),
                //'data_analise' => $this->input->post('data_analise'),
                //'lblDataExtenso' => $this->input->post('lblDataExtenso'),
                'categoria_servicos' => $this->input->post('categoria_servicos'),
                'visivel_servicos' => $this->input->post('visivel_servicos'),
                'utilizador_servicos' => $this->input->post('utilizador_servicos'),
                'criado_servicos' => $this->input->post('criado_servicos'),
                'modificado_servicos' => $this->input->post('modificado_servicos'),
                //'index' => $selected,
                'title' => $title[$selected],
                'n_empresa' => $n_empresa[$selected],
                'numero_empresas' => count($index),
            );
        }

        if ($data > 0) {
            return $this->db->insert_batch('relatorios_infraccoes', $data);
            /*          echo '<pre>';
                        print_r($data);
                        die();
                        echo '</pre>';*/
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
            'formandos_servicos' => $this->input->post('formandos_servicos'),
            'anotacoes_servicos' => $this->input->post('anotacoes_servicos'),
            'categoria_servicos' => $this->input->post('categoria_servicos'),
            'visivel_servicos' => $this->input->post('visivel_servicos'),
            'utilizador_servicos' => $this->input->post('utilizador_servicos'),
            'criado_servicos' => $this->input->post('criado_servicos'),
            'modificado_servicos' => $this->input->post('modificado_servicos')
        );
        if ($id == 0) {
            return $this->db->insert('relatorios', $data);
        }else{
            $this->db->where('id', $id);
            return $this->db->update('relatorios', $data);
        }
    }

    public function delete_servicos($id) {
        $this->db->where('id', $id);
        return $this->db->delete('relatorios');
    }

    public function delete_servicos_matricula($id) {
        $this->db->where('matricula_servicos', $id);
        return $this->db->delete('relatorios');
    }

    public function record_count() {
        return $this->db->count_all("relatorios");
    }

    public function fetch_servicos($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get("relatorios");
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
        $query = $this->db->where('visivel_servicos', '1')->where('categoria_servicos', '1')->get('relatorios');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function select_id_and_date_range($data) {
        $condition = "(data_servicos BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'" . " ) " . " AND " . " title IN " . " ( " . "'" . $data['id'] . "'" . " )  ";
        $this->db->select('*');
        $this->db->from('relatorios');
        $this->db->where($condition)->where('visivel_servicos', '1')->where('categoria_servicos', '1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_funcionarios() {
        $where = "cargo='Motorista Pesados' AND n_cliente !='Saiu'";
        $this->db->distinct();
        $this->db->select('empresa');
        $this->db->select('n_cliente');
        $query = $this->db->where($where)->get("funcionarios");
        return $query->result_array();
    }

    // Get Empresas de Motoristas Pessados
    public function fetch_funcionarios($limit, $start) {
        $where = "cargo='Motorista Pesados' AND n_cliente !='Saiu'";
        //$this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->where($where)->get("funcionarios");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

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

    public function get_relatorios_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('relatorios');
            return $query->result_array();
        }
        $query = $this->db->get_where('relatorios', array('id' => $id));
        return $query->row_array();
    }

    public function get_funcionarios_by_id($id = 0)
    {
        $test = $relatorios['n_empresa'];
        //$where = "cargo='Motorista Pesados' AND n_cliente !='Saiu'";
        //$where = "cargo='Motorista Pesados' AND n_cliente = 6";

        //$this->db->distinct();
        $this->db->select('title');
        $this->db->select('data_nascimento');
        $this->db->select('nacionalidade');
        $this->db->select('n_cliente');
        //$query = $this->db->where($where)->get("funcionarios");
        $query = $this->db->get_where('funcionarios', array('n_cliente' => 6));

        return $query->result_array();
    }
}

