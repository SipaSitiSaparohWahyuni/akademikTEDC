<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');error_reporting(E_ERROR | E_PARSE);

	class Presence extends CI_Controller {
		// Construct ini dapat juga berfungsi untuk memanggil pertama helper atau library yang akan digunakan
		public function __construct()
		{
			parent::__construct();
			$this->load->model("M_akademik");
			$this->load->library('form_validation');
			$this->load->library('session');
		}

		public function insertPresence($code_id)
		{
			date_default_timezone_set('Asia/Jakarta');
			
			if (($_SESSION['mahasiswa'] || $_SESSION['dosen']) == FALSE) {
				if($this->session->userdata('admin')) 
				{
					header("location: ".base_url()."index.php/adminPresence");
				}
				else
				{
					header("location: ".base_url()."index.php/login");
				}
			}

			elseif ($_SESSION['mahasiswa']!= NULL)
			{
				$list_jadwal = $this->M_akademik->getJadwal($code_id, 0);
				$user_id = $_SESSION['mahasiswa']['session_user_id'];
			}
			elseif($_SESSION['dosen']!= NUll)
			{
				$list_jadwal = $this->M_akademik->getJadwal(0, $code_id);
				$user_id = $_SESSION['dosen']['session_user_id'];
			}

			foreach ($list_jadwal->result() as $rowJadwal) {
				$countPresence = $this->M_akademik->checkPresence($rowJadwal->jadwal_id, date("Y-m-d"), $user_id);
				if ($countPresence == NULL) {
					$this->save($rowJadwal->jadwal_id, date("Y-m-d"));
					// var_dump($this->save($rowJadwal->jadwal_id, date("Y-m-d")));exit();
				}
			}

			header("location: ".base_url()."index.php/presence");
		}

		public function index()
		{
			date_default_timezone_set("Asia/Jakarta");
			setlocale(LC_ALL, 'IND');

			if ($data['session'] = $this->session->userdata('mahasiswa')) 
			{
				$data['user_name'] = $data['session']['session_user_name'];
	        	$data['user_email'] = $data['session']['user_email'];
	        	$data['user_gender'] = $data['session']['user_gender'];
	        	$data['class_id'] = $data['session']['class_id'];
	        	$data['jurusan_id'] = $data['session']['jurusan_id'];
	        	$data['user_nim'] = $data['session']['session_user_nim'];
	        	$data['user_id'] = $data['session']['session_user_id'];
				$data['content'] = 'v_presence';

				$data['count_jadwal'] = $this->M_akademik->getCountJadwal($data['class_id'], 0);
				$data['list_allJadwal'] = $this->M_akademik->getAllJadwalMhs($data['class_id']);
				$data['list_jadwal'] = $this->M_akademik->getJadwal($data['class_id'], 0);
				// $data['status_presence'] = $this->M_akademik->checkPresenceStatus()
				$data['time'] =  date('H:i:s');
				$data['today'] =  date('l');
				$data['startDate'] = '06/06/2022';
				$this->load->view('v_akademik', $data);

			}
			elseif ($data['session'] = $this->session->userdata('dosen')) 
			{
				$data['user_name'] = $data['session']['session_user_name'];
	        	$data['user_email'] = $data['session']['user_email'];
	        	$data['user_gender'] = $data['session']['user_gender'];
	        	$data['jurusan_id'] = $data['session']['jurusan_id'];
	        	$data['user_nidn'] = $data['session']['session_user_nidn'];
	        	$data['user_id'] = $data['session']['session_user_id'];
				$data['content'] = 'v_presence';

				$data['count_jadwal'] = $this->M_akademik->getCountJadwalDosen($data['user_id']);
				$data['list_allJadwal'] = $this->M_akademik->getAllJadwalDosen($data['user_id']);
				$data['list_jadwal'] = $this->M_akademik->getJadwal(0, $data['user_id']);
				// var_dump(date("l"));exit()
				$data['time'] =  date('H:i:s');
				$data['today'] =  date('l');
				$data['startDate'] = '06/06/2022';
				$this->load->view('v_akademik', $data);
			}
			elseif($this->session->userdata('admin')) 
			{
				header("location: ".base_url()."index.php/adminPresence");
			}
			else
			{
				header("location: ".base_url()."index.php/login");
			}
		}

		public function save($jadwal_id, $presence_date){
			date_default_timezone_set('Asia/Jakarta');
			// var_dump($_SESSION['mahasiswa']);exit();
			if (($_SESSION['mahasiswa'] || $_SESSION['dosen']) == FALSE) {
				header("location: ".base_url()."index.php/login");
			}
			elseif ($_SESSION['mahasiswa']) {
				$user_id = $_SESSION['mahasiswa']['session_user_id'];
				$user_name = $_SESSION['mahasiswa']['session_user_name'];
	        	$user_nim = $_SESSION['mahasiswa']['session_user_nim'];
	        	$user_status = $_SESSION['mahasiswa']['user_status'];
	        	$jurusan_id = $_SESSION['mahasiswa']['jurusan_id'];
	        	$user_nidn = '';	
			}
			elseif($_SESSION['dosen']){
				$user_id = $_SESSION['dosen']['session_user_id'];
				$user_name = $_SESSION['dosen']['session_user_name'];
	        	$user_nidn = $_SESSION['dosen']['session_user_nidn'];
	        	$user_status = $_SESSION['dosen']['user_status'];
	        	$jurusan_id = $_SESSION['dosen']['jurusan_id'];
	        	$user_nim = '';	
			}

			$presence_time = date('H:i');
			$presence_code = $jadwal_id."-".$presence_date;
			$presence_status = 'Tidak Hadir';

			$data = array(
				'jadwal_id' => $jadwal_id,
				'user_id' => $user_id,
				'user_nim' => $user_nim,
				'user_nidn' => $user_nidn,
				'user_status' => $user_status,
				'presence_code' => $presence_code,
				'presence_date' => $presence_date,
				'presence_time' => 00-00,
				'presence_status' => $presence_status,
			);

			$this->M_akademik->save($data);
		}

		public function update(){
			date_default_timezone_set('Asia/Jakarta');
			if (($_SESSION['mahasiswa'] || $_SESSION['dosen']) == FALSE) {
				header("location: ".base_url()."index.php/login");
			}

			$user_id = $this->input->post('user_id');
			$presence_date = $this->input->post('presence_date');
			$jadwal_id = $this->input->post('jadwal_id');
			$presence_code = $jadwal_id."-".$presence_date;

			$data = array(
				'presence_time' => date('H:i'), 'presence_status' => 'Hadir');

			$this->M_akademik->update($user_id, $presence_code, $data);
			$this->session->set_flashdata('success', '<h6><i class="fa fa-check-square-o sign"></i>&nbsp&nbspAnda melakukan presensi tepat pada waktunya!</h6>');
			header("location: ".base_url()."index.php/presence");
		}
	}
 ?>