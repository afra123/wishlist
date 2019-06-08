<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class UserModel extends CI_Model
	{

		public function __construct()
		{
			parent::__construct();
		}

		public function register()
		{
			$name = $this->input->post('user_name');
			$email = $this->input->post('user_email');
			$password = password_hash($this->input->post('user_password'), PASSWORD_DEFAULT);

			$insert = $this->db->insert('user',['name'=>$name,'email'=>$email,'password'=>$password]);

			if($insert)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function login($email,$pass)
		{	
			$this->db->select();
			$this->db->from('user');
			$this->db->where(['email'=>$email]);
			$check = $this->db->get();
			if($check->num_rows()==1)
			{
				$password = $check->row('password');
				if(password_verify($pass, $password))
				{
					return $check->row();
				}
				else
			{
				return redirect('User_controller/login');
			}
				
			}
			else
			{
				return redirect('User_controller/login');
			}
		}

		public function wishlist()
		{
			$email = $this->session->userdata('email');
			////$pass = password_hash($this->session->userdata('password'), PASSWORD_DEFAULT);

			$this->db->select();
			$this->db->from('user');
			$this->db->where(['email'=>$email]);
			$value = $this->db->get();


			$wishlist = $this->input->post('title');
			$desc = $this->input->post('description');

			$this->db->where(['email'=>$email]);
			$update = $this->db->update('user',['wishlist_title'=>$wishlist,'wishlist_desc'=>$desc]);
			if($update)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function wishlist_insert()
		{
			$email = $this->session->userdata('email');
			//$pass = password_hash($this->session->userdata('password'), PASSWORD_DEFAULT);

			$this->db->select();
			$this->db->from('user');
			$this->db->where(['email'=>$email]);
			$value = $this->db->get();
			//echo $value->row('id');die;
			if($value->num_rows()==1)
			{
				$id = $value->row('id');
				$title = $this->input->post('title');
				$reason = $this->input->post('reason');
				$price = $this->input->post('price');
				$source = $this->input->post('source');

				$this->db->where(['email'=>$email]);
				$insert = $this->db->insert('wishlist_item',['user_id'=>$id,'name'=>$title,'reason'=>$reason,'source'=>$source,'price'=>$price]);
				if($insert)
				{
					return true;
				}
				else
				{
					return false;
				}
				
			}

		}

		public function wishlist_view($id)
		{
				$this->db->select();
				$this->db->from('wishlist_item');
				$this->db->where('user_id',$id);
				//$this->db->order_by("reason", "desc");
				$info = $this->db->get();
				return $list = $info->result();	
		}

		public function edit_wish()
		{
			$email = $this->session->userdata('email');
			//$pass = password_hash($this->session->userdata('password'), PASSWORD_DEFAULT);

			$title = $this->input->post('title');
			$desc = $this->input->post('description');

			$this->db->where(['email'=>$email]);
			$update = $this->db->update('user',['wishlist_title'=>$title,'wishlist_desc'=>$desc]);
			if($update)
			{
				return true;
			}
		}

		public function list_info($id)
		{
			$list_info = $this->db->get_where('user',['id'=>$id]);
			return $list_info->result();
		}



		public function item_info($id)
		{
			$list_info = $this->db->get_where('wishlist_item',['id'=>$id]);
			return $list_info->row();
		}

		public function edit_wish_item($id)
		{
			$title = $this->input->post('title');
			$reason = $this->input->post('reason');
			$source = $this->input->post('source');
			$price = $this->input->post('price');

			$this->db->where(['id'=>$id]);
			$update = $this->db->update('wishlist_item',['name'=>$title,'source'=>$source,'price'=>$price,'reason'=>$reason]);
			if($update)
			{
				$list_info = $this->db->get_where('wishlist_item',['id'=>$id]);
				return $list_info->row();
			}
		}

		public function delete_wish_item($id)
		{
			$this->db->where('id',$id);
			$result = $this->db->delete('wishlist_item');
			if($result)
			{
				return true;
			}
		}

		public function item_owner($id)
		{
			$this->db->select();
			$this->db->from('user');
			$this->db->where('id',$id);
			$value = $this->db->get();
			//echo $value->row('id');die;
			if($value->num_rows()==1)
			{
				return $result = $value->result();
			}
		}

		public function wishlist_count()
		{
			$email = $this->session->userdata('email');
			////$pass = password_hash($this->session->userdata('password'), PASSWORD_DEFAULT);

			$this->db->select();
			$this->db->from('user');
			$this->db->where(['email'=>$email]);
			$value = $this->db->get();
			if($value->num_rows()==1)
			{
				return $value->result();
			}
		}

		public function wishlist_list()
		{
			$this->db->select('*');
			$this->db->from('user');
			$value = $this->db->get();
			if($value->num_rows()>=0)
			{
				return $value->result();
			}
		}


	}

	



?>