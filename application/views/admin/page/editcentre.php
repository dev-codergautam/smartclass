<?php foreach($centre as $centre): ?>
<main class="card p-2">
    <div class="col-md-12 mt-3">
        <h4>Register Center</h4>
        <?= $this->session->flashdata('success') ?>
        <hr>
    </div>
    <div class="col-lg-12 mt-2">
        <?= form_open(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <h4 class="h5"><i class="fa fa-info-circle"></i> Organisation / Institute Head's Detail</h4>
                    <div class="borderbottom mb-4 ml-4"></div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label for="" class=" ">Full name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="name" value="<?= $centre->orgName; ?>">
                        </div>
                        <div class="form-group ">
                            <label for="" class=" ">Aadhar <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" name="aadhar" value="<?= $centre->orgAadhar; ?>">
                        </div>
                        <div class="form-group ">
                            <label for="" class=" ">Pan<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="pan" value="<?= $centre->orgPan; ?>">
                        </div>
                        <div class="form-group ">
                            <label for="" class=" ">Registration No.<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="regno" value="<?= $centre->orgRegNo; ?>">
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
                            <label for="" class=" ">Centre's Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="centrename" value="<?= $centre->orgCname ?>">
                        </div>
                        <div class="form-group ">
                            <label for="" class=" ">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" name="email" value="<?= $centre->orgEmail ?>">
                        </div>
                        <div class="form-group ">
                            <label for="" class=" ">Contact Number<span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" name="contact" value="<?= $centre->orgContact ?>">
                        </div>
                        <div class="form-group ">
                            <label for="" class=" ">Password<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="password" value="<?= $centre->orgPassword ?>">
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
        <?= form_close(); ?>
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
                            dob: "required",
                            gender: "required",
                            email: {
                                required: true,
                                email: true
                            },
                            address: "required",
                            class: "required",
                            father: "required",
                            mother: "required",
                            fatheroc: "required",
                            contact: {
                                required: true,
                                minlength: 10,
                                maxlength: 12,
                                number: true
                            },
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

</main>
<?php endforeach; ?>
