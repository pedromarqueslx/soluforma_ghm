<?php
class Equipamentos_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->userTbl = 'equipamentos';
        //$this->userTbl = 'entidades';
    }

    public function select_equipamentos($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('equipamentos');
            return $query->result_array();
        }
        $query = $this->db->get_where('equipamentos', array('id' => $id));
        return $query->row_array();
    }

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
        $this->db->select('title, id');
        $this->db->like('title', $search_data);
        return $this->db->get('equipamentos', 10)->result();
    }


	public function get_equipamentos($slug = FALSE)
	{
        if ($slug === FALSE)
        {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->where('visivel_equipamentos', '1')->where('categoria_equipamentos', '1')->get('equipamentos');
            return $query->result_array();
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('equipamentos', array('slug' => $slug));
        return $query->row_array();
	}

    public function get_equipamentos_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('equipamentos');
            return $query->result_array();
        }
        $query = $this->db->get_where('equipamentos', array('id' => $id));
        return $query->row_array();
    }

    public function get_equipamentos_by_title($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('equipamentos');
            return $query->result_array();
        }
        $query = $this->db->get_where('equipamentos', array('title' => $id));
        return $query->row_array();
    }
    
    public function set_equipamentos($id = 0)
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'data' => $this->input->post('data'),
        'data_matricula' => $this->input->post('data_matricula'),        
        'data_fim' => $this->input->post('data_fim'),
        'n_serie' => $this->input->post('n_serie'),
        'tipo' => $this->input->post('tipo'),
        'categoria' => $this->input->post('categoria'),
        'marca' => $this->input->post('marca'),
        'modelo' => $this->input->post('modelo'),
        'fornecedor' => $this->input->post('fornecedor'),
        'preco' => $this->input->post('preco'),
        'descricao' => $this->input->post('descricao'),
        'ft' => $this->input->post('ft'),
        'local' => $this->input->post('local'),
        'km_inicio' => $this->input->post('km_inicio'),
        'km_fim' => $this->input->post('km_fim'),
        'estado' => $this->input->post('estado'),
        'medida' => $this->input->post('medida'),
        'visivel_equipamentos' => $this->input->post('visivel_equipamentos'),
        'categoria_equipamentos' => $this->input->post('categoria_equipamentos'),
        'utilizador_equipamentos' => $this->input->post('utilizador_equipamentos'),
        'criado_equipamentos' => $this->input->post('criado_equipamentos'),
        'modificado_equipamentos' => $this->input->post('modificado_equipamentos')
        );
        
        if ($id == 0) {
            return $this->db->insert('equipamentos', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('equipamentos', $data);
        }
    }
    
    public function delete_equipamentos($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('equipamentos');
    }

    public function record_count() {
        $query = $this->db->where('visivel_equipamentos', '1')->where('categoria_equipamentos', '1')->get('equipamentos');
        return $query->num_rows();  
    }

    public function fetch_equipamentos($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");      
        $query = $this->db->where('visivel_equipamentos', '1')->where('categoria_equipamentos', '1')->get('equipamentos');   

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