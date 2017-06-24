<div id="content">
  <div class="container">
    <?php
    $name = '';
    $link = '';
    if(isset($merchant_info)){
      $name = $merchant_info->name;
      $link = $merchant_info->link;
    }
    ?>
    <div class="col-md-12">
      <div class="btn-group btn-breadcrumb ">
        <a href="<?=base_url().'home'?>" class="btn btn-default btn-sm"><i class="fa fa-home"></i></a>
        <a href="<?=base_url().'merchant'?>" class="btn btn-default btn-sm">Semua Merchant</a>
        <a href="<?=$link?>" class="btn btn-default btn-sm"><?=$name?></a>
      </div>
    </div>
    <hr>
    <?php if($merchant_info->logo != NO_IMG_URL) {?>
    <div class="col-md-3" style="margin-top:10px;">
      <?php
      if(isset($merchant_info)){
        ?>
        <img src="<?=$merchant_info->logo?>" class="img img-thumbnail">
        <div class="panel panel-default" style="margin-top:10px;">
          <div class="panel-body">
            <?=$merchant_info->description?>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
    <?php } ?>
    <div class="col-md-9" style="margin-top:10px;">
      <div class="tabs-section">

        <!-- Nav Tabs -->
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-1" data-toggle="tab" aria-expanded="false">Informasi</a></li>
          <li ><a href="#tab-2" data-toggle="tab" aria-expanded="true">Produk</a></li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
          <!-- Tab Content 1 -->
          <div class="tab-pane  fade active in" id="tab-1">
            <!-- Classic Heading -->

            <h4 class="classic-title"><span><?=$merchant_info->name?></span></h4>
            <!-- Some Info -->
            <?php
            if(isset($merchant_info)){
              if($merchant_info->cover != NO_IMG_URL){
              ?>

              <img src="<?=$merchant_info->cover?>" class="img" style="">

              <?php

            } }
            ?>

            <p><?=$merchant_info->description?></p>

            <!-- Divider -->
            <div class="hr1" style="margin-bottom:10px;"></div>

            <!-- Info - Icons List -->
            <ul class="icons-list">
              <li><i class="fa fa-globe">  </i> <strong>Alamat    :  </strong> <?=$merchant_info->address?></li>
              <li><i class="fa fa-envelope-o"></i> <strong>Email  : </strong> <?=$merchant_info->email?></li>
              <li><i class="fa fa-mobile"></i> <strong>Phone      : </strong> <?=$merchant_info->contact?></li>
            </ul>

            <!-- Divider -->
            <div class="hr1" style="margin-bottom:15px;"></div>

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Sosial Media</span></h4>

            <!-- Info - List -->
            <div class="row">
              <div class="container">
                <div class="post-share">
                <?php
                if(isset($merchant_scm)){

                  foreach($merchant_scm as $each){
                    if(!empty($each['sc_url'])){
                      ?>
                      <a class="<?=$each['sc_name']?>" href="http://<?=$each['sc_url']?>"><i class="<?=$each['sc_icon']?>"></i></a>
                      <?php } } }?>
                    </div>
                  </div>
                </div>

              </div>
              <!-- Tab Content 2 -->
              <div class="tab-pane" id="tab-2">

                <?php
                if(isset($merchant_promo)){
                  ?>
                  <div class="panel panel-default">
                    <div class="touch-slider project-slider">
                      <?php

                      $x = '0';
                      foreach($merchant_promo as $img){
                        ?>
                        <div class="item">
                          <a title="<?=$img->name?>" href="<?=$img->url?>" data-lightbox-gallery="gallery<?=$x?>">
                            <img alt="" src="<?=$img->img?>" style="width:100%;">
                          </a>
                        </div>
                        <?php $x++;} ?>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                  <div class="row">
                    <?php
                    if(isset($merchant_product)){
                      foreach($merchant_product as $product){
                        ?>
                        <div class="col-md-4">
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

                        <?php
                      }
                    }
                    ?>
                  </div>
                  <center><?=$pagination?></center>
                </div>
              </div>
              <!-- End Tab Panels -->

            </div>

          </div>
          <!-- Start Recent Projects Carousel -->
          <!-- End Recent Projects Carousel -->

        </div>
      </div>
