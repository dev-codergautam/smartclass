<?php foreach($centre as $centre): ?>
   <main class="card p-2">
    <div class="col-md-12 mt-3">
        <h4>Evolution Trust</h4>
        <hr>
    </div>
    <div class="col-lg-12 mt-2">
        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <h4 class="h5"><i class="fa fa-info-circle"></i> Organisation / Institute Head's Detail</h4>
                    <div class="borderbottom mb-4 ml-4"></div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label for="" class=" ">Full name <span class="text-danger">*</span></label>
                            <h3 class="text-muted h6 ml-3"><?= $centre->orgName; ?></h3>
                        </div>
                        <div class="form-group ">
                            <label for="" class=" ">Aadhar <span class="text-danger">*</span></label>
                            <h3 class="text-muted h6 ml-3"><?= $centre->orgAadhar; ?></h3>
                        </div>
                        <div class="form-group ">
                            <label for="" class=" ">Pan<span class="text-danger">*</span></label>
                            <h3 class="text-muted h6 ml-3"><?= $centre->orgPan; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile">
                    <h4 class="h5"><i class="fa fa-info-circle"></i> Organisation / Institute's Details</h4>
                    <div class="borderbottom mb-4 ml-4"></div>
                    <div class="tile-body">
                       <div class="form-group ">
                            <label for="" class=" ">Registration No.<span class="text-danger">*</span></label>
                            <h3 class="text-muted h6 ml-3"><?= $centre->orgRegNo; ?></h3>
                        </div>
                        <div class="form-group">
                            <label for="" class=" ">Centre's Name<span class="text-danger">*</span></label>
                            <h3 class="text-muted h6 ml-3"><?= $centre->orgCname; ?></h3>
                        </div>
                        <div class="form-group ">
                            <label for="" class=" ">Email <span class="text-danger">*</span></label>
                            <h3 class="text-muted h6 ml-3"><?= $centre->orgEmail; ?></h3>
                        </div>
                        <div class="form-group ">
                            <label for="" class=" ">Contact Number<span class="text-danger">*</span></label>
                            <h3 class="text-muted h6 ml-3"><?= $centre->orgContact; ?></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>
<?php endforeach; ?>