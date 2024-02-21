<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signin extends CI_Controller{
	public function index(){
		//Validation for login form
		$this->form_validation->set_rules('emailid','Email id','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()){
			$email=$this->input->post('emailid');
			$password=$this->input->post('password');
			$this->load->model('Signup_Model');
			$validate=$this->Signup_Model->signin($email,$password);
			
			if($validate){
				$this->session->set_userdata('uid',$validate->id);	
				$this->session->set_userdata('fname',$validate->FirstName);	
				// var_dump($_SESSION);
				// 	exit;
				redirect('Welcome/index');
			} else {
				$this->session->set_flashdata('error','Invalid login details.Please try again.');
				redirect('signin');
			}
		} else{
			$this->load->view('login/signin');	
		}
	}

	public function logout(){
		$this->session->unset_userdata('uid');
		$this->session->sess_destroy();
		return redirect('signin');
	}
}