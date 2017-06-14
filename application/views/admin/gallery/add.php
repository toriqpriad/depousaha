
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="text" class="form-control border-input" id="name" value="">
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
            <?php
            $a = 1;
            while($a<=4){
              ?>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Gambar <?=$a?></label>
                  <div class="row">
                    <div class="col-md-4">
                      <input type="file" accept="image/*" class="" name="image_1" onchange="load_image_<?=$a?>(event)" id="image_<?=$a?>">
                    </div>
                    <div class="col-md-8">
                      <button class="btn btn-sm pull-left" onclick="delete_img_<?=$a?>()" ><i  class="fa fa-trash" title="hapus"></i></button>
                    </div>
                  </div>
                  <br>
                  <input type="hidden" id="max_num_gallery" value=''>
                  <img id="output_image_<?=$a?>" style="width:83%;height:50%" class="img img-thumbnail" src="<?= BACKEND_IMAGE_FOLDER . 'noimg.png' ?>"/>
                  <br><br>

                  <script>
                  var load_image_<?=$a?> = function (event) {
                    var output_image_<?=$a?> = document.getElementById('output_image_<?=$a?>');
                    output_image_<?=$a?>.src = URL.createObjectURL(event.target.files[0]);
                  };
                  var delete_img_<?=$a?> = function () {
                    $("#output_image_<?=$a?>").attr('src','<?=base_url().NO_IMG?>');
                    $('#image_<?=$a?>').val('');
                  };
                  </script>
                </div>
              </div>
              <?php
              $a++; }
              ?>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="text-left">
                  <a href="<?=base_url().'admin/gallery/'?>"  class="btn btn-warning btn-fill btn-wd" onclick="">Kembali</a>
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
