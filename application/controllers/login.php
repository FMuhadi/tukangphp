<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->helper('url');
        $this->load->model('muser');
		$this->load->library('session');
    }
	public function index()
	{
		$this->load->view('login/login');
	}
	
	public function login()
	{
		$this->load->view('login/login');
	}
	
	public function loginpost($slug=false)
	{
		$users = $this->input->post('usernames');
		"wwwwwwwwwwwwww";
		$pass = md5(md5("pa".$this->input->post('password'))."ss");
		"wwwwwwwwwwwwww";
		$logininfo = $this->muser->manualquerysingle("select username,userpassword from user where username='$users'");
		if($pass==$logininfo->userpassword){
			$this->session->set_userdata('username', $logininfo->username);
			redirect('//'.base_url().'home', 'location');
		}else{
			redirect('//'.base_url().'login/login', 'location');	
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('//'.base_url().'/home/login', 'location');
		
	}
}
