<?php
class Org extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('scuser_authenticate')){
            redirect(base_url('auth/userauthenticate'));
        }   
    } 
    // DASHBOARD
    public function index(){
        $data['title'] = 'Organisation Panel Homepage | Smart Class';
        $data['TITLE'] = '<i class="fa fa-dashboard"></i> Dashboard';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'org/index">Dashboard</a></li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        
        $this->load->view('org/include/header', $data);
        $this->load->view('org/page/home', $data);
        $this->load->view('org/include/footer');
    }
    
    
    // PROFILE
    public function profile(){
        $data['title'] = 'Organisation Panel Homepage | Smart Class';
        $data['TITLE'] = '<i class="fa fa-user"></i> Profile';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'org/index">Dashboard</a></li>
        <li class="breadcrumb-item">Profile</li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        $log = $_SESSION['scuser_authenticate'];
        $data['centre'] = $this->admin_datawork->get_data('organisation',['orgEmail'=>$log]);
        
        $this->load->view('org/include/header', $data);
        $this->load->view('org/page/profile', $data);
        $this->load->view('org/include/footer');
    }
    
    // NOTIFICATION
    public function notification(){
        $data['title'] = 'Organisation Panel Homepage | Notification';
        $data['TITLE'] = '<i class="fa fa-bell"></i> Notification';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'org/index">Dashboard</a></li>
        <li class="breadcrumb-item">Notification</li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
       
        $data['notification'] = $this->admin_datawork->get_data('notification');
        
        $this->load->view('org/include/header', $data);
        $this->load->view('org/page/notification',$data);
        $this->load->view('org/include/footer');
    }
    
    // COURSE
    public function course(){
        $data['title'] = 'Organisation Panel Homepage | course';
        $data['TITLE'] = '<i class="fa fa-file-pdf-o"></i> course';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'org/index">Dashboard</a></li>
        <li class="breadcrumb-item">Course</li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
       
        $this->load->view('org/include/header', $data);
        $this->load->view('org/page/course');
        $this->load->view('org/include/footer');
    }
    
    // SYLLABUS
    public function syllabus(){
        $data['title'] = 'Organisation Panel Homepage | course';
        $data['TITLE'] = '<i class="fa fa-bell"></i> Syllabus';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'org/index">Dashboard</a></li>
        <li class="breadcrumb-item">Syllabus</li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        
        $data['subject'] = $this->datawork->get_data('subjects', ['subParent' => '0']);
        $data['course'] = $this->datawork->get_data('course');
        $data['syllabus'] = $this->datawork->get_data('syllabus');
       
        $this->load->view('org/include/header', $data);
        $this->load->view('org/page/syllabus',$data);
        $this->load->view('org/include/footer');
    }
    
    
    // SUBJECT
    public function subject(){
        $data['title'] = 'Organisation Panel Homepage | Smart Class';
        $data['TITLE'] = '<i class="fa fa-dashboard"></i> Dashboard';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'org/index">Dashboard</a></li>
        <li class="breadcrumb-item">Subjects</li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        $log = $_SESSION['scuser_authenticate'];
        $data['subjects'] = $this->admin_datawork->get_data('subjects',['subParent'=>'0']);
        
        $this->load->view('org/include/header', $data);
        $this->load->view('org/page/subject', $data);
        $this->load->view('org/include/footer');
    }
    
    // LESSION
    public function lession($aa){
        $id = $this->uri->segment(3);
        $seg4 = $this->uri->segment(4);

        $data['title'] = 'Organisation Panel Homepage | Smart Class';
        $data['TITLE'] = '<i class="fa fa-user"></i> lession';
        $data['BREADCRUMB'] = '
        <li class="breadcrumb-item"><a href="' . base_url() . 'org/index">Dashboard</a></li>
        <li class="breadcrumb-item">lession</li>';
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");
        $log = $_SESSION['scuser_authenticate'];
        
        //$first = $this->admin_datawork->get_table('topics', ['topicSubject' => $id], 'topicId ASC');
        //foreach($first as $rowss){}
        //$firstdata = $rowss->topicId;

        $data['first'] = $this->admin_datawork->get_id('topics', ['topicSubject' => $id]);
        $fid = $data['first']['topicId'];

        if($seg4 == ""){
            $data['videosingle'] = $this->admin_datawork->get_data('topics', ['topicId' => $fid]);
        }
        else {
            $data['videosingle'] = $this->admin_datawork->get_data('topics', ['topicId' => $seg4]);
        }

        $data['videocourse'] = $this->admin_datawork->get_data('topics',['topicSubject'=>$id]);
        
        $data['videoco'] = $this->admin_datawork->get_data('topics',['topicSubject'=>$id]);

        $data['subject'] = $this->admin_datawork->get_data('subjects', ['subId'=>$id]);
        
        $this->load->view('org/page/videoclass', $data);
        $this->load->view('org/include/footer');
    }
    
    public function logout(){
        $this->session->unset_userdata('scuser_authenticate');
        redirect(base_url('auth/userauthenticate'));
    }
}
?>