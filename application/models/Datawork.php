<?php
class Datawork extends CI_Model {
    public function insert_data($table, $fields){
        $this->db->insert($table, $fields);
        return TRUE;
    }
    
    public function get_data($table, $con = NULL){
        if($con == NULL){
            $data = $this->db->get($table);
            return $data->result();
        }
        $data = $this->db
                     ->where($con)
                     ->get($table);
        return $data->result();
    }
    public function login($table, $con){
        $data = $this->db
                     ->where($con)
                     ->get($table);
        if($data->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    // SET ADMIN / SUB ADMIN LOGIN SESSION
    public function getsessionAdmin($username){
         $query = $this->db->select('*')
                           ->from('admin')
                           ->where('email', $username);
        $query = $this->db->get();
        $data = $query->row_array();
        $loginid = $data['ad_id'];
        return $loginid;
    }
 
    public function get_id($table, $con){
        $data = $this->db->where($con)->get($table);

        return $data->row_array();
    }
    // UPDATE DATA
    public function update_data($table, $fields, $id, $con){
        $this->db->where($id, $con);
        $this->db->update($table, $fields);
    }
}
?>