<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group btn-breadcrumb ">
          <a href="<?=base_url().'home'?>" class="btn btn-default btn-sm"><i class="fa fa-home"></i></a>
          <a  class="btn btn-default btn-sm">Pencarian dengan keyword : "<i><?=$keyword?></i>"</a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <h4 class="classic-title"><span>Produk (<?=count($search_product)?>)  </span></h4>
      </div>
      <?php if(isset($search_product)){
        foreach($search_product as $product){
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

        <div class="row">
          <div class="col-md-12">
            <h4 class="classic-title"><span>Merchant (<?=count($search_merchant)?>)  </span></h4>
          </div>
          <?php
          if(isset($search_merchant)){
            foreach($search_merchant as $each){
          ?>
          <div class="col-lg-3">
                  <div class="card hovercard" >
                      <div class="cardheader" style="background: url('<?=$each->cover?>');">

                      </div>
                      <div class="avatar">
                          <img alt="" src="<?=$each->logo?>">
                      </div>
                      <div class="info">
                          <div class="title">
                              <a target="_blank" href="<?=$each->link?>"><?=$each->name?></a>
                          </div>
                            <div class="desc">
                              <?php
                            if(strlen($each->description) > 20){
                              echo mb_substr($each->description, 0, 100).'.....';
                            } else {
                              echo $each->description;
                            }
                          ?></div>
                      </div>
                  </div>

              </div>
          <?php
            }
          }?>

        </div>


          </div>

        </div>
