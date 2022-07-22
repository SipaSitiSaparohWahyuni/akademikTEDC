<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class M_akademik extends CI_Model
	{
		private $matakuliah_table  = "matakuliah_table";
		private $jadwal_table  = "jadwal_table";
		private $user_table  = "user_table";
		private $presence  = "presence";
		private $class_table = "class_table";
		private $jurusan_table = "jurusan_table";
		private $kurikulum_table = "kurikulum_table";

		public function getAllPresence($jurusan_id){
			$this->db->select('*');
			$this->db->from($this->presence.' a', ' b', ' c', ' d', ' e', ' f');
			$this->db->join($this->jadwal_table.' b', 'b.jadwal_id=a.jadwal_id');
			$this->db->join($this->class_table.' c', 'c.class_id=b.class_id');
			$this->db->join($this->matakuliah_table.' d', 'd.matakuliah_id=b.matakuliah_id');
			$this->db->join($this->user_table.' e', 'e.user_id=b.user_id');
			$this->db->join($this->jurusan_table.' f', 'f.jurusan_id=c.jurusan_id');
			if ($jurusan_id != 3) {
				$this->db->where('c.jurusan_id', $jurusan_id);
			}
			//$this->db->where('user_status', 'Mahasiswa');
			$this->db->order_by('a.jadwal_id ASC, presence_code ASC');		

			$query = $this->db->get();
			return $query;
		}

		public function getPresenceSelected($date_presence){
			$this->db->select('*');
			$this->db->from($this->presence.' a', ' b', ' c', ' d', ' e');
			$this->db->join($this->jadwal_table.' b', 'b.jadwal_id=a.jadwal_id');
			$this->db->join($this->class_table.' c', 'c.class_id=b.class_id');
			$this->db->join($this->matakuliah_table.' d', 'd.matakuliah_id=b.matakuliah_id');
			$this->db->join($this->user_table.' e', 'e.user_id=b.user_id');
			$this->db->where('presence_date', $date_presence);
			$this->db->order_by('a.jadwal_id ASC, presence_date');		

			$query = $this->db->get();
			return $query;
		}

		public function getCountAllPresence($jurusan_id){
			$this->db->select('*');
			$this->db->from($this->presence.' a', ' b', ' c', ' d', ' e', ' f');
			$this->db->join($this->jadwal_table.' b', 'b.jadwal_id=a.jadwal_id');
			$this->db->join($this->class_table.' c', 'c.class_id=b.class_id');
			$this->db->join($this->matakuliah_table.' d', 'd.matakuliah_id=b.matakuliah_id');
			$this->db->join($this->user_table.' e', 'e.user_id=b.user_id');
			$this->db->join($this->jurusan_table.' f', 'f.jurusan_id=c.jurusan_id');
			if ($jurusan_id != 3) {
				$this->db->where('c.jurusan_id', $jurusan_id);
			}
			//$this->db->where('user_status', 'Mahasiswa');
			$this->db->order_by('jadwal_id','ASC');

			$query = $this->db->count_all_results();
			return $query;
		}

		public function getAllKelas($jurusan_id){
			$this->db->select('*');
			$this->db->from($this->class_table.' a', 'b');
			// $this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' b', 'b.jurusan_id=a.jurusan_id');
			if ($jurusan_id != 3) {
				$this->db->where('a.jurusan_id', $jurusan_id);
			}
			//$this->db->where('user_status', 'Mahasiswa');
			$this->db->order_by('class_name','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getAllKurikulum(){
			$this->db->select('*');
			$this->db->from($this->kurikulum_table);
			// $this->db->order_by('kurikulum_name','ASC');
			$query = $this->db->get();
			return $query;
		}

		public function getAllMatakuliah(){
			$this->db->select('*');
			$this->db->from($this->matakuliah_table.' a', 'b');
			// $this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			$this->db->join($this->kurikulum_table.' b', 'b.kurikulum_id=a.kurikulum_id');
			//$this->db->where('user_status', 'Mahasiswa');
			$this->db->order_by('matakuliah_name','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getMatkulById($matakuliah_id){
			$this->db->select('*');
			$this->db->from($this->matakuliah_table.' a', 'b');
			// $this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			$this->db->join($this->kurikulum_table.' b', 'b.kurikulum_id=a.kurikulum_id');
			$this->db->where('matakuliah_id', $matakuliah_id);
			// $this->db->order_by('class_name','ASC');

			$query = $this->db->get();
			return $result = $query->row();
		}

		public function getJadwalById($jadwal_id){
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', ' b', ' c', ' d');
			$this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			$this->db->join($this->matakuliah_table.' c', 'c.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' d', 'd.user_id=a.user_id');
			// $this->db->join($this->kurikulum_table.' b', 'b.kurikulum_id=a.kurikulum_id');
			$this->db->where('jadwal_id', $jadwal_id);
			// $this->db->order_by('class_name','ASC');

			$query = $this->db->get();
			return $result = $query->row();
		}

		public function getClassById($class_id){
			$this->db->select('*');
			$this->db->from($this->class_table.' a', 'b');
			// $this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' b', 'b.jurusan_id=a.jurusan_id');
			$this->db->where('class_id', $class_id);
			// $this->db->order_by('class_name','ASC');

			$query = $this->db->get();
			return $result = $query->row();
		}
		
		public function getAllMhs($jurusan_id){
			$this->db->select('*');
			$this->db->from($this->user_table.' a', 'b', 'c');
			$this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' c', 'c.jurusan_id=b.jurusan_id');
			if ($jurusan_id != 3) {
				$this->db->where('a.jurusan_id', $jurusan_id);	
			}
			$this->db->where('user_status', 'Mahasiswa');
			$this->db->order_by('class_name ASC');
			$this->db->order_by('user_name ASC');
			$query = $this->db->get();
			return $query;
		}

		public function getMhsByClass($class_id){
			$this->db->select('*');
			$this->db->from($this->user_table.' a', 'b', 'c');
			$this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			// $this->db->join($this->jurusan_table.' c', 'c.jurusan_id=b.jurusan_id && c.jurusan_id == a.jurusan_id');
			$this->db->where('user_status', 'Mahasiswa');
			$this->db->where('b.class_id', $class_id);
			$this->db->order_by('class_name','ASC');
			$this->db->order_by('user_name','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getAllAdmin(){
			$this->db->select('*');
			$this->db->from($this->user_table.' a', 'b');
			// $this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' b', 'b.jurusan_id=a.jurusan_id');
			$this->db->where('user_status', 'Admin');
			$this->db->order_by('user_name','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getAllClass(){
			$this->db->select('*');
			$this->db->from($this->class_table.' a', ' b', ' c');
			//$this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' b', 'b.jurusan_id=a.jurusan_id');
			$this->db->join($this->user_table.' c', 'c.class_id=a.class_id');
			$this->db->order_by('class_name','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getJurusanByClass($class_id){
			$this->db->select('*');
			$this->db->from($this->class_table.' a', ' b');
			//$this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' b', 'b.jurusan_id=a.jurusan_id');
			$this->db->where('class_id', $class_id);

			$query = $this->db->get();
			return $result = $query->row();
		}

		public function getAllJurusan($jurusan_id){
			$this->db->select('*');
			$this->db->from($this->jurusan_table);
			//$this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			// $this->db->join($this->jurusan_table.' b', 'b.jurusan_id=a.jurusan_id');
			if ($jurusan_id != 3) {
				$this->db->where('jurusan_id', $jurusan_id);
			}
			$this->db->order_by('jurusan_name','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getOneUser($code_id){
			$this->db->select('*');
			$this->db->from($this->user_table.' a', 'b', 'c');
			$this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' c', 'c.jurusan_id=b.jurusan_id');
			$this->db->where('user_id', $code_id);
			$this->db->where('user_status', 'Mahasiswa');
			$this->db->order_by('user_name','ASC');

			$query = $this->db->get();
			return $result = $query->row();
		}

		public function getOneDosen($code_id){
			$this->db->select('*');
			$this->db->from($this->user_table.' a', 'b');
			// $this->db->join($this->class_table.' b', 'b.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' b', 'b.jurusan_id=a.jurusan_id');
			$this->db->where('user_id', $code_id);
			$this->db->where('user_status', 'Dosen');
			$this->db->order_by('user_name','ASC');

			$query = $this->db->get();
			return $result = $query->row();
		}


		public function getAllDosen($jurusan_id){
			$this->db->select('*');
			$this->db->from($this->user_table.' a', 'b');
			$this->db->join($this->jurusan_table.' b', 'b.jurusan_id=a.jurusan_id');
			if ($jurusan_id != 3) {
				$this->db->where('a.jurusan_id', $jurusan_id);
			}
			$this->db->where('user_status', 'Dosen');
			$this->db->order_by('jurusan_name','ASC');
			$this->db->order_by('user_name','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getAllJadwal($jurusan_id){
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', ' b', ' c', ' d', ' e');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' e', 'e.jurusan_id=d.jurusan_id');
			if ($jurusan_id != 3) {
				$this->db->where('d.jurusan_id', $jurusan_id);
			}

			$this->db->where('jadwal_day', date("l"));
			$this->db->order_by('jadwal_start_at','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getTodayJadwal($jurusan_id){
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', ' b', ' c', ' d', ' e');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' e', 'e.jurusan_id=d.jurusan_id');
			$this->db->where('jadwal_day', date("l"));
			if ($jurusan_id != 3) {
				$this->db->where('d.jurusan_id', $jurusan_id);
			}
			$this->db->order_by('jadwal_start_at','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getAllDataJadwal($jurusan_id){
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', ' b', ' c', ' d', ' e');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' e', 'e.jurusan_id=d.jurusan_id');
			if ($jurusan_id != 3) {
				$this->db->where('d.jurusan_id', $jurusan_id);
			}
			$this->db->order_by('jadwal_day','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getDataJadwalById($jadwal_id){
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', 'b', 'c', 'd');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			$this->db->where('jadwal_id', $jadwal_id);
			// $this->db->order_by('jadwal_day','ASC');

			$query = $this->db->get();
			return $result = $query->row();
		}

		public function getDetailPresence($jadwal_id, $presence_date, $user_status){
			
			$presence_code = $jadwal_id."-".$presence_date;
			$this->db->select('*');
			$this->db->from($this->presence.' a', ' b', ' c');
			$this->db->join($this->jadwal_table.' b', 'b.jadwal_id=a.jadwal_id');
			// $this->db->join($this->class_table.' c', 'c.class_id=b.class_id');
			// $this->db->join($this->matakuliah_table.' d', 'd.matakuliah_id=b.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			
			$this->db->where('presence_code', $presence_code);
			$this->db->where('a.user_status', $user_status);
			$this->db->order_by('presence_time','ASC');
			// $this->db->or_where('b.class_id', 'c.class_id');
			// $where = "a.user_nidn = b.user_nidn OR b.class_id = c.class_id";
			// $this->db->where($where);

			// $this->db->

			$query = $this->db->get();
			return $query;
		}

		public function getCountAllJadwal($jurusan_id)
		{
			// $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', ' b', ' c', ' d', ' e');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			$this->db->join($this->jurusan_table.' e', 'e.jurusan_id=d.jurusan_id');
			$this->db->where('jadwal_day', date("l"));
			if ($jurusan_id != 3) {
				$this->db->where('d.jurusan_id', $jurusan_id);
			}

			$query = $this->db->count_all_results();
			return $query;
		}		

		public function getCountJadwal($class_id, $user_id)
		{
			// $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', 'b', 'c', 'd');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			$this->db->where('jadwal_day', date("l"));
			$where = "a.class_id = ".$class_id." OR a.user_id = ".$user_id;
			$this->db->where($where);

			$query = $this->db->count_all_results();
			return $query;
		}

		public function getAllCountJadwalMhs($class_id, $jadwal_day)
		{
			// $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', 'b', 'c', 'd');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			$this->db->where('jadwal_day', $jadwal_day);
			$where = "a.class_id = ".$class_id." OR a.user_id = ".$user_id;
			$this->db->where($where);

			$query = $this->db->count_all_results();
			return $query;
		}

		public function getAllCountJadwalDosen($user_id, $jadwal_day)
		{
			// $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', 'b', 'c', 'd');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			$this->db->where('jadwal_day', $jadwal_day);
			$where = "a.user_id = ".$user_id;
			$this->db->where($where);

			$query = $this->db->count_all_results();
			return $query;
		}

		public function getAllCountJadwal($class_id, $user_id)
		{
			// $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', 'b', 'c', 'd');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			// $this->db->where('jadwal_day', date("l"));
			$where = "a.class_id = ".$class_id." OR a.user_id = ".$user_id;
			$this->db->where($where);

			$query = $this->db->count_all_results();
			return $query;
		}

		public function getAllJadwalMhs($class_id)
		{
			// $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', 'b', 'c', 'd');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			// $this->db->where('jadwal_day', date("l"));
			$where = "a.class_id = ".$class_id;
			$this->db->where($where);
			$this->db->order_by('jadwal_start_at','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getAllJadwalDosen($user_id)
		{
			// $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', 'b', 'c', 'd');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			// $this->db->where('jadwal_day', date("l"));
			$where = "a.user_id = ".$user_id;
			$this->db->where($where);
			$this->db->order_by('jadwal_start_at','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function getCountJadwalDosen($user_id)
		{
			// $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', 'b', 'c', 'd');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			$this->db->where('jadwal_day', date("l"));
			$where = "a.user_id = ".$user_id;
			$this->db->where($where);

			$query = $this->db->count_all_results();
			return $query;
		}
		
		public function getJadwal($class_id, $user_id)
		{
			// $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			$this->db->select('*');
			$this->db->from($this->jadwal_table.' a', 'b', 'c', 'd');
			$this->db->join($this->matakuliah_table.' b', 'b.matakuliah_id=a.matakuliah_id');
			$this->db->join($this->user_table.' c', 'c.user_id=a.user_id');
			$this->db->join($this->class_table.' d', 'd.class_id=a.class_id');
			if ($class_id != 0) {
				$this->db->where('jadwal_day', date("l"));
				$this->db->where("a.class_id", $class_id);
			} elseif ($user_id != 0) {
				$this->db->where("a.user_id", $user_id);
				$this->db->where('jadwal_day', date("l"));
			}
			$this->db->order_by('jadwal_start_at','ASC');

			$query = $this->db->get();
			return $query;
		}

		public function checkInsertUser($user_code, $user_email){
			$this->db->select('*');
			$this->db->from($this->user_table);
			$this->db->where('user_nim', $user_code);
			$this->db->or_where('user_nidn', $user_code);
			$this->db->or_where('user_email', $user_email);
			
			$query = $this->db->get();

			return $query->row();
		}

		public function checkInsertClass($class_name){
			$this->db->select('*');
			$this->db->from($this->class_table);
			$this->db->where('class_name', $class_name);
			
			$query = $this->db->get();

			return $query->row();
		}

		public function checkInsertMatkul($matakuliah_name){
			$this->db->select('*');
			$this->db->from($this->matakuliah_table);
			$this->db->where('matakuliah_name', $matakuliah_name);
			
			$query = $this->db->get();

			return $query->row();
		}

		public function checkLogin($user_code, $user_password){
			$this->db->select('*');
			$this->db->from($this->user_table);
			$this->db->where('user_nim', $user_code);
			$this->db->or_where('user_nidn', $user_code);
			$this->db->or_where('user_email', $user_code);
			$this->db->where('user_password', $user_password);
			$query = $this->db->get();

			return $query->row();
		}

		public function checkUpdateUser($user_id, $user_password){
			$this->db->select('*');
			$this->db->from($this->user_table);
			$this->db->where('user_id', $user_id);
			$this->db->where('user_password', $user_password);
			$query = $this->db->get();

			return $query->row();
		}

		public function checkPresence($jadwal_id, $presence_date, $user_id)
		{
			// $presence_date = date("Y-m-d");
			$presence_code = $jadwal_id."-".$presence_date;
			$this->db->select('*');
			$this->db->from($this->presence);
			$this->db->where('presence_code', $presence_code);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get();

			return $query->result();
		}


		public function checkPresenceStatus($jadwal_id, $presence_date, $user_id)
		{
			// $presence_date = date("Y-m-d");
			$presence_code = $jadwal_id."-".$presence_date;
			$this->db->select('presence_status');
			$this->db->from($this->presence);
			$this->db->where('presence_code', $presence_code);
			$this->db->where('user_id', $user_id);
			// $this->db->order_by('presence_status','DESC limit 1');
			$query = $this->db->get()->result();

			return $query;
			//var_dump((array) $query);
		}

		public function checkInsertJadwal($data = array())
		{
			// $presence_date = date("Y-m-d");
			// $presence_code = $jadwal_id."-".$presence_date;
			$this->db->select('*');
			$this->db->from($this->jadwal_table);
			$this->db->where('jadwal_day', $data[0]);
			$this->db->where('matakuliah_id', $data[1]);
			$this->db->where('class_id', $data[2]);
			$this->db->where('jadwal_start_at', $data[3]);
			$this->db->where('jadwal_ended_at', $data[4]);
			$this->db->where('user_id', $data[5]);
			$query = $this->db->get();

			return $query->row();
			// var_dump($data[0]);exit();
		}

		// public function getById($id)
		// {
		// 	return $this->db->get_where($this->_table, ["id_pegawai" => $id])->row();
		// }

		// public function getAll_Jabatan()
		// {
		// 	return $this->db->get($this->_table2)->result();
		// }

		public function insertUser($data = array())
		{
			return $this->db->insert($this->user_table, $data);
		}

		public function updateUser($user_id, $data = array())
		{
			return $this->db->update($this->user_table, $data, array('user_id' => $user_id));
		}

		public function save($data = array())
		{
			return $this->db->insert($this->presence, $data);
		}

		public function update($user_id, $presence_code, $data = array())
		{
			return $this->db->update($this->presence, $data, array('user_id' => $user_id, 'presence_code' => $presence_code));
		}

		public function deleteUser($user_id)
		{
			return $this->db->delete($this->user_table, array("user_id" => $user_id));
		}

		public function deleteDosen($user_id, $data = array())
		{
			return $this->db->update($this->user_table, $data, array('user_id' => $user_id));
		}

		public function insertClass($data = array())
		{
			return $this->db->insert($this->class_table, $data);
		}

		public function updateClass($class_id, $data = array())
		{
			return $this->db->update($this->class_table, $data, array('class_id' => $class_id));
		}

		public function deleteKelas($class_id)
		{
			return $this->db->delete($this->class_table, array("class_id" => $class_id));
		}

		public function insertMataKuliah($data = array())
		{
			return $this->db->insert($this->matakuliah_table, $data);
		}

		public function updateMataKuliah($matakuliah_id, $data = array())
		{
			return $this->db->update($this->matakuliah_table, $data, array('matakuliah_id' => $matakuliah_id));
		}

		public function deleteMataKuliah($matakuliah_id)
		{
			return $this->db->delete($this->matakuliah_table, array("matakuliah_id" => $matakuliah_id));
		}

		public function insertJadwal($data = array())
		{
			return $this->db->insert($this->jadwal_table, $data);
		}

		public function updateJadwal($jadwal_id, $data = array())
		{
			return $this->db->update($this->jadwal_table, $data, array('jadwal_id' => $jadwal_id));
		}

		public function deleteJadwal($jadwal_id)
		{
			return $this->db->delete($this->jadwal_table, array("jadwal_id" => $jadwal_id));
		}
	} 

 ?>