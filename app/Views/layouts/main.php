<div class="tm-main-content">

    <div class="tm-name">
      <p style="margin-top: 5px; margin-bottom: 5px;"><strong><?=$usr_nama?></strong></p>
    </div>

    <div id="tm-intro-img">
      <img src="<?=base_url('/public/image')?>/<?=$pht_image?>">
    </div>

    <div class="like-comment">
      <i id="like<?=$pht_id?>" like_id="<?=$lke_id?>" style="margin-right: 10px;" class="<?=(is_null($lke_id))?'far':'fas'?> fa-heart fa-2x like"> 
        <p style="float: right;"><span id="tlike<?=$pht_id?>"><?=$like?></span> likes</p>
      </i>
      <i class="far fa-comment fa-2x "></i>
    </div>
   
    <!-- About our cafe -->
    <section class="tm-section tm-section-small">
      <p style="margin-top: 10px;">
        <?=$pht_description?>
      </p>
    </section>
    
</div>