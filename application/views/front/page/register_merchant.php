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
      <form role="form" class="contact-form" id="contact-form" >
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
              <input type="text" placeholder="Captcha" name="captcha" id="captcha">
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
      </form>
      <!-- End Contact Form -->



    </div>


  </div>
</div>
