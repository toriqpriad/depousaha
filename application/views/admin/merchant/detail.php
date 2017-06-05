<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="content">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#profil" aria-controls="1" role="tab" data-toggle="tab">Profil</a></li>
            <li role="presentation"><a href="#desk" aria-controls="2" role="tab" data-toggle="tab">Deskripsi</a></li>
            <li role="presentation"><a href="#sosmed" aria-controls="3" role="tab" data-toggle="tab">Sosial Media</a></li>
            <li role="presentation"><a href="#produk" aria-controls="4" role="tab" data-toggle="tab">Produk</a></li>
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
                    <br>
                    <input type="hidden" id="max_num_gallery" value=''>
                    <img id="output_logo" style="width:100%;height:50%" class="img img-thumbnail" src="<?= BACKEND_IMAGE_FOLDER . 'noimg.png' ?>"/>
                    <br><br>

                    <script>
                    var load_logo = function (event) {
                      var output_logo = document.getElementById('output_logo');
                      output_logo.src = URL.createObjectURL(event.target.files[0]);
                    };
                    </script>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Cover</label>
                    <input type="file" accept="image/*" class="" name="cover" onchange="load(event)" id="cover">
                    <br>
                    <input type="hidden" id="max_num_gallery" value=''>
                    <img id="output_cover" style="width:100%;height:50%;background-repeat: repeat-x;" class="img img-thumbnail" src="<?= BACKEND_IMAGE_FOLDER . 'noimg.png' ?>"/>
                    <br><br>
                    <script>
                    var load = function (event) {
                      var output = document.getElementById('output_cover');
                      output.src = URL.createObjectURL(event.target.files[0]);
                    };
                    </script>
                  </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="desk">Deskripsi</div>
            <div role="tabpanel" class="tab-pane" id="sosmed">Sosial Media</div>
            <div role="tabpanel" class="tab-pane" id="produk">Produk</div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="text-left">
                <a href="<?=base_url().'admin/merchant/'?>"  class="btn btn-warning btn-fill btn-wd" onclick="">Kembali</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="text-right">
                <button  class="btn btn-info btn-fill btn-wd" onclick="Add()">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
