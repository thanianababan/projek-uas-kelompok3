<?php 
	class Beranda extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modelberanda');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['title'] = "CleanYourArea - Jasa Kebersihan";
			$data['folder'] = "beranda";
			if (empty($p)) {
				$p = "beranda";
			}
			$data['p'] = $p;
			$data['users'] = $this->modelberanda->users()->num_rows();
			$data['pelanggan'] = $this->modelberanda->pelanggan()->num_rows();
			$data['paket'] = $this->modelberanda->paket()->num_rows();
			$data['transaksi'] = $this->modelberanda->transaksi()->num_rows();
			$this->load->view('index',$data);
		}
	}
 ?>