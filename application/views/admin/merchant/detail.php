<style>
.panel .panel-heading {
  background-color:#ffffff;
  font-weight:700;
  font-size:16px;
  color:#262626;
  border-color:#ffffff;
}
.panel .panel-heading a {
  font-weight:400;
  font-size:11px;
}
.panel .panel-default {
  border-color:#cccccc;
}
.panel .panel-thumbnail {
  padding:0;
}
.panel .img-circle {
  width:50px;
  height:50px;
}
.list-group-item:first-child,.list-group-item:last-child {
  border-radius:0;
}
h3,h4,h5 {
  border:0 solid #efefef;
  border-bottom-width:1px;
  padding-bottom:10px;
}
.modal-dialog {
  width: 450px;
}
.modal-footer {
  border-width:0;
}
.dropdown-menu {
  background-color:#f4f4f4;
  border-color:#f0f0f0;
  border-radius:0;
  margin-top:-1px;
}
</style>
<div class="content">
  <div class="row">
    <?php
    if(isset($merchant_product)){
      $product_total  = count($merchant_product);
    } else {
      $product_total = '0';
    }
    ?>
    <div class="col-md-12">
      <div class="card">
        <div class="content">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#profil" aria-controls="1" role="tab" data-toggle="tab">Profil</a></li>
            <li role="presentation"><a href="#desk" aria-controls="2" role="tab" data-toggle="tab">Deskripsi</a></li>
            <li role="presentation"><a href="#sosmed" aria-controls="3" role="tab" data-toggle="tab">Sosial Media</a></li>
            <li role="presentation"><a href="#produk" aria-controls="4" role="tab" data-toggle="tab">Produk (<?=$product_total?>)</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="profil">
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Merchant</label>
                    <input type="text" class="form-control border-input" id="name" value="<?=$records->name?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pemilik</label>
                    <input type="text" class="form-control border-input"  id="owner" required value='<?=$records->owner?>'>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kontak</label>
                    <input type="text" class="form-control border-input"  id="contact" required value='<?=$records->contact?>'>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control border-input"  id="email" value='<?=$records->email?>'>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Alamat </label>
                    <textarea class="form-control border-input" id="address"><?=$records->address?></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Logo</label>
                    <input type="file" accept="image/*" class="" name="logo" onchange="load_logo(event)" id="logo">
                    <input type="hidden" id="logo_old" value='<?= $records->logo_old ?>'>
                    <input type="hidden" id="logo_new" value=''>
                    <br>
                    <input type="hidden" id="max_num_gallery" value=''>
                    <img id="output_logo" style="width:100%;height:50%" class="img img-thumbnail" src="<?= $records->logo ?>"/>
                    <br><br>

                    <script>
                    var load_logo = function (event) {
                      var output_logo = document.getElementById('output_logo');
                      output_logo.src = URL.createObjectURL(event.target.files[0]);
                      $('#logo_new').val(event.target.files[0].name);
                    };
                    </script>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Cover</label>
                    <input type="file" accept="image/*" class="" name="logo" onchange="load_cover(event)" id="cover">
                    <input type="hidden" id="cover_old" value='<?= $records->cover_old ?>'>
                    <input type="hidden" id="cover_new" value=''>
                    <br>
                    <input type="hidden" id="max_num_gallery" value=''>
                    <img id="output_cover" style="width:100%;height:50%;background-repeat: repeat-x;" class="img img-thumbnail" src="<?= $records->cover ?>"/>
                    <br><br>

                    <script>
                    var load_cover = function (event) {
                      var output_cover = document.getElementById('output_cover');
                      output_cover.src = URL.createObjectURL(event.target.files[0]);
                      $('#cover_new').val(event.target.files[0].name);
                    };
                    </script>
                  </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="desk">
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Deskripsi </label>
                    <textarea class="form-control border-input" id="desc"><?=$records->description?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="sosmed">
              <br>
              <?php
              if(isset($merchant_scm)){
                foreach($merchant_scm as $each){
                  ?>
                  <div class="form-group">
                    <label><?=$each['sc_name']?></label>
                    <input type="text" class="form-control border-input social-media" value="<?=$each['scm_url']?>" id="<?=$each['sc_id']?>">
                  </div>
                  <?php
                }
              }
              ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="produk">
              <br>
              <?php
              if(isset($merchant_product)){
                foreach($merchant_product as $product){
                  ?>

                  <div class="col-sm-3 col-xs-4" onclick="location.href = '<?=ADMIN_WEBAPP_URL.'product/'.$product->id?>'" style="cursor: pointer;" title="<?=$product->name?>">
                    <div class="panel panel-default" style="height:420px;">
                      <div class="panel-thumbnail"><img src="<?=$product->thumbnail?>" class="img-responsive" style="height:230px;width:100%"></div>
                      <div class="panel-body">
                        <p class="lead">
                          <b>
                            <?php
                            if(strlen($product->name) > 20){
                              echo mb_substr($product->name, 0, 20).'.....';
                            } else {
                              echo $product->name;
                            }
                            ?>
                          </b>
                        </p>
                        <div style="margin-top:-15px;">
                          <small>By : <a><?=$records->link?></a></small>
                        </div>
                        <br>
                        <div style="height:70px">
                          <small>
                            <?php
                            if(isset($product->description)){
                              if(strlen($product->description) > 100){
                                echo mb_substr($product->description, 0, 100).'.....';
                              } else {
                                echo $product->description;
                              } } else {
                                echo "Tidak ada deskripsi. ";
                              }
                              ?>
                            </small>
                          </div>
                          <div class="pull-left">
                            <strong>Rp. <?=$product->price?> / <?=$product->dimension?></strong>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                }

                if($product_total == '0') {
                  echo "Belum ada produk dari merchant ini.<a href='".ADMIN_WEBAPP_URL.'product/add'."'>Klik di sini</a> untuk menambahkan. <br><br><br>";
                }
                ?>

              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="text-left">
                  <a href="<?=base_url().'admin/merchant/'?>"  class="btn btn-warning btn-fill btn-wd" onclick="">Kembali</a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="text-right">
                  <input type="hidden" id="edit_id" value="<?=$records->id?>">
                  <button  class="btn btn-info btn-fill btn-wd" onclick="Put()">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
