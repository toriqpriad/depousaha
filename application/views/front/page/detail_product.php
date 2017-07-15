

<div id="content">
  <div class="container">
    <div class="row">
      <?php
      $catname = '';
      $catlink = '';
      $name = '';
      if(isset($record['info'])){
        $catname = $record['info']->category_name;
        $catlink = $record['info']->category_link;
        $name = $record['info']->name;
      }
      ?>
      <div class="col-md-12">
        <div class="btn-group btn-breadcrumb ">
          <a href="<?=base_url().'home'?>" class="btn btn-default btn-sm"><i class="fa fa-home"></i></a>
          <a href="<?=$catlink?>" class="btn btn-default btn-sm"><?=$catname?></a>
          <a class="btn btn-default btn-sm disabled"><?=$name?></a>
        </div>
      </div>
    </div>
    <hr>
    <div class="project-page row">
      <!-- Start Single Project Slider -->
      <div class="project-media col-md-4">
        <div class="panel panel-default">
          <div class="touch-slider project-slider">
            <?php
            if(isset($record['images'])){
              if(!empty($record['images'])){
                $x = '0';
                foreach($record['images'] as $img){
                  ?>
                  <div class="item">
                    <a class="lightbox" title="<?=$record['info']->name?>" href="<?=$img['url']?>" data-lightbox-gallery="gallery<?=$x?>">
                      <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                      <img alt="" src="<?=$img['url']?>" style="width:100%;">
                    </a>
                  </div>
                  <?php $x++;} } else {
                    ?>
                    <img alt="" src="<?=NO_IMG_URL?>" style="width:100%;">
                    <?php
                  } } ?>
                </div>
              </div>
            </div>
            <!-- End Single Project Slider -->

            <!-- Start Project Content -->
            <div class="project-content col-md-8">
              <h4><span><?=$record['info']->name?></span></h4>
              <div class="panel panel-default">
                <div class="panel-body">
                  <p><?=$record['info']->description?></p>
                </div>
                <div class="panel-footer">
                  <div class="row">
                    <div class="col-md-6">
                      <span><h3><i class="fa fa-tag "></i>&nbsp; <strong>Rp. <?=$record['info']->price?> / <?=$record['info']->dimension?><strong></h3></span>
                      </div>
                      <div class="col-md-6 ">
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style pull-right">
                          <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                          <a class="a2a_button_facebook"></a>
                          <a class="a2a_button_twitter"></a>
                          <a class="a2a_button_google_plus"></a>
                          <a class="a2a_button_pinterest"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <ul>
                <li><strong>Client:</strong> iThemesLab</li>
                <li><strong>Status:</strong> Finish on 30 Dec, 2013</li>
                <li><strong>Skills:</strong> creative, web design</li>
              </ul> -->
              <!-- <div class="post-share">
              <span>Share This:</span>
              <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
              <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
              <a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
              <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
              <a class="mail" href="#"><i class="fa fa-envelope"></i></a>
            </div> -->
          </div>
          <!-- End Project Content -->

        </div>

        <div class="row">
          <?php
          if(isset($record['info']->merchant)){
            $each = $record['info']->merchant;
            ?>
            <div class="col-lg-4">
              <div class="project-content">
                <h4><span>Informasi Merchant : </span></h4>
              </div>
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
              <?php } ?>
              <div class="col-lg-8">
                <div class="project-content">
                  <h4><span>Komentar : </span></h4>
                </div>
                <div class="panel panel-default" >
                  <div class="panel-body">
                    <div class="fb-comments" data-href="<?=base_url().'product/detail'.$record['info']->link?>" data-width="100%" data-numposts="10"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Start Recent Projects Carousel -->
            <!-- End Recent Projects Carousel -->

          </div>
        </div>
        <style>


        .card {
          padding-top: 20px;
          margin: 10px 0 20px 0;
          background-color: rgba(214, 224, 226, 0.2);
          border-style: solid;
          border-width: 1px;
          border-color:#f3ecec;
          -webkit-border-radius: 3px;
          -moz-border-radius: 3px;
          border-radius: 3px;
          -webkit-box-shadow: none;
          -moz-box-shadow: none;
          box-shadow: none;
          -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          box-sizing: border-box;
        }

        .card .card-heading {
          padding: 0 20px;
          margin: 0;
        }

        .card .card-heading.simple {
          font-size: 20px;
          font-weight: 300;
          color: #777;
          border-bottom: 1px solid #e5e5e5;
        }

        .card .card-heading.image img {
          display: inline-block;
          width: 46px;
          height: 46px;
          margin-right: 15px;
          vertical-align: top;
          border: 0;
          -webkit-border-radius: 50%;
          -moz-border-radius: 50%;
          border-radius: 50%;
        }

        .card .card-heading.image .card-heading-header {
          display: inline-block;
          vertical-align: top;
        }

        .card .card-heading.image .card-heading-header h3 {
          margin: 0;
          font-size: 14px;
          line-height: 16px;
          color: #262626;
        }

        .card .card-heading.image .card-heading-header span {
          font-size: 12px;
          color: #999999;
        }
        .card.hovercard .cardheader {
          background-size: cover;
          height: 135px;
        }

        .card .card-body {
          padding: 0 20px;
          margin-top: 20px;
        }

        .card .card-media {
          padding: 0 20px;
          margin: 0 -14px;
        }

        .card .card-media img {
          max-width: 100%;
          max-height: 100%;
        }

        .card .card-actions {
          min-height: 30px;
          padding: 0 20px 20px 20px;
          margin: 20px 0 0 0;
        }

        .card .card-comments {
          padding: 20px;
          margin: 0;
          background-color: #f8f8f8;
        }

        .card .card-comments .comments-collapse-toggle {
          padding: 0;
          margin: 0 20px 12px 20px;
        }

        .card .card-comments .comments-collapse-toggle a,
        .card .card-comments .comments-collapse-toggle span {
          padding-right: 5px;
          overflow: hidden;
          font-size: 12px;
          color: #999;
          text-overflow: ellipsis;
          white-space: nowrap;
        }

        .card-comments .media-heading {
          font-size: 13px;
          font-weight: bold;
        }

        .card.people {
          position: relative;
          display: inline-block;
          width: 170px;
          height: 300px;
          padding-top: 0;
          margin-left: 20px;
          overflow: hidden;
          vertical-align: top;
        }

        .card.people:first-child {
          margin-left: 0;
        }

        .card.people .card-top {
          position: absolute;
          top: 0;
          left: 0;
          display: inline-block;
          width: 170px;
          height: 150px;
          background-color: #ffffff;
        }

        .card.people .card-top.green {
          background-color: #53a93f;
        }

        .card.people .card-top.blue {
          background-color: #427fed;
        }

        .card.people .card-info {
          position: absolute;
          top: 150px;
          display: inline-block;
          width: 100%;
          height: 101px;
          overflow: hidden;
          background: #ffffff;
          -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          box-sizing: border-box;
        }

        .card.people .card-info .title {
          display: block;
          margin: 8px 14px 0 14px;
          overflow: hidden;
          font-size: 16px;
          font-weight: bold;
          line-height: 18px;
          color: #404040;
        }

        .card.people .card-info .desc {
          display: block;
          margin: 8px 14px 0 14px;
          overflow: hidden;
          font-size: 12px;
          line-height: 16px;
          color: #737373;
          text-overflow: ellipsis;
        }

        .card.people .card-bottom {
          position: absolute;
          bottom: 0;
          left: 0;
          display: inline-block;
          width: 100%;
          padding: 10px 20px;
          line-height: 29px;
          text-align: center;
          -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          box-sizing: border-box;
        }

        .card.hovercard {
          position: relative;
          padding-top: 0;
          overflow: hidden;
          text-align: center;
          background-color: rgba(214, 224, 226, 0.2);
        }


        .card.hovercard .avatar {
          position: relative;
          top: -50px;
          margin-bottom: -50px;
        }

        .card.hovercard .avatar img {
          width: 100px;
          height: 100px;
          max-width: 100px;
          max-height: 100px;
          -webkit-border-radius: 50%;
          -moz-border-radius: 50%;
          border-radius: 50%;
          border: 5px solid rgba(255,255,255,0.5);
        }

        .card.hovercard .info {
          padding: 4px 8px 10px;
        }

        .card.hovercard .info .title {
          margin-bottom: 4px;
          font-size: 24px;
          line-height: 1;
          color: #262626;
          vertical-align: middle;
        }

        .card.hovercard .info .desc {
          overflow: hidden;
          font-size: 12px;
          line-height: 20px;
          color: #737373;
          text-overflow: ellipsis;
        }

        .card.hovercard .bottom {
          padding: 0 20px;
          margin-bottom: 17px;
        }



        </style>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1919552084924059";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
