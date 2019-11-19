<?php
class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('sc_authenticate')){
            redirect(base_url('auth/authenticate'));
        }   
    } 
    // DASHBOARD
    public function index(){
        $data['title'] = 'Admin Panel Homepage | Smart Class';
        $data['TITLE'] = '<i class="fa fa-dashboard"></i> Dashboard';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a></li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/home', $data);
        $this->load->view('admin/include/footer');
    }
    
    // REGISTRATION CENTER
    public function registration(){
        $data['title'] = 'Registration | Smart Class';
        $data['TITLE'] = '<i class="fa fa-university"></i> Registration';
        $data['BREADCRUMB'] = '<li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a> / Registration</li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/registration', $data);
        $this->load->view('admin/include/footer');
    }
    
    public function registerCentre(){
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        $time = date("h:i:s");

        $slug = url_title($this->input->post('orgname'), 'dash', TRUE);
        $this->session->set_flashdata('success', '<script>swal("wow !", "Organisation registered Successfully",);</script>');
        $fields = [
            'orgName'   => $_POST['name'],
            'orgAadhar' => $_POST['aadhar'],
            'orgPan'    => $_POST['pan'],
            'orgRegNo'    => $_POST['regno'],
            'orgCname'  => $_POST['orgname'],
            'orgEmail'  => $_POST['orgemail'],
            'orgContact'=> $_POST['orgcontact'],
            'orgPassword'=> $_POST['orgpassword'],
            'orgSlug'   => $slug,
            'orgDate'   => $date,
            'orgTime'   => $time,
        ];
        $this->admin_datawork->insert_data('organisation', $fields);
        redirect(base_url('admin/registration/'));
    }
    
    
    // REGISTRATION CENTER LIST
    public function registrationlist(){
        $data['title'] = 'Registration | Smart Class';
        $data['TITLE'] = '<i class="fa fa-university"></i> Registration';
        $data['BREADCRUMB'] = '<li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a> / Registration</li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        
        $data['centre'] = $this->datawork->get_data('organisation');
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/registrationlist', $data);
        $this->load->view('admin/include/footer');
    }
    
    
    // INDIVISUAL CENTER VIEW
    public function viewcentre($id=NULL){
        $data['title'] = 'View Centre | Smart Class';
        $data['TITLE'] = '<i class="fa fa-building"></i> Organistion / Institute';
        $data['BREADCRUMB'] = '<li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a> / <a href="' . base_url() . 'admin/registrationlist">Organisation List</a> / Organisation or Institute/</li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        
        $data['centre'] = $this->datawork->get_data('organisation',['orgSlug'=>$id]);
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/viewcentre', $data);
        $this->load->view('admin/include/footer');
    }
    
    // EDIT CENTER 
    public function editcentre($id = NULL){
        $data['title'] = 'View Centre | Smart Class';
        $data['TITLE'] = '<i class="fa fa-building"></i>Edit  Organistion / Institute';
        $data['BREADCRUMB'] = '<li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a> / <a href="' . base_url() . 'admin/registrationlist">Organisation List</a> / Organisation or Institute/</li>';
        
        date_default_timezone_set('Asia/Calcutta');       
        
        $date = date("d-m-Y");
        $time = date("h:i:s");

        $slug = url_title($this->input->post('centrename'), 'dash', TRUE);
        $data['centre'] = $this->datawork->get_data('organisation',['orgSlug'=>$id]);
        
        $this->form_validation->set_rules('centrename','Name of Centre','required');
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('contact','contact','required');
        $this->form_validation->set_rules('aadhar','aadhar','required');
        $this->form_validation->set_rules('pan','pan','required');
        $this->form_validation->set_rules('name','name','required');
        
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/page/editcentre', $data);
            $this->load->view('admin/include/footer');
        }
        else{
             $fields = [
            'orgName'   => $_POST['name'],
            'orgAadhar' => $_POST['aadhar'],
            'orgPan'    => $_POST['pan'],
            'orgRegNo'    => $_POST['regno'],
            'orgCname'  => $_POST['centrename'],
            'orgEmail'  => $_POST['email'],
            'orgContact'=> $_POST['contact'],
            'orgPassword'=> $_POST['password'],
            'orgSlug'   => $slug,
            'orgDate'   => $date,
            'orgTime'   => $time,
        ];
        $this->session->set_flashdata('success', '<script>swal("wow !", "Organisation Edited Successfully",);</script>');
        $this->admin_datawork->update_data('organisation', $fields , ['orgSlug'=> $id]);
        redirect(base_url('admin/registrationlist/'));
        }
    }
        
    // DELETE CENTRE
    
     public function centreDelete($id)
    {
        $this->admin_datawork->ajaxDelete('organisation', ['orgId' => $id]);
        echo json_encode(array("status" => TRUE));
    }
    
    
    // ADD LESSION
    
    public function lession($id=NULL){
        $data['title'] = 'Lession Videos';
        $data['TITLE'] = '<i class="fa fa-video-camera"></i> Topics';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a></li>
        <li class="breadcrumb-item">Topics</li>';
        
        date_default_timezone_set('Asia/Calcutta');
          
        $date = date("d-m-Y");
        $time = date("h:i:s");

        $slug = url_title($this->input->post('topicName'), 'dash', TRUE);

        $data['subjects'] = $this->datawork->get_data('subjects', ['subParent' => '0']);
        $data['sub'] = $this->datawork->get_data('subjects', ['subParent !=' => '0']);
          
        $this->form_validation->set_rules('topicName','Topic Name','required');
        $this->form_validation->set_rules('lessionName','Lession Name','required');
        $this->form_validation->set_rules('subjectName','Subject Name','required');
          
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/page/lession');
            $this->load->view('admin/include/footer');
        }
          else{
              $fields = [
                  'topicName' => $_POST['topicName'],
                  'topicLession' => $_POST['lessionName'],
                  'topicSubject' => $_POST['subjectName'],
                  'topicDate' => $date,
                  'topicTime' => $time,
                  'topicSlug' => $slug 
              ];
              $this->admin_datawork->insert_data('topics',$fields);
              $this->session->set_userdata('uploadingSession',$slug);
              redirect('admin/uploadVideo');
          }
    }
    
    public function uploadVideo11(){
        $data['title'] = 'Topics Videos';
        $data['TITLE'] = '<i class="fa fa-dashboard"></i> Topics Video';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a></li>
        <li class="breadcrumb-item">Topics Video</li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");

        //$this->admin_datawork->get_data('')        
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/upload-video1');
        $this->load->view('admin/include/footer');
    }
    
    
    // COURSE
    public function course($id=NULL){
        $data['title'] = 'course';
        $data['TITLE'] = '<i class="fa fa-book"></i> course';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a></li>
        <li class="breadcrumb-item"><a>course</a></li>';
        
      
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        
        $data['subject'] = $this->admin_datawork->get_data('subjects',['subParent'=>'0']);
        $data['course'] = $this->admin_datawork->get_data('course');

        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/course',$data);
        $this->load->view('admin/include/footer');
    }
    
    
    // INSERT FUNCTION OF COURSE
    public function addNewCourse(){
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        $time = date("h:i:s");
        
        $slug = url_title($this->input->post('courseName'), 'dash', TRUE);  
        $fields = [
            'courseName'  => $_POST['courseName'],
            'courseCode'  => $_POST['courseCode'],
            'courseDuration'  => $_POST['courseDuration'],
            'courseDescription'  => $_POST['courseDescription'],
            'courseSlug'   => $slug,
            'courseDate'   => $date,
            'courseTime' => $time
        ];
        $this->admin_datawork->insert_data('course', $fields);
        redirect('admin/course');
    }
    
    // working hour call data for ajax edit
    public function courseEdit($id)
    {
        $data = $this->admin_datawork->AjaxCall('course', ['courseId' => $id]);
        echo json_encode($data);
    }
    // working hour ajax edit function
    public function updatecourse()
    {
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        $time = date("h:i:s");
        
        $slug = url_title($this->input->post('courseName'), 'dash', TRUE);  

        $data = array(
            'courseName'   => $this->input->post('courseName'),
            'courseCode'   => $this->input->post('courseCode'),
            'courseDuration'   => $this->input->post('courseDuration'),
            'courseDescription'   => $this->input->post('courseDescription'),
            'courseSlug'   => $slug,
            'courseDate'   => $date,
            'courseTime'   => $time,
        );
        $this->session->set_flashdata('success', '<script>swal("wow !", "Course Edited Successfully",);</script>');
        $this->admin_datawork->update_data('course', $data, 'courseId', $this->input->post('courseId'));
        echo json_encode(array("status" => TRUE));
    }
    
    
    // Delete Course
     public function courseDelete($id)
    {
        $this->admin_datawork->ajaxDelete('course', ['courseId' => $id]);
        echo json_encode(array("status" => TRUE));
    }
    
    // SYLLABUS
    public function syllabus($id=NULL){
        $data['title'] = 'Manage syllabus';
        $data['TITLE'] = '<i class="fa fa-file-pdf-o"></i> syllabus';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a></li>
        <li class="breadcrumb-item"><a>syllabus</a></li>';
        
        $data['subject'] = $this->datawork->get_data('subjects', ['subParent' => '0']);
        $data['course'] = $this->datawork->get_data('course');
        $data['syllabus'] = $this->datawork->get_data('syllabus');
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");

        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/syllabus', $data);
        $this->load->view('admin/include/footer');
    }
    
    // INSERT FUNCTION OF SYLLABUS
    public function addNewSyllabus(){
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        $time = date("h:i:s");
        
        $fields = [
            'syCourseName'  => $_POST['courseName'],
            'sySubjectName'  => $_POST['subjectName'],
            'syDate'   => $date,
            'syTime' => $time
        ];
        $this->admin_datawork->insert_data('syllabus', $fields);
        redirect('admin/syllabus');
    }
   
    
    // SUBJECT
    public function subject($id=NULL){
        $data['title'] = 'Manage subject';
        $data['TITLE'] = '<i class="fa fa-book"></i> subject';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a></li>
        <li class="breadcrumb-item"><a>subject</a></li>';
        
        $data['subject'] = $this->datawork->get_data('subjects', ['subParent' => '0']);
        $data['sub'] = $this->datawork->get_data('subjects', ['subParent' => '0']);
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");

        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/subject', $data);
        $this->load->view('admin/include/footer');
    }
    
    // INSERT FUNCTION OF SUBJECT
    public function addNewSubject(){
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        $time = date("h:i:s");
        
        $slug = url_title($this->input->post('subject'), 'dash', TRUE);  
        $fields = [
            'subName'  => $_POST['subject'],
            'subParent'  => $_POST['type'],
            'subSlug'   => $slug,
            'subDate'   => $date,
            'subTime' => $time
        ];
         $this->session->set_flashdata('success', '<script>swal("wow !", "Subject / Lession Added Successfully",);</script>');
        $this->admin_datawork->insert_data('subjects', $fields);
        redirect('admin/subject');
    }
    // working hour call data for ajax edit
    public function subjectEdit($id)
    {
        $data = $this->admin_datawork->AjaxCall('subjects', ['subId' => $id]);
        echo json_encode($data);
    }
    // working hour ajax edit function
    public function updatesubject()
    {
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        $time = date("h:i:s");
        
        $slug = url_title($this->input->post('subName'), 'dash', TRUE);  

        $data = array(
            'subName'   => $this->input->post('subName'),
            'subSlug'   => $slug,
            'subDate'   => $date,
            'subTime'   => $time,
        );
        $this->admin_datawork->update_data('subjects', $data, 'subId', $this->input->post('subId'));
        echo json_encode(array("status" => TRUE));
    }
    // working hour ajax delete function
    public function whourDelete($id)
    {
        $this->admin_datawork->ajaxDelete('subjects', ['subId' => $id]);
        echo json_encode(array("status" => TRUE));
    }
    
    // TOPICS
    
    public function topics($id){
        $data['title'] = 'Sub Category';
        $data['TITLE'] = '<i class="fa fa-dashboard"></i> Topics';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/subject">Subject</a></li>
        <li class="breadcrumb-item"><a>Topics</a></li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");

        $data['subjects'] = $this->datawork->get_data('subjects', ['subId' => $id]);
        $data['sub'] = $this->datawork->get_data('subjects', ['subParent' => $id]);
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/topics', $data);
        $this->load->view('admin/include/footer');
    }
    
    
    // TOPICS LIST
    public function topicsList($id=NULL){
        $data['title'] = 'Topic List';
        $data['TITLE'] = '<i class="fa fa-dashboard"></i> Topics';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/lession">Topics</a></li>
        <li class="breadcrumb-item"><a>Topics List</a></li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        
        $data['topics'] = $this->admin_datawork->get_data('topics');
        $data['subject'] = $this->admin_datawork->get_data('subjects');
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/topicslist',$data);
        $this->load->view('admin/include/footer');
    }
    
    
    
    // Notification
    public function notification(){
        $data['title'] = 'Notification';
        $data['TITLE'] = '<i class="fa fa-bell"></i> Notification';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a></li>
        <li class="breadcrumb-item"><a>Notification</a></li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        
        $this->db->order_by("notificationId", "asc");
        $data['notification'] = $this->datawork->get_data('notification');
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/notification',$data);
        $this->load->view('admin/include/footer');
    }
    
    // INSERT FUNCTION OF Notification
    public function addNewNotification(){
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        $time = date("h:i:s");
        
        $slug = url_title($this->input->post('notificationTitle'), 'dash', TRUE);  
        $fields = [
            'notificationTitle'  => $_POST['notificationTitle'],
            'notificationURL'  => $_POST['notificationURL'],
            'notificationDate'  => $date,
            'notificationTime'  => $time,
            'notificationslug'  => $slug,
        ];
        $this->admin_datawork->insert_data('notification', $fields);
        redirect('admin/notification');
    }
    // working hour call data for ajax edit
    public function notificationEdit($id)
    {
        $data = $this->admin_datawork->AjaxCall('notification', ['notificationId' => $id]);
        echo json_encode($data);
    }
    // working hour ajax edit function
    public function updatenotification()
    {
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        $time = date("h:i:s");
        
        $slug = url_title($this->input->post('notificationTitle'), 'dash', TRUE);  

        $data = array(
            'notificationTitle'   => $this->input->post('notificationTitle'),
            'notificationSlug'   => $slug,
            'notificationDate'   => $date,
            'notificationTime'   => $time,
        );
        $this->admin_datawork->update_data('notification', $data, 'notificationId', $this->input->post('notificationId'));
        echo json_encode(array("status" => TRUE));
    }
    // working hour ajax delete function
    public function notificationDelete($id)
    {
        $this->admin_datawork->ajaxDelete('notification', ['notificationId' => $id]);
        echo json_encode(array("status" => TRUE));
    }
       
   
 // ======== LOGOUT FUNCTION AND SESSION ====================================
    // -------------------------------------------------------------------------
    public function logout(){
      $this->session->unset_userdata('sc_authenticate');
      redirect(base_url('auth/authenticate'));
    }

    //variable for storing error message
    private $error;
    //variable for storing success message
    private $success;
    
    //appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "\r\n";
    }
    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "\r\n";
    }
    public function uploadVideo() {
        $log = $this->session->userdata('uploadingSession');
        if(!$this->session->userdata('uploadingSession')){
            redirect('admin/lession');
        }
        if ($this->input->post('video_upload')) {
            //set preferences
            //file upload destination
            $upload_path = './assets/topicvideo';
            $config['upload_path'] = $upload_path;
            //allowed file types. * means all types
            $config['allowed_types'] = 'wmv|mp4|avi|mov';
            //allowed max file size. 0 means unlimited file size
            $config['max_size'] = '0';
            //max file name size
            $config['max_filename'] = '255';
            //whether file name should be encrypted or not
            $config['encrypt_name'] = FALSE;
            //store video info once uploaded
            $video_data = array();
            //check for errors
            $is_file_error = FALSE;
            //check if file was selected for upload
            if (!$_FILES) {
                $is_file_error = TRUE;
                $this->handle_error('Select a video file.');
            }
            //if file was selected then proceed to upload
            if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'video_name' is the name of the input
                if (!$this->upload->do_upload('video_name')) {
                    //if file upload failed then catch the errors
                    $this->handle_error($this->upload->display_errors());
                    $is_file_error = TRUE;
                } else {
                    //store the video file info
                    $video_data = $this->upload->data();
                }
            }
            // There were errors, we have to delete the uploaded video
            if ($is_file_error) {
                if ($video_data) {
                    $file = $upload_path . $video_data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                     $this->session->set_flashdata('error', '<script>swal("Sorry !", "You Video is not uploaded Successfully ! Try Again", "error",);</script>');
                }
            } else {
                $data['topicVideo'] = $video_data['file_name'];
                $data['topicVideoPath'] = $upload_path;
                $data['topicvideoType'] = $video_data['file_type'];
                $this->admin_datawork->update_data('topics',$data,['topicSlug'=>$log]);
                $this->handle_success('Video was successfully uploaded to direcoty <strong>' . $upload_path . '</strong>.');
                $this->session->set_flashdata('success', '<script>swal("Video Uploaded Successfully", "success",);</script>');
                $this->session->unset_userdata('uploadingSession');
                redirect('admin/lession');
            }
        }
        //load the error and success messages
        $data['errors'] = $this->error;
        $data['success'] = $this->success;
        //load the view along with data
        $data['title'] = 'Youtube Videos';
        $data['TITLE'] = '<i class="fa fa-dashboard"></i> Videos';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'admin/index">Dashboard</a></li>
        <li class="breadcrumb-item"><a>Youtube Videos</a></li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");

        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/page/upload-video1', $data);
        $this->load->view('admin/include/footer');
    }
}
