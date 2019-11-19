<main class="card p-3">
    <?= $this->session->flashdata('error') ?>
    <div class="col-lg-12 mt-3">
        <h4>Upload Topic Video</h4>
        <hr>
    </div>
    <div class="col-lg-12">
        <div id="container">
            <div id="body">
                <p>Select a video file to upload</p>
                <?php
			if (isset($success) && strlen($success)) {
				echo '<div class="success">';
				echo '<p>' . $success . '</p>';
				echo '</div>';
				
				//traditional video play - less than HTML5
				echo '<object width="338" height="300">
				  <param name="src" value="' . $video_path . '/' . $video_name . '">
				  <param name="autoplay" value="false">
				  <param name="controller" value="true">
				  <param name="bgcolor" value="#333333">
				  <embed type="' . $video_type . '" src="' . $video_path . '/' . $video_name . '" autostart="false" loop="false" width="338" height="300" controller="true" bgcolor="#333333"></embed>
				  </object>';
				//HTML5 video play
				/*echo '<video width="320" height="240" controls>
				  <source src="' . $video_path . '/' . $video_name . '" type="' . $video_type . '">
				  Your browser does not support the video tag.
				  </video>';*/
			}
			if (isset($errors) && strlen($errors)) {
				echo '<div class="error">';
				echo '<p>' . $errors . '</p>';
				echo '</div>';
			}
			if (validation_errors()) {
				echo validation_errors('<div class="error">', '</div>');
			}
        ?>
                <?php
			$attributes = array('name' => 'video_upload', 'id' => 'video_upload');
			echo form_open_multipart($this->uri->uri_string(), $attributes);
        ?>
                <p><input name="video_name" class="form-control" id="video_name" readonly="readonly" type="file" /></p>
                <p><input name="video_upload" class="btn btn-sm btn-success" value="Upload Video" type="submit" /></p>
                <div class="row">
                    <div class="col-4">
                        <img src="https://via.placeholder.com/200" alt="">
                    </div>
                    <div class="col-8">
                         <div class="progress">
       						<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
       					</div>
      					<div id="targetLayer" style="display:none;"></div>
                        <div class="row">
                        	<div class="col-6 mt-3">
                        		<button class="btn btn-danger" type="button" name="cancleUploading">Cancle Uploading</button>
                        	</div>
                        	<div class="col-6"></div>
                        </div>
                    </div>
                </div>
                <?php
			echo form_close();  ?>
			<div id="loader-icon" style="display:none;"><img src="loader.gif" /></div>
       
            </div>
        </div>
    </div>
</main>
<!-- <script>

$(document).ready(function(){
 $('#video_upload').submit(function(event){
  if($('#video_name').val())
  {
   event.preventDefault();
   $('#loader-icon').show();
   $('#targetLayer').hide();
   $(this).ajaxSubmit({
    target: '#targetLayer',
    beforeSubmit:function(){
     $('.progress-bar').width('50%');
    },
    uploadProgress: function(event, position, total, percentageComplete)
    {
     $('.progress-bar').animate({
      width: percentageComplete + '%'
     }, {
      duration: 1000
     });
    },
    success:function(){
     $('#loader-icon').hide();
     $('#targetLayer').show();
    },
    resetForm: true
   });
  }
  return false;
 });
});
</script> -->
