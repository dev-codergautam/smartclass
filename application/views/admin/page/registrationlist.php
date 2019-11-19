<mian class="card p-3">
    <div class="col-md-12 mt-3">
        <h4>Registered Center</h4>
        <?= $this->session->flashdata('success') ?>
        <hr>
    </div>
    <div class="col-lg-12 mt-3">
        <div class="row">
            <div class="col-sm-12">
                <table id="pass" class="table table-hover table-responsive table-bordered dataTable no-footer" cellspacing="0" role="grid" aria-describedby="enquiry_info">
                    <thead>
                        <tr role="row">
                            <th width="5%" class="sorting_desc">S.Id</th>
                            <th width="15%" class="sorting">
                                <div class="">Registration No.</div>
                            </th>
                            <th width="25%" class="sorting">
                                <div class="">Centre name</div>
                            </th>
                            <th width="25%" class="sorting">
                                <div class="">Centre Email</div>
                            </th>
                            <th width="15%" class="sorting">
                                <div class="">Centre Contact</div>
                            </th>
                            <th width="15%" class="sorting">
                                <div class="">Action</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($centre as $centre): ?>
                        <tr class="even" role="row">
                            <td class="align-middle sorting_1"><?= $centre->orgId ?></td>
                            <td class="align-middle"><?= $centre->orgRegNo ?></td>
                            <td class="align-middle">
                                <?= $centre->orgCname ?>
                            </td>
                            <td class="align-middle">
                                <?= $centre->orgEmail ?>
                            </td>
                            <td class="align-middle">
                                <?= $centre->orgContact ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/viewcentre/'.$centre->orgSlug) ?>" class="btn btn-sm btn-outline-info btn-circle btn-circle" title="View Details"><i class="fa fa-eye"></i></a>

                                <a href="<?= base_url('admin/editcentre/'.$centre->orgSlug) ?>" class="btn btn-sm btn-outline-success btn-circle btn-circle" title="Edit Details"><i class="fa fa-pencil"></i></a>

                                <button class="btn btn-sm btn-outline-danger btn-circle btn-circle" onclick="deleteCentre(<?= $centre->orgId; ?>)"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</mian>

<script type="text/javascript">
    $(document).ready(function() {
        $('#pass').DataTable({
            "pageLength": 10
        });
    });


    function deleteCentre(id) {
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
                url: "<?= base_url('admin/centreDelete/')?>" + id,
                type: "POST",

                success: function() {
                    location.reload();
                    swal("Done!", "It was succesfully deleted!", "success");
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    swal("Error deleting!", "Please try again", "error");
                }
            });
        });
    }

</script>
