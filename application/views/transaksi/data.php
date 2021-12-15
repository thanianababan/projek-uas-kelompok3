<div class="block-header">
    <h2>
        Data transaksi
    </h2>
</div>
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <?php if($this->session->userdata('level') == "member") { ?>
                <a href="<?= site_url('transaksi/p/input'); ?>" class="btn btn-primary waves-effect">ORDER</a>
                <?php } ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Transaksi</th>
                                <?php if($this->session->userdata('level') == "pegawai") { ?>
                                <th>Username</th>
                                <?php } ?>
                                <th>Pelanggan</th>
                                <th>Paket</th>
                                <th>Tanggal</th>
                                <th>Jumlah per Kilo/Jam/M2</th>
                                <th>Total Bayar</th>
                                <?php if($this->session->userdata('level') == "pegawai") { ?>
                                <th>Opsi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($val as $data) {
                             ?>
                            <tr>
                                <td width="10px"><?= $no++ ?></td>
                                <td><?= $data->id_transaksi; ?></td>
                                <?php if($this->session->userdata('level') == "pegawai") { ?>
                                <td><?= $data->users; ?></td>
                                <?php } ?>
                                <td><?= $data->pelanggan; ?></td>
                                <td><?= $data->paket; ?></td>
                                <td><?= $data->tgl_transaksi; ?></td>
                                <td><?= $data->jml_qty; ?></td>
                                <td><?= $data->total; ?></td>
                                <td >
                                    <!-- <a href="<?= site_url('transaksi/p/input') ?>/<?= $data->id_transaksi ?>" class="btn btn-warning waves-effect">EDIT</a> -->
                                    <?php if($this->session->userdata('level') == "pegawai") { ?>
                                    <a href="<?= site_url('transaksi/hapus') ?>/<?= $data->id_transaksi ?>" class="btn btn-danger waves-effect" onclick="return confirm('Anda yakin ingin menghapus data!!')">HAPUS</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->