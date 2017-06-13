<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama </label>
                <input type="text" class="form-control border-input" id="name" value="<?=$records->name?>" required >                
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
                      if($records->merchant_id == $opt->id){
                      echo "<option value=".$opt->id." selected>".$opt->name."</option>";
                    } else {
                      echo "<option value=".$opt->id." >".$opt->name."</option>";
                    }
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
                <input type="text" class="form-control border-input" id="url" value="<?=$records->url?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control border-input" id="desc"><?=$records->description?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Gambar</label>
                <input type="file" accept="image/*" class="" name="img" onchange="load_image(event)" id="img">
                <input type="hidden" id="image_old" value='<?= $records->image_old ?>'>
                <input type="hidden" id="image_new" value=''>
                <br>
                <img id="output_image" style="width:900px" class="img img-thumbnail" src="<?= $records->image ?>"/>
                <br><br>

                <script>
                var load_image = function (event) {
                  var output_image = document.getElementById('output_image');
                  output_image.src = URL.createObjectURL(event.target.files[0]);
                          $('#image_new').val(event.target.files[0].name);
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
                <button  class="btn btn-info btn-fill btn-wd" onclick="Put()">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
