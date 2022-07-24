<div class="table-responsive">
    <h4>Profile Saya</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <td>Id User</td>
            <td>Nama</td>
            <td>Username</td>
            <td>Role Id</td>
            <td>Pembuatan Member: </td>
        </tr>
        <tr>
            <td><?php echo $user['id'] ?></td>
            <td><?php echo $user['nama']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['role_id']; ?></td>
            <td><?php echo date('D d F Y, g:i a', $user['date_created']); ?></td>
        </tr>
</div>
</table>
<div align="right">
    <a href="<?php echo base_url('welcome') ?>">
        <div class="btn btn-sm btn-dark">Lanjutkan Belanja</div>
        <a href="<?php echo base_url('dashboard/edit_profile') ?>">
            <div class="btn btn-sm btn-success">Edit Profile</div>
        </a>
        <a href="<?php echo base_url('dashboard/edit_password') ?>">
            <div class="btn btn-sm btn-primary">Ganti Password</div>
</div>