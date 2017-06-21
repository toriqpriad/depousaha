<div id="content">
  <div class="container">
    <div class="call-action call-action-boxed call-action-style1 clearfix">
      <h4 class="primary"><strong>Beranda / Semua Kategori  </strong> (<?=count($category_info)?>) </h4>
    </div>
    <br>

    <?php
    if(isset($category_info)){
      $each = $category_info;
      // print_r($each);
      ?>
      <div class="recent-projects" style="margin-bottom:30px;">
        <div class="row">
          <?php if(isset($each)){
            foreach($each as $kat){
              ?>
              <div class="col-md-4">
              <a href="<?=$kat['category_link']?>" class="btn btn-default btn-block btn-large border-btn"><?=$kat['category_name']?> (<?=$kat['category_product_count']?>)</a>
              </div>
              <?php } } ?>
            </div>
          <?php  }   ?>
          </div>
        </div>


      </div>
