<?php 
class admin extends CI_Controller 
{
     public function __construct()
     {
		parent::__construct();
		
	 }


	public function index()
	{

        $data   = array();
        $this->load->model('admin_model');
        $data=array(
        'result'=> $this->admin_model->get_contents(),
        'pending'=>$this->admin_model->get_contents_pending(),
        'success' => $this->admin_model->get_contents_success(),
        'unsuccess'=>$this->admin_model->get_contents_unsuccess()
		);
        $this->load->view('admin/default', $data);
		
	}
	
	public function search_member()
	{
		$this->load->model('admin_model');
		$searchmember=$this->input->post('search');
		
		if($searchmember)
		{  
	        
			//$data['result']=$this->admin_model->search_member($searchmember);
			$data=array(
						'result'=>$this->admin_model->search_member($searchmember),
						'pending'=>$this->admin_model->search_member_pending($searchmember),
       					'success' => $this->admin_model->search_member_success($searchmember),
        				'unsuccess'=>$this->admin_model->search_member_unsuccess($searchmember)
						);
			//$data['link']='';
			$this->load->view('admin/default', $data);
		}
        else {//NULL case
		
			$this->load->view('admin/default',array('result'=>NULL,'pending'=>NULL,'success'=>NULL,'unsuccess'=>NULL));
			
		}
	}
	
	public function update_status_request($mid,$id)//this fn fetch status of mid n redirects to
	{//id is the roll no in case of student,alumini n professional body no in case of professional body and NULL in Foreigh author
	   //$mid is fetched via url provided in default.php 
        $this->load->model('admin_model');
		//echo $mid;
		/*if($MEMBER_ID!=null && (intval($MEMBER_ID) > 0) )
		{
			$data['result'] = $this->model_admin->get_contentsByID($MEMBER_ID);
			if(!empty($data['result']))
			{
				$data['result'] = $data['result'][0];
			}
	   /* } else{
			$data['result'] = null;
		}*/
	$data['result_object'] = $this->admin_model->get_contentsByID($mid,$id);
	$data['result']=$data['result_object'][0];
		$this->load->view('admin/update_form',$data);
	}
	
	public function update_status_submit()
	{  
	 $mid=$this->input->post('mid');

	
		$status=$this->input->post('verify');
		$id=$this->input->post('id');
		//echo $status,$id;
		$this->load->model('admin_model');
		$this->admin_model->update_status($mid,$status,$id);
		$this->index();

	 }
}