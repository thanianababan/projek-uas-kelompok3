<?php 
	class ModelTransaksi extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function showall($tb,$prop)
		{
			return $this->db->query("SELECT * FROM $tb $prop");
		}
		public function show($tb)
		{
			return $this->db->get($tb);
		}
		public function simpan($val)
		{
			return $this->db->insert('tb_transaksi',$val);
		}
		public function edit($id,$val)
		{
			$this->db->where('id_transaksi',$id);
			return $this->db->update('tb_transaksi',$val);
		}
		public function hapus($tb,$id)
		{
			$this->db->where("id_transaksi",$id);
			return $this->db->delete($tb);
		}
		public function no()
		{
			return $this->db->query("SELECT max(id_transaksi) AS kode FROM tb_transaksi");
		}
		public function showdata()
		{
			return $this->db->query("
				SELECT id_transaksi,jml_qty,tgl_transaksi,total,(tb_users.nama) AS users,(tb_pelanggan.nama) AS pelanggan,(tb_paket.nama) AS paket
				FROM tb_transaksi 
				INNER JOIN tb_users ON tb_transaksi.id_user=tb_users.id_user
				INNER JOIN tb_pelanggan ON tb_transaksi.id_pelanggan=tb_pelanggan.id_pelanggan
				INNER JOIN tb_paket ON tb_transaksi.id_paket=tb_paket.id_paket");
		}
		public function nota($id)
		{
			return $this->db->query("
				SELECT id_transaksi,jml_qty,tgl_transaksi,total,(tb_users.nama) AS users,(tb_pelanggan.nama) AS pelanggan,(tb_paket.nama) AS paket,tb_pelanggan.id_pelanggan,harga
				FROM tb_transaksi 
				INNER JOIN tb_users ON tb_transaksi.id_user=tb_users.id_user
				INNER JOIN tb_pelanggan ON tb_transaksi.id_pelanggan=tb_pelanggan.id_pelanggan
				INNER JOIN tb_paket ON tb_transaksi.id_paket=tb_paket.id_paket
				WHERE id_transaksi = '$id'");
		}
		public function laporan($bulan,$tahun)
		{
			$sql = $this->db->query("SELECT id_transaksi,(tb_users.nama) as users, (tb_pelanggan.nama) as pelanggan, (tb_paket.nama) as paket, tgl_transaksi,jml_qty,total
				FROM tb_transaksi
				INNER JOIN tb_users ON tb_transaksi.id_user=tb_users.id_user
				INNER JOIN tb_pelanggan ON tb_transaksi.id_pelanggan=tb_pelanggan.id_pelanggan
				INNER JOIN tb_paket ON tb_transaksi.id_paket=tb_paket.id_paket
				WHERE month(tgl_transaksi) = '$bulan' AND year(tgl_transaksi) = '$tahun' ");
			return $sql;
		}
		public function total_transaksi($bulan,$tahun)
		{
			return $this->db->query("SELECT sum(total) as t_transaksi
			FROM tb_transaksi
			WHERE month(tgl_transaksi) = '$bulan' AND year(tgl_transaksi) = '$tahun' ");
		}
	}
 ?>