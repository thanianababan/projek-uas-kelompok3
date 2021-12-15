<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
            	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
				<div class="head">
					<h2>Laporan transaksi CleanYourArea</h2>
					<h2>jl. Cut Mutia no.22</h2>
					<p style="font-weight: normal;text-transform: capitalize;">No Telp : 021-1234135 Email : <span style="text-transform: none;">cleanyourarea@gmail.com</span></p>
					<p style="font-weight: normal;">========================================================================================================</p>
				</div>
				<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
					<thead>
						<tr>
							<th>#</th>
							<th>ID Transaksi</th>
							<th>Username</th>
							<th>Pelanggan</th>
							<th>Paket</th>
							<th>Tgl Transaksi</th>
							<th>Jumlah per Kilo/Jam/M2</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$no= 1; 
						foreach ($val as $data) {
					 ?>
						<tr>
							<td><?= $no++; ?>.</td>
							<td><?= $data->id_transaksi; ?></td>
							<td><?= $data->users; ?></td>
							<td><?= $data->pelanggan; ?></td>
							<td><?= $data->paket; ?></td>
							<td><?= date("d/m/Y",strtotime($data->tgl_transaksi)); ?></td>
							<td><?= $data->jml_qty." "."Kg/Jam/M2"; ?></td>
							<td>Rp <?= number_format($data->total,0,".","."); ?></td>
						</tr>
					<?php } ?>
						<tr>
							<td colspan="7" style="text-align: center;font-weight: bold;">Total seluruh transaksi</td>
							<td>Rp. <?= number_format($dt['t_transaksi'],0,".",".") ?></td>
						</tr>
					</tbody>
				</table>
				<i>Periode <?= date("F", strtotime($bulan))  ?> <?= date("Y", strtotime($tahun)) ?></i>
				<div class="row clearfix">
					<div class="ttd">
						<p>Bekasi, <?= date('d F Y'); ?></p>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.js') ?>"></script>
<!-- Bootstrap Core Css -->
<link href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
<style type="text/css">
	.head{
		text-align: center;
		text-transform: uppercase;
		font-weight: bold;
		margin:20px 0;
	}
	h2,h3,p{
		margin: 0;
		padding: 0;
	}
	.ttd{
		float: right;
		margin: 20px;
	}
</style>