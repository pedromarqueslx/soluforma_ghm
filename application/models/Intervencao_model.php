<?php
class Intervencao_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        //$this->userTbl = 'intervencao';
        $this->userTbl = 'entidades';
        $this->userTbl = 'intervencao';
    }

    public function get_autocomplete($search_data) {
        $this->db->select('title, id');
        $this->db->like('title', $search_data);
        return $this->db->where('visivel_intervencao', '1')->where('categoria_intervencao', '1')->get('intervencao', 10)->result();
    }
        
    public function get_intervencao($slug = FALSE) {
        if ($slug === FALSE)
        {
            $query = $this->db->get('intervencao');
            return $query->result_array();
        }
        $query = $this->db->get_where('intervencao', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_intervencao_by_id($id = 0) {
        if ($id === 0)
        {
            $query = $this->db->get('intervencao');
            return $query->result_array();
        }
        $query = $this->db->get_where('intervencao', array('id' => $id));
        return $query->row_array();
    }

    public function get_intervencao_by_title($title = 0) {
        if ($title === 0)
        {
            $title = $this->uri->segment(3);
            $query = $this->db->where('visivel_intervencao', '1')->where('categoria_intervencao', '1')->where('title', $title)->get('intervencao');
            return $query->result_array();
        }
        $query = $this->db->get_where('intervencao', array('title' => $title));
        return $query->row_array();
    }      
    
    public function set_intervencao($id = 0) {
        $this->load->helper('url');
        //foreach($intervencoes as $referencia_intervencao) {
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'custo_intervencao' => $this->input->post('custo_intervencao'),
        'data_intervencao' => $this->input->post('data_intervencao'),
        'data_fim_intervencao' => $this->input->post('data_fim_intervencao'),
        'km_intervencao' => $this->input->post('km_intervencao'),
        'km_fim_intervencao' => $this->input->post('km_fim_intervencao'),
        'referencia_intervencao' => $this->input->post('$referencia_intervencao'),
        'documento_intervencao' => $this->input->post('documento_intervencao'),
        'tipo_intervencao' => $this->input->post('tipo_intervencao'),
        'descricao_intervencao' => $this->input->post('descricao_intervencao'),
        'categoria_intervencao' => $this->input->post('categoria_intervencao'),        
        'visivel_intervencao' => $this->input->post('visivel_intervencao'),
        'utilizador_intervencao' => $this->input->post('utilizador_intervencao'),
        'criado_intervencao' => $this->input->post('criado_intervencao'),
        'modificado_intervencao' => $this->input->post('modificado_intervencao')                                                                          
        );
        if ($id == 0) {
            return $this->db->insert('intervencao', $data); 
        } else {
            $this->db->where('id', $id);
            return $this->db->update('intervencao', $data);
        }
    }
    
    public function delete_intervencao($id) {
        $this->db->where('id', $id);
        return $this->db->delete('intervencao');
    }

    public function record_count() {
        $query = $this->db->where('visivel_intervencao', '1')->where('categoria_intervencao', '1')->get('intervencao');
        return $query->num_rows();
    }

        public function fetch_intervencao($limit, $start) {
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");
            $query = $this->db->where('visivel_intervencao', '1')->where('categoria_intervencao', '1')->get('intervencao');

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }

        // Function to get all records from intervencao
        public function show_all_data() {
            $this->db->select('*');
            $query = $this->db->where('visivel_intervencao', '1')->where('categoria_intervencao', '1')->get('intervencao');

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        }

        public function select_id_and_date_range($data) {
            $condition = "(data_intervencao BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'" . " ) " . " AND " . " title IN " . " ( " . "'" . $data['id'] . "'" . " ) ";
            $this->db->select('*');
            $this->db->from('intervencao');
            $this->db->where($condition)->where('visivel_intervencao', '1')->where('categoria_intervencao', '1');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        }
}
?>