<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h5>Total Belanja Anda: Rp. " . number_format($grand_total, 0, ',', '.');
                ?>
            </div><br><br>
            <h3>Input Alamat Pengiriman dan Pembayaran </h3>
            <form method="post" action="<?php echo base_url() ?>dashboard/proses_pesanan">
                <div class="form-group">
                    <span class="text-danger"> <?php echo form_error('nama'); ?></span>
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <span class="text-danger"> <?php echo form_error('alamat'); ?></span>
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <span class="text-danger"> <?php echo form_error('no_telp'); ?></span>
                    <label>No. Handphone</label>
                    <input type="text" name="no_telp" placeholder="Nomor Telephone Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jasa Pengiriman</label>
                    <select class="form-control">
                        <option>Shopeefood</option>
                        <option>Gojek</option>
                        <option>Grab</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="form-control">
                        <option value="OVO">Ovo - 082135888258 A/N Muhammad Arya Nurarif</option>
                        <option value="GOPAY">Gopay - 082135888258 A/N Muhammad Arya Nurarif</option>
                        <option value="QRISD">Dana - 082135888258 A/N Muhammad Arya Nurarif</option>
                        <option value="QRIS">ShopeePay - 082135888258 A/N Muhammad Arya Nurarif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
            </form>
        <?php
                } else {
                    echo "<h4>Keranjang Belanja Anda Masih Kosong";
                    base_url('welcome');
                } ?>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>