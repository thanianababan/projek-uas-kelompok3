<?php 
	class ModelBeranda extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function users()
		{
			return $this->db->query("SELECT * FROM tb_users");
		}
		public function pelanggan()
		{
			return $this->db->query("SELECT * FROM tb_pelanggan");
		}
		public function paket()
		{
			return $this->db->query("SELECT * FROM tb_paket");
		}
		public function transaksi()
		{
			return $this->db->query("SELECT * FROM tb_transaksi");
		}
	}
 ?>