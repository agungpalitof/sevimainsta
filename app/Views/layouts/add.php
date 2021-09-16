<?=view('layouts/header');?> 
   
  </head>
  <body>
    <div class="fixed-header">
        <div style="color: #3a4a58;" class="container">
          <a href="<?=base_url('home')?>"><i style="display: inline-block; vertical-align: baseline;" class="fas fa-camera-retro fa-2x"></i></a>
          <h1 style="display: inline-block; vertical-align: baseline; margin: 0px; margin-left: 5px;">Visema Insta</h1> 
          <div style="float: right; display: flex; justify-content: flex-end"> 
            <a href="<?=base_url('User/signout')?>"><i style="display: inline-block; vertical-align: baseline; margin-top: 5px;" class="fas fa-sign-out-alt fa-2x"></i></a>
          </div>
        </div>
    </div>

    <div class="tm-container" style="margin-top: 70px;"> 
      <div class="tm-main-content">

          <p style="margin-top: 5px; margin-bottom: 5px; font-size: 30px;">Add new post</p> 
          
          <form action="<?=base_url('Profile/add')?>" method="POST" enctype="multipart/form-data">
            <div class="form" style="margin: 15px;">
              <div class="row">
                <div style="float: left;  width: 70%;">
                  <p"><strong>Image</strong></p>
                  <img style="border-radius: 5px; object-fit: cover;object-position: center; width: 90%;" id="prev_avatar" src="<?php echo site_url('public/image/default.png');?>">
                </div>
                <div style="float: left; width: 30%; margin: 0px;">
                  <p"><strong>Status</strong></p>
                  <label class="containercheckbox">Private
                    <input name="pht_private" type="checkbox" >
                    <span class="checkmark"></span>
                  </label>
                  <label class="containercheckbox">Like
                    <input name="pht_lke_status" type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                  </label>
                  <label class="containercheckbox">Comment
                    <input name="pht_cmn_status" type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="row">
                <input style="border: 0px; padding-left: 0px; margin-bottom: 10px;" type="file" class="form-control input-xs all" id="avatar" name="pht_image" accept="image/*" >
              </div>
              <div class="row">
                <p"><strong>Description</strong></p>
                <textarea name="pht_description" style="width: 100%; height: 100px;"></textarea>
              </div> 
              <div class="row" >
                <input type="button" id="cancel" style="width: 48%;" class="button buttonBlack" value="Cancel"></button>
                <input type="submit" style="width: 49%;" class="button buttonSuccess" value="Post"></input>
              </div>
              <p style="height: 5px;" ></p>
            </div> 
          </form>

      </div>
    </div>
  </body>
</html>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#cancel").click(function(){
       location.href = "<?=base_url('Profile')?>";
    });

    $("#avatar").on('change',function(){
      var favatar = $('#avatar').val(); 
      var re = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i; 
      if(favatar == '')
      {
        $('#message_avatar').html('').css('color', 'red');
        setDefault();
      }
      else if(!re.exec(favatar))
      {
        $('#message_avatar').html('File extension not supported!').css('color', 'red');
        setDefault();
      }
      else{
        $('#message_avatar').html('');
        readURL(this); 
      } 
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#prev_avatar').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }

    function setDefault()
    {
      $('#avatar').val('');  
      $("#prev_avatar").attr("src","<?php echo base_url()?>public/image/default.png"); 
    } 
});
</script>