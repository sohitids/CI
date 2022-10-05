<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RegisterModel extends CI_Model{
    
public function index($username,$email,$password,$mobile,$city)
	{
        $data=array('name'=>$username,'email'=>$email,'password'=>$password,'mobile'=>$mobile,'city'=>$city);

		$query=$this->db->insert('userci',$data);
		if($query){
		$this->session->set_flashdata('success','Registration successfull.');
		redirect('Registration');	
		}else{
		$this->session->set_flashdata('error','Something went wrong. Please try again.');
		redirect('Registration');
		}

	}

public function sohit($email,$password){

		$data=array
		('email'=>$email,
		'password'=>$password
		//'authenticated'=>TRUE
		);
		$query=$this->db->where($data);
		$login=$this->db->get('userci');
		if($login!==NULL){
		return $login->row();

		}
	
	}

	public function getuser($id){

		$this->db->where('id', $id);
		$query = $this->db->get('userci');
		 return $query->row();
	}

	public function currpassword($id){
	
		$query=$this->db->where(['id'=>$id])->get('userci');
		
		if($query->num_rows() > 0){
			return $query->row();
		}
	}

	public function updatepassword($new_pass,$id){
		$data=array('password'=>$new_pass);
		return $this->db->where('id',$id)->update('userci',$data);

	}

	public function profile_edit($username,$email,$mobile,$city,$id){
		$data=array(
					'name'=>$username,
					'email'=>$email,
					'mobile'=>$mobile,
					'city'=>$city
				);
	return	$sql_query=$this->db->where('id', $id)
						->update('userci', $data);
					

}
}
?>