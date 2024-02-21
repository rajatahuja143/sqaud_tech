<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Signup_Model extends CI_Model{
	public function index($fname,$lname,$emailid,$password){
		$data=array(
			'FirstName'=>$fname,
			'LastName'=>$lname,
			'Email'=>$emailid,
			'Password'=>$password
		);
		$query=$this->db->insert('users',$data);
		if($query){
			$this->session->set_flashdata('success','Registration successfull, Now you can login.');	
			redirect('signup');
		} else {
			$this->session->set_flashdata('error','Something went wrong. Please try again.');	
			redirect('signup');	
		}
	}
	public function signin($email,$password){
		$data=array(
			'Email'=>$email,
			'Password'=>$password
		);
		$query=$this->db->where($data);
		$login=$this->db->get('users');
		if($login!=NULL){
			return $login->row();
		}  
	}
}