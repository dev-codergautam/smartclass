<mian class="card p-3">
    <div class="col-md-12 mt-3">
        <h4>Listed Topics Video</h4>
        <hr>
    </div>
    <div class="col-lg-12 mt-3">
        <div style="overflow-x:scroll">
            <table id="pass" class="table table-hover table-bordered dataTable no-footer" cellspacing="0" role="grid" aria-describedby="enquiry_info">
                <thead>
                    <tr role="row">
                        <th width="15%" class="sorting">
                            <div class="">Topic Name</div>
                        </th>
                        <th width="15%" class="sorting">
                            <div class="">Topic SUbject</div>
                        </th>
                        <th width="30%" class="sorting">
                            <div class="">Topic Lession</div>
                        </th>
                        <th width="20%" class="sorting">
                            <div class="">Video</div>
                        </th>
                        <th width="20%" class="sorting">
                            <div class="">Action</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($topics as $topic): ?>
                    <?php 
                        $data['sub'] = $this->admin_datawork->get_id('subjects',['subId' => $topic->topicSubject]);
                        $data['less'] = $this->admin_datawork->get_id('subjects', ['subId' => $topic->topicLession]); 
                    ?>
                    <tr>
                        <td>
                            <?= $topic->topicName ?>
                        </td>
                        <td>
                            <?= $data['sub']['subName'] ?>
                        </td>
                        <td>
                            <?= $data['less']['subName'] ?>
                        </td>
                        <td>
                            <div class="embed-responsive embed-responsive-16by9" style="width:150px; height:150">
                                <iframe class="embed-responsive-item" src="<?= base_url().'assets/topicvideo/'.$topic->topicVideo; ?>?autoplay=off" allowfullscreen></iframe>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url(); ?>admin/topics/<?= $topic->topicId; ?>" class="btn btn-sm mx-1 btn-info"><i class="fa fa-eye"></i></a>

                            <button class="btn btn-sm mx-1 btn-warning" onclick="editsubject(<?= $topic->topicId; ?>)"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-sm mx-1 btn-danger" onclick="deleteWhour(<?= $topic->topicId; ?>)"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</mian>

<script type="text/javascript">
    $(document).ready(function() {
        $('#pass').DataTable({
            "pageLength": 5
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
