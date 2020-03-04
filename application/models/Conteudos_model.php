<?php
class Conteudos_model extends CI_Model {
    public function __construct()
    {
    $this->load->database();
    //$this->userTbl = 'contactos';
    $this->userTbl = 'conteudos';
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

   // function search($keyword)
    //{
    //    $this->db->like('title',$keyword);
    //    $query = $this->db->get('contactos');
    //    return $query->result();
    //}


    public function get_autocomplete($search_data) {
        $this->db->select('title, id');
        $this->db->like('title', $search_data);
        return $this->db->where('visivel_conteudos', '1')->where('categoria_conteudos', '1')->get('conteudos', 10)->result();
        return $this->db->get('conteudos', 10)->result();
    }


	public function get_conteudos($slug = FALSE) {
        
        if ($slug === FALSE) {
            $this->db->order_by('title', 'ASC');
            //$query = $this->db->get('equipamentos');
            $query = $this->db->where('visivel_conteudos', '1')->where('categoria_conteudos', '1')->get('conteudos');
            return $query->result_array();
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('conteudos', array('slug' => $slug));
        return $query->row_array();
    }


    public function get_conteudos_by_id($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('conteudos');
            return $query->result_array();
        }
        $query = $this->db->get_where('conteudos', array('id' => $id));
        return $query->row_array();
    }


    public function get_conteudos_by_title($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('conteudos');
            return $query->result_array();
        }
        $query = $this->db->get_where('conteudos', array('title' => $id));
        return $query->row_array();
    }    

    
    public function set_conteudos($id = 0) {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
 
        $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        //'area_conteudos' => $this->input->post('area_conteudos'),
        'horas_conteudos' => $this->input->post('horas_conteudos'),
        'nome_conteudos' => $this->input->post('nome_conteudos'),
        'conteudos_conteudos' => $this->input->post('conteudos_conteudos'),              
        'descricao_conteudos' => $this->input->post('descricao_conteudos'),
        'categoria_conteudos' => $this->input->post('categoria_conteudos'),
        'visivel_conteudos' => $this->input->post('visivel_conteudos'),        
        'utilizador_conteudos' => $this->input->post('utilizador_conteudos'),    
        'criado_conteudos' => $this->input->post('criado_conteudos'),            
        'modificado_conteudos' => $this->input->post('modificado_conteudos')
        );
        if ($id == 0) {
            return $this->db->insert('conteudos', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('conteudos', $data);
        }
    }

    
    public function delete_conteudos($id) {
        $this->db->where('id', $id);
        return $this->db->delete('conteudos');
    }


    public function record_count() {
        $query = $this->db->where('visivel_conteudos', '1')->where('categoria_conteudos', '1')->get('conteudos');
        return $query->num_rows();  
    }


    public function fetch_conteudos($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");      
        $query = $this->db->where('visivel_conteudos', '1')->where('categoria_conteudos', '1')->get('conteudos');   

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } 
}
?>