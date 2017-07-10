<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Profil Info</h5>
        </div>
        <div class="panel-body">

            <?php echo $this->session->flashdata('msg') ?
                '<div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            ' . $this->session->flashdata('msg') . '
                        </div>' : '' ?>

            <form class="" action="<?php echo site_url() ?>user/store" method="post"
                  enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $user->id ?>">
                <input type="hidden" name="old_picture" value="<?php echo $user->picture ?>">
                <img id="img_profile" src="<?php echo base_url() ?>assets/upload/<?php echo $user->picture ?>"
                     alt="bow"
                     style="margin-bottom:21px; width: 155px; height: 155px;" class="center">
                <div class="form-group">
                    <input id="fileInput" name='picture' type="file" style="display:none;" accept="image/*"/>
                    <input type="button" class="btn btn-primary center" value="Change Image!"
                           onclick="document.getElementById('fileInput').click();"/>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Username</label>
                    <input type="text" name="username" class="form-control"
                           value="<?php echo $user->username ?>">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control"
                           value="<?php echo $user->password ?>">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $user->name ?>">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" value="Update Profil Info !!!"
                           class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script !src="">
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_profile').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileInput").change(function () {
        readURL(this);
    });
</script>

</div>