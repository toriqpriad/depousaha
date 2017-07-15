
<section id="home">
  <div id="main-slide" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php
      if(isset($slider_data)){
        $x = 0;
        foreach($slider_data as $slider){
          echo '<li data-target="#main-slide" data-slide-to="'.$x.'" class="active"></li>';
          $x++;
        }
      }
      ?>
    </ol>
    <div class="carousel-inner">
      <?php
      if(isset($slider_data)){
        $x = 0;
        foreach($slider_data as $each){
          if($x == 0) {
            ?>
            <div class="item active">
              <img class="img-responsive " src="<?=$each->image?>" alt="<?=$each->name?>">
            </div>
            <?php
          } else {
            ?>
            <div class="item">
              <img class="img-responsive " src="<?=$each->image?>" alt="<?=$each->name?>">
            </div>
            <?php
          }
          $x++;
        }
      }
      ?>
    </div>
    <a class="left carousel-control" href="#main-slide" data-slide="prev">
      <span><i class="fa fa-angle-left"></i></span>
    </a>
    <a class="right carousel-control" href="#main-slide" data-slide="next">
      <span><i class="fa fa-angle-right"></i></span>
    </a>
  </div>
</section>
<?php $this->load->view('front/include/search_bar');?>
<div id="content">
  <div class="container">
    <?php
    if(isset($category_data)){
      foreach($category_data as $each){
        ?>
        <div class="recent-projects" style="margin-bottom:30px;">
          <h4 class="title"><span><a href="<?=$each['category_link']?>"><?=$each['category_name']?></a></span></h4>
          <div class="projects-carousel touch-carousel">
            <?php if($each['category_product'] != ""){
              foreach($each['category_product'] as $product){
                ?>
                <div class="portfolio-item item">
                  <div class="portfolio-border">
                    <div class="portfolio-thumb">
                      <a  href="<?=$product->link?>">
                        <img alt="" src="<?=$product->img?>" style="height:200px;width:auto"/>
                      </a>
                    </div>
                    <div class="portfolio-details">

                      <h4><a href="<?=$product->link?>"><?=$product->name?></a></h4>
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
                <?php } } ?>
              </div>
            </div>
            <?php
          }
        }   ?>

        <div class="row">
          <div class="col-md-12">
            <div class="call-action call-action-boxed call-action-style1 no-descripton clearfix">
              <!-- Call Action Button -->
              <div class="button-side"><h2 class="accent-color"><?=$product_count?></h2></div>
              <!-- Call Action Text -->
              <h2 class="primary"><strong></strong> Jumlah produk yang terdaftar</h2>
            </div>
          </div>
        </div>
        <hr>
        <br>

        <div class="row">
          <div class="col-md-12">
            <div class="our-clients">
              <h4 class="classic-title"><span>Merchant Kami</span></h4>
              <div class="clients-carousel custom-carousel touch-carousel" data-appeared-items="3">
                <?php
                if(isset($merchant_data)){
                  foreach($merchant_data as $each){
                ?>
                        <div class="card hovercard" style="margin-right:10px;" >
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
                <?php
                  }
                }?>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div id="promo-slide" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php
                if(isset($merchant_promo_data)){
                  $x = 0;
                  foreach($merchant_promo_data as $promo){
                    echo '<li style="width: 30px !important;background-color: #3c763d" data-target="#promo-slide" data-slide-to="'.$x.'" class="active"></li>';
                    $x++;
                  }
                }
                ?>
              </ol>
              <div class="carousel-inner">
                <?php
                if(isset($merchant_promo_data)){
                  $x = 0;
                  foreach($merchant_promo_data as $each){
                    if($x == 0) {
                      ?>
                      <div class="item active">
                        <img class="img-responsive img-thumbnail" src="<?=$each->image?>" alt="<?=$each->name?>">
                      </div>
                      <?php
                    } else {
                      ?>
                      <div class="item">
                        <img class="img-responsive img-thumbnail" src="<?=$each->image?>" alt="<?=$each->name?>">
                      </div>
                      <?php
                    }
                    $x++;
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="hr1 margin-top"></div>
        <div class="row">
          <div class="col-md-12">
            <div class="call-action call-action-boxed call-action-style1 no-descripton clearfix">
              <div class="button-side"><h2 class="accent-color"><?=$merchant_count?></h2></div>
              <h2 class="primary"><strong></strong> Jumlah merchant yang terdaftar</h2>
            </div>
          </div>
        </div>
        <div class="hr1 margin-top"></div>
        <div class="row">
          <div class="col-md-12">
            <h4 class="classic-title"><span>Testimoni</span></h4>
            <div class="custom-carousel show-one-slide touch-carousel" data-appeared-items="2">
              <?php if(isset($testimoni_data)){
                foreach($testimoni_data as $testimoni){
                  ?>

                  <div class="classic-testimonials item" style="margin-right:3px;">
                    <div class="testimonial-content">
                      <p><?=$testimoni->comment?></p>
                    </div>
                    <div class="testimonial-author"><span><?=$testimoni->name?></span> - Testimoni</div>
                  </div>

                  <?php }
                }?>
              </div>
            </div>
          </div>
        </div>
      </div>
