<?php
class infracoes_model extends CI_Model {
    public function __construct()
    {
    $this->load->database();
    //$this->userTbl = 'contactos';
    $this->userTbl = 'infracoes';
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
        return $this->db->where('visivel_infracoes', '1')->where('categoria_infracoes', '1')->get('infracoes', 10)->result();
        return $this->db->get('infracoes', 10)->result();
    }


	public function get_infracoes($slug = FALSE) {
        
        if ($slug === FALSE) {
            $this->db->order_by('title', 'ASC');
            //$query = $this->db->get('equipamentos');
            $query = $this->db->where('visivel_infracoes', '1')->where('categoria_infracoes', '1')->get('infracoes');
            return $query->result_array();
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('infracoes', array('slug' => $slug));
        return $query->row_array();
    }


    public function get_infracoes_by_id($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('infracoes');
            return $query->result_array();
        }
        $query = $this->db->get_where('infracoes', array('id' => $id));
        return $query->row_array();
    }


    public function get_infracoes_by_title($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('infracoes');
            return $query->result_array();
        }
        $query = $this->db->get_where('infracoes', array('title' => $id));
        return $query->row_array();
    }    

    
    public function set_infracoes($id = 0) {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
 
        $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        //'area_infracoes' => $this->input->post('area_infracoes'),
        'horas_infracoes' => $this->input->post('horas_infracoes'),
        'nome_infracoes' => $this->input->post('nome_infracoes'),
        'infracoes_infracoes' => $this->input->post('infracoes_infracoes'),              
        'descricao_infracoes' => $this->input->post('descricao_infracoes'),
        'categoria_infracoes' => $this->input->post('categoria_infracoes'),
        'visivel_infracoes' => $this->input->post('visivel_infracoes'),        
        'utilizador_infracoes' => $this->input->post('utilizador_infracoes'),    
        'criado_infracoes' => $this->input->post('criado_infracoes'),            
        'modificado_infracoes' => $this->input->post('modificado_infracoes')
        );
        if ($id == 0) {
            return $this->db->insert('infracoes', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('infracoes', $data);
        }
    }

    
    public function delete_infracoes($id) {
        $this->db->where('id', $id);
        return $this->db->delete('infracoes');
    }


    public function record_count() {
        $query = $this->db->where('visivel_infracoes', '1')->where('categoria_infracoes', '1')->get('infracoes');
        return $query->num_rows();  
    }


    public function fetch_infracoes($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");      
        $query = $this->db->where('visivel_infracoes', '1')->where('categoria_infracoes', '1')->get('infracoes');   

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