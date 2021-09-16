<div class="tm-main-content">

    <div class="tm-name">
      <p style="margin-top: 5px; margin-bottom: 5px;"><strong><?=$photo['usr_nama']?></strong></p>
    </div>

    <div id="tm-intro-img">
      <img src="<?=base_url('/public/image')?>/<?=$photo['pht_image']?>">
    </div>

    <div class="like-comment">
      <i id="like<?=$photo['pht_id']?>" like_id="<?=$photo['lke_id']?>" style="margin-right: 10px;" class="<?=(is_null($photo['lke_id']))?'far':'fas'?> fa-heart fa-2x like"> 
        <p style="float: right;"><span id="tlike<?=$photo['pht_id']?>"><?=$photo['like']?></span> likes</p>
      </i>
      <i id="comment<?=$photo['pht_id']?>" style="margin-right: 10px;" class="far fa-comment fa-2x comment"> 
        <p style="float: right;"><span id="tcomment<?=$photo['pht_id']?>"><?=$photo['comment']?></span> comments</p>
      </i>
    </div>

    <section class="tm-section tm-section-small">
      <p style="margin-top: 10px; margin-bottom: 0px">
        <?=$photo['pht_description']?>
      </p>
    </section>
    
    <hr style="width: 99%; height: 0px; border: none border-top: 1px solid black;">

    <?php
      if(sizeof($comment) != 0){ ?>
          <div id="cmtBox<?=$photo['pht_id']?>" style="width: 94%; height: 50px; max-height: 50px; overflow-y: auto; margin : 15px; border : 1px solid grey; border-radius: 4px; padding: 5px;"> 
            <?php
              foreach ($comment as $key) { ?>
                <label><strong><?=$key['name']?></strong></label>&nbsp;&nbsp; <label><?=$key['cmt_text']?></label><br>
              <?php }
            ?> 
          </div>
      <?php }else{ ?>
        <div  id="cmtBox<?=$photo['pht_id']?>" style="display: none; width: 94%; height: 50px; max-height: 50px; overflow-y: auto; margin : 15px; border : 1px solid grey; border-radius: 4px; padding: 5px;"> </div>
      <?php }
    ?>

    <div class="comment-post">
      <input type="text" id="cmtpost<?=$photo['pht_id']?>" placeholder="&nbsp;&nbsp;Add a comment . . ." style="float: left; font-size: 15px; width: 75%; margin: 15px; margin-top: 1px; ">
      <input type="button" id="post<?=$photo['pht_id']?>" style="width: 15%; padding: 1px; margin-top: 0px;" class="button buttonBlue post" value="Post"></button>
    </div>
    <p style="height: 0px; margin-top: 5px;">&nbsp</p>
</div>