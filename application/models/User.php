<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model{
function __construct() {
$this->userTbl = 'users';
}

/*get rows from the users table*/
function getRows($params = array()){
$this->db->select('*');
$this->db->from($this->userTbl);
//fetch data by conditions
if(array_key_exists("conditions",$params)){
foreach ($params['conditions'] as $key => $value) {
$this->db->where($key,$value);
}}if(array_key_exists("id",$params)){
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
    
public function get_users_by_id($id = 0) {
if ($id === 0) {
$query = $this->db->get('users');
return $query->result_array();
}
$query = $this->db->get_where('users', array('id' => $id));
return $query->row_array();
}


public function set_users_by_id($id = 0) {
$this->load->helper('url');
$data = array(
'name' => $this->input->post('name'),
'email' => $this->input->post('email'),
'phone' => $this->input->post('phone'),
'password' => md5 ($this->input->post('password')),
'created' => $this->input->post('created'),
'modified' => $this->input->post('modified'),
'status' => $this->input->post('status'),
'user_profile' => $this->input->post('user_profile'),
'login_date' => $this->input->post('login_date')
);
if ($id == 0) {
return $this->db->insert('users', $data);
} else {
$this->db->where('id', $id);
return $this->db->update('users', $data);
}
}


    public function set_users($id = 0) {
    $this->load->helper('url');
    $data = array(
    'name' => $this->input->post('name'),
    'email' => $this->input->post('email'),
    'phone' => $this->input->post('phone'),
    'password' => md5 ($this->input->post('password')),
    'created' => $this->input->post('created'),
    'modified' => $this->input->post('modified'),
    'status' => $this->input->post('status'),
    'user_profile' => $this->input->post('user_profile'),
    'login_date' => $this->input->post('login_date')
    );

    if ($id == 0) {
        return $this->db->insert('users', $data);
    } else {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
    }


    /*
    * Insert user information
    */
    public function insert($data = array()) {
    //add created and modified data if not included
    if(!array_key_exists("created", $data)){
        $data['created'] = date("Y-m-d H:i:s");
    }
    if(!array_key_exists("modified", $data)){
        $data['modified'] = date("Y-m-d H:i:s");
    }
    //if(!array_key_exists("login_date", $data)){
     //   $data['login_date'] = date("Y-m-d H:i:s");
    //}
    
    //insert user data to users table
    $insert = $this->db->insert($this->userTbl, $data);
    
    //return the status
    if($insert){
        return $this->db->insert_id();;
    } else {
        return false;
    }
    }

    public function login_date($slug = FALSE) {
        $this->db->select('login_date');    
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get('logs');
        return $query->result_array();
    }

    public function delete_users($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    public function record_count() {
        $query = $this->db->where('status', '1')->get('users');
        return $query->num_rows();
    }

    public function fetch_users($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->where('status', '1')->get('users');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}
