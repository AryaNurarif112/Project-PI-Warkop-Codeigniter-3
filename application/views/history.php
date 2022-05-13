<div class="container-fluid">
    <h4>History Pemesanan Produk</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <td>Tanggal Pemesanan</td>
            <td>Id Invoice</td>
            <td>Nama Produk</td>
            <td>Batas Pembayaran</td>
            <td>Status</td>
            <td>Aksi</td>
        </tr>
        <?php foreach ($invoice as $inv) : ?>
            <tr>
                <td><?php echo $inv->tgl_pesan ?></td>
                <td><?php echo $inv->no_invoice; ?></td>
                <td>
                    <?php

                    if ($inv->totalpesanan > 1) {
                        $total = $inv->totalpesanan - 1;
                        echo $inv->nama_brg . ' (+' . $total . ' Produk Lainnya)'; //buat nampilin +produk lain nya di Model_invoice COUNT(tb_pesanan.id) AS totalpesanan');
                    } else {
                        echo $inv->nama_brg;
                    }
                    ?>
                </td>

                <td><?php echo $inv->batas_bayar ?></td>
                <td><?= ($inv->is_paid) ? "Sudah Dibayar" : "Belum Dibayar" ?></td>
                <td><?php echo anchor('dashboard/detail_history/' . $inv->idinvoice, '  <div class="btn btn-sm btn-primary">Detail</div>') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<div align="right">
    <a href="<?php echo base_url('welcome') ?>">
        <div class="btn btn-sm btn-dark">Lanjutkan Belanja</div>
    </a>
</div>
</div>