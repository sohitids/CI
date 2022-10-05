<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();	
		// if(!$this->session->userdata('id'))
		// 	redirect('Login');
		
	}
		//$this->logged_in()

	//  private function logged_in(){
	// 	if(!$this->session->userdata('authenticated')){
	// 		redirect('Login');
	// 	}
	//  }
	
	public function Registration(){
 
		$this->load->library('form_validation');
        //$this->load->helper('form');

			$this->form_validation->set_rules("username","Username","required|alpha");
			$this->form_validation->set_rules("email","Email Id","required|valid_email");
			$this->form_validation->set_rules("password","Password","required|min_length[6]");
			$this->form_validation->set_rules("mobile", "Mobile", "required|max_length[11]");
			$this->form_validation->set_rules("city","City","required|alpha|max_length[11]");

			if($this->form_validation->run())
			{
				$username=$this->input->post('username');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$mobile=$this->input->post('mobile');
				$city=$this->input->post('city');	
				$this->load->model('RegisterModel');
				$this->RegisterModel->index($username,$email,$password,$mobile,$city);
			}else{
				$this->load->view('Registration');
			}
					
		}

		
		public function Login(){
		
			$this->load->library('form_validation');
	
			$this->form_validation->set_rules("email","Email","required|valid_email");
			$this->form_validation->set_rules("password","Password","required|min_length[6]");
			
			if($this->form_validation->run()){
				$email=$this->input->post('email');
				$password =$this->input->post('password');
				$this->load->model('RegisterModel');
				$validate= $this->RegisterModel->sohit($email,$password);
				if($validate){
					$this->session->set_userdata('id',$validate->id);
					$this->session->set_userdata('email',$validate->email);
					redirect('WelcomeView');
				}
				else{
					$this->session->set_flashdata('error','invalid details plesae try again' );
					redirect('Login');
				}
	
			}else{
				
				$this->load->view('Login');
	
			}	
			
		}

	//----------------------Welcome(h.f.s.body)-----------------------//
	public function WelcomeView(){
		$email=$this->session->userdata('email');	
		$this->load->view('WelcomeView',['email'=>$email]);
		
		if(!isset($_SESSION['id'])){
			redirect('Login');
		}				
	}

//---------------------UserProfile(headpart)---------------------//
public function UserProfile(){

	$this->load->library('form_validation');
	$this->load->model('RegisterModel');
	$id=$this->session->userdata('id');
	$data['user']=$this->RegisterModel->getuser($id);
	// print_r ($data);
	// exit;
	$this->load->view('UserProfile',$data);

	//$this->load->view('UserProfile');
}

//----------------------change password------------------//
public function changepassword(){

	//$password = $this->input->post('password');
	$data = $this->input->post();


	
    // now I can get account and passwd by array index
    

	// die('hr');
	         $this->load->library('form_validation');

			// $this->form_validation->set_rules("cur_pass","Curent Password","required");
			// $this->form_validation->set_rules("new_pass","New_Pass","required");
			// $this->form_validation->set_rules("renew_pass","Renew_Pass","required"); 

			$this->form_validation->set_rules("password","Curent Password","required");
			$this->form_validation->set_rules("new_pass","New_Pass","required");
			$this->form_validation->set_rules("renew_pass","Renew_Pass","required");
	     
				if($this->form_validation->run()){
					$cur_pass=$data["password"];
					$new_pass=$data["new_pass"];
					$renew_pass=$data["renew_pass"];

				$this->load->model('RegisterModel');
			    $id=$this->session->userdata('id');
				
				$pass=$this->RegisterModel->currpassword($id);
				
				
				if($pass->password == $cur_pass ){
				
				if($new_pass == $renew_pass){
					
				if($this->RegisterModel->updatepassword($new_pass,$id)){
					// echo "password update sucessfully";
				
					echo  json_encode(['status'=>'success','data'=>'password update sucessfully']);

				}else{
					// echo "failed to update password";
					echo  json_encode(['status'=>'error','data'=>'failed to update password']);

				}

				}else{
					
					echo  json_encode(['status'=>'error','data'=>'new password and  confirm passwpord not matching']);
					
				}		

				}else{
					// echo "";
					
					echo  json_encode(['status'=>'error','data'=>'sorry! current password is not matching']);
				}
				}else{
					
					echo  json_encode(['status'=>'error','data'=>validation_errors()]);
					
				
				}		
				
 }                
     public function EditProfile(){

					
			$this->load->library('form_validation');
            //$this->load->helper('form');

			$this->form_validation->set_rules("username","Username","required|alpha");
			$this->form_validation->set_rules("email","Email Id","required|valid_email");
			$this->form_validation->set_rules("mobile", "Mobile", "required|max_length[11]");
			$this->form_validation->set_rules("city","City","required|alpha|max_length[11]");
            
			if($this->form_validation->run()){
				$username=$this->input->post('username');
				$email=$this->input->post('email');
				$mobile=$this->input->post('mobile');
				$city=$this->input->post('city');	
				
				$this->load->model('RegisterModel');

				$id=$this->session->userdata('id');
	           // $data['user']=$this->RegisterModel->getuser($id)
			
				if($this->RegisterModel->profile_edit($username,$email,$mobile,$city,$id)){
					// echo "password update sucessfully";
				
					echo  json_encode(['status'=>'success','data'=>'profile update sucessfully']);

				}else{
					// echo "failed to update password";
					echo  json_encode(['status'=>'error','data'=>'failed to update profile']);

				}

			}else{
				echo  json_encode(['status'=>'error','data'=>validation_errors()]);
			}

		}

		public function UploadImage(){
			$data=$this->input->post();
			print_r($data);
			die('hi');
			$config['upload_path']   = './uploads/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$config['max_size']      = 1024;
			$this->load->library('upload', $config);
				
			if ( ! $this->upload->do_upload('image')) {
				$error = array('error' => $this->upload->display_errors()); 
				echo json_encode($error);
			}else { 
				//$data = $this->upload->data();
				$success = ['success'=>$data['image']];
				echo json_encode($success);
			}
					
		}



//------------------------logout---------------------//
					
		public function Logout(){
			$this->session->unset_userdata('id');
			$this->session->sess_destroy();
			return redirect('Login');
			}
}
?>

	 




