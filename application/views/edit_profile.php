<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('pesan'); ?>

    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('dashboard/edit_profile'); ?>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <div align="right">
        <a href="<?php echo base_url('welcome') ?>">
            <div class="btn btn-sm btn-dark">Lanjutkan Belanja</div>
            <a href="<?php echo base_url('dashboard/my_profile') ?>">
                <div class="btn btn-sm btn-success">Profile Saya</div>
                <a href="<?php echo base_url('dashboard/edit_password') ?>">
                    <div class="btn btn-sm btn-primary">Ganti Password</div>
                </a>
    </div>