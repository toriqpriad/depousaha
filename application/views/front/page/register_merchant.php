<script src="<?= BACKEND_STATIC_FILES ?>js/bootstrap-notify.js"></script>

<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group btn-breadcrumb ">
          <a href="<?=base_url().'home'?>" class="btn btn-default btn-sm"><i class="fa fa-home"></i></a>
          <a  class="btn btn-default btn-sm">Merchant</a>
          <a  class="btn btn-default btn-sm">Pendaftaran Merchant</a>
        </div>
      </div>
    </div>

    <hr>
    <div class="row">



      <!-- Classic Heading -->
      <div class="col-md-12">
        <h4 class="classic-title"><span>Pendaftaran Merchant</span></h4>
      </div>
      <div  class="contact-form" id="contact-form" >
        <div class="col-md-6">
          <div class="form-group">
            <div class="controls">
              <input type="text" placeholder="Nama Merchant" name="name" id="name">
            </div>
          </div>
          <div class="form-group">
            <div class="controls">
              <input type="text" placeholder="Nama Owner" name="owner" id="owner">
            </div>
          </div>
          <div class="form-group">
            <div class="controls">
              <input type="text" placeholder="Kontak" name="contact" id="contact">
            </div>
          </div>
          <div class="form-group">
            <div class="controls">
              <input type="email" class="email" placeholder="Email" name="email" id="email">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="controls">
              <input type="text" placeholder="Masukkan captcha di bawah ini ... ." name="captcha" id="captcha">
              <input type="hidden" placeholder="Captcha" name="captcha_word" id="captcha_word" value="<?=$captcha_word?>">
            </div>
          </div>

          <div class="form-group">
            <div class="controls">
              <?php echo $captcha?>
            </div>
          </div>

          <div class="form-group">
          </div>
          <button type="submit" id="submit" class="btn-system btn-large" onclick="register()">Daftar</button>
          <div id="success" style="color:#34495e;"></div>
        </div>
      </div>
      <!-- End Contact Form -->



    </div>


  </div>
</div>
