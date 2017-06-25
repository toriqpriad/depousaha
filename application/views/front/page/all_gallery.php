<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group btn-breadcrumb ">
          <a href="<?=base_url().'home'?>" class="btn btn-default btn-sm"><i class="fa fa-home"></i></a>
          <a  class="btn btn-default btn-sm">Semua Galeri (<?=count($total_gallery)?>)</a>
        </div>
      </div>
    </div>

    <hr>

    <?php
    if(isset($gallery_data)){
      ?>
      <div class="recent-projects" style="margin-bottom:30px;">
        <div class="row">
          <?php
          $x = '0';
          foreach($gallery_data as $each){
            ?>
            <div class="col-md-4">
              <h4 class="classic-title"><span><?=$each->name?></span></h4>
                  <div class="touch-slider project-slider">
                    <?php foreach($each->img as $img) {?>
                      <div class="item">
                        <a class="lightbox" title="<?=$each->name?>" href="<?=$img?>" data-lightbox-gallery="gallery<?=$x?>">
                          <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                          <img alt="" src="<?=$img?>" style="width:100%;">
                        </a>
                      </div>
                      <?php
                      $x++;} ?>
                    </div>
                  </div>
              <?php }  ?>
            </div>
          </div>
          <?php  }   ?>

        </div>
