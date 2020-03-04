<?php
class renda_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->userTbl = 'artigos';
        $this->userTbl = 'entidades';
    }

    public function get_autocomplete($search_data)
    {
        $this->db->select('title, id');
        $this->db->like('title', $search_data);
        return $this->db->where('visivel_artigo', '1')->where('categoria_artigo', '11')->get('artigos', 10)->result();
    }

	public function get_renda($slug = FALSE)
	{
        if ($slug === FALSE)
        {
            $query = $this->db->get('artigos');
            return $query->result_array();
        }
        $query = $this->db->get_where('artigos', array('slug' => $slug));
        return $query->row_array();
	}

    public function get_renda_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('artigos');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('artigos', array('id' => $id));
        return $query->row_array();
    }

    public function get_renda_by_title($title = 0)
    {
        if ($title === 0)
        {
            $title = $this->uri->segment(3);
            $query = $this->db->where('visivel_artigo', '1')->where('categoria_artigo', '11')->where('title', $title)->get('artigos');
            return $query->result_array();
        }
        $query = $this->db->get_where('artigos', array('title' => $title));
        return $query->row_array();
    }      
    
    public function set_renda($id = 0)
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'custo' => $this->input->post('custo'),
        'data' => $this->input->post('data'),
        'data_fim' => $this->input->post('data_fim'),
        'km' => $this->input->post('km'),
        'km_fim' => $this->input->post('km_fim'),
        'preco_artigo' => $this->input->post('preco_artigo'),
        'tipo_artigo' => $this->input->post('tipo_artigo'),
        'referencia_artigo' => $this->input->post('referencia_artigo'),
        'nome_artigo' => $this->input->post('nome_artigo'),           
        'documento_artigo' => $this->input->post('documento_artigo'),
        'quantidade_artigo' => $this->input->post('quantidade_artigo'),
        'posicao_artigo' => $this->input->post('posicao_artigo'),
        'medida_artigo' => $this->input->post('medida_artigo'),
        'descricao_artigo' => $this->input->post('descricao_artigo'),        
        'marca_artigo' => $this->input->post('marca_artigo'),
        'estado_artigo' => $this->input->post('estado_artigo'),
        'categoria_artigo' => $this->input->post('categoria_artigo'),        
        'visivel_artigo' => $this->input->post('visivel_artigo'),
        'utilizador_artigo' => $this->input->post('utilizador_artigo'),
        'criado_artigo' => $this->input->post('criado_artigo'),
        'modificado_artigo' => $this->input->post('modificado_artigo')                                                                          
        );
        if ($id == 0) {
            return $this->db->insert('artigos', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('artigos', $data);
        }
    }
    
    public function delete_renda($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('artigos');
    }

    public function record_count() {
        $query = $this->db->where('visivel_artigo', '1')->where('categoria_artigo', '11')->get('artigos');
        return $query->num_rows();
    }

    public function fetch_renda($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->where('visivel_artigo', '1')->where('categoria_artigo', '11')->get('artigos');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

    // Function to get all records from artigos
    public function show_all_data() {
            $this->db->select('*');
            $query = $this->db->where('visivel_artigo', '1')->where('categoria_artigo', '11')->get('artigos');

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        }

    public function select_id_and_date_range($data) {
        $condition = "(data BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'" . " ) " . " AND " . " title IN " . " ( " . "'" . $data['id'] . "'" . " ) ";
        $this->db->select('*');
        $this->db->from('artigos');
        $this->db->where($condition)->where('visivel_artigo', '1')->where('categoria_artigo', '11');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
?>