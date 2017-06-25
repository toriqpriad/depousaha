<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group btn-breadcrumb ">
          <a href="<?=base_url().'home'?>" class="btn btn-default btn-sm"><i class="fa fa-home"></i></a>
          <a  class="btn btn-default btn-sm"><?=$title_page?> </a>
        </div>
      </div>
    </div>

    <hr>
    <div class="row">

          <div class="col-md-8">

            <!-- Classic Heading -->
            <h4 class="classic-title"><span><?=$site_info->site_name?></span></h4>

            <!-- Start Contact Form -->
            <p style="text-align:justify">
              <img class="image-text" style="float:left; width:20%;" alt="" src="<?=$site_info->logo?>">
              <?=$site_info->site_description?>
            </p>
            <!-- End Contact Form -->

          </div>

          <div class="col-md-4">

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Kontak & Alamat</span></h4>

            <div class="hr1" style="margin-bottom:10px;"></div>

            <!-- Info - Icons List -->
            <ul class="icons-list">
              <li><i class="fa fa-globe">  </i> <strong>Alamat    :</strong> <?=$site_info->site_contact?></li>
              <li><i class="fa fa-envelope-o"></i> <strong>Email  :</strong> <?=$site_info->site_email?></li>
              <li><i class="fa fa-mobile"></i> <strong>Telepon    :</strong> <?=$site_info->site_contact?> </li>
            </ul>

            <!-- Divider -->
            <div class="hr1" style="margin-bottom:15px;"></div>

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Social Media</span></h4>

            <!-- Info - List -->
            <!-- <ul class="list-unstyled">
              <?php if(isset($site_scm)){

                foreach($site_scm as $each){
                  ?>
                  <li><i class='<?=$each['sc_icon']?>'></i><strong><?=$each['scm_url']?></strong></li>
                  <?php
                }
              }?>

            </ul> -->
            <div class="post-share">
            <?php
            if(isset($site_scm)){

              foreach($site_scm as $each){
                  ?>
                  <a class="<?=$each['sc_name']?>" href="http://<?=$each['scm_url']?>"><i class="<?=$each['sc_icon']?>"></i></a>
                  <?php } } ?>
                </div>

          </div>

        </div>


    </div>
  </div>
