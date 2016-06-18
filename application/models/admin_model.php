<?php
class admin_model extends CI_MODEL{
 
  
	public function get_contents()
	{
		$this->db->select('sno,mid,category,id,upload_name,sub_category,extension,status');
		$this->db->from('verification');
		$query=$this->db->get();
	    return $result=$query->result(); 
	    					 
	}
	public function get_contents_pending()
	{
		$this->db->where('status',"Pending");
		$this->db->select('sno,mid,category,id,upload_name,sub_category,extension,status');
		$this->db->from('verification');
		$query=$this->db->get();
	    return $result=$query->result(); 
	    					 
	}
	public function get_contents_success()
	{
		$this->db->where('status',"Verified");
		$this->db->select('sno,mid,category,id,upload_name,sub_category,extension,status');
		$this->db->from('verification');
		$query=$this->db->get();
	    return $result=$query->result(); 
	    					 
	}
	public function get_contents_unsuccess()
	{
		$this->db->where('status',"Not Approved");
		$this->db->select('sno,mid,category,id,upload_name,sub_category,extension,status');
		$this->db->from('verification');
		$query=$this->db->get();
	    return $result=$query->result(); 
	    					 
	}
	
	public function get_contentsByID($mid,$id)
	{
		$this->db->select('sno,mid,category,id,upload_name,sub_category,extension,status');
		$this->db->from('verification');
		$this->db->where('mid',$mid);
		$this->db->where('id',$id);
		$query=$this->db->get();
	    return $result=$query->result(); 
	}
	public function get_status($mid)//not used
	{
		$this->db->select('status');
		$this->db->from('verification');
		$this->db->where('mid',$mid);
		$query=$this->db->get();
	    return $result=$query->result(); 
	}
	  
	 public function update_status($mid,$status,$id)	   
	{
		
	   $this->db->where('mid',$mid);
	    $this->db->where('id',$id);
	   $this->db->update('verification',array('status'=>$status));
	}
	public function search_member($searchmember)
	{
		$this->db->select('sno,mid,category,id,upload_name,sub_category,extension,status');
		$this->db->from('verification');
		$this->db->like('mid',$searchmember);
		$query=$this->db->get();
		if($query->num_rows() > 0	)
		{
			return $query->result();
		}
		else
		{
			return NULL;
		}
	}
	public function search_member_pending($searchmember)
	{	$this->db->where('status',"Pending");
		$this->db->select('sno,mid,category,id,upload_name,sub_category,extension,status');
		$this->db->from('verification');
		$this->db->like('mid',$searchmember);
		$query=$this->db->get();
		if($query->num_rows() > 0	)
		{
			return $query->result();
		}
		else
		{
			return NULL;
		}
	}
		
	public function search_member_success($searchmember)
	{
		$this->db->where('status',"Verified");
		$this->db->select('sno,mid,category,id,upload_name,sub_category,extension,status');
		$this->db->from('verification');
		$this->db->like('mid',$searchmember);
		$query=$this->db->get();
		if($query->num_rows() > 0	)
		{
			return $query->result();
		}
		else
		{
			return NULL;
		}
	}
		
	public function search_member_unsuccess($searchmember)
	{
		$this->db->where('status',"Not Approved");
		$this->db->select('sno,mid,category,id,upload_name,sub_category,extension,status');
		$this->db->from('verification');
		$this->db->like('mid',$searchmember);
		$query=$this->db->get();
		if($query->num_rows() > 0	)
		{
			return $query->result();
		}
		else
		{
			return NULL;
		}
		
	}
}
