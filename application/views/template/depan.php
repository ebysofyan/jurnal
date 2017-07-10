<div class="col-md-4 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Tambah Jurnal</h5>
        </div>
        <div class="panel-body">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="" class="control-label">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Keterangan</label>
                    <textarea name="keterangan" id="" rows="3" class="form-control"></textarea>
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
                    <th style="width: 5%">No.</th>
                    <th style="width: 30%">Nama</th>
                    <th style="width: 45%">Keterangan</th>
                    <th style="width: 20%; text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Test</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad dolor est optio provident tempora?
                        Cum dolorum ducimus laudantium recusandae rem tempora totam? Consequatur dolore odio sint soluta
                        sunt tenetur voluptates?
                    </td>
                    <td>
                        <div class="btn-group" style="text-align: center">
                            <a href="#"
                               class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                            <a href="#"
                               class="btn btn-danger"
                               onclick="return confirm('Do you want to delete this data?')"><i
                                        class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
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