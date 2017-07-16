<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama </label>
                <input type="text" class="form-control border-input" id="name" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Image</label>
                <input type="file" accept="image/*" class="" name="logo" onchange="load_logo(event)" id="image">
                <br>
                <input type="hidden" id="max_num_gallery" value=''>
                <img id="output_logo"  class="img img-thumbnail" src="<?= BACKEND_IMAGE_FOLDER . 'noimg.png' ?>"/>
                <br><br>

                <script>
                var load_logo = function (event) {
                  var output_logo = document.getElementById('output_logo');
                  output_logo.src = URL.createObjectURL(event.target.files[0]);
                };
                </script>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="text-left">
                <a href="<?=base_url().'admin/product_category/'?>"  class="btn btn-warning btn-fill btn-wd" onclick="">Kembali</a>
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
