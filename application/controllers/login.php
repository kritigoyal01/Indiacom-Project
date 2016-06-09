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
public function upload_file()
{
	if($this->is_logged_in()==true)
	{
		
	$this->load->model('membership_model');
	$def=$this->membership_model->getupload_info($this->session->userdata('email'));
	
	$mid=$def[0]->mid;
	
	$version=$def[0]->uploadV;
	$version++;
	
		$config['upload_path']="./uploads";
		$config['allowed_types'] = 'doc|docx|pdf';//|gif|jpg|png';
		$config['file_name']	= 'V'.$version.'_'.$mid;
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file'))//file upload fails
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else//upload success
		{
			
			$temp=$this->upload->data();
		
			
			//page count
			$pagecount=0;
			if($temp['file_ext'] =='.pdf')
			{
				$pagecount=$this->getPDFPages($temp['file_name']);
		
				
			}
			elseif ($temp['file_ext']=='.docx') 
			{
					$pagecount=$this->getDocxPages($temp['file_name']);
				
			} 		
			elseif ($temp['file_ext']=='.doc') 
			{
				$rawname=$temp['raw_name'].".pdf";
				$fullpath="C:/xampp/htdocs/ci_introl/uploads/".$rawname;
					
					$this->convert_doc_to_pdf($temp['file_name'],$temp['raw_name']);
					$pagecount=$this->getPDFPages($temp['raw_name'].".pdf");
						unlink($fullpath);
			} 		
			
			$data=array('pagecount'=>$pagecount,'upload_data' => $this->upload->data());
			$this->load->view('upload_success', $data);
			$this->membership_model->upload_update($this->session->userdata('email'),$version,$temp['file_name'],$temp['file_ext'],$pagecount);
		}
	
	}
	else {
		redirect('login');
	}
}
public function getPDFPages($filepath)
{
	/*$document="<?php echo base_url();?>"."uploads/V13.pdf";//not working
	$document="http://localhost:8081/ci_introl/uploads/V13.pdf";*/ //not working
	//$document="C:\\xampp\htdocs\ci_introl\uploads\V1_8.pdf";//working
	$document="C:/xampp/htdocs/ci_introl/uploads/".$filepath;
	
   // $cmd = "/path/to/pdfinfo";           // Linux
    $cmd = "C:\\xampp\htdocs\ci_introl\pdf\pdfinfo.exe";  // Windows

    // Parse entire output
    // Surround with double quotes if file name has spaces
    exec("$cmd \"$document\"", $output);

    // Iterate through lines
    $pagecount = 0;
	
    foreach($output as $op)
    {
    	
        // Extract the number
        if(preg_match("/Pages:\s*(\d+)/i", $op, $matches) === 1)
        {
            $pagecount = intval($matches[1]);
            break;
        }
    }

   return $pagecount;
}

 
function getDocxPages($path)
{
	
	$filename='C:\\xampp\htdocs\ci_introl\uploads\\'.$path;
	
    $zip = new ZipArchive();

    if($zip->open($filename) === true)
    {  
        if(($index = $zip->locateName('docProps/app.xml')) !== false)
        {
            $data = $zip->getFromIndex($index);
            $zip->close();

            $xml = new SimpleXMLElement($data);
            return $xml->Pages;
        }

       $zip->close();
    }
	else// if fails to open
echo "cant fetch the page count";
    
}
function convert_doc_to_pdf($filename,$rawname)
{
	
	$filepath="C:/xampp/htdocs/ci_introl/uploads/";
	$word = new COM("Word.Application") or die ("Could not initialise Object.");
	  // set it to 1 to see the MS Word window (the actual opening of the document)
	 $word->Visible = 0;
	  // recommend to set to 0, disables alerts like "Do you want MS Word to be the default .. etc"
	 $word->DisplayAlerts = 0;
	 $word->Documents->Open($filepath.$filename);
	 $word->ActiveDocument->ExportAsFixedFormat($filepath.$rawname.".pdf", 17, false, 0, 0, 0, 0, 7, true, true, 2, true, true, false);
	//above lines creates pdf with same name as doc file name  
	$word->Quit(false);
	 unset($word);
}
}//class login ends
			

