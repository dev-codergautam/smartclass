<main class="card p-3">
    <div class="col-lg-12 mt-3">
        <h4>Manage Notification</h4>
        <hr>
    </div>
    <?php date_default_timezone_set('Asia/Calcutta'); ?>
    <?php $atime = date("h:i:s A"); ?>
    <div class="col-lg-12">
        <?php echo $this->session->flashdata('success'); ?>
        <form name="myForm" class="form-horizontal" id="myForm" action="<?= base_url('admin/addNewNotification'); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-7">
                    <label for="name">Notification</label>
                    <textarea name="notificationTitle" rows="2" cols="30" class="form-control rounded-0" autocomplete="off" required></textarea>
                </div>
                <div class="form-group col-3">
                    <label for="name">URL</label>
                    <input type="text" name="notificationURL"  class="form-control rounded-0" autocomplete="off" >
                </div>
            
                <div class="form-group text-right col-2">
                    <div class="mt-4"></div>
                    <input type="submit" class="btn btn-info btn-block btn-sm" value="Send Notification">
                </div>
            </div>
        </form>
    </div>
    <?php if(!empty($notification)): ?>
        <div class="col-lg-12 mt-4">
            <table id="pass" class="table table-hover table-sm table-bordered" cellspacing="0" width="100%">
                <thead class="text-white bg-info">
                    <tr>
                        <th width="5%">#</th>
                        <th width="50%">Notification</th>
                        <th width="10%">URL</th>
                        <th width="10%">Date</th>
                        <th width="10%">Time</th>
                        <th width="15%">OPTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($notification as $notice): ?>
                    <tr>
                        <td><?= $notice->notificationId; ?> .</td>
                        <td><?= $notice->notificationTitle; ?></td>
                        <td class="text-center">
                            <?php $url =  $notice->notificationURL; ?>
                            <?php if($url != ""): ?>
                             <a class="btn btn-sm mr-1 btn-info" target="_blank" href=" <?= $notice->notificationURL; ?>"><i class="fa fa-link" ></i></a>
                             <?php else: ?>
                             <?php endif ?>
                        </td>
                        <td><?= $notice->notificationDate; ?></td>
                        <td><?= $notice->notificationTime; ?></td>
                        <td class="text-center">
                            <button class="btn btn-sm mr-1 btn-outline-warning" onclick="editnotification(<?= $notice->notificationId; ?>)"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-sm ml-1 btn-outline-danger" onclick="deleteNotification(<?= $notice->notificationId; ?>)"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="col-lg-12">
            <div class="jumbotron text-center">
                <h4>There isn't any category available</h4>
            </div>
        </div>
        <?php endif; ?>
</main>

<script type="text/javascript">
    $(document).ready(function() {
        $('#pass').DataTable({
            "pageLength": 10
        });
    });
</script>

<script type="text/javascript">
    (function($, W, D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL = {
            setupFormValidation: function() {
                //form validation rules
                $("#myForm").validate({
                    rules: {
                        notificationTitle: "required",
                    },
                    messages: {},
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            }
        }
        //when the dom has loaded setup form validation rules
        $(D).ready(function($) {
            JQUERY4U.UTIL.setupFormValidation();
        });
    })(jQuery, window, document);
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#whour').DataTable();
    });
    var save_method; //for save method string
    var table;

    function editnotification(id) {
        save_method = 'update';
        $('#myForm2')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "<?= base_url('admin/notificationEdit/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="notificationId"]').val(data.notificationId);
                $('[name="notificationTitle"]').val(data.notificationTitle);
                $('[name="notificationURL"]').val(data.notificationURL);

                $('#updateData').modal('show');
                $('.modal-title').text('Edit Data');

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function saveEditedNotification() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo site_url('')?>";
        } else {
            url = "<?= base_url('admin/updatenotification')?>";
        }
        $.ajax({
            url: url,
            type: "POST",
            data: $('#myForm2').serialize(),
            dataType: "JSON",
            success: function(data) {
                //if success close modal and reload ajax table
                $('#updateData').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }

    function deleteNotification(id) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                url: "<?= base_url('admin/notificationDelete/')?>" + id,
                type: "POST",

                success: function() {
                    location.reload();
                    swal("Done!", "Notification Deleted succesfully!", "success");
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    swal("Error deleting!", "Please try again", "error");
                }
            });
        });
    }

</script>


<!-- Bootstrap modal -->
<div class="modal fade" id="updateData" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Update Notification</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body form">
                <form action="#" id="myForm2" class="form-horizontal">
                    <input type="hidden" value="" name="notificationId" />
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Title</label>
                            <div class="col-md-9">
                                <textarea name="notificationTitle" rows="2" cols="30" class="form-control" type="text" required></textarea>
                            </div>
                            <label for="error" class="m-0 p-0 "><?= form_error('notificationTitle') ?></label>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">URL</label>
                            <div class="col-md-9">
                                <input name="notificationURL" class="form-control" type="text" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="saveEditedNotification()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End Bootstrap modal -->

<script type="text/javascript">
    (function($, W, D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL = {
            setupFormValidation: function() {
                //form validation rules
                $("#myForm2").validate({
                    rules: {
                        notificationTitle: "required",
                    },
                    messages: {},
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            }
        }
        //when the dom has loaded setup form validation rules
        $(D).ready(function($) {
            JQUERY4U.UTIL.setupFormValidation();
        });
    })(jQuery, window, document);
</script>
