<div id="content">
  <div class="container">
    <div class="call-action call-action-boxed call-action-style1 clearfix">
      <h4 class="primary"><strong>Beranda / Semua Produk  </strong> (<?=$total_product?>) </h4>
    </div>
    <br>
    <div class="row">
      <?php if(isset($product_data)){
        foreach($product_data as $product){
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
                  echo $product->name;
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
  <div class="row"><center><?=$pagination?></center></div>
</div>
</div>
