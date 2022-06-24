<div class="container-fluid">
    <h4>User Mendaftar</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td>Id User</td>
                <td>Nama</td>
                <td>Username</td>
                <td>Role Id</td>
                <td>Tanggal Pembuatan</td>
                <td>Rubah Aksi</td>
            </tr>

            <?php foreach ($user as $role) : ?>
                <tr>
                    <td><?php echo $role['id'] ?></td>
                    <td><?php echo $role['nama']; ?></td>
                    <td><?php echo $role['username']; ?></td>
                    <td><?php echo $role['role_id']; ?></td>
                    <td><?php echo date('d F Y, H:i:s', $role['date_created']); ?></td>
                    <td>
                        <div class="dropdown mb-4">
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi
                            </button>
                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <?php if ($role['role_id'] == 2) { ?>
                                    <a class="dropdown-item" href="invoice/rolepaid/<?= $role['id'] ?>">Admin</a>
                                <?php } else { ?>
                                    <a class="dropdown-item" href="invoice/roleunpaid/<?= $role['id'] ?>">User</a>
                                <?php } ?>
                                <a class="dropdown-item bg-danger" href="invoice/hapus_user/<?= $role['id'] ?>" style=color:white>Hapus</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
    </div>
</div>