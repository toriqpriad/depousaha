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
                            <p><small>Isi form di bawah ini untuk menambahkan data properti terbaru : </small></p>
                        </div>
                        <div class="body">
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">                                
                                <li role="presentation" class=""><a href="#detail" data-toggle="tab" aria-expanded="false">Detail</a></li>                                
                                <li role="presentation" class=""><a href="#media" data-toggle="tab" aria-expanded="false">Media</a></li>                                                                                                
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="detail">     
                                    <div class="row clearfix">                                        
                                        <div class="col-sm-12">
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Judul</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="judul">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Deskripsi</label>
                                                <div class="form-line">
                                                    <textarea id="deskripsi" class="form-control"></textarea>
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Alamat</label>
                                                <div class="form-line">
                                                    <textarea id="alamat" class="form-control"></textarea>
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Kategori</label>
                                                <div class="form-line">
                                                    <select id="kat_properti" class="form-control" >                                                                      
                                                        <?php
                                                        if (isset($kat_properti)) {
                                                            if ($kat_properti != "") {
                                                                foreach ($kat_properti as $each) {
                                                                    ?>
                                                                    <option value="<?= $each->id ?>"><?= $each->nama ?></option>
                                                                    <?php
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
                                                    <input type="text" class="form-control" id="sertifikat">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Luas Tanah</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="luas_tanah">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Luas Bangunan</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="luas_bangunan">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Kamar Tidur</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="kamar_tidur">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Kamar Mandi</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="kamar_mandi">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Harga</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="harga">
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
                                                <!--                                                <div class="">
                                                                                                    <a class="btn-sm btn btn-default" id="addupload" onclick='galleryforms()'>Add Image</a>                            
                                                                                                    <br><br>
                                                                                                    <input type="hidden" id="max_num_gallery" value=''>                                                        
                                                                                                </div>-->
                                                <div class="row" id='uploadarea_gallery' >                                                    
                                                    <div class="col-md-6">
                                                        <img id="output_foto1" style="width:60%" class="img img-thumbnail" src="<?= base_url() ?>assets/images/backend/noimg.png"/>
                                                        <br><br>
                                                        <input type="file" accept="image/*" class="" name="gambar1" onchange="load1(event)" id="gambar1">                                            
                                                        <script>
                                                            var load1 = function (event) {
                                                                var size = event.target.files[0].size;
                                                                if (size < 5000000) {
                                                                    var output = document.getElementById('output_foto1');
                                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                                } else {
                                                                    alert("Ukuran file " + size + "byte melebihi batas maksimal (5 mb)");
                                                                    $("#gambar1").val("");
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img id="output_foto2" style="width:60%" class="img img-thumbnail" src="<?= base_url() ?>assets/images/backend/noimg.png"/>
                                                        <br><br>
                                                        <input type="file" accept="image/*" class="" name="gambar2" onchange="load2(event)" id="gambar2">                                            
                                                        <script>
                                                            var load2 = function (event) {
                                                                var size = event.target.files[0].size;
                                                                if (size < 5000000) {
                                                                    var output = document.getElementById('output_foto2');
                                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                                } else {
                                                                    alert("Ukuran file " + size + "byte melebihi batas maksimal (5 mb)");
                                                                    $("#gambar2").val("");
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img id="output_foto3" style="width:60%" class="img img-thumbnail" src="<?= base_url() ?>assets/images/backend/noimg.png"/>
                                                        <br><br>
                                                        <input type="file" accept="image/*" class="" name="gambar3" onchange="load3(event)" id="gambar3">                                            
                                                        <script>
                                                            var load3 = function (event) {
                                                                var size = event.target.files[0].size;
                                                                if (size < 5000000) {
                                                                    var output = document.getElementById('output_foto3');
                                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                                } else {
                                                                    alert("Ukuran file " + size + "byte melebihi batas maksimal (5 mb)");
                                                                    $("#gambar3").val("");
                                                                }
                                                            };
                                                        </script>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img id="output_foto4" style="width:60%" class="img img-thumbnail" src="<?= base_url() ?>assets/images/backend/noimg.png"/>
                                                        <br><br>
                                                        <input type="file" accept="image/*" class="" name="gambar4" onchange="load4(event)" id="gambar4">                                            
                                                        <script>
                                                            var load4 = function (event) {
                                                                var size = event.target.files[0].size;
                                                                if (size < 5000000) {
                                                                    var output = document.getElementById('output_foto4');
                                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                                } else {
                                                                    alert("Ukuran file " + size + "byte melebihi batas maksimal (5 mb)");
                                                                    $("#gambar4").val("");
                                                                }
                                                            }
                                                            
                                                        </script>
                                                    </div>

                                                </div>                            
                                            </div> 



                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Youtube Video URL</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="video_url">
                                                </div>
                                            </div> 
                                        </div>                            
                                    </div>     
                                </div>
                                <div class="text-right"><button type="button " class="btn bg-teal btn-lg waves-effect" onclick="Add()">Simpan</button></div>
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