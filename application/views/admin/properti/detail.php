<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?= $title_page ?></title>         
        <?php
        $this->load->view('admin/static/files');
        ?>    
        <link href="<?= BACKEND_STATIC_FILES ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
        <script src="<?= BACKEND_STATIC_FILES ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>        
        <script src="<?= BACKEND_STATIC_FILES ?>js/pages/forms/basic-form-elements.js"></script>
        <script src="<?= BACKEND_STATIC_FILES ?>plugins/ckeditor/ckeditor.js"></script>
    </head>

    <?php
    $this->load->view('admin/include/function');
    $this->load->view('admin/properti/function');
    $this->load->view('admin/include/modal');
    $this->load->view('admin/include/top_menu');
    $this->load->view('admin/include/sidebar_menu');
    ?>


    <section class="content">
        <div class="container-fluid">            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?= $title_page ?>
                            </h2>                                             
                        </div>
                        <div class="body">
                            <input type="hidden" id="properti_id" value="<?= $detail['data_properti'][0]->id ?>" >
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">                                                                
                                <li role="presentation" class=""><a href="#detail" data-toggle="tab" aria-expanded="false">Detail</a></li>                                
                                <li role="presentation" class=""><a href="#media" data-toggle="tab" aria-expanded="false">Media</a></li>                                                                                                
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="detail">     
                                    <?php // print_r($detail);?>
                                    <div class="row clearfix">                                        
                                        <div class="col-sm-12">
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Judul</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="judul" value="<?= $detail['data_properti'][0]->judul ?>">
                                                    <input type="hidden" class="form-control" id="key" value="<?= $detail['data_properti'][0]->generate_key ?>">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Deskripsi</label>
                                                <div class="form-line">
                                                    <textarea id="deskripsi" class="form-control"><?= $detail['data_properti'][0]->deskripsi ?></textarea>
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Alamat</label>
                                                <div class="form-line">
                                                    <textarea id="alamat" class="form-control"><?= $detail['data_properti'][0]->alamat ?></textarea>
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Kategori</label>
                                                <div class="form-line">
                                                    <select id="kat_properti" class="form-control" >                                                                      
                                                        <?php
                                                        $kat_properti = $detail['kat_properti'];
                                                        if (isset($kat_properti)) {
                                                            if ($kat_properti != "") {
                                                                foreach ($kat_properti as $each) {
                                                                    if ($detail['data_properti'][0]->kat_properti == $each->id) {
                                                                        ?>
                                                                        <option value="<?= $each->id ?>" selected><?= $each->nama ?></option>
                                                                    <?php } else { ?>
                                                                        <option value="<?= $each->id ?>" ><?= $each->nama ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Jenis</label>
                                                <div class="form-line">
                                                    <select id="jenis_properti" class="form-control">                                                
                                                        <option value='0'>Dijual</option>
                                                        <option value='1'>Disewakan</option>                                                
                                                    </select>
                                                </div>
                                            </div>  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Sertifikat</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="sertifikat" value="<?= $detail['data_properti'][0]->sertifikat ?>">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Luas Tanah</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="luas_tanah" value="<?= $detail['data_properti'][0]->luas_tanah ?>">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Luas Bangunan</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="luas_bangunan" value="<?= $detail['data_properti'][0]->luas_bangunan ?>">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Kamar Tidur</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="kamar_tidur" value="<?= $detail['data_properti'][0]->kamar_tidur ?>">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Kamar Mandi</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="kamar_mandi" value="<?= $detail['data_properti'][0]->kamar_mandi ?>">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Harga</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="harga" value="<?= $detail['data_properti'][0]->harga ?>">
                                                </div>
                                            </div>                                                  
                                        </div>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="media">     
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-float form-group-md">                                                
                                                <label class="form-label">Galeri gambar</label>                                                                                            
                                                <div class="row" id='uploadarea_gallery' >
                                                    <?php
                                                    $x = 1;
                                                    $images_count = count($detail['properti_images']);
                                                    foreach ($detail['properti_images'] as $each) {
                                                        ?>
                                                        <div class="col-md-6">                                                            
                                                            <img id="output_foto<?= $x ?>" style="width:60%" class="img img-thumbnail" src="<?= base_url() ?>assets/images/backend/properti/<?= $each->image ?>"/>
                                                            <br><br>
                                                            <div class="col-md-6">
                                                                <input type="file" accept="image/*" class="" name="gambar<?= $x ?>" onchange="load<?= $x ?>(event)" id="gambar<?= $x ?>">                                                                                                        
                                                            </div>
                                                            <div class="col-md-6"><button id="delete_btn_<?= $x ?>" onclick="delete<?= $x ?>()">Hapus</button></div>

                                                            <input type="hidden" id="old_gambar_<?= $x ?>" value="<?= $each->image ?>">
                                                            <input type="hidden" id="old_gambar_back_<?= $x ?>" value="<?= $each->image ?>">                                            
                                                            <script>
                                                                var load<?= $x ?> = function (event) {
                                                                    var size = event.target.files[0].size;
                                                                    if (size < 5000000) {
                                                                        var output = document.getElementById('output_foto<?= $x ?>');
                                                                        var old = document.getElementById('old_gambar_<?= $x ?>');
                                                                        output.src = URL.createObjectURL(event.target.files[0]);
                                                                        old.value = "";
                                                                    } else {
                                                                        alert("Ukuran file " + size + "byte melebihi batas maksimal (5 mb)");
                                                                        $("#gambar<?= $x ?>").val("");
                                                                    }   
                                                                };

                                                                var delete<?= $x ?> = function () {
                                                                    var output = document.getElementById('output_foto<?= $x ?>');                                                                    //                                                                  
                                                                    $("#output_foto<?= $x ?>").attr('src', '<?= base_url() ?>assets/images/backend/noimg.png');
                                                                    $("#save_data").append("<input type='hidden' class='old' value='<?= $each->image ?>'>");
                                                                    $("#delete_btn_<?= $x ?>").hide();
                                                                };
                                                            </script>

                                                        </div>
                                                        <?php
                                                        $x++;
                                                    }
                                                    if ($images_count < 4) {
                                                        $count_div = 4 - $images_count;
                                                        for ($y = $x; $y <= 4; $y++) {
                                                            ?>
                                                            <div class="col-md-6">                                                                                                                                
                                                                <img id="output_foto<?= $y ?>" style="width:60%" class="img img-thumbnail" src="<?= base_url() ?>assets/images/backend/noimg.png"/>
                                                                <br><br>                                                                                                                                
                                                                <input type="file" accept="image/*" class="" name="gambar<?= $y ?>" onchange="load<?= $y ?>(event)" id="gambar<?= $y ?>">                                            
                                                                <input type="hidden" id="old_gambar_<?= $y ?>" value="">
                                                                <input type="hidden" id="old_gambar_back_<?= $y ?>" value="">                                            
                                                                <script>
                                                                    var load<?= $y ?> = function (event) {
                                                                        var output = document.getElementById('output_foto<?= $y ?>');
                                                                        var old = document.getElementById('old_gambar_<?= $y ?>');
                                                                        output.src = URL.createObjectURL(event.target.files[0]);
                                                                        old.value = "";
                                                                    };
                                                                </script>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>                                                 
                                                </div>                            
                                            </div> 
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Youtube Video URL</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="video_url" value="<?= $detail['data_properti'][0]->video_url ?>">
                                                </div>
                                            </div> 
                                            <div id="save_data">
                                            </div>
                                        </div>                            
                                    </div>     
                                </div>
                                <div class="text-right"><button type="button " class="btn bg-teal btn-lg waves-effect" onclick="Put()">Simpan</button></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
    </section>         
    <script>
        CKEDITOR.replace('deskripsi', {
            filebrowserImageBrowseUrl: "<?= UPLOADER_WEBAPP_URL ?>?type=image&key=properti",
            removeDialogTabs: 'link:upload;image:upload'});
        var token = "<?= $this->session->userdata['web_token'] ?>";
        localStorage.setItem('token', token);

    </script>
    <?php $this->load->view('admin/include/footer_menu'); ?>



</html>