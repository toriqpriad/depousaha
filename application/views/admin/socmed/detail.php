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
                <label>Icon</label>
                <input type="text" class="form-control border-input" id="icon" value="<?=$records->icon?>">
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
                <img id="output_logo" style="height:25%" class="img img-thumbnail" src="<?= $records->logo ?>"/>
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
                <a href="<?=base_url().'admin/socmed/'?>"  class="btn btn-warning btn-fill btn-wd" onclick="">Kembali</a>
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
