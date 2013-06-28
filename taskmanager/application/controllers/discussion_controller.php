<?php

class Discussion_controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
	$this->load->model('discussion');
        $this->load->model('users');
    } 
    
    //diaplay and add topics
    
    function topics($project_id){
        if($this->users->check_user_loggedin()){
                $config = array(
                                    array(
					'field' => 'topic',
					'label' => 'Topic',
					'rules' => 'trim|required|min_length[4]|max_length[100]|xss_clean'
                                    )
                            );
                $this->form_validation->set_rules($config);
		
                if ($this->form_validation->run() == FALSE){                    
                    $data['topics'] = $this->discussion->get_topics($project_id);
                    if($data['topics']!=FALSE){
                        $data['project_id'] = $project_id;
                        $this->load->view('topics',$data);
                    }
                    else{
                        $data['error_msg']="sorry,you can't access this page";
                        $this->load->view('error',$data);
                    }
                }
                else{
                    $this->discussion->add_topic($project_id);
                    $data['topics'] = $this->discussion->get_topics($project_id);
                    $data['project_id'] = $project_id;
                    $this->load->view('topics',$data);                    
                }
            }
    }
    
    //discussion page
    
    function comments($project_id,$topic_id){
        if($this->users->check_user_loggedin()){
                $config = array(
                                    array(
					'field' => 'comment',
					'label' => 'Comment',
					'rules' => 'trim|required|min_length[4]|max_length[100]|xss_clean'
                                    )
                            );
                $this->form_validation->set_rules($config);
		
                if ($this->form_validation->run() == FALSE){                    
                    $data['comments'] = $this->discussion->get_comments($project_id,$topic_id);
                    if($data['comments']!=FALSE){
                        $data['project_id'] = $project_id;
                        $data['topic_id'] = $topic_id;
                        $this->load->view('comments',$data);
                    }
                    else{
                        $data['error_msg']="sorry,you can't access this page";
                        $this->load->view('error',$data);
                    }
                }
                else{
                    $this->discussion->add_comment($project_id,$topic_id);
                    $data['comments'] = $this->discussion->get_comments($project_id,$topic_id);
                    $data['project_id'] = $project_id;
                    $data['topic_id'] = $topic_id;
                    $this->load->view('comments',$data);
                }
            }
    }
    
}
?>
