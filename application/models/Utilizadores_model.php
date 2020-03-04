<?php

class Utilizadores_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_utilizadores($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('utilizadores');
            return $query->result_array();
        }

        $query = $this->db->get_where('utilizadores', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_utilizadores_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('utilizadores');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('utilizadores', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_utilizadores($id = 0)
    {
        $this->load->helper('url');
 
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
 
        $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,      
        'password' => $this->input->post('password'),       
        'confirmar' => $this->input->post('confirmar'),
        'email' => $this->input->post('email')
        );
        
        if ($id == 0) {
            return $this->db->insert('utilizadores', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('utilizadores', $data);
        }
    }
    
    public function delete_utilizadores($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('utilizadores');
    }



}

?>