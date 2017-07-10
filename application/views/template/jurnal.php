<?php echo $this->session->flashdata('pesan') ?
    '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-right: 89px; margin-left: 89px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            ' . $this->session->flashdata('pesan') . '
                        </div>' : '' ?>

<div class="col-md-4 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Tambah Jurnal</h5>
        </div>
        <div class="panel-body">
            <form action="<?php echo site_url() ?>main/store" method="post">
                <input type="hidden" name="jurnal_id" value="<?php echo $jurnal ? $jurnal->id : '' ?>">
                <div class="form-group">
                    <label for="" class="control-label">Nama</label>
                    <input type="text" class="form-control" name="nama"
                           value="<?php echo $jurnal ? $jurnal->nama : '' ?>">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Keterangan</label>
                    <textarea name="keterangan" id="" rows="3"
                              class="form-control"><?php echo $jurnal ? $jurnal->keterangan : '' ?></textarea>
                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-danger" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>List Jurnal</h5>
        </div>
        <div class="panel-body">
            <table id="tbl_jurnal" class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 5%; max-width: 5%;">No.</th>
                    <th style="width: 30%; max-width: 30%;">Nama</th>
                    <th style="width: 37%; max-width: 37%;">Keterangan</th>
                    <th style="width: 28%; max-width: 28%;text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($list_jurnal as $key => $jrn): ?>
                    <tr>
                        <td style="width: 5%; max-width: 5%;"><?php echo($key + 1) ?></td>
                        <td style="width: 30%; max-width: 30%;"><?php echo $jrn->nama ?></td>
                        <td style="width: 37%; max-width: 37%;"><?php echo $jrn->keterangan ?></td>
                        <td style="width: 28%; max-width: 28%;text-align: center">
                            <div class="btn-group" style="text-align: center">
                                <a href="<?php echo site_url() ?>main/edit/<?php echo $jrn->id ?>"
                                   class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo site_url() ?>main/delete/<?php echo $jrn->id ?>"
                                   class="btn btn-danger"
                                   onclick="return confirm('Apakah anda yaking menghapus data ini?')"><i
                                            class="fa fa-trash"></i></a>
                                <a href="<?php echo site_url() ?>main/transaksi/<?php echo $jrn->id ?>"
                                   class="btn btn-success"><i
                                            class="fa fa-eye"></i></a>
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
    $('#tbl_jurnal').DataTable({
        "lengthMenu": [[5, 8, 55, -1], [5, 8, 55, "All"]]
    });
</script>