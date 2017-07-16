<div id="content">
  <div class="container">
    <div class="row">
      <?php
      if(isset($category_data)){
        $name = $category_data['category_name'];
      }
      ?>
      <div class="col-md-12">
        <div class="btn-group btn-breadcrumb ">
          <a href="<?=base_url().'home'?>" class="btn btn-default btn-sm"><i class="fa fa-home"></i></a>
          <a  class="btn btn-default btn-sm">Kategori</a>
          <a class="btn btn-default btn-sm"><?=$name?> (<?=$category_data['category_product_count']?>)</a>
        </div>
      </div>
    </div>
    <br>
    <?php
    if(isset($category_data)){
      $each = $category_data;
      ?>
      <div class="recent-projects" style="margin-bottom:30px;">
        <div class="row">
          <?php if($each['category_product'] != ""){
            foreach($each['category_product'] as $product){
              ?>
              <div class="col-md-3">
              <div class="portfolio-item item">
                <div class="portfolio-border">
                  <div class="portfolio-thumb">
                    <a  href="<?=$product->link?>">
                      <img alt="" src="<?=$product->img?>" style="height:200px;width:auto"/>
                    </a>
                  </div>
                  <div class="portfolio-details">
                    <a href="<?=$product->link?>"><h4><?=$product->name?></h4></a>
                    <?php
                    if(strlen($product->description) > 20){
                      echo mb_substr($product->description, 0, 100).'.....';
                    } else {
                      echo $product->description;
                    }
                    ?>
                    <hr>
                    <p><b>Rp. <?=$product->price.'/'.$product->dimension?></b></p>
                  </div>
                </div>
              </div>
              </div>
              <?php } } ?>
            </div>
          <?php  }   ?>
          </div>
          <div class="text-center">
          <?=$pagination; ?>
            </div>
        </div>


      </div>
