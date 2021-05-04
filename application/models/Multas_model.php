<?php
class Multas_model extends CI_Model {

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
        return $this->db->where('visivel_artigo', '1')->where('categoria_artigo', '1')->get('artigos', 10)->result();
    }

    public function get_multas($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('artigos');
            return $query->result_array();
        }
        $query = $this->db->get_where('artigos', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_multas_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('artigos');
            return $query->result_array();
        }
        $query = $this->db->get_where('artigos', array('id' => $id));
        return $query->row_array();
    }

    public function get_multas_by_title($title = 0)
    {
        if ($title === 0)
        {
            $title = $this->uri->segment(3);
            $query = $this->db->where('visivel_artigo', '1')->where('categoria_artigo', '1')->where('title', $title)->get('artigos');
            return $query->result_array();
        }
        $query = $this->db->get_where('artigos', array('title' => $title));
        return $query->row_array();
    }

    public function set_multas($id = 0)
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,

            'serial' => $this->input->post('serial'),
            'multa' => $this->input->post('multa'),
            'valor' => $this->input->post('valor'),
            'data' => $this->input->post('data'),
            'data_fim' => $this->input->post('data_fim'),
            'auto' => $this->input->post('auto'),
            'matricula' => $this->input->post('matricula'),
            'descricao' => $this->input->post('descricao'),
            'entidade' => $this->input->post('entidade'),
            'tipo_multa' => $this->input->post('tipo_multa'),
            'observacoes' => $this->input->post('observacoes'),
            'data_fecho' => $this->input->post('data_fecho'),
            'data_prescricao' => $this->input->post('data_prescricao'),
            'valor_cobrado' => $this->input->post('valor_cobrado'),
            'custo_adv' => $this->input->post('custo_adv'),
            'local' => $this->input->post('local'),
            'resultado' => $this->input->post('resultado'),
            'estado' => $this->input->post('estado'),

            'descricao_artigo' => $this->input->post('descricao_artigo'),
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

    public function delete_multas($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('artigos');
    }

    public function record_count() {
        $query = $this->db->where('visivel_artigo', '1')->where('categoria_artigo', '1')->get('artigos');
        return $query->num_rows();
    }

    public function fetch_multas($limit, $start) {
        $this->db->limit($limit, $start);
        //$this->db->order_by("id", "asc");
        $query = $this->db->where('visivel_artigo', '1')->where('categoria_artigo', '1')->get('artigos');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        if ($query->num_rows() == 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data = 'Inserir registos';
        }
        return false;
    }

    // Function to get all records from artigos
    public function show_all_data() {
        $this->db->select('*');
        $query = $this->db->where('visivel_artigo', '1')->where('categoria_artigo', '1')->get('artigos');

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
        $this->db->where($condition)->where('visivel_artigo', '1')->where('categoria_artigo', '1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
