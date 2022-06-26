<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model','HM');
	    $this->load->library('form_validation'); 
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function forgetpw()
	{
		$this->load->view('forgetpw');
	}

	public function web_login(){
		$result = $this->HM->fetch_condrecordwithfield('users',array('email' => $_POST['username'],'password' => $_POST['password']),'*');
		$result1 = $this->HM->fetch_condrecordwithfield('users',array('username' => $_POST['username'],'password' => $_POST['password']),'*');
    	if (!empty($result) ) {
            $this->session->set_userdata('user_setdata',$result);
    		redirect('admin');
    	}else if (!empty($result1) ) {
            $this->session->set_userdata('user_setdata',$result1);
    		redirect('admin');
    	}else {
    		$this->session->set_flashdata('Error','Please Enter Valid Username And Password');
    		redirect('login');
    	}
	}

	public function web_singup(){
		$post = $this->input->post();
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'username' => $this->input->post('username'),
			'email'    => $this->input->post('email'),
			'password'		=> $this->input->post('password'),
		);

		$result1 = $this->HM->fetch_condrecordwithfield('users',array('email' => $data['email']),'*');
		$result2 = $this->HM->fetch_condrecordwithfield('users',array('username' => $data['username']),'*');
    	if (empty($result1) and empty($result2)) {
		    if($_FILES["picture"]["size"] >0 ){  
	            $picture = '';
	            $tmpFilePath = $_FILES['picture']['tmp_name'];
	            $image_file_type = pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION);
	            $newFilePath = 'assets/upload/profile'.time().'.'.$image_file_type;
	            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
	              $data['image'] = $newFilePath;  
	            }
	        }
			//unset($post['inputPass1']);
			$result = $this->HM->insert_data('users',$data); 
	        if(!empty($result)){ 
	          $this->session->set_flashdata('Success', 'Account Create Successfully.');
	          //redirect($_SERVER['HTTP_REFERER']); 
	          redirect('login');   
	        }else{
	           $this->session->set_flashdata('Error', 'Account Create  Failed.');
	           redirect($_SERVER['HTTP_REFERER']);
			}

		}else{
    		$this->session->set_flashdata('Error','Email or username already exist');
    		 redirect($_SERVER['HTTP_REFERER']); 
    	}
	}

	public function check_login(){
         if (empty($this->session->userdata('user_setdata'))) {
             $this->session->sess_destroy();
             redirect('login');
         }
	}

	public function logout(){
		$this->session->unset_userdata('user_setdata');
		redirect(base_url('login'));
	}


}
