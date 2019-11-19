<main class="card p-2">
    <div class="col-md-12 mt-3">
        <h4>Register Center</h4>
        <?= $this->session->flashdata('success') ?>
        <hr>
    </div>
    <div class="col-lg-12 mt-2">
        <script src="<?= base_url(); ?>assets/js/nicEdit-latest.js" type="text/javascript"></script>
        <form name="myForm" class="form-horizontal" id="myForm" action="<?= base_url('admin/registerCentre'); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="tile">
                        <h4 class="h5"><i class="fa fa-info-circle"></i> Organisation / Institute Head's Detail</h4>
                        <div class="borderbottom mb-4 ml-4"></div>
                        <div class="tile-body">
                            <div class="form-group">
                                <label for="" class=" ">Full name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="name" placeholder="Your Name">
                            </div>
                            <div class="form-group ">
                                <label for="" class=" ">Aadhar <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm" name="aadhar" placeholder="Aadhar">
                            </div>
                            <div class="form-group ">
                                <label for="" class=" ">Pan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="pan" placeholder="Pan">
                            </div>
                            <div class="form-group ">
                                <label for="" class=" ">Registration Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="regno" placeholder="Registration number">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tile">
                        <h4 class="h5"><i class="fa fa-info-circle"></i> Organisation / Institute's Details</h4>
                        <div class="borderbottom mb-4 ml-4"></div>
                        <div class="tile-body">
                            <div class="form-group">
                                <label for="" class=" ">Organisation / Institute's Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="orgname">
                            </div>
                            <div class="form-group ">
                                <label for="" class=" ">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-sm" name="orgemail" placeholder="Organisation / Institute's Email">
                            </div>
                            <div class="form-group ">
                                <label for="" class=" ">Contact Number<span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm" name="orgcontact" placeholder="Organisation / Institute's Contact Number">
                            </div>
                            <div class="form-group ">
                                <label for="" class=" ">Password<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="orgpassword" placeholder="Give password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group  col-6 offset-lg-6 text-right">
                            <button type="submit" class="btn-primary btn float-right"><i class="fa fa-check"></i> Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script type="text/javascript">
        (function($, W, D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    //form validation rules
                    $("#myForm").validate({
                        rules: {
                            name: "required",
                            aadhar: "required",
                            pan: "required",
                            regno: "required",
                            orgemail: {
                                required: true,
                                email: true
                            },
                            orgname: "required",
                            orgcontact: {
                                required: true,
                                minlength: 10,
                                maxlength: 10,
                                number: true
                            },
                            orgpassword: {
                                required: true,
                            },
                        },
                        messages : {},
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

</main>
