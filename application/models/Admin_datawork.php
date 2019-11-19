<?php
class Admin_Datawork extends CI_Model {
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
    
    public function count_data($table, $con){
        $data = $this->db->where($con)
                         ->get($table);
        
        return $data->num_rows();
    }

    public function get_data_order($table, $con = NULL, $order = NULL, $limit = NULL){
        $data = $this->db
                     ->where($con)
                     ->order_by($order)
                     ->limit($limit)
                     ->get($table);
        return $data->result();
    }

    public function get_order($table, $order){
        $data = $this->db
                     ->order_by($order)
                     ->get($table);
        return $data->result();
    }

    public function count_all($table){
        $count = $this->db->count_all_results($table);
        return $count;
    }
    // Join Data of Two Table
    public function join_data($fromtable, $jointable, $con){
        $this->db->select('*');
        $this->db->from($fromtable);
        $this->db->join($jointable, $con);
        $query = $this->db->get();

        return $query->result();
    }

    public function count_rows($table,$con,$order=NULL){
        $table = $this->db
                        ->where($con)
                        ->order_by($order)
                        ->get($table);
        return $table->num_rows();
    }

    public function count_row($table,$order=NULL){
        $table = $this->db
                        ->order_by($order)
                        ->get($table);
        return $table->num_rows();
    }

    public function count_all_con($table,$con){
        $table = $this->db
                        ->where($con)
                        ->get($table);
        return $table->num_rows();
    }

    public function get_table($table, $con, $order=NULL, $limit=NULL, $offset=NULL){
        if($limit===NULL && $offset===NULL){
            $table = $this->db
                        ->where($con)
                        ->order_by($order)
                        ->get($table);
        return $table->result();
        }
        else {
            $table = $this->db
                        ->where($con)
                        ->order_by($order)
                        ->limit($limit, $offset)
                        ->get($table);
        return $table->result();
        }
    }

    public function get_table_wc($table, $order=NULL, $limit=NULL, $offset=NULL){
        if($limit===NULL && $offset===NULL){
          $table = $this->db
                        ->order_by($order)
                        ->get($table);
        return $table->result();
        }
        else {
          $table = $this->db
                        ->order_by($order)
                        ->limit($limit, $offset)
                        ->get($table);
        return $table->result();
        }
    }

    public function update_data($table, $fields, $id, $con){
        $this->db->where($id, $con);
        $this->db->update($table, $fields);
    }

    public function updateData($table, $fields, $con){
        $this->db->where($con);
        $this->db->update($table, $fields);
    }

    public function update_image($table, $fields, $where){
        $this->db->where($where);
        $this->db->update($table, $fields);
    }
    // 
    public function get_id($table, $con)
    {
        $data = $this->db->where($con)->get($table);

        return $data->row_array();
    }
    public function get_id_last($table, $id, $con)
    {
        $data = $this->db->where($con)
                         ->order_by($id, 'DESC')
                         ->get($table);
        return $data->row_array();
    }

    public function AjaxCall($table, $con)
	{
		$this->db->from($table);
		$this->db->where($con);
		$query = $this->db->get();
		return $query->row();
	}

	public function ajaxUpdate($table, $data, $where)
	{
        $this->db->where($where);
        $this->db->update($table, $data);

		return $this->db->affected_rows();
	}

    public function ajaxDelete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
    // LAST DATA OF EMPLOYEE PAYMENT SECTION 
    public function getEmpAccountLastid($empid, $periodid, $userid){
        $query = $this->db->select('eaId')
                         ->from('empaccount')
                         ->where('eaEmpid', $empid)
                         ->where('eaFeePeriod', $periodid)
                         ->where('eaUserId', $userid)
                         ->order_by('eaId', 'DESC');
        $query = $this->db->get();
        $data = $query->row_array();
        $lastAccountid = $data['eaId'];
        return $lastAccountid;
    }
    // LAST DATA OF PAYMENT SECTION 
    public function getLastBlogId($date){
        $query = $this->db->select('*')
                         ->from('blog')
                         ->where('blogDate', $date)
                         ->order_by('blogId', 'DESC');
        $query = $this->db->get();
        $data = $query->row_array();
        $lastBlogId = $data['blogId'];
        return $lastBlogId;
    }
    function fetch_image(){
        $output = '';  
        $this->db->select("blogImg1");  
        $this->db->from("blog");  
        $this->db->order_by("blogId", "DESC");  
        $query = $this->db->get();  
        foreach($query->result() as $row)  
            {  
                $output .= '
                     <div class="col-md-3">
                          <img src="'.base_url().'assets/image/blogs/'.$row->blogImg1.'" class="img-responsive img-thumbnail" />
                     </div>
                ';
            }
        return $output;
    }

    public function get_blogs($catId, $id){
        $data = $this->db->where("(blogCat = '$catId' && blogId != '$id')")
                         ->order_by('blogId', 'DESC')
                         ->limit('8')
                         ->get('blog');
        return $data->result();
    }
    
  public function uploadVideo()
{
   if(!empty($_FILES)){
        if(is_uploaded_file($_FILES['uploadFile']['tmp_name'])){
            $srcPath = $_FILES['uploadFile']['tmp_name'];
            $trgPath = "assets/image/videofile".$_FILES['uploadFile']['name'];
            if(move_uploaded_file($srcPath,$trgPath)){
                ?>
                <video width="320" height="240" controls>
                    <source src="<?= $trgPath ?>" type="video/mp4">
                </video>
                <?php

            }
        }
    }
}
    
    public function join_syllabus_subject(){
        $data = $this->db->query("select * from syllabus s inner join course c on c.courseId = s.syCourseName inner join subjects sub on sub.subId = s.sySubjectName");
        return $data->result();
    }
}
?>
