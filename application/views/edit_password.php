<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('dashboard/changePassword') ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Password Lama</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <?= form_error('current_password', ' <small class="text-danger pl-3">', '</smal>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">Password Terbaru</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <?= form_error('new_password1', ' <small class="text-danger pl-3">', '</smal>'); ?>

                </div>
                <div class="form-group">
                    <label for="new_password2">Ulangi Password Terbaru</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <?= form_error('new_password2', ' <small class="text-danger pl-3">', '</smal>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </div>
            </form>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div align="center">
    <a href="<?php echo base_url('welcome') ?>">
        <div class="btn btn-sm btn-dark">Lanjutkan Belanja</div>
        <a href="<?php echo base_url('dashboard/my_profile') ?>">
            <div class="btn btn-sm btn-success">Profile Saya</div>
            <a href="<?php echo base_url('dashboard/edit_profile') ?>">
                <div class="btn btn-sm btn-primary">Edit Profile</div>
            </a>
</div>