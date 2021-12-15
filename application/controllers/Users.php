<?php 
	class Users extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modelusers');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['folder'] = "users";
			$data['p'] = $p;
			$data['title'] = "Data users";

			if ($p == "data") {
				$data['val'] = $this->modelusers->show('tb_users')->result();
				$this->load->view('index',$data);
			}elseif($p == "input"){
				$id = $this->uri->segment(4);
				if (empty($id)) {
					//No otomatis
					$qr = $this->modelusers->no()->row_array();
					$kode = $qr['kode'];
					$nu = (int) substr($kode, 6,9);
					$nu++;
					$tgl = date('y');
					$data['no'] = "USR".$tgl.sprintf('%04s',$nu);

					$data['title'] = "input Data users";
					$data['btn'] = "SIMPAN";
					$data['url'] = "users/simpan";
					$this->load->view('index',$data);
				}else{
					$data['title'] = "Edit data users";
					$data['btn'] = "EDIT";
					$data['url'] = "users/edit";
					$data['val'] = $this->modelusers->showall("tb_users","WHERE id_user = '$id' ");
					$this->load->view('index',$data);
				}
			}
		}
		public function simpan()
		{
			$data = array(
				'id_user' => $this->input->post('id_user'),
				'nama' => $this->input->post('nama'),
				'password' => base64_encode($this->input->post('password')),
				'level' => $this->input->post('level')
			);
			$this->modelusers->simpan($data);
			redirect('users/p/data');
		}
		public function edit()
		{
			$id = $this->input->post('id_user');
			$data = array(
				'nama' => $this->input->post('nama'),
				'password' => base64_encode($this->input->post('password')),
				'level' => $this->input->post('level')
			);
			$this->modelusers->edit($id,$data);
			redirect('users/p/data');
		}
		public function hapus($id)
		{
			$this->modelusers->hapus('tb_users',$id);
			redirect('users/p/data');
		}
	}
 ?>