<!-- Start Footer Section -->
<footer>
  <div class="container">
    <div class="row footer-widgets">


      <!-- Start Subscribe & Social Links Widget -->
      <div class="col-md-4 col-xs-12">
        <div class="footer-widget mail-subscribe-widget">
          <h4><?=$footer['info']->site_name?><span class="head-line"></span></h4>
          <i>"<?=$footer['info']->site_moto?>"</i>
          <p style="text-align:justify">
            <?php
            if(strlen($footer['info']->site_description) > 200){
              echo mb_substr($footer['info']->site_description, 0, 200).'.....';
            } else {
              echo $footer['info']->site_description;
            }
            ?>
          </p>
          <form class="subscribe">
            <a href="<?=base_url().'about_us'?>" class="btn btn-block btn-system">Selengkapnya ... </a>
          </form>
        </div>
      </div>
      <!-- .col-md-3 -->
      <!-- End Subscribe & Social Links Widget -->


      <!-- Start Twitter Widget -->
      <div class="col-md-4 col-xs-12">
        <div class="footer-widget social-widget">
          <h4>Visitor<span class="head-line"></span></h4>
            <p>
            Telah dikunjungi oleh sebanyak <strong><?=$footer['visitor']?> pengunjung </strong>.
            </p>

        </div>

        <div class="footer-widget social-widget">
          <h4>Social Media<span class="head-line"></span></h4>
          <ul class="social-icons">
            <?php
            if(isset($footer['social_media'])){
              foreach ($footer['social_media'] as $each){
            ?>
            <li>
              <a class="<?=$each['sc_name']?>" href="http://<?=$each['scm_url']?>"><i class="<?=$each['sc_icon']?>"></i></a>
            </li>
            <?php } } ?>
          </ul>

        </div>
      </div>
      <!-- .col-md-3 -->
      <!-- End Twitter Widget -->


      <!-- Start Flickr Widget -->
      <!-- .col-md-3 -->
      <!-- End Flickr Widget -->


      <!-- Start Contact Widget -->
      <div class="col-md-4 col-xs-12">
        <div class="footer-widget social-widget">
        <h4>Kontak & Alamat<span class="head-line"></span></h4>

        <div class="hr1" style="margin-bottom:10px;"></div>

        <!-- Info - Icons List -->
        <ul class="icons-list">
          <li><i class="fa fa-globe">  </i> <strong>Alamat    :</strong> <?=$footer['info']->site_contact?></li>
          <li><i class="fa fa-envelope-o"></i> <strong>Email  :</strong> <?=$footer['info']->site_email?></li>
          <li><i class="fa fa-mobile"></i> <strong>Telepon    :</strong> <?=$footer['info']->site_contact?> </li>
        </ul>
        <!-- .col-md-6 -->
      </div>
      <!-- .col-md-3 -->
      <!-- End Contact Widget -->
    </div>

    </div>
    <!-- .row -->

    <!-- Start Copyright -->
    <div class="copyright-section">
      <div class="row">

      </div>
      <!-- .row -->
    </div>
    <!-- End Copyright -->

  </div>
</footer>
<!-- End Footer Section -->


</div>
<!-- End Full Body Container -->

<!-- Go To Top Link -->
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

<div id="loader">
<div class="spinner">
  <div class="dot1"></div>
  <div class="dot2"></div>
</div>
</div>


<script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/script.js"></script>

</body>

</html>
