
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="content">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#detail" aria-controls="1" role="tab" data-toggle="tab">Detail</a></li>
            <li role="presentation"><a href="#image" aria-controls="2" role="tab" data-toggle="tab">Gambar</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="detail">
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control border-input" id="name" value="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kategori</label>
                    <select id="pc_option" class="form-control border-input">
                      <?php
                      if(isset($pc_options)){
                        foreach($pc_options as $opt)
                        {
                          echo "<option value=".$opt->id_pc.">".$opt->name_pc."</option>";
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
                    <label>Merchant</label>
                    <select id="merchant_option" class="form-control border-input">
                      <?php
                      if(isset($merchant_options)){
                        foreach($merchant_options as $opt)
                        {
                          echo "<option value=".$opt->id_merchant.">".$opt->name_merchant."</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Harga Produk</label>
                    <input type="number" class="form-control border-input" id="price" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Satuan Produk (ex : per kg, per m)</label>
                    <input type="text" class="form-control border-input" id="dimension" value="" placeholder="kg,ons,m,pcs,biji,buah">
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
            </div>
            <div role="tabpanel" class="tab-pane" id="image">
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Gambar Utama</label>

                    <br>
                    <div class="row">
                    <div class="col-md-4">
                    <input type="file" accept="image/*" class="" name="utama" onchange="load_utama(event)" id="utama">
                    </div>
                    <div class="col-md-8">
                    <button class="btn btn-sm pull-left" onclick="delete_img()" ><i  class="fa fa-trash" title="hapus"></i></button>
                    </div>
                    </div>
                    <br>
                    <img id="output_utama" style="width:40%;height:50%" class="img img-thumbnail" src="<?= BACKEND_IMAGE_FOLDER . 'noimg.png' ?>"/>
                    <br><br>
                    <script>
                    var load_utama = function (event) {
                      var output_utama = document.getElementById('output_utama');
                      output_utama.src = URL.createObjectURL(event.target.files[0]);
                    };
                    var delete_img = function () {
                        $("#output_utama").attr('src','<?=base_url().NO_IMG?>');
                        $('#utama').val('');
                    };
                    </script>
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
