<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('userModel','um');
	}

	public function index()
	{
		$wishlist_list = $this->um->wishlist_list();
		//echo "<pre>";print_r($wishlist_list);die;
		$this->load->view('index',['wishlist_list'=>$wishlist_list]);
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function user_login()
	{
		$email = $this->input->post('u_email');
		$pass = $this->input->post('u_password');

		//$pass = base64_encode($password);

		$result = $this->um->login($email,$pass);
		//echo "<pre>";print_r($result);die;

		if($result)
		{
			//echo $id = $result->id;die;
			$session = [
				'email' => $email,
				'password' => $pass,
				'id' => $result->id
			];
			$this->session->set_userdata($session);
			return redirect('User_controller/index');
		}
	}

	public function signup()
	{
		$this->load->view('signup');
	}

	public function register()
	{
		$name = $this->input->post('user_name');
		$email = $this->input->post('user_email');
		$password = password_hash($this->input->post('user_password'), PASSWORD_DEFAULT);
		$result = $this->um->register();
		if($result)
		{
			$session_data = [
				'username' => $name,
				'password' => $password,
				'email' => $email
			];
			$this->session->set_userdata($session_data);
			return redirect('User_controller/index');
		}
		else
		{
			echo "DSf";
		}


	}

	public function create_wishlist()
	{
		$wishlist = $this->um->wishlist_count();
		//echo "<pre>";print_r($wishlist);die;
		if($this->session->userdata('email')=='')
		{
			return redirect('User_controller/login');
		}
		else
		{
			$this->load->view('create_wishlist',['wishlist'=>$wishlist]);
		}
		
	}

	public function wishlist()
	{
		/*if($this->session->userdata('email') == "" || $this->session->userdata('password') == "")
		{
			return redirect('User_controller');
		}
		else
		{*/
			$insert = $this->um->wishlist();
			if($insert)
			{
				return redirect('User_controller/index');
			}
		/*}*/
	}

	public function wishlist_insert()
	{
		$insert = $this->um->wishlist_insert();
		if($insert)
		{
			return redirect('User_controller/index');
		}
	}

	public function wishlist_edit($id)
	{
		$list_info = $this->um->list_info($id);
		//echo "<pre>";print_r($list_info);die;
		$this->load->view('wishlist_edit',['list_info'=>$list_info]);
	}

	public function edit_wish()
	{
		$result = $this->um->edit_wish();
		if($result)
		{
			return redirect('User_controller/index');
		}

	}

	public function wishlist_view($id)
	{
		$list = $this->um->wishlist_view($id);
		$owner = $this->um->item_owner($id);
		//echo "<pre>";print_r($owner);
		$this->load->view('wishlist_view',['list'=>$list,'item_owner'=>$owner]);
	}

	public function edit_item($id)
	{
		$list_info = $this->um->item_info($id);
		//echo $list_info->id;die;
		$this->load->view('edit_item',['list_info'=>$list_info]);
	}

	public function edit_wish_item($id)
	{
		//echo $id;die;
		$result = $this->um->edit_wish_item($id);
		if($result)
		{
			return redirect('User_controller/wishlist_view/'.$result->user_id);
		}

	}

	public function delete_item($id)
	{
		$result = $this->um->delete_wish_item($id);
		$user_id = $this->session->userdata('id');
		if($result)
		{
			return redirect('User_controller/wishlist_view/'.$user_id);
		}
	}

	public function create_list()
	{
		$this->load->view('create_list');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('id');

		return redirect('User_controller');
	}

}
