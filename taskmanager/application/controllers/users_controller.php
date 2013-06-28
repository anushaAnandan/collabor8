<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_controller extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('users');
        $this->load->model('activity');
	$this->load->library('session');
	$this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }
    
    function index(){
        $data['error_msg']="";
        $this->load->view("login.php",$data);
    }
    
    function login(){
        $data['error_msg']="";
        $config = array(
				array(
					'field' => 'username',
					'label' => 'Username',
					'rules' => 'trim|required|min_length[4]|max_length[12]|xss_clean|alpha_numeric'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required|min_length[5]|max_length[50]|xss_clean|md5'
				),
		);
        $this->form_validation->set_rules($config);
		
	if ($this->form_validation->run() == FALSE){
		$this->load->view('login',$data);
	}
	else{
            $data=$this->users->login();   
            if(!$data){
                $data['error_msg']="The username and password you entered do not match";
                $this->load->view('login',$data);
            }
            else{
                $this->session->set_userdata('username',$data['username']);
                $this->session->set_userdata('email',$data['email']);
                $this->load->view("welcome",$data);
            }
        }
    }
    
    
    
    //gets activities of all the projects user is involved in or activities of a specific project
    
    function get_activities($project_id = NULL){
        if($this->users->check_user_loggedin()){
            $data['activities'] = $this->activity->get_activity_list($project_id);
            if(!$data['activities']){
                $data['error_msg'] = 'Sorry you have no permission to access this page.';
                $this->load->view('error',$data);
            }
            else{
                $this->load->view('activity',$data);
            }
        }
    }
    
    //edit profile pic
    
    function edit_profile_pic(){
        if($this->users->check_user_loggedin()){
        $config['upload_path'] = 'F:/wamp/www/taskmanager/images/';
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']	= '100';
        $config['max_width']  = '1024';
	$config['max_height']  = '768';

	$this->load->library('upload', $config);

	if ( ! $this->upload->do_upload())
	{
		$error = array('error' => $this->upload->display_errors());
		$this->load->view('upload_form', $error);
	}
	else
	{
		$data = array('upload_data' => $this->upload->data());
                $this->users->update_profile_pic($data['upload_data']);
		$this->load->view('upload_success', $data);
	}
        }

    }
    
    function logout(){
        $this->session->sess_destroy();
        $this->load->view('start');
    }
}
?>
