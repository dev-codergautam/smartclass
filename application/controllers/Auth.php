<?php
class Auth extends CI_Controller{
    
    
    public function authenticate(){
        date_default_timezone_set('Asia/Calcutta');
        $date = date('d M Y h:i a');

        if($this->session->userdata('sc_authenticate'))
        {
            redirect(base_url('admin/index'));
        }
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        
        if($this->form_validation->run() === TRUE)
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $type = "Admin";
            
            if($this->datawork->login('admin', ['email'=>$email], ['password'=>$password]) === TRUE)
            {
                $loginidAdmin = $this->datawork->getsessionAdmin($email);
                $this->session->set_userdata('sc_authenticate', $loginidAdmin);

                $this->session->set_flashdata('success', '<script>swal("Logged in!", "You haved logged in successfully !", "success",);</script>');

                //$this->sendNotificationMail($email, $msg);
                //$this->sendNotiMail($email, $msg, $ip, $type);

                redirect(base_url().'admin/index');
            }
            else{
                $this->session->set_flashdata('error', '<script>M.toast({html: "Username or Password is incorrect!", inDuration:2000})</script>');
                redirect(base_url('auth/authenticate'));
            }
        }
        else
        {
            $this->load->view('auth/authenticate');
        }
    }
    
  
 public function userauthenticate(){
        date_default_timezone_set('Asia/Calcutta');
        $date = date('d M Y h:i a');

        if($this->session->userdata('scuser_authenticate'))
        {
            redirect(base_url('org/index'));
        }
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        
        if($this->form_validation->run() === TRUE)
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $type = "User";
                        
            if($this->datawork->login('organisation', ['orgEmail'=>$email,'orgPassword'=>$password]) === TRUE)
            {
                $this->session->set_userdata('scuser_authenticate', $email);

                $this->session->set_flashdata('success', '<script>swal("Logged in!", "You haved logged in successfully !", "success",);</script>');

                //$this->sendNotificationMail($email, $msg);
                //$this->sendNotiMail($email, $msg, $ip, $type);

                redirect(base_url().'org/index');
            }
            else{
                $this->session->set_flashdata('error', '<script>M.toast({html: "Username or Password is incorrect!", inDuration:2000})</script>');
                redirect(base_url('auth/userauthenticate'));
            }
        }
        else
        {
            $this->load->view('auth/orgauthenticate');
        }
    }
       
}

?>
