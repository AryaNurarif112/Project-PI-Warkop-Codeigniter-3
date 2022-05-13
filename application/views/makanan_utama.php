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
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleInterval" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleInterval" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <div class="row text-center mt-4">

        <?php foreach ($makanan_utama as $brg) : ?>

            <div class="card ml-3 mb-3" style="width: 16rem;">
                <img class="fotoproduk" src="<?= base_url('uploads/') . $brg['gambar']; ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?= $brg['nama_brg']; ?></h5>
                    <small><?= $brg['keterangan']; ?></small>
                    <span class="badge badge-success d-block py-2 mb-3 mt-2">Rp. <?php echo number_format($brg['harga'], 0, ',', '.') ?></span>
                    <?php echo anchor('dashboard/tambah_ke_keranjang/' . $brg['id_brg'], '<div class="btn btn-sm btn-primary">Masukan Keranjang</div>') ?>
                    <?php echo anchor('dashboard/detail/' . $brg['id_brg'], '<div class="btn btn-sm btn-success">Detail</div>') ?>
                    <?php echo anchor('welcome/', '<div class="btn btn-sm btn-danger">Kembali</div>') ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>