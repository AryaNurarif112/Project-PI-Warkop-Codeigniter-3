<div class="container-fluid">

    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="<?php echo base_url('assets/img/slider1.jpg'); ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="<?php echo base_url('assets/img/slider2.jpg'); ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev border-0" type="button" data-target="#carouselExampleInterval" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next border-0" type="button" data-target="#carouselExampleInterval" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

    <h4>My Profile</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <td>Id User</td>
            <td>Nama</td>
            <td>Username</td>
            <td>Role Id</td>
            <td>Member Since : </td>
        </tr>
        <tr>
            <td><?php echo $role['id'] ?></td>
            <td><?php echo $role['nama']; ?></td>
            <td><?php echo $role['username']; ?></td>
            <td><?php echo $role['role_id']; ?></td>
            <td><?php echo date('d F Y, H:i:s', $role['date_created']); ?></td>
        </tr>
</div>