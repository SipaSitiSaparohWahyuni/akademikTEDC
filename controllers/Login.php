<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
	/**
	 * 
	 */
	class Login extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model("M_akademik");
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->library('user_agent');
		}

		public function index()
		{
			// var_dump($this->session->userdata('mahasiswa'));exit();
			if ($this->session->userdata('dosen') || $this->session->userdata('mahasiswa')) {
				header('location: '.base_url()."index.php");	
			}

			elseif ($this->session->userdata('admin')) {
				header('location: '.base_url()."index.php/adminPresence");	
			}

			$data['content'] = 'v_login';
			// $data["rowUser"] = $this->M_user->getUserId($id);
			$this->load->view('v_akademik', $data);
		}

		public function checkLogin()
		{
			date_default_timezone_set("Asia/Jakarta");
			setlocale(LC_ALL, 'IND');

			$data['content'] = 'v_login';
			$user_code = $this->input->post('user_code');
			$user_password = md5($this->input->post('user_password'));

			$checkQuery = $this->M_akademik->checkLogin($user_code, $user_password);
			if ($checkQuery) {
				if ($checkQuery->user_status == 'Admin') 
				{
					$session_array = array(
						'session_user_id' => $checkQuery->user_id,
						'session_user_name' => $checkQuery->user_name,
						'user_gender' => $checkQuery->user_gender,
						'user_status' => $checkQuery->user_status,
						'user_email' => $checkQuery->user_email,
						'jurusan_id' => $checkQuery->jurusan_id,
						'session_user_nidn' => $checkQuery->user_nidn,
						'user_address' => $checkQuery->user_address
					);
					$this->session->set_userdata('admin', $session_array);
					header("location: ".base_url()."index.php/adminPresence");
					
				}
				elseif ($checkQuery->user_status == 'Dosen') 
				{
					$session_array = array(
						'session_user_id' => $checkQuery->user_id,
						'session_user_name' => $checkQuery->user_name,
						'user_gender' => $checkQuery->user_gender,
						'user_status' => $checkQuery->user_status,
						'user_email' => $checkQuery->user_email,
						'jurusan_id' => $checkQuery->jurusan_id,
						'session_user_nidn' => $checkQuery->user_nidn,
						'user_address' => $checkQuery->user_address
					);
					$this->session->set_userdata('dosen', $session_array);
					header("location: ".base_url()."index.php/presence/insertPresence/".$session_array['session_user_id']);
				}
				else 
				{
					$session_array = array(
						'session_user_id' => $checkQuery->user_id,
						'session_user_name' => $checkQuery->user_name,
						'user_gender' => $checkQuery->user_gender,
						'user_status' => $checkQuery->user_status,
						'user_email' => $checkQuery->user_email,
						'class_id' => $checkQuery->class_id,
						'jurusan_id' => $checkQuery->jurusan_id,
						'session_user_nim' => $checkQuery->user_nim,
						'user_address' => $checkQuery->user_address
					);

					$this->session->set_userdata('mahasiswa', $session_array);
					header("location: ".base_url()."index.php/presence/insertPresence/".$session_array['class_id']);
				}
			}
			elseif($checkQuery == NULL){
				$this->session->set_flashdata('warning', '<h6><i class="fa fa-times sign"></i>&nbsp&nbspEmail/NIM/NIDN atau Password anda salah!</h6>');
				// var_dump($this->session->set_flashdata());exit();
				// header("location: ".base_url()."index.php/presence");
				redirect('login');
			}
		}
	}