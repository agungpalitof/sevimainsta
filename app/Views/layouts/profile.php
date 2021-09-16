<?=view('layouts/header');?> 
  
  </head>
  <body>
    <div class="fixed-header">
        <div style="color: #3a4a58;" class="container">
          <a href="<?=base_url('home')?>"><i style="display: inline-block; vertical-align: baseline;" class="fas fa-camera-retro fa-2x"></i></a>
          <h1 style="display: inline-block; vertical-align: baseline; margin: 0px; margin-left: 5px;">Sevima Insta</h1> 
          <div style="float: right; display: flex; justify-content: flex-end"> 
            <a href="<?=base_url('User/signout')?>"><i style="display: inline-block; vertical-align: baseline; margin-top: 5px;" class="fas fa-sign-out-alt fa-2x"></i></a>
          </div>
        </div>
    </div>

    <div class="tm-container" style="margin-top: 70px;"> 
      <div class="tm-main-content">

          <div>
            <p style="margin-top: 5px; margin-bottom: 5px; font-size: 30px;"><?=$user['usr_nama'];?></p>
            <p><?=sizeof($photo)?> posts</p>
            <button id="add_new" class="btn"><i class="fas fa-camera-retro"></i>&nbsp;&nbsp;Upload</button>

            <div class="row" style="height: 100px;">
              <?php
                foreach ($photo as $key) { ?>
                  <div class="column">
                    <div class="containerImage">
                      <img style="height: 150px; object-fit: cover; " src="<?=base_url('public/image')?>/<?=$key['pht_image']?>" alt="Image" class="">
                      <div class="overlay">
                        <div class="textImage" style="width: 100%;">
                          <?php
                            if ($key['pht_lke_status'] == 1) { ?>
                              <p style="width: 100%;">Like : <?=$key['like']?></p>
                            <?php }

                            if ($key['pht_cmn_status'] == 1) { ?>
                              <p style="width: 100%;">Comment : <?=$key['comment']?></p>
                            <?php }

                            if ($key['pht_private'] == 1) { ?>
                              <p style="width: 100%;">Status : Private</p>
                            <?php }else{ ?>
                              <p style="width: 100%;">Status : Public</p>
                            <?php }
                          ?>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }
              ?>
            </div>

            <?php
              if(sizeof($photo) == 0){ ?>
                <p ><center>No Posts yet</center></p>
              <?php }
            ?>

          </div> 

          <div class="row">
          </div>
          
      </div>
    </div>
  </body>
</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#add_new").click(function(){
    location.href = "<?=base_url('Profile/add')?>";
  });
});
</script>