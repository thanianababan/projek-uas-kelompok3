<?php 
    if ($btn == "EDIT") {
        $val = $val->row_array();
    }else{
        $val['id_pelanggan'] = $no;
        $val['nama'] = "";
        $val['hp'] = "";
        $val['alamat'] = "";
    }
 ?>

<div class="block-header">
    <h2><?= $title ?></h2>
</div>

<!-- Vertical Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <?= form_open_multipart($url); ?> 
                    <label for="id_pelanggan">ID Pelanggan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="id_pelanggan" id="id_pelanggan" value="<?= $val['id_pelanggan']; ?>" class="form-control" readonly>
                        </div>
                    </div>

                    <label for="nama">Nama Lengkap</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="nama" id="nama" value="<?= $val['nama']; ?>" class="form-control" placeholder="Enter your name" required="" maxlength="50">
                        </div>
                    </div>

                    <label for="hp">No Telepon</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="hp" id="hp" value="<?= $val['hp']; ?>" class="form-control" placeholder="Enter your no telephone" maxlength="13" required="">
                        </div>
                    </div>

                    <label for="alamat">Alamat</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea id="alamat" name="alamat" class="form-control" placeholder="Enter your addres" required=""><?= $val['alamat']; ?></textarea>
                        </div>
                    </div>

                    <input type="submit" name="simpan" value="<?= $btn; ?>" class="btn btn-primary m-t-15 waves-effect">
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- #END# Vertical Layout -->