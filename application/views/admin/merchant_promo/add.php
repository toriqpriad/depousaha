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
                <label>Merchant</label>
                <select id="merchant_option" class="form-control border-input">
                  <?php
                  if(isset($merchant_options)){
                    foreach($merchant_options as $opt)
                    {
                      echo "<option value=".$opt->id.">".$opt->name."</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>URL terkait</label>
                <input type="text" class="form-control border-input" id="url">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control border-input" id="desc"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Gambar</label>
                <input type="file" accept="image/*" class="" name="img" onchange="load_img(event)" id="img">
                <br>
                <img id="output_img" style="width:900px;" class="img img-thumbnail" src="<?= BACKEND_IMAGE_FOLDER . 'noimg.png' ?>"/>
                <br><br>

                <script>
                var load_img = function (event) {
                  var output_img = document.getElementById('output_img');
                  output_img.src = URL.createObjectURL(event.target.files[0]);
                };
                </script>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="text-left">
                <a href="<?=base_url().'admin/merchant_promo/'?>"  class="btn btn-warning btn-fill btn-wd" onclick="">Kembali</a>
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
