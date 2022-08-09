<?php foreach ($detail as $detail) {
    $no_invoice = $detail->no_invoice;
    $nama = $detail->nama;
    $alamat = $detail->alamat;
    $no_hape = $detail->no_hape;
    $tgl_pesan = $detail->tgl_pesan;
    $is_paid = $detail->is_paid;
    $batas_bayar = $detail->batas_bayar;
} ?>
<div class="container-fluid">
    <h4>Detail Pemesanan Produk</h4>
    <div class="table-responsive">
        <table>
            <tr>
                <th width="200px">No Invoice</th>
                <td width="200px">: <?php echo $no_invoice; ?></td>
            </tr>
            <tr>
                <th width="200px">Nama </th>
                <td width="200px">: <?php echo $nama; ?></td>
            </tr>
            <tr>
                <th width="200px">Alamat</th>
                <td width="200px">: <?php echo $alamat; ?></td>
            </tr>
            <tr>
                <th width="200px">No Hape</th>
                <td width="200px">: <?php echo $no_hape; ?></td>
            </tr>
            <tr>
                <th width="200px">Tanggal Pesan</th>
                <td width="200px">: <?php echo $tgl_pesan; ?></td>
            </tr>
            <tr>
                <th width="200px">Status Pesenan</th>
                <td width="200px">: <?= ($is_paid) ? "Sudah Dibayar" : "Belum Dibayar" ?></td>
            </tr>
            <tr>
                <th>Batas Bayar</th>
                <td>: <?php echo $batas_bayar; ?></td>
            </tr>
        </table>
        <h5>Detail produk</h5>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td>Nama Produk</td>
                <td>Jumlah Produk</td>
                <td>Harga Produk</td>
            </tr>
            <?php foreach ($detailproduk as $row) { ?>
                <tr>
                    <td><? echo $row->nama_brg; ?></td>
                    <td><?php echo $row->jumlah; ?></td>
                    <td><?php echo $row->harga; ?></td>
                </tr>
            <?php } ?>
        </table>

        <div align="right">
            <a href="<?php echo base_url('dashboard/history') ?>">
                <div class="btn btn-sm btn-info">Kembali History</div>
            </a>
            <a href="<?php echo base_url('welcome') ?>">
                <div class="btn btn-sm btn-dark">Lanjutkan Belanja</div>
                <a href="<?php echo base_url('dashboard/history') ?>">
                    <div class="btn btn-sm btn-primary">History Belanja</div>
                    <a href="<?php echo base_url('dashboard/bayaran') ?>">
                        <div class="btn btn-sm btn-success">Pembayaran</div>
                    </a>

        </div>
    </div>
</div>