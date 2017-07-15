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
                    <input type="text" class="form-control border-input" id="name" value="<?=$records->name?>">
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
                          if($opt->id == $records->product_category_id){
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
                    <label>Merchant</label>
                    <select id="merchant_option" class="form-control border-input">
                      <?php
                      if(isset($mc_options)){
                        foreach($mc_options as $opt)
                        {
                          if($opt->id == $records->merchant_id){
                            echo "<option value=".$opt->id." selected>".$opt->name."</option>";
                          } else {
                            echo "<option value=".$opt->id.">".$opt->name."</option>";
                          }
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
                    <input type="number" class="form-control border-input" id="price" value="<?=$records->price?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Satuan Produk (ex : per kg, per m)</label>
                    <input type="text" class="form-control border-input" id="dimension" value="<?=$records->dimension?>" placeholder="kg,ons,m,pcs,biji,buah">
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
            </div>
            <div role="tabpanel" class="tab-pane" id="image">
              <br>
              <div class="row">
          <?php
          foreach($old_img as $img){
            if($img['sort'] == '0'){
              ?>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Gambar Utama</label>
                  <div class="row">
                  <div class="col-md-4">
                  <input type="file" accept="image/*" class="" name="utama" onchange="load_utama(event)" id="utama">
                  </div>
                  <div class="col-md-8">
                  <button class="btn btn-sm pull-left" onclick="delete_img_utama()"><i class="fa fa-trash" title="hapus"></i></button>
                  </div>
                  </div>
                  <input type="hidden" id="utama_old" value='<?= $img['name'] ?>'>
                  <input type="hidden" id="utama_new" value=''>
                  <br>
                  <img id="output_utama" style="width:40%;height:50%" class="img img-thumbnail" src="<?=base_url().$img['url']?>"/>
                  <br><br>
                  <script>
                  var load_utama = function (event) {
                    var output_utama = document.getElementById('output_utama');
                    output_utama.src = URL.createObjectURL(event.target.files[0]);
                    $('#utama_new').val(event.target.files[0].name);
                  };
                  var delete_img_utama = function () {
                      var old = $('#utama_old').val();
                      $(".end").append("<input type='hidden' class='to_delete' value="+old+">");
                      output_utama.src = '<?=base_url().NO_IMG?>';
                      $('#utama_old').val('');
                      $('#utama_new').val('');
                      $('#utama').val('');
                  };
                  </script>
                </div>
              </div>
              <?php
            } else {
              $sort = $img['sort'];
            ?>
            <div class="col-md-6">
              <div class="form-group">
                <label>Gambar <?=$sort?></label>
                <div class="row">
                <div class="col-md-4">
                <input type="file" accept="image/*" class="" name="img_<?=$sort?>" onchange="load_img_<?=$sort?>(event)" id="img_<?=$sort?>">
                </div>
                <div class="col-md-8">
                <button class="btn btn-sm pull-left" onclick="delete_img_<?=$sort?>()"><i class="fa fa-trash" title="hapus"></i></button>
                </div>
                </div>
                <input type="hidden" id="img_<?=$sort?>_old" value='<?= $img['name'] ?>'>
                <input type="hidden" id="img_<?=$sort?>_new" value=''>
                <br>
                <img id="output_img_<?=$sort?>" style="width:80%;height:50%" class="img img-thumbnail" src="<?= base_url().$img['url']?>"/>
                <br><br>
                <script>
                var load_img_<?=$sort?> = function (event) {
                  var output_img_<?=$sort?> = document.getElementById('output_img_<?=$sort?>');
                  output_img_<?=$sort?>.src = URL.createObjectURL(event.target.files[0]);
                  $('#img_<?=$sort?>_new').val(event.target.files[0].name);
                };
                var delete_img_<?=$sort?> = function () {
                    var old = $('#img_<?=$sort?>_old').val();
                    $(".end").append("<input type='hidden' class='to_delete' value="+old+">");
                    output_img_<?=$sort?>.src = '<?=base_url().NO_IMG?>';
                    $('#img_<?=$sort?>_new').val('');
                    $('#img_<?=$sort?>').val('');
                };
                </script>
              </div>
            </div>
            <?php
          } }
        ?>
        </div>
      </div>

  </div>

  <div class="row end">
    <div class="col-md-6">
      <div class="text-left">
        <a href="<?=base_url().'admin/product/'?>"  class="btn btn-warning btn-fill btn-wd" onclick="">Kembali</a>
      </div>
    </div>
    <input type="hidden" class="form-control border-input" id="edit_id" value="<?=$records->id?>">
    <input type="hidden" class="form-control border-input" id="merchant_last_id" value="<?=$records->merchant_id?>">
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
