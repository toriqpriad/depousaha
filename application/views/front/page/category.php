<div id="content">
  <div class="container">
    <div class="call-action call-action-boxed call-action-style1 clearfix">
      <?php
      if(isset($category_data)){
        $name = $category_data['category_name'];
      }
      ?>
      <h4 class="primary"><strong>Beranda / Kategori / </strong> <?=$name?> (<?=$category_data['category_product_count']?>) </h4>
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
