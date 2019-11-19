<main class="card p-3">
   <?= $this->session->flashdata('error') ?>
    <div class="col-lg-12 mt-3">
        <h4>Add Topic</h4>
        <hr>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <form name="myForm" class="form-horizontal" id="myForm" action="<?= base_url('admin/lessionVideo'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                       
                        <div class="form-group col-6">
                            <label for="hindi">Topic Name</label>
                            <input type="text" class="form-control" name="lessionName" autocomplete="off">
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
                            <select name="topicName" id="topicss" class="form-control">
                                <option value="">Select Lession</option>
                                <?php foreach ($sub as $row): ?>
                                <option id="<?= $row->subParent; ?>" value="<?= $row->subId; ?>">
                                    <?= $row->subName; ?>
                                </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label class="control-label">Choose Video</label>
                            <input class="form-control form-control-sm" type="file" name="lessionVideo">

                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="mt-3"></div>
                        <input type="submit" class="btn btn-success" value="Upload Lession Video">
                    </div>
                </form>
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
    </div>
</main>
