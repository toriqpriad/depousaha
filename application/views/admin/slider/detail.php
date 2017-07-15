<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama </label>
                <input type="text" class="form-control border-input" id="name" required value="<?=$records->name?>">
                <input type="hidden" class="form-control border-input" id="edit_id" required value="<?=$records->id?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Gambar</label>
                <input type="file" accept="image/*" class="" name="logo" onchange="load_logo(event)" id="image">
                <input type="hidden" id="image_old" value='<?= $records->img_old ?>'>
                <input type="hidden" id="image_new" value=''>
                <br>
                <img id="output_logo" class="img img-thumbnail" src="<?= $records->img ?>" style="height:50%"/>
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
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="text-left">
                <a href="<?=base_url().'admin/slider/'?>"  class="btn btn-warning btn-fill btn-wd" onclick="">Kembali</a>
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
