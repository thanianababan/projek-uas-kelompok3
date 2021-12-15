<?php 
	class ModelAkses extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function qr($user,$pass)
		{
			return $this->db->query("SELECT * FROM tb_users WHERE nama = '$user' AND password = '$pass' ");
		}
		public function simpan($val)
		{
			return $this->db->insert('tb_users',$val);
		}
	}
?>