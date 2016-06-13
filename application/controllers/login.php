<?php

class login extends CI_Controller
{
	 function __construct()
    {
        parent:: __construct();
       //$this->is_logged_in();
        $this->clear_cache();
    }
    function is_logged_in() 
    {

        if (!$this->session->userdata('is_logged_in'))
        {
        	return FALSE;
        }
		else {
			return true;
		}
    }
    function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }/*

	 
    function is_logged_in() 
    {

        if (!$this->session->userdata('is_logged_in'))
        {
            redirect('/admin/admin');
        }
    }
*/
	function index()
	{
		$this->load->view('includes/header');
		$this->load->view('login_form');
		$this->load->view('includes/footer');
		
		
	}
	
	
	function signup()
	{
		$this->load->view('includes/header');
		$this->load->view('signup_form');
		$this->load->view('includes/footer');
	}
	

	function create_member()
	{
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Email Id','trim|required|valid_email|callback_check_if_email_exists');
		
	
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('password_confirm','Password confirmation','trim|required|matches[password]');
		
		
				if($this->form_validation->run()==false)//didnt validate
				{
					$this->load->view('includes/header');
				$this->load->view('signup_form');
				$this->load->view('includes/footer');
				}
				else{
		$this->load->model('membership_model');
			
			if($query=$this->membership_model->create_member())//true then
			{
				$data['account_created']='Your account has been created.<br/>You may Login now!<br>';
				
				$this->load->view('includes/header');
				$this->load->view('login_form',$data);
				$this->load->view('includes/footer');
				}
			else //false then redirecting to sign up page again
				{
					$this->load->view('includes/header');
				$this->load->view('signup_form');
				$this->load->view('includes/footer');
				}
			
				}
	
		}//function create_member ends
	
	function check_if_email_exists($requested_email)
		{
			
			$this->load->model('membership_model');
			$email_not_in_use=$this->membership_model->check_if_email_exists($requested_email);
			if($email_not_in_use==true)
			return true;
			else 
				return false;
						}
	function validate_credentials()//login
	{//if($this->is_logged_in()==false){
		$this->load->model('membership_model');
		$query=$this->membership_model->validate();
		if($query)//true for login
		{
			$data=array(
			'email'=>$this->input->post('email'),
			'is_logged_in'=>true//,'name'=>cheena//$this->input->post('name')
			);
			//$temp['name']=$this->input->post('name');
			$this->session->set_userdata($data);
			//redirect('site/profile');
			
			//print_r($info[0]);
			//echo br();
			$this->profile_open();
		//	$this->load->view('site/profile',$temp);
		}
		else {//false login
		/*	$this->form_validation->set_message(‘validate_credentials’,’Incorrect Username or password’);
			return false;*/
			//echo 'enter correct login info';
			$data['account_created']='Incorrect Email or password.<br/>Login Again!<br>';
				
				$this->load->view('includes/header');
				$this->load->view('login_form',$data);
				$this->load->view('includes/footer');
		}
	//}
/*else {
	//echo "here";
	redirect('login');
}*/
		
	}
	function profile_open(){
		if($this->is_logged_in()==true)
		{
			$this->load->model('membership_model');
			$info=$this->membership_model->getInfo($this->session->userdata('email'));
		$this->load->view('site/profile',$info[0]);
		}
else {
	redirect('/login');
}
	}
	
	public function logout()
{
$this->session->sess_destroy();
$this->index();
}

/*public function dv()
{
	$this->load->view('dv');
	//$this->load->library('javascript');
}*/
}//class login ends
			

