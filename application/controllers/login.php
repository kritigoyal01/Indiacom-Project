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
		//$temp=$info[0];
	//echo $this->session->userdata('email');

	
	$this->load->model('membership_model');
	$def=$this->membership_model->getupload_info($this->session->userdata('email'));
	
	$mid=$def[0]->mid;
	//echo $mid;
	//echo br();
	$version=$def[0]->uploadV;
	$version++;
	//echo 'v'.$version;
	//config
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
			
			//echo br();
			
			//page count
			$pagecount=0;
			if($temp['file_ext'] =='.pdf')
			{
				$pagecount=$this->getPDFPages($temp['file_name']);
				//echo 'pagecount is'.$pagecount;
				
			}
			elseif ($temp['file_ext']=='.docx') 
			{
					$pagecount=$this->getDocxPages($temp['file_name']);
				
			} 		
			elseif ($temp['file_ext']=='.doc') 
			{
					//$pagecount=
					$this->get_num_pages_doc($temp['file_name']);
				
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
/*  
function page() {
	$filepath="/opt/lampp/htdocs/ci_introl/uploads/preface.pdf";
	
    $fp = @fopen(preg_replace("/\[(.*?)\]/i", "", $filepath), "r");
    $max = 0;
    if (!$fp) {
        echo "Could not open file: $filepath";
        echo br();
    } else {
        while (!@feof($fp)) {
            $line = @fgets($fp, 255);
            if (preg_match('/\/Count [0-9]+/', $line, $matches)) {
                preg_match('/[0-9]+/', $matches[0], $matches2);
                if ($max < $matches2[0]) {
                    $max = trim($matches2[0]);
                    break;
                }
            }
        }
        @fclose($fp);
    }
    $data['page']=$max;
    echo "$max";
$this->load->view('page_count',$data);
    //return $max;
    
}
function page1() 
{
	$file="/opt/lampp/htdocs/ci_introl/uploads/preface.pdf";
    //http://www.hotscripts.com/forums/php/23533-how-now-get-number-pages-one-document-pdf.html
    if(!file_exists($file)) echo "cannot open filepath";
    if (!$fp = @fopen($file,"r")) echo "cannot open ";
    $max=0;
    while(!feof($fp)) {
            $line = fgets($fp,255);
            if (preg_match('/\/Count [0-9]+/', $line, $matches)){
                    preg_match('/[0-9]+/',$matches[0], $matches2);
                    if ($max<$matches2[0]) $max=$matches2[0];
            }
    }
    fclose($fp);
   echo $max;
}
function page2()
{
$this->load->library('image_magician');
$file="/opt/lampp/htdocs/ci_introl/uploads/preface.pdf";
//$this->image_magician->Imagick('/opt/lampp/htdocs/ci_introl/uploads/preface.pdf');
var_dump($this->image_magician->getNumberImages());
//max=$this->image_magician->getNumberImages($file);

/*$document = new Imagick('2_pager.pdf');

var_dump($document->getNumberImages()); //returns 2

$document = new Imagick('1_pager.pdf');

var_dump($document->getNumberImages()); //returns 1

?>
echo $max;
}*/

//pdf working function using exe
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
	//echo $filename;
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
function get_num_pages_doc($path) // .doc Document of properties output in hexadecimal(need to analyse which section contains page no)
{
	$filename='C:\\xampp\htdocs\ci_introl\uploads\\'.$path;
    $handle = fopen($filename, 'r');
    $line = @fread($handle, filesize($filename));

    echo '<div style="font-family: courier new;">';

        $hex = bin2hex($line);
        $hex_array = str_split($hex, 4);
        $i = 0;
        $line = 0;
        $collection = '';
        foreach($hex_array as $key => $string)
        {
            $collection .= $this->hex_ascii($string);
            $i++;

            if($i == 1)
            {
                echo '<b>'.sprintf('%05X', $line).'0:</b> ';
            }

            echo strtoupper($string).' ';

            if($i == 8)
            {
                echo ' '.$collection.' <br />'."\n";
                $collection = '';
                $i = 0;

                $line += 1;
            }
        }

    echo '</div>';

    exit();
}

function hex_ascii($string, $html_safe = true)//part of function get_num_pages_doc
{
    $return = '';

    $conv = array($string);
    if(strlen($string) > 2)
    {
        $conv = str_split($string, 2);
    }

    foreach($conv as $string)
    {
        $num = hexdec($string);

        $ascii = '.';
        if($num > 32)
        {   
            $ascii = $this->unichr($num);
        }

        if($html_safe AND ($num == 62 OR $num == 60))
        {
            $return .= htmlentities($ascii);
        }
        else
        {
            $return .= $ascii;
        }
    }

    return $return;
}

function unichr($intval)// part of function get_num_pages_doc
{
    return mb_convert_encoding(pack('n', $intval), 'UTF-8', 'UTF-16BE');
}

}//class login ends
			

