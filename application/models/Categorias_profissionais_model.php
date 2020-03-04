<?php
class Categorias_profissionais_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->userTbl = 'categorias_profissionais';
        $this->userTbl = 'entidades';
    }

    public function get_autocomplete($search_data)
    {
        $this->db->select('title, id');
        $this->db->like('title', $search_data);
        return $this->db->where('visivel_categorias_profissionais', '1')->where('categoria_categorias_profissionais', '1')->get('categorias_profissionais', 10)->result();
    }

	public function get_categorias_profissionais($slug = FALSE)
	{
        if ($slug === FALSE)
        {
            $query = $this->db->get('categorias_profissionais');
            return $query->result_array();
        }
        $query = $this->db->get_where('categorias_profissionais', array('slug' => $slug));
        return $query->row_array();
	}

    public function get_categorias_profissionais_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('categorias_profissionais');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('categorias_profissionais', array('id' => $id));
        return $query->row_array();
    }

    public function get_categorias_profissionais_by_title($title = 0)
    {
        if ($title === 0)
        {
            $title = $this->uri->segment(3);
            $query = $this->db->where('visivel_categorias_profissionais', '1')->where('categoria_categorias_profissionais', '1')->where('title', $title)->get('categorias_profissionais');
            return $query->result_array();
        }
        $query = $this->db->get_where('categorias_profissionais', array('title' => $title));
        return $query->row_array();
    }      
    
    public function set_categorias_profissionais($id = 0)
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,

        'descricao_categorias_profissionais' => $this->input->post('descricao_categorias_profissionais'),
        'categoria_categorias_profissionais' => $this->input->post('categoria_categorias_profissionais'),        
        'visivel_categorias_profissionais' => $this->input->post('visivel_categorias_profissionais'),
        'utilizador_categorias_profissionais' => $this->input->post('utilizador_categorias_profissionais'),
        'criado_categorias_profissionais' => $this->input->post('criado_categorias_profissionais'),
        'modificado_categorias_profissionais' => $this->input->post('modificado_categorias_profissionais')                                                                          
        );
        if ($id == 0) {
            return $this->db->insert('categorias_profissionais', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('categorias_profissionais', $data);
        }
    }
    
    public function delete_categorias_profissionais($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('categorias_profissionais');
    }

    public function record_count() {
        $query = $this->db->where('visivel_categorias_profissionais', '1')->where('categoria_categorias_profissionais', '1')->get('categorias_profissionais');
        return $query->num_rows();
    }

    public function fetch_categorias_profissionais($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->where('visivel_categorias_profissionais', '1')->where('categoria_categorias_profissionais', '1')->get('categorias_profissionais');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

    // Function to get all records from categorias_profissionais
    public function show_all_data() {
            $this->db->select('*');
            $query = $this->db->where('visivel_categorias_profissionais', '1')->where('categoria_categorias_profissionais', '1')->get('categorias_profissionais');

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        }

    public function select_id_and_date_range($data) {
        $condition = "(data BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'" . " ) " . " AND " . " title IN " . " ( " . "'" . $data['id'] . "'" . " ) ";
        $this->db->select('*');
        $this->db->from('categorias_profissionais');
        $this->db->where($condition)->where('visivel_categorias_profissionais', '1')->where('categoria_categorias_profissionais', '1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
?>