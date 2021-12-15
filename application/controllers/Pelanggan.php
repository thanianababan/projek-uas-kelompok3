<?php 
	class Pelanggan extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modelpelanggan');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['folder'] = "pelanggan";
			$data['p'] = $p;
			$data['title'] = "Data Pelanggan";

			if ($p == "data") {
				$data['val'] = $this->modelpelanggan->show('tb_pelanggan')->result();
				$this->load->view('index',$data);
			}elseif($p == "input"){
				$id = $this->uri->segment(4);
				if (empty($id)) {
					//No otomatis
					$qr = $this->modelpelanggan->no()->row_array();
					$kode = $qr['kode'];
					$nu = (int) substr($kode, 6,9);
					$nu++;
					$tgl = date('d');
					$bln = date('m');
					$thn = date('y');
					$data['no'] = "P".$tgl.$bln.$thn.sprintf('%04s',$nu);

					$data['title'] = "input Data Pelanggan";
					$data['btn'] = "SIMPAN";
					$data['url'] = "pelanggan/simpan";
					$this->load->view('index',$data);
				}else{
					$data['title'] = "Edit data Pelanggan";
					$data['btn'] = "EDIT";
					$data['url'] = "pelanggan/edit";
					$data['val'] = $this->modelpelanggan->showall("tb_pelanggan","WHERE id_pelanggan = '$id' ");
					$this->load->view('index',$data);
				}
			}
		}
		public function simpan()
		{
			$data = array(
				'id_pelanggan' => $this->input->post('id_pelanggan'),
				'nama' => $this->input->post('nama'),
				'hp' => $this->input->post('hp'),
				'alamat' => $this->input->post('alamat')
			);
			$this->modelpelanggan->simpan($data);
			redirect('pelanggan/p/data');
		}
		public function edit()
		{
			$id = $this->input->post('id_pelanggan');
			$data = array(
				'nama' => $this->input->post('nama'),
				'hp' => $this->input->post('hp'),
				'alamat' => $this->input->post('alamat')
			);
			$this->modelpelanggan->edit($id,$data);
			redirect('pelanggan/p/data');
		}
		public function hapus($id)
		{
			$this->modelpelanggan->hapus('tb_pelanggan',$id);
			redirect('pelanggan/p/data');
		}
	}
 ?>