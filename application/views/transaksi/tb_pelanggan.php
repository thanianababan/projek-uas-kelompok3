<div class="modal-header">
    <h4 class="modal-title" id="defaultModalLabel">Data Pelanggan</h4>
</div>

<div class="modal-body">
    <!-- Basic Examples -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Pelanggan</th>
                    <th>Nama</th>
                    <th>Nomer Hp</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach ($val as $data) {
                 ?>
                <tr>
                    <td width="10px"><?= $no++ ?></td>
                    <td><?= $data->id_pelanggan; ?></td>
                    <td><?= $data->nama; ?></td>
                    <td><?= $data->hp; ?></td>
                    <td><?= $data->alamat; ?></td>
                    <td>
                        <button class="btn btn-primary waves-effect" onclick="pilih('<?= $data->id_pelanggan; ?>')" data-dismiss="modal">PILIH</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- #END# Basic Examples -->
</div>
