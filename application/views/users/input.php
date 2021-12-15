<?php 
    if ($btn == "EDIT") {
        $val = $val->row_array();
    }else{
        $val['id_user'] = $no;
        $val['nama'] = "";
        $val['password'] = "";
        $val['level'] = "";
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
                    <label for="id_user">ID Users</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="id_user" id="id_user" value="<?= $val['id_user']; ?>" class="form-control" readonly>
                        </div>
                    </div>

                    <label for="nama">Nama</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="nama" id="nama" value="<?= $val['nama']; ?>" class="form-control" placeholder="Enter your name" required="" maxlength="50">
                        </div>
                    </div>

                    <label for="password">Password</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="password" name="password" id="password" value="<?= $val['password']; ?>" class="form-control" placeholder="Enter your password" maxlength="13" required="">
                        </div>
                    </div>

                    <label for="level">Level</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="level" id="level" class="form-control show-tick">
                                <option value="">--Pilih--</option>
                                <option value="member">member</option>
                                <option value="pegawai">pegawai</option>
                            </select>
                        </div>
                    </div>

                    <input type="submit" name="simpan" value="<?= $btn; ?>" class="btn btn-primary m-t-15 waves-effect">
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- #END# Vertical Layout -->