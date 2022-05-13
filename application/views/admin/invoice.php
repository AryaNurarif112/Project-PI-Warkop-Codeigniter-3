<div class="container-fluid">
    <h4>Invoice Pemesanan Produk</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <td>Id Invoice</td>
            <td>Nama Pemesanan</td>
            <td>Alamat Pengiriman</td>
            <td>No Hape</td>
            <td>Tanggal Pemesanan</td>
            <td>Batas Pembayaran</td>
            <td>Aksi</td>
            <td>Status Pembayaran</td>
        </tr>
        <?php foreach ($invoice as $inv) : ?>
            <tr>
                <td><?php echo $inv->id; ?></td>
                <td><?php echo $inv->nama ?></td>
                <td><?php echo $inv->alamat ?></td>
                <td><?php echo $inv->no_hape ?></td>
                <td><?php echo $inv->tgl_pesan ?></td>
                <td><?php echo $inv->batas_bayar ?></td>
                <td><?php echo anchor('admin/invoice/detail/' . $inv->id, '  <div class="btn btn-sm btn-primary">Detail</div>') ?>
                </td>
                <td><?= ($inv->is_paid) ? "Sudah Dibayar" : "Belum Dibayar" ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>