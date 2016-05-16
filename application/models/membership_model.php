<!--applications/models/model_users.php -->
<?php
	class membership_model extends CI_Model{
		function __construct()
		{
			parent::__construct();//calls the model constructor
		}
		function validate()
		{
			$this->db->where('name',$this->input->post('name'));
			$this->db->where('password',md5($this->input->post('password')));
			//$this->db->where('password',$this->input->post('password'));
			$query=$this->db->get('form');//table name//select query
			if($query->num_rows()==1)
			return TRUE;
		}
		function create_member()
		{
			$name=$this->input->post('name');
			$insert_data=array(
			'email'=>$this->input->post('email'),
			'name'=>$this->input->post('name'),
			//'password'=>$this->input->post('password'),
			'password'=>md5($this->input->post('password')),//md5()
			//'semester'=>$this->input->post('semester')
			);
			$insert=$this->db->insert('form',$insert_data);//(table name,array)insert query returns true or false;
			return $insert;
			
		}
		function check_if_email_exists($requested_email)
		{
			
			$this->db->where('email',$requested_email);
			$result=$this->db->get('form');
			
			if($result->num_rows()>0)
			return FALSE;//username taken
			else 
				return TRUE;
						}
		function getInfo($emailverified)
		{
				$this->db->select('mid,name,email');
			$this->db->where('email',$emailverified);
			$query=$this->db->get('form');
			 
			//$query=$this->db->query('select * from form where email=\'pawan.deep55@gmail.com\'');//returns object
			if($query->num_rows() > 0)
			{
			return $query->result();//return array of objects
			}
			else {
				return NULL;
			}
		}
			function getupload_info($emailverified)
			{
				$this->db->select('mid,uploadV');
				$this->db->where('email',$emailverified);
			$query=$this->db->get('form');
			/*foreach ($query as $key ) {
				$key->mid
			}*/
			return $query->result();
				
			}
			function upload_update($emailverified,$newversion,$newname,$ext,$pagecount)//1 less
			{
				$data=array('uploadV'=>$newversion,'uploadName'=>$newname,'extension'=>$ext,'pagecount'=>$pagecount);
				$this->db->where('email',$emailverified);
				$this->db->update('form',$data);
				
			}
		/*
		function getUsers()
		{
			$query=$this->db->query('select * from form');//returns object
			if($query->num_rows() > 0)
			return $query->result();//return array of objects
			else {
				return NULL;
			}
		}*/
	} //model class ends here