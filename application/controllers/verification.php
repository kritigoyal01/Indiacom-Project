<?php

class verification extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->library('../controllers/login');
		$this->load->model('membership_model');
	
	}
	
	function index()
	{
		$this->load->view('site/profile_header');
		$this->load->view('dv',array('error'=>''));
	}
	
	function if_verified_upload_then_insert($version)
	{
		
		if (  $this->upload->do_upload('file')  )//file upload success && validation success
		{	
					$id=$this->input->post('id');
					$category=$this->input->post('category');
					$sub_category=NULL;
					
					if($category=="Foreign Author")
					$id=NULL;
					
					if($category=="Professional Body")
					{
						$sub_category=$this->input->post('sub_category');
					}
					
					
					
					
					
					
				$info=$this->membership_model->getInfo($this->session->userdata('email'));
		$upload_data=$this->upload->data();
					$this->membership_model->document_verification_insert(//dv form submit is inserted into verification table via model
						//$this->session->userdata('email'),
						$info[0]->mid,//mid fetched via db from session email
						$id,
						$category,
						$upload_data['file_name'],
						$upload_data['file_type'],
						$sub_category
						);
						$this->membership_model->update_docno($this->session->userdata('email'),$version);
					echo "<h1>";	
					echo "successfully submitted";	
					echo "</h1>";
				
					foreach ($this->upload->data() as $item => $value):
				echo "<li> '$item' :  '$value'; </li>";
					endforeach; 
				echo "<p>";
				echo anchor('login/profile_open', 'Back to Profile!'); 
				echo "</p>";
					
			}
		else 
		{
	$error = array('error' => $this->upload->display_errors('<h3>','</h3>'));
		//echo $error['error']; echo br();
		$this->load->view('site/profile_header');
	
	
			$this->load->view('dv', $error);
		}
	}
function student_vf()
{
	
		
		
		//$this->load->model('membership_model');
		$def=$this->membership_model->getupload_info($this->session->userdata('email'));
	
	$mid=$def[0]->mid;
	
	$version=$def[0]->docno;
	$version++;
	
		$config['upload_path']="./uploads/document_verification";
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';//|gif|jpg|png';
		$config['file_name']	= 'DV_'.$version.'_'.$mid;
		
		$this->load->library('upload', $config);
		$this->if_verified_upload_then_insert($version);
//	$this->form_validation->set_rules('id','ID','trim|required');
//	$this->form_validation->set_rules('file','File','required');
	/*	if (  $this->upload->do_upload('file')  )//file upload success && validation success
		{	
					
				$info=$this->membership_model->getInfo($this->session->userdata('email'));
		$upload_data=$this->upload->data();
					$this->membership_model->document_verification_insert(//dv form submit is inserted into verification table via model
						//$this->session->userdata('email'),
						$info[0]->mid,//mid fetched via db from session email
						$this->input->post('id'),
						$this->input->post('category'),
						$upload_data['file_name']
					//	$abc=NULL//for subcategory in student_vf
						);
						$this->membership_model->update_docno($this->session->userdata('email'),$version);
					echo "<h1>";	
					echo "successfully submitted";	
					echo "</h1>";
				
					foreach ($this->upload->data() as $item => $value):
				echo "<li> '$item' :  '$value'; </li>";
					endforeach; 
				echo "<p>";
				echo anchor('login/profile_open', 'Back to Profile!'); 
				echo "</p>";
					
			}
		else 
		{
	$error = array('error' => $this->upload->display_errors('<h3>','</h3>'));
		//echo $error['error']; echo br();
		$this->load->view('site/profile_header');
	
	
			$this->load->view('dv', $error);
		}
		*/
		
	
}	
function alumini_vf()
{
	$this->load->model('membership_model');
	$def=$this->membership_model->getupload_info($this->session->userdata('email'));
	
	$mid=$def[0]->mid;
	
	$version=$def[0]->docno;
	$version++;
	
		$config['upload_path']="./uploads/document_verification";
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';//|gif|jpg|png';
		$config['file_name']	= 'DV_'.$version.'_'.$mid;
		
		$this->load->library('upload', $config);
		//
		$this->if_verified_upload_then_insert($version);
	
}		
function fauthor_vf()
{
	$this->load->model('membership_model');
	$def=$this->membership_model->getupload_info($this->session->userdata('email'));
	
	$mid=$def[0]->mid;
	
	$version=$def[0]->docno;
	$version++;
	
		$config['upload_path']="./uploads/document_verification";
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';//|gif|jpg|png';
		$config['file_name']	= 'DV_'.$version.'_'.$mid;
		
		$this->load->library('upload', $config);
		
	$this->if_verified_upload_then_insert($version);
	
}	
function pbody_vf()
{
	
		$this->load->model('membership_model');
		$def=$this->membership_model->getupload_info($this->session->userdata('email'));
	
	$mid=$def[0]->mid;
	
	$version=$def[0]->docno;
	$version++;
	
		$config['upload_path']="./uploads/document_verification";
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';//|gif|jpg|png';
		$config['file_name']	= 'DV_'.$version.'_'.$mid;
		
		$this->load->library('upload', $config);
		
		
			$this->if_verified_upload_then_insert($version);
}

}//class verification ends here
?>