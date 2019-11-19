<main class="card p-3">
    <?= $this->session->flashdata('error') ?>
    <div class="col-lg-12 mt-3">
        <h4>Add Topic</h4>
        <hr>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
               <?= $this->session->flashdata('success') ?>
                <form name="myForm" class="form-horizontal" id="uploadForm" action="<?= base_url('admin/lession'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="hindi">Topic Name</label>
                            <input type="text" class="form-control" name="topicName" autocomplete="off">
                        </div>
                        <div class="form-group col-6">
                            <label for="cat">Subject</label>
                            <select name="subjectName" id="subject" class="form-control">
                                <option value="">Select Subject</option>
                                <?php foreach($subjects as $rows): ?>
                                <option value="<?= $rows->subId ?>">
                                    <?= $rows->subName ?>
                                </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="cat">Lession</label>
                            <select name="lessionName" id="topicss" class="form-control">
                                <option value="">Select Lession</option>
                                <?php foreach ($sub as $row): ?>
                                <option id="<?= $row->subParent; ?>" value="<?= $row->subId; ?>">
                                    <?= $row->subName; ?>
                                </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <div class="mt-4 ml-5"></div>
                            <input type="submit" class="btn btn-success ml-4" value="Next Step" id="uploadSubmit">
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
        <script type="text/javascript">
            (function($, W, D) {
                var JQUERY4U = {};
                JQUERY4U.UTIL = {
                    setupFormValidation: function() {
                        //form validation rules
                        $("#myForm").validate({
                            rules: {
                                link: "required",
                                hindi: "required",
                                cat: "required",
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


        <!-- SELECT OPTION -->
        <script type="text/javascript">
            $("#subject").change(function() {
                if ($(this).data('options') === undefined) {
                    $(this).data('options', $('#topicss option').clone());
                }
                var id = $(this).val();
                var options = $(this).data('options').filter('[id=' + id + ']');
                $('#topicss').html(options);
            });

        </script>
        <!-- SELECT OPTION -->

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
