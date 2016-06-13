<?php

class upload extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		//$this->load->library('../controllers/login');
		$this->load->model('membership_model');
	
	}
	
	function index()
	{
		$this->load->view('site/profile_header');
		$this->load->view('upload_form',array('error'=>'','yoo'=>$this->session->userdata('email') 	));
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
	
public function upload_file()
{
	if($this->is_logged_in()==true)
	{
		
	//$this->load->model('membership_model');
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
			$this->load->view('site/profile_header');
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
			$this->load->view('site/profile_header');
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

}


?>