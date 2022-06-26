<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model','HM');
	    $this->load->library('form_validation'); 
	}

	public function index()
	{   
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
		$this->load->view('admin/dashboard');
	}

	public function check_login(){
         if (empty($this->session->userdata('user_setdata'))) {
             $this->session->sess_destroy();
             redirect('login');
         }
	}

	public function admin()
	{   
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
		$this->load->view('admin/dashboard',$result);
	}

	public function vendors()
	{
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
		$this->load->view('admin/vendors',$result);
	}

	public function profile()
	{
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
		$this->load->view('admin/profile',$result);
	}

	public function changePassword(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$data = array(
				'password' => $this->input->post('new_password'),
			);

			$result1 = $this->HM->fetch_condrecordwithfield('users',array('email' => $this->input->post('email') ,'id' => $this->input->post('ids') , 'password' => $this->input->post('old_password') ),'*');
	    	if (!empty($result1)) {
				$result = $this->HM->update_data('users',$data,array('id' => $this->input->post('ids'))); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Change Password Successfully.');
		          //redirect($_SERVER['HTTP_REFERER']); 
		          redirect(base_url('change-password')); 
		        }else{
		           $this->session->set_flashdata('Error', 'Change Password  Failed.');
		           redirect(base_url('change-password')); 
				}

			}else{
	    		$this->session->set_flashdata('Error','Email not exist');
	    		 redirect(base_url('change-password')); 
	    	}

		}else{
			$userData = $this->session->userdata('user_setdata');
            $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
		    $this->load->view('admin/change-password',$result);
		}
		
	}

	public function users(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'username' => $this->input->post('username'),
				'mobile' => $this->input->post('mobile'),
				'email'    => $this->input->post('email'),
				'password'    => $this->input->post('password'),
				'type' => $this->input->post('type'),

				// 'supplier_all_data' => $this->input->post('supplier_all_data'),
				// 'supplier_modify' => $this->input->post('supplier_modify'),
				// 'item_group_all_data' => $this->input->post('item_group_all_data'),
				// 'item_group_modify' => $this->input->post('item_group_modify'),
				// 'units_all_data'    => $this->input->post('units_all_data'),
				// 'units_modify'    => $this->input->post('units_modify'),
				// 'items_all_data' => $this->input->post('items_all_data'),
				// 'items_modify' => $this->input->post('items_modify'),
				// 'process_all_data' => $this->input->post('process_all_data'),
				// 'process_modify' => $this->input->post('process_modify'),
				// 'bom_all_data' => $this->input->post('bom_all_data'),
				// 'bom_modify'    => $this->input->post('bom_modify'),

				// 'purchase_all_data'    => $this->input->post('purchase_all_data'),
				// 'purchase_modify' => $this->input->post('purchase_modify'),
				// 'jobwork_inward_all_data'    => $this->input->post('jobwork_inward_all_data'),
				// 'jobwork_inward_modify' => $this->input->post('jobwork_inward_modify'),
				// 'work_order_all_data'    => $this->input->post('work_order_all_data'),
				// 'work_order_modify' => $this->input->post('work_order_modify'),
				// 'process_opening_all_data'    => $this->input->post('process_opening_all_data'),
				// 'process_opening_modify' => $this->input->post('process_opening_modify'),
				// 'material_issue_all_data'    => $this->input->post('material_issue_all_data'),
				// 'goods_receipt_note_all_data' => $this->input->post('goods_receipt_note_all_data'),
				// 'receipt_all_data'    => $this->input->post('receipt_all_data'),
				// 'goods_receipt_note_modify' => $this->input->post('goods_receipt_note_modify'),
				// 'dispatch_all_data'    => $this->input->post('dispatch_all_data'),
				// 'dispatch_modify' => $this->input->post('dispatch_modify'),
				// 'jobwork_all_data'    => $this->input->post('jobwork_all_data'),
				// 'jobwork_modify' => $this->input->post('jobwork_modify'),
				// 'material_cus_all_data'    => $this->input->post('material_cus_all_data'),
				// 'material_cus_modify' => $this->input->post('material_cus_modify'),

				// 'vendor_all_data'    => $this->input->post('vendor_all_data'),
				// 'vendor_modify' => $this->input->post('vendor_modify'),
				// 'stock_all_data'    => $this->input->post('stock_all_data'),
				// 'stock_modify' => $this->input->post('stock_modify'),
				// 'vendor_stock_all_data'    => $this->input->post('vendor_stock_all_data'),
				// 'vendor_stock_modify' => $this->input->post('vendor_stock_modify'),
				// 'mis_all_data'    => $this->input->post('mis_all_data'),
				// 'mis_modify' => $this->input->post('mis_modify'),


			);
			if($_FILES["picture"]["size"] >0 ){  
	            $picture = '';
	            $tmpFilePath = $_FILES['picture']['tmp_name'];
	            $image_file_type = pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION);
	            $newFilePath = 'assets/upload/profile'.time().'.'.$image_file_type;
	            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
	              $data['image'] = $newFilePath;  
	            }
	        }
            if(isset($post['title_id']) and $post['title_id'] !== "" ){
	        	unset($data['password']);
                $result = $this->HM->update_data('users',$data ,array('id' => $post['title_id'] ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		          redirect('users');   
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
		           redirect('users');
				} 
	        }else{
	        	$result1 = $this->HM->fetch_condrecordwithfield('users',array('email' => $data['email']),'*');
				$result2 = $this->HM->fetch_condrecordwithfield('users',array('username' => $data['username']),'*');
		    	if (empty($result1) and empty($result2)) {
			        $result = $this->HM->insert_data('users',$data); 
			        if(!empty($result)){ 
			          $this->session->set_flashdata('Success', 'Create  Successfully.');
			          redirect('users');   
			        }else{
			           $this->session->set_flashdata('Error', 'Create  Failed.');
			           redirect('users');
					}

				}else{
					 
		    		$this->session->set_flashdata('Error','Email or username already exist');
		    		 redirect($_SERVER['users']); 
		    	}
	        }

		}else{
			$userData = $this->session->userdata('user_setdata');
            $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
            $result['users'] = $this->HM->fetch_record_orderby('users', 'id');
		    $this->load->view('admin/users',$result);
		}
	}

	public function profileEdit($id)
	{	
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
		$this->load->view('admin/profile-edit',$result);
	}

	public function web_edit_profile(){
		$post = $this->input->post();
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email'    => $this->input->post('email'),
		);

		$result1 = $this->HM->fetch_condrecordwithfield('users',array('email' => $data['email']),'*');
    	if (!empty($result1)) {
		    if($_FILES["picture"]["size"] >0 ){  
	            $picture = '';
	            $tmpFilePath = $_FILES['picture']['tmp_name'];
	            $image_file_type = pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION);
	            $newFilePath = 'assets/upload/profile'.time().'.'.$image_file_type;
	            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
	              $data['image'] = $newFilePath;  
	            }
	        }
			$result = $this->HM->update_data('users',$data,array('id' => $this->input->post('ids'))); 
	        if(!empty($result)){ 
	          $this->session->set_flashdata('Success', 'Update Successfully.');
	          //redirect($_SERVER['HTTP_REFERER']); 
	          redirect(base_url('profile')); 
	        }else{
	           $this->session->set_flashdata('Error', 'Update  Failed.');
	           redirect($_SERVER['HTTP_REFERER']);
			}

		}else{
    		$this->session->set_flashdata('Error','Email or username already exist');
    		 redirect($_SERVER['HTTP_REFERER']); 
    	}
	}

	public function supplier(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
			$data = array(
				'ledger' => $this->input->post('ledger'),
				'group' => $this->input->post('group'),
				'desktop_code' => $this->input->post('desktop_code'),
				'name'    => $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'vendor'		=> $this->input->post('vendor'),
                'partner_login_id'		=> $this->input->post('partner_login_id'),
				'login_password'		=> $this->input->post('login_password'),
				'address' => $this->input->post('address'),
				'city'    => $this->input->post('city'),
				'pincode'		=> $this->input->post('pincode'),
				'state'		=> $this->input->post('state'),

			);
			/*if($_FILES["picture"]["size"] >0 ){  
	            $picture = '';
	            $tmpFilePath = $_FILES['picture']['tmp_name'];
	            $image_file_type = pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION);
	            $newFilePath = 'assets/upload/profile'.time().'.'.$image_file_type;
	            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
	              $data['image'] = $newFilePath;  
	            }
	        }*/
            
            if(isset($post['title_id']) and $post['title_id'] !== "" ){
                $result = $this->HM->update_data('suppliers',$data ,array('id' => $post['title_id'] ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{
                $result1 = $this->HM->fetch_condrecordwithfield('suppliers',array('email' => $data['email']),'*');
		    	if (empty($result1) ) {			    
					$result = $this->HM->insert_data('suppliers',$data); 
			        if(!empty($result)){ 
			          $this->session->set_flashdata('Success', 'Create Successfully.');
			        }else{
			           $this->session->set_flashdata('Error', 'Create  Failed.');
					}
				}else{
		    		$this->session->set_flashdata('Error','Email already exist');
		    		 
		    	}
            }
			redirect('supplier');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
   		$this->load->view('admin/supplier',$result);
	}

	public function add_supplier_master(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
   		$this->load->view('admin/add-supplier-master',$result);
	}

	public function edit_supplier_master(){
		$this->check_login();
		$id=(isset($_GET['id']))?$_GET['id']:"";
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['suppliers'] = $this->HM->fetch_condrecordwithfield('suppliers',array('id'=> $id), '*');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
   		$this->load->view('admin/edit-supplier-master',$result);
	}

    public function item_group(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
			$data = array(
				'group_name' => $this->input->post('group_name'),
				'under' => $this->input->post('under'),
			);
            
            if(isset($post['title_id']) and $post['title_id'] !== "" ){
                $result = $this->HM->update_data('item_group_master',$data ,array('id' => $post['title_id'] ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{                		    
				$result = $this->HM->insert_data('item_group_master',$data); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Create Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Create  Failed.');
				}
            }
			redirect('item-group');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['group_master'] = $this->HM->fetch_record_orderby('item_group_master','id');
   		$this->load->view('admin/item-group',$result);
	}

	public function units(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
			$data = array(
				'name' => $this->input->post('name'),
				'symbol' => $this->input->post('symbol'),
				'decimal' => $this->input->post('decimal'),
			);
            
            if(isset($post['title_id']) and $post['title_id'] !== "" ){
                $result = $this->HM->update_data('units_master',$data ,array('id' => $post['title_id'] ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{                		    
				$result = $this->HM->insert_data('units_master',$data); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Create Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Create  Failed.');
				}
            }
			redirect('units');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['units_master'] = $this->HM->fetch_record_orderby('units_master','id');
   		$this->load->view('admin/units',$result);
	}

	public function item_master(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
            $ids=$post['title_id']; 
            unset($post['title_id']);
			/*$data = array(
				'group_name' => $this->input->post('group_name'),
				'under' => $this->input->post('under'),
			);*/
            
            if(isset($ids) and $ids !== "" ){

                $result = $this->HM->update_data('item_master',$post ,array('id' => $ids ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{                		    
				$result = $this->HM->insert_data('item_master',$post); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Create Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Create  Failed.');
				}
            }
			redirect('item-master');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['group_master'] = $this->HM->fetch_record_orderby('item_group_master','id');
        $result['units_master'] = $this->HM->fetch_record_orderby('units_master','id');
   		$this->load->view('admin/item-master',$result);
	}

	public function process_master(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
            $ids=$post['title_id']; 
            unset($post['title_id']);
			/*$data = array(
				'group_name' => $this->input->post('group_name'),
				'under' => $this->input->post('under'),
			);*/
            
            if(isset($ids) and $ids !== "" ){

                $result = $this->HM->update_data('process_master',$post ,array('id' => $ids ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{                		    
				$result = $this->HM->insert_data('process_master',$post); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Create Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Create  Failed.');
				}
            }
			redirect('process-master');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        //$result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        //$result['group_master'] = $this->HM->fetch_record_orderby('item_group_master','id');
        //$result['units_master'] = $this->HM->fetch_record_orderby('units_master','id');
        $result['process_master'] = $this->HM->fetch_record_orderby('process_master','id');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
   		$this->load->view('admin/process-master',$result);
	}

	public function bom(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
            $ids=$post['title_id']; 
            unset($post['title_id']);
            
			
            if(isset($ids) and $ids !== "" ){

                $result = $this->HM->update_data('bom_master',$post ,array('id' => $ids ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{                		    
				$result = $this->HM->insert_data('bom_master',$post); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Create Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Create  Failed.');
				}
            }
			redirect('bom-master');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['bom_master'] = $this->HM->fetch_record_orderby('bom_master','id');
   		$this->load->view('admin/bom-master',$result);
	}

	/**********purchase************/

	public function purchase(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
            $ids=$post['title_id']; 
            unset($post['title_id']);
            //json_encode($data)
            //json_decode($jsonString) 
            $post['item_name']=json_encode($post['item_name']);
            $post['weight']=json_encode($post['weight']);
            $post['pcs']=json_encode($post['pcs']);
            $post['rate']=json_encode($post['rate']);
            $post['discount']=json_encode($post['discount']);
            $post['amount']=json_encode($post['amount']);
    
            if(isset($ids) and $ids !== "" ){

                $result = $this->HM->update_data('purchase',$post ,array('id' => $ids ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{                		    
				$result = $this->HM->insert_data('purchase',$post); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Create Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Create  Failed.');
				}
            }
			redirect('admin/purchase');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['purchase'] = $this->HM->fetch_record_orderby('purchase','id');
   		$this->load->view('admin/purchase',$result);
	}

	public function add_purchase(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['suppliers'] = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('vendor'=> 'No'), '*'); 
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
   		$this->load->view('admin/add-purchase',$result);
	}

    public function edit_purchase(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        $result['suppliers'] = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('vendor'=> 'No'), '*'); 
        $result['purchase'] = $this->HM->fetch_condrecordwithfield('purchase',array('id'=> $_GET['id']), '*');

   		$this->load->view('admin/edit-purchase',$result);
	}

    /*****jobwork Inward******/
	public function jobwork_inward(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
            $ids=$post['title_id']; 
            unset($post['title_id']);
            //json_encode($data)
            //json_decode($jsonString) 
            $post['item_name']=json_encode($post['item_name']);
            $post['process']=json_encode($post['process']);
            $post['pcs']=json_encode($post['pcs']);
            $post['final_item_code']=json_encode($post['final_item_code']);
    
            if(isset($ids) and $ids !== "" ){
                $result = $this->HM->update_data('jobwork_inward',$post ,array('id' => $ids ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{                		    
				$result = $this->HM->insert_data('jobwork_inward',$post); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Create Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Create  Failed.');
				}
            }
			redirect('admin/jobwork_inward');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['purchase'] = $this->HM->fetch_record_orderby('purchase','id');
        $result['jobwork_inward'] = $this->HM->fetch_record_orderby('jobwork_inward','id');
   		$this->load->view('admin/jobwork-inward',$result);
	}

	public function add_jobwork_inward(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        $result['suppliers'] = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('vendor'=> 'Yes'), '*');
        $result['process_master'] = $this->HM->fetch_record_orderby('process_master','id');
   		$this->load->view('admin/add-jobwork-inward',$result);
	}

    public function edit_jobwork_inward(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        $result['suppliers'] = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('vendor'=> 'Yes'), '*');
        $result['process_master'] = $this->HM->fetch_record_orderby('process_master','id');
        $result['jobwork_inward'] = $this->HM->fetch_condrecordwithfield('jobwork_inward',array('id'=> $_GET['id']), '*');
   		$this->load->view('admin/edit-jobwork-inward',$result);
	}

    /*************workorder************/
	public function workorder(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
            $ids=$post['title_id']; 
            unset($post['title_id']);
            //json_encode($data)
            //json_decode($jsonString) 
            $post['item_name']=json_encode($post['item_name']);
            $post['process1']=json_encode($post['process1']);
            $post['rate']=json_encode($post['rate']);
    
            if(isset($ids) and $ids !== "" ){
                $result = $this->HM->update_data('workorder',$post ,array('id' => $ids ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{                		    
				$result = $this->HM->insert_data('workorder',$post); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Create Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Create  Failed.');
				}
            }
			redirect('admin/workorder');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['purchase'] = $this->HM->fetch_record_orderby('purchase','id');
        $result['jobwork_inward'] = $this->HM->fetch_record_orderby('jobwork_inward','id');
        $result['workorder'] = $this->HM->fetch_record_orderby('workorder','id');
   		$this->load->view('admin/workorder',$result);
	}

	public function add_workorder(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        $result['suppliers'] = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('vendor'=> 'Yes'), '*');
        $result['process_master'] = $this->HM->fetch_record_orderby('process_master','id');
   		$this->load->view('admin/add-workorder',$result);
	}

    public function edit_workorder(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['suppliers'] = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('vendor'=> 'Yes'), '*');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        $result['process_master'] = $this->HM->fetch_record_orderby('process_master','id');
        $result['workorder'] = $this->HM->fetch_condrecordwithfield('workorder',array('id'=> $_GET['id']), '*');
   		$this->load->view('admin/edit-workorder',$result);
	}


	/****************process opening****************/
	public function process_opening(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
            $ids=$post['title_id']; 
            unset($post['title_id']);
            //json_encode($data)
            //json_decode($jsonString) 
            $post['item_name']=json_encode($post['item_name']);
            $post['bundle_no']=json_encode($post['bundle_no']);
            $post['process']=json_encode($post['process']);
            $post['final_item_code']=json_encode($post['final_item_code']);
            $post['pcs']=json_encode($post['pcs']);
            $post['qty']=json_encode($post['qty']);
    
            if(isset($ids) and $ids !== "" ){
                $result = $this->HM->update_data('process_opening',$post ,array('id' => $ids ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{                		    
				$result = $this->HM->insert_data('process_opening',$post); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Create Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Create  Failed.');
				}
            }
			redirect('admin/process_opening');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['purchase'] = $this->HM->fetch_record_orderby('purchase','id');
        $result['jobwork_inward'] = $this->HM->fetch_record_orderby('jobwork_inward','id');
        $result['workorder'] = $this->HM->fetch_record_orderby('workorder','id');
        $result['process_opening'] = $this->HM->fetch_record_orderby('process_opening','id');
   		$this->load->view('admin/process-opening',$result);
	}

	public function add_process_opening(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        $result['process_master'] = $this->HM->fetch_record_orderby('process_master','id');
   		$this->load->view('admin/add-process-opening',$result);
	}

    public function edit_process_opening(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        $result['process_master'] = $this->HM->fetch_record_orderby('process_master','id');
        $result['workorder'] = $this->HM->fetch_record_orderby('workorder','id');
        $result['process_opening'] = $this->HM->fetch_condrecordwithfield('process_opening',array('id'=> $_GET['id']), '*');

   		$this->load->view('admin/edit-process-opening',$result);
	}

    /****************Material Issue****************/
	public function material_issue(){
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
            $ids=$post['title_id']; 
            unset($post['title_id']);
            //json_encode($data)
            //json_decode($jsonString) 
            $post['item_name']=json_encode($post['item_name']);
            $post['bundle_no']=json_encode($post['bundle_no']);
            $post['process']=json_encode($post['process']);
            $post['final_item_code']=json_encode($post['final_item_code']);
            $post['pcs']=json_encode($post['pcs']);
            $post['qty']=json_encode($post['qty']);
    
            if(isset($ids) and $ids !== "" ){
                $result = $this->HM->update_data('material_issue',$post ,array('id' => $ids ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{                		    
				$result = $this->HM->insert_data('material_issue',$post); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Create Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Create  Failed.');
				}
            }
			redirect('admin/material_issue');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['purchase'] = $this->HM->fetch_record_orderby('purchase','id');
        $result['jobwork_inward'] = $this->HM->fetch_record_orderby('jobwork_inward','id');
        $result['workorder'] = $this->HM->fetch_record_orderby('workorder','id');
        $result['process_opening'] = $this->HM->fetch_record_orderby('process_opening','id');
        $result['material_issue'] = $this->HM->fetch_record_orderby('material_issue','id');
   		$this->load->view('admin/material-issue',$result);
	}

	public function add_material_issue(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        $result['suppliers'] = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('vendor'=> 'Yes'), '*');
        $result['process_master'] = $this->HM->fetch_record_orderby('process_master','id');
   		$this->load->view('admin/add-material-issue',$result);
	}

    public function edit_material_issue(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        $result['suppliers'] = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('vendor'=> 'Yes'), '*');
        $result['process_master'] = $this->HM->fetch_record_orderby('process_master','id');
        $result['workorder'] = $this->HM->fetch_record_orderby('workorder','id');
        //$result['process_opening'] = $this->HM->fetch_condrecordwithfield('process_opening',array('id'=> $_GET['id']), '*');
        $result['material_issue'] = $this->HM->fetch_condrecordwithfield('material_issue',array('id'=> $_GET['id']), '*');
   		$this->load->view('admin/edit-material-issue',$result);
	}

	/****************Dispatch Schedule****************/
	public function dispatch_schedule(){  
		$this->check_login();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();
            $ids=$post['title_id']; 
            unset($post['title_id']);
            //json_encode($data)
            //json_decode($jsonString) 
            $post['item_name']=json_encode($post['item_name']);
            $post['bundle_no']=json_encode($post['bundle_no']);
            $post['process']=json_encode($post['process']);
            $post['final_item_code']=json_encode($post['final_item_code']);
            $post['pcs']=json_encode($post['pcs']);
            $post['qty']=json_encode($post['qty']);
    
            if(isset($ids) and $ids !== "" ){
                $result = $this->HM->update_data('material_issue',$post ,array('id' => $ids ) );  
                if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Update Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Update Failed.');
				} 

            }else{                		    
				$result = $this->HM->insert_data('material_issue',$post); 
		        if(!empty($result)){ 
		          $this->session->set_flashdata('Success', 'Create Successfully.');
		        }else{
		           $this->session->set_flashdata('Error', 'Create  Failed.');
				}
            }
			redirect('admin/material_issue');
            
		}
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['purchase'] = $this->HM->fetch_record_orderby('purchase','id');
        $result['jobwork_inward'] = $this->HM->fetch_record_orderby('jobwork_inward','id');
        $result['workorder'] = $this->HM->fetch_record_orderby('workorder','id');
        $result['process_opening'] = $this->HM->fetch_record_orderby('process_opening','id');
        $result['material_issue'] = $this->HM->fetch_record_orderby('material_issue','id');
   		$this->load->view('admin/material-issue',$result);
	}

	public function add_dispatch_schedule(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        $result['suppliers'] = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('vendor'=> 'Yes'), '*');
        $result['process_master'] = $this->HM->fetch_record_orderby('process_master','id');
   		$this->load->view('admin/add-material-issue',$result);
	}

    public function edit_dispatch_schedule(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        $result['suppliers'] = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('vendor'=> 'Yes'), '*');
        $result['process_master'] = $this->HM->fetch_record_orderby('process_master','id');
        $result['workorder'] = $this->HM->fetch_record_orderby('workorder','id');
        //$result['process_opening'] = $this->HM->fetch_condrecordwithfield('process_opening',array('id'=> $_GET['id']), '*');
        $result['material_issue'] = $this->HM->fetch_condrecordwithfield('material_issue',array('id'=> $_GET['id']), '*');
   		$this->load->view('admin/edit-material-issue',$result);
	}

	//add grn
	public function grnlist(){
		$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        //$result['suppliers'] = $this->HM->fetch_record_orderby('suppliers','id');
        //$result['suppliers'] = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('vendor'=> 'Yes'), '*');
        $result['purchase'] = $this->HM->fetch_record_orderby('purchase','id');
        //$result['workorder'] = $this->HM->fetch_record_orderby('workorder','id');
        //$result['process_opening'] = $this->HM->fetch_condrecordwithfield('process_opening',array('id'=> $_GET['id']), '*');
        //$result['material_issue'] = $this->HM->fetch_condrecordwithfield('material_issue',array('id'=> $_GET['id']), '*');
   		$this->load->view('admin/grnlist',$result);
	}


    function deleteData(){
        $this->db->delete($_GET['table'],array('id'=>$_GET['id']));
        $this->session->set_flashdata('Success', 'Data Deleted successfully.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function fetch_user_id(){
    	$id = $this->input->post('id');
		$data = $this->HM->fetch_allrecord_wherecondition('users','id',array('id'=> $id), '*'); 
		echo json_encode($data);  
    }

    function fetch_supplier_by_id(){
    	$id = $this->input->post('id');
		$data = $this->HM->fetch_allrecord_wherecondition('suppliers','id',array('id'=> $id), '*'); 
		echo json_encode($data);
    }

    function fetch_item_group__by_id(){
    	$id = $this->input->post('id');
		$data = $this->HM->fetch_allrecord_wherecondition('item_group_master','id',array('id'=> $id), '*'); 
		echo json_encode($data);
    }

    function fetch_units_by_id(){
    	$id = $this->input->post('id');
		$data = $this->HM->fetch_allrecord_wherecondition('units_master','id',array('id'=> $id), '*'); 
		echo json_encode($data);
    }

    function fetch_item_master_by_id(){
    	$id = $this->input->post('id');
		$data = $this->HM->fetch_allrecord_wherecondition('item_master','id',array('id'=> $id), '*'); 
		echo json_encode($data);
    }
    function fetch_process_master_by_id(){
    	$id = $this->input->post('id');
		$data = $this->HM->fetch_allrecord_wherecondition('process_master','id',array('id'=> $id), '*'); 
		echo json_encode($data);
    }
    function fetch_bom_master_by_id(){
    	$id = $this->input->post('id');
		$data = $this->HM->fetch_allrecord_wherecondition('bom_master','id',array('id'=> $id), '*'); 
		echo json_encode($data);

    } 
    function fetch_item_master_by_code(){
    	$id = $this->input->post('id');
		$data = $this->HM->fetch_allrecord_wherecondition('item_master','id',"code LIKE '%$id%'", '*'); 
		echo json_encode($data);
		//echo "hello";
    }

	function vendor_dispatch_schedule(){
    	$this->check_login();
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['purchase'] = $this->HM->fetch_record_orderby('purchase','id');
        $result['jobwork_inward'] = $this->HM->fetch_record_orderby('jobwork_inward','id');
        $result['workorder'] = $this->HM->fetch_record_orderby('workorder','id');
        $result['process_opening'] = $this->HM->fetch_record_orderby('process_opening','id');
        $result['material_issue'] = $this->HM->fetch_record_orderby('material_issue','id');
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        
   		$this->load->view('admin/vendor_dispatch_schedule',$result);
    }
	function stock_summary(){
    	$this->check_login();
	
		$userData = $this->session->userdata('user_setdata');
		$result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['purchase'] = $this->HM->fetch_record_orderby('purchase','id');
        $result['jobwork_inward'] = $this->HM->fetch_record_orderby('jobwork_inward','id');
        $result['workorder'] = $this->HM->fetch_record_orderby('workorder','id');
        $result['process_opening'] = $this->HM->fetch_record_orderby('process_opening','id');
        $result['material_issue'] = $this->HM->fetch_record_orderby('material_issue','id');
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
   		$this->load->view('admin/stock_summary',$result);
    }
	function vendor_stock_summary(){
    	$this->check_login();
	
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        $result['item_master'] = $this->HM->fetch_record_orderby('item_master','id');
        $result['purchase'] = $this->HM->fetch_record_orderby('purchase','id');
        $result['jobwork_inward'] = $this->HM->fetch_record_orderby('jobwork_inward','id');
        $result['workorder'] = $this->HM->fetch_record_orderby('workorder','id');
        $result['process_opening'] = $this->HM->fetch_record_orderby('process_opening','id');
        $result['material_issue'] = $this->HM->fetch_record_orderby('material_issue','id');
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
   		$this->load->view('admin/vendor_stock_summary',$result);
    }
	function mis(){
    	$this->check_login();
	
		$userData = $this->session->userdata('user_setdata');
        $result['admindata'] = $this->HM->fetch_condrecordwithfield('users',array('id'=> $userData['id']), '*');
        
   		$this->load->view('admin/mis',$result);
    }

}
