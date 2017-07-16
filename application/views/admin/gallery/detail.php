<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="text" class="form-control border-input" id="name" value="<?=$records->name?>">
                <input type="hidden"  id="edit_id" value="<?=$records->id?>">
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
            <?php
            foreach($old_img as $img){
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
            }
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
                <button  class="btn btn-info btn-fill btn-wd" onclick="Put()">Simpan</button>
              </div>
            </div>
            <div class="end"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
