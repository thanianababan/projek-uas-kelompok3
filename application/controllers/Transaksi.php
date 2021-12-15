<?php 
	class Transaksi extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modeltransaksi');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['folder'] = "transaksi";
			$data['p'] = $p;
			$data['title'] = "Data transaksi";

			if ($p == "data") {
				$data['val'] = $this->modeltransaksi->showdata()->result();
				$this->load->view('index',$data);
			}elseif($p == "input"){
				$id = $this->uri->segment(4);
				if (empty($id)) {
					//No otomatis
					$qr = $this->modeltransaksi->no()->row_array();
					$kode = $qr['kode'];
					$nu = (int) substr($kode, 6,9);
					$nu++;
					$tgl = date('d');
					$thn = date('y');
					$data['no'] = "TR".$tgl.$thn.sprintf('%04s',$nu);

					$data['title'] = "input Data transaksi";
					$data['btn'] = "SIMPAN";
					$data['url'] = "transaksi/simpan";
					$data['paket'] = $this->modeltransaksi->show('tb_paket')->result();
					$this->load->view('index',$data);
				}else{
					$data['title'] = "Edit data transaksi";
					$data['btn'] = "EDIT";
					$data['url'] = "transaksi/edit";
					$data['val'] = $this->modeltransaksi->showall("tb_transaksi","WHERE id_transaksi = '$id' ");
					$this->load->view('index',$data);
				}
			}elseif ($p == "laporan") {
				$data['folder'] = "transaksi";
				$data['title'] = "Data Laporan transaksi";

				$this->load->view('index',$data);
			}
		}
		public function simpan()
		{
			$data = array(
				'id_transaksi' => $this->input->post('id_transaksi'),
				'id_user' => $this->input->post('id_user'),
				'id_pelanggan' => $this->input->post('id_pelanggan'),
				'id_paket' => $this->input->post('id_paket'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'jml_qty' => $this->input->post('jml_qty'),
				'total' => $this->input->post('total')
			);
			$this->modeltransaksi->simpan($data);
			redirect('transaksi/p/data');
		}
		public function edit()
		{
			$id = $this->input->post('id_transaksi');
			$data = array(
				'id_user' => $this->input->post('id_user'),
				'id_pelanggan' => $this->input->post('id_pelanggan'),
				'id_paket' => $this->input->post('id_paket'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'jml_qty' => $this->input->post('jml_qty'),
				'total' => $this->input->post('total')
			);
			$this->modeltransaksi->edit($id,$data);
			redirect('transaksi/p/data');
		}
		public function hapus($id)
		{
			$this->modeltransaksi->hapus('tb_transaksi',$id);
			redirect('transaksi/p/data');
		}
		public function modal_pelanggan()
		{
			$data['val'] = $this->modeltransaksi->show('tb_pelanggan')->result();
			$this->load->view("transaksi/tb_pelanggan",$data);	
		}
		public function data_pelanggan()
		{
			$data = $this->modeltransaksi->showall('tb_pelanggan',"WHERE id_pelanggan = '$_POST[id_pelanggan]'")->row_array();
			$a = array(
				'id_pelanggan' => $data['id_pelanggan'],
				'nama' => $data['nama'],
				'hp' => $data['hp'],
				'alamat' => $data['alamat']
			 );
			echo json_encode($a);
		}
		public function kilo()
		{
			$kilo = $_POST['jml_qty'];
			$paket = $this->modeltransaksi->showall('tb_paket',"WHERE id_paket = '$_POST[paket]' ")->row();
			if ($_POST['jml_qty'] == "") {
				$total="";
			}else{
				$total = $paket->harga * $kilo;
			}
			echo $total;
		}
		public function nota()
		{
			$id = $this->uri->segment(3);
			$data['val'] = $this->modeltransaksi->nota($id)->row_array();
			$this->load->view('transaksi/nota',$data);
		}
		public function laporan()
		{
			$data['bulan'] = $_POST['bulan'];
			$data['tahun'] = $_POST['tahun'];
			$data['val'] = $this->modeltransaksi->laporan($_POST['bulan'],$_POST['tahun'])->result();
			$data['dt'] = $this->modeltransaksi->total_transaksi($_POST['bulan'],$_POST['tahun'])->row_array();
			$this->load->view("transaksi/tb_laporan",$data);
		}
	}
 ?>