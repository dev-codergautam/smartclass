<main class="card p-3">
    <div class="col-lg-12 mt-3">
        <h4>Add New News</h4>
        <hr>
    </div>
    <div class="col-lg-12 mt-3">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-2"></div>
        <div class="col-lg-4 col-8">
            <form method="post" action="<?= base_url(); ?>admin/ajax_upload" id="" align="center" enctype="multipart/form-data">
                <img src="<?= base_url(); ?>assets/image/default.jpg" alt="Your profile picture" id="blah" class="img-fluid w-100">
                <div class="custom-file">
                    <input type="file" class="w-100 custom-file-input" name="image_file" onchange="readURL1(this);" id="image_file">
                    <label class="custom-file-label" for="image_file">Choose Image</label>
                </div>
                <!--
                <input type="file" name="image_file" id="image_file" />
                -->
                <input type="text" name="mainId" value="<?php echo $this->uri->segment(3); ?>" hidden>
                
                <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-block btn-info mt-4" />
            </form>
            <!--
               <div id="uploaded_image">
               <?php // echo $image_data; ?>
               </div>
            -->
        </div>
        <div class="col-lg-4 col-2"></div>
    </div>
</main>

<script>  
   $(document).ready(function(){
        $('#upload_form').on('submit', function(e){
            e.preventDefault();
            if($('#image_file').val() == '')
            {
                alert("Please Select the File");
            }
            else
            {
                $.ajax({
                    url:"<?= base_url(); ?>admin/ajax_upload",
                    method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                });
            }
        });
    });
</script>

<script>
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result).class('img-fluid').height(auto);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
