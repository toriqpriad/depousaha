<body>

  <!-- Full Body Container -->
  <div id="container">


    <!-- Start Header Section -->
    <div class="hidden-header"></div>
    <header class="clearfix">

      <!-- Start Top Bar -->
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <!-- Start Contact Info -->
              <ul class="contact-details">
                <li><a href="#"><i class="fa fa-map-marker"></i> <?=$footer['info']->site_address?></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> <?=$footer['info']->site_email?></a></li>
                <li><a href="#"><i class="fa fa-phone"></i> <?=$footer['info']->site_contact?></a></li>
                <li><a href="<?=base_url().'merchant/register/'?>"><i class="fa fa-user-plus"></i> Daftar Merchant </a></li>
              </ul>
              <!-- End Contact Info -->
            </div>
            <!-- .col-md-6 -->
            <div class="col-md-5">
              <!-- Start Social Links -->
              <ul class="social-list">
                <?php
                if(isset($footer['social_media'])){
                  foreach ($footer['social_media'] as $each){
                ?>
                <li>
                  <a class="<?=$each['sc_name']?> itl-tooltip" data-placement="bottom" title="<?=$each['sc_name']?>" href="http://<?=$each['scm_url']?>"><i class="<?=$each['sc_icon']?>"></i></a>
                </li>
                <?php } } ?>
              </ul>
              </ul>
              <!-- End Social Links -->
            </div>
            <!-- .col-md-6 -->
          </div>
          <!-- .row -->
        </div>
        <!-- .container -->
      </div>
      <!-- .top-bar -->
      <!-- End Top Bar -->


      <!-- Start  Logo & Naviagtion  -->
      <div class="navbar navbar-default navbar-top">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand" href="<?=base_url()?>">
              <?php
              if(isset($footer['info']->logo)){  ?>
              <img alt="" src="<?php echo $footer['info']->logo?>" style="width:100%;">
              <?php } else {?>
              <strong><?=$footer['info']->site_name?></strong>
              <?php }?>
            </a>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Stat Search -->

            <!-- End Search -->
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
              <?php
              if(isset($menu)){
              foreach($menu as $each){
                echo "<li>";
                if($active_page == $each['page_name']){
                  echo '<a href="'.$each["link"].'" class="active">'.$each['label'].'</a>';
              } else {
                echo '<a href="'.$each["link"].'">'.$each['label'].'</a>';
              }
              if(isset($each['sub'])){
                echo '<ul class="dropdown">';
                foreach($each['sub'] as $sub){
                  echo '<li><a href="'.$sub->link.'">'.$sub->name.'</a></li>';
                }
                echo '</ul>';

              }
                echo "</li>";
              }
              }
              ?>
            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
          <?php
          if(isset($menu)){
          foreach($menu as $each){
            echo "<li>";
            if($active_page == $each['page_name']){
              echo '<a href="'.$each["link"].'" class="active">'.$each['label'].'</a>';
          } else {
            echo '<a href="'.$each["link"].'">'.$each['label'].'</a>';
          }
            echo "</li>";
          }
          }
          ?>
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header Logo & Naviagtion -->

    </header>
    <!-- End Header Section -->
