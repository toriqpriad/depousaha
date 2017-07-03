<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-sm-6">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-xs-5">
                <div class="icon-big icon-warning text-left">
                  <i class="fa fa-users"></i>
                </div>
              </div>
              <div class="col-xs-7">
                <div class="numbers">
                  <p>Merchant</p>
                  <?=$total['merchant']?>
                </div>
              </div>
            </div>
            <div class="footer">
              <hr />
              <div class="stats">
                <a href="<?=ADMIN_WEBAPP_URL.'merchant'?>"><i class="fa fa-arrow-right"></i> Detail </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-xs-5">
                <div class="icon-big icon-success text-left">
                  <i class="fa fa-cube"></i>
                </div>
              </div>
              <div class="col-xs-7">
                <div class="numbers">
                  <p>Kategori Produk</p>
                  <?=$total['product_category']?>
                </div>
              </div>
            </div>
            <div class="footer">
              <hr />
              <div class="stats">
                <a href="<?=ADMIN_WEBAPP_URL.'product_category'?>"><i class="fa fa-arrow-right"></i> Detail </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-xs-5">
                <div class="icon-big icon-danger text-left">
                  <i class="fa fa-cubes"></i>
                </div>
              </div>
              <div class="col-xs-7">
                <div class="numbers">
                  <p>Produk</p>
                  <?=$total['product']?>
                </div>
              </div>
            </div>
            <div class="footer">
              <hr />
              <div class="stats">
                <a href="<?=ADMIN_WEBAPP_URL.'product'?>"><i class="fa fa-arrow-right"></i> Detail </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>    
    </div>
  </div>
</div>
