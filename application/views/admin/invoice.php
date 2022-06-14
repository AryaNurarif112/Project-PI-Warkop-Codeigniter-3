<div class="container-fluid">
    <h4>Invoice Pemesanan Produk</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td>Id Invoice</td>
                <td>Nama Pemesanan</td>
                <td>Alamat Pengiriman</td>
                <td>No Hape</td>
                <td>Kurir Pemesanan</td>
                <td>Tanggal Pemesanan</td>
                <td>Batas Pembayaran</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
            <?php foreach ($invoice as $inv) : ?>
                <tr>
                    <td><?php echo $inv->id; ?></td>
                    <td><?php echo $inv->nama ?></td>
                    <td><?php echo $inv->alamat ?></td>
                    <td><?php echo $inv->no_hape ?></td>
                    <td><?php echo $inv->kurir ?></td>
                    <td><?php echo $inv->tgl_pesan ?></td>
                    <td><?php echo $inv->batas_bayar ?></td>
                    <td><?= ($inv->is_paid) ? '<a href="" class="btn btn-success">Sudah Dibayar</a>' : '<a href="" class="btn btn-danger">Belum Bayar</a>' ?></td>
                    <td>
                        <div class="dropdown mb-4">
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi
                            </button>
                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="invoice/detail/<?= $inv->id ?>">Detail</a>
                                <?php if ($inv->is_paid == 0) { ?>
                                    <a class="dropdown-item" href="invoice/setpaid/<?= $inv->id ?>">Tandai sudah bayar</a>
                                <?php } else { ?>
                                    <a class="dropdown-item" href="invoice/setunpaid/<?= $inv->id ?>">Tandai belum bayar</a>
                                <?php } ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>