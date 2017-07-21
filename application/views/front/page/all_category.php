<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group btn-breadcrumb ">
          <a href="<?=base_url().'home'?>" class="btn btn-default btn-sm"><i class="fa fa-home"></i></a>
          <a  class="btn btn-default btn-sm">Semua kategori (<?=count($category_info)?>)</a>
        </div>
      </div>
    </div>

    <hr>

    <?php
    if(isset($category_info)){
      $each = $category_info;
      // print_r($each);
      ?>
      <div class="recent-projects" >
        <div class="row">
          <?php if(isset($each)){
            foreach($each as $kat){
              ?>
              <div class="col-md-3" style="margin-bottom:20px;">
              <a href="<?=$kat['category_link']?>" class="btn btn-default btn-block btn-large border-btn"><?=$kat['category_name']?> (<?=$kat['category_product_count']?>)</a>
              </div>
              <?php } } ?>
            </div>
          <?php  }   ?>
          </div>
        </div>


      </div>
