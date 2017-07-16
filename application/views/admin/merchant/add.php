c<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="content">
          <div class="row">
            <div class="col-md-12">

              <div class="form-group">
                <label>Nama Merchant</label>
                <input type="text" class="form-control border-input" id="name" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Pemilik</label>c
                <input type="text" class="form-control border-input"  id="owner" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Kontak</label>
                <input type="text" class="form-control border-input"  id="contact" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control border-input"  id="email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Alamat </label>
                <textarea class="form-control border-input" id="address">
                </textarea>
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
