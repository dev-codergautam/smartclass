<main class="card p-3">
    <?= $this->session->flashdata('error') ?>
    <div class="col-lg-12 mt-3">
        <h4>Upload Topic Video</h4>
        <hr>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <form name="myForm" class="form-horizontal" id="uploadForm" action="<?= base_url('admin/ajax_upload_video'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="hindi">Choose Video</label>
                            <input type="file" class="form-control" name="topicVideo" autocomplete="off">
                        </div>
                        <div class="form-group col-6">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </div>
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <div class="progress mb-2" style="display:none" id="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div id="targetLayer"></div>
                    </div>
                </form>
                <div id="loaderIcon" style="display:none"><img src="<?= base_url('assets/image/loaderIcon.gif') ?>" alt="Loader Icon"></div>
            </div>
        </div>
    
        <!-- VIDEO UPLOADING -->
        <script>
            $(document).ready(function() {
                $('#uploadForm').submit(function(e) {
                    if ($('#uploadFile').val()) {
                        e.preventDefault();
                        $('loaderIcon').show()
                        $(this).ajaxSubmit({
                            target: "#targetlayer",
                            beforeSubmit: function() {
                                $('#progress').show()
                                $('.progress-bar').width('0%')
                            },
                            uploadProgress: function(event, position, total, percentComplete) {
                                $('.progress-bar').width(percentComplete + '%')
                                $('.progress-bar').html('<div id="progress-status">' + percentComplete + '% </div>')
                            },
                            success: function() {
                                $('$loaderIcon').hide()
                            },
                            resetForm: true
                        })
                        return false
                    }
                })
            })

        </script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
    </div>
</main>
