<?php echo $this->session->flashdata('pesan') ?
    '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-right: 89px; margin-left: 89px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            ' . $this->session->flashdata('pesan') . '
                        </div>' : '' ?>

<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Tambah Transaksi</h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo site_url() ?>main/transaksistore/<?php echo $jurnal->id ?>" method="post">
                <input type="hidden" name="trx_id" value="<?php echo $trx ? $trx->id : '' ?>">
                <div class="form-group">
                    <label for="" class="control-label">Nama</label>
                    <input type="date" class="form-control" name="tanggal"
                           value="<?php echo $trx ? $trx->tanggal : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">uraian</label>
                    <textarea name="uraian" id="" rows="3"
                              class="form-control" required><?php echo $trx ? $trx->uraian : '' ?></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Debet</label>
                    <input id="debet" type="number" class="form-control" name="debet"
                           value="<?php echo $trx ? $trx->debet : '' ?>" <?php echo $trx ? ($trx->debet == 0 ? 'disabled' : '') : '' ?>
                           required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Kredit</label>
                    <input id="kredit" type="number" class="form-control" name="kredit"
                           value="<?php echo $trx ? $trx->kredit : '' ?>" <?php echo $trx ? ($trx->kredit == 0 ? 'disabled' : '') : '' ?>
                           required>
                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-danger" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    <h4>List Transaksi</h4>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo site_url() ?>report/pdf/<?php echo $jurnal->id ?>" target="_blank" class="btn btn-warning pull-right">Export
                        PDF&nbsp;&nbsp; <i class="fa fa-file-pdf-o"></i></a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table id="tbl_trx" class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 3%;">No.</th>
                    <th style="width: 12%;">Tanggal</th>
                    <th style="width: 25%; max-width: 37%;">Uraian</th>
                    <th style="width: 16%; max-width: 37%;">Debet</th>
                    <th style="width: 16%; max-width: 37%;">Kredit</th>
                    <th style="width: 16%; max-width: 37%;">Kas</th>
                    <th style="width: 12%; text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($list_transaksi as $key => $transaksi): ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $transaksi->tanggal ?></td>
                        <td><?php echo $transaksi->uraian ?></td>
                        <td><?php echo money_formatter($transaksi->debet) ?></td>
                        <td><?php echo money_formatter($transaksi->kredit) ?></td>
                        <td><?php echo money_formatter($balance = $balance + ($transaksi->debet - $transaksi->kredit)) ?></td>
                        <td>
                            <div class="btn-group" style="text-align: center">
                                <a href="<?php echo site_url() ?>main/transaksiedit/<?php echo $jurnal->id ?>/<?php echo $transaksi->id ?>"
                                   class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo site_url() ?>main/transaksidelete/<?php echo $jurnal->id ?>/<?php echo $transaksi->id ?>"
                                   class="btn btn-danger"
                                   onclick="return confirm('Apakah anda yaking menghapus data ini?')"><i
                                            class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#tbl_trx').DataTable({
        "lengthMenu": [[5, 8, 55, -1], [5, 8, 55, "All"]]
    });

    $('#kredit').keyup(function (e) {
        if (e.target.value.length === 0) {
            $('#debet').prop('disabled', false);
        } else {
            $('#debet').prop('disabled', true);
        }
    })

    $('#debet').keyup(function (e) {
        if (e.target.value.length === 0) {
            $('#kredit').prop('disabled', false);
        } else {
            $('#kredit').prop('disabled', true);
        }
    })
</script>