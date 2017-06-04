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
    $this->load->view('admin/artikel/function');
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
                            <p><small>Isi form di bawah ini untuk menambahkan data artikel terbaru : </small></p>
                        </div>
                        <div class="body">
                            <input type="hidden" class="form-control" id="artikel_id" value="<?= $detail->id ?>">
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
                                                    <input type="text" class="form-control" id="judul" value="<?= $detail->judul ?>">
                                                    <input type="hidden" class="form-control" id="key" value="<?= $detail->generate_key ?>">
                                                </div>
                                            </div>                                                  
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Isi Artikel</label>
                                                <div class="form-line">
                                                    <textarea id="isi" class="form-control"><?= $detail->content ?></textarea>
                                                </div>
                                            </div>                                                                                                                                          
                                        </div>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="media">     
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-float form-group-md">
                                                <label class="form-label">Thumbnail Gambar</label>                                                                                            
                                                <div class="row" id='uploadarea_gallery' >
                                                    <div class="col-md-6">                                                                                                                
                                                        <?php
                                                        if ($detail->gbr_thumb == "") {
                                                            $src = base_url() . "assets/images/backend/noimg.png";
                                                        } else {
                                                            $src = base_url() . "assets/images/backend/artikel/" . $detail->gbr_thumb;
                                                        }
                                                        ?>
                                                        <img id="output_foto" style="width:60%" class="img img-thumbnail" src="<?= $src ?>"/>
                                                        <br><br>
                                                        <input type="file" accept="image/*" class="" name="gambar" onchange="load(event)" id="thumb"> 
                                                        <input type="hidden" id="old_gambar" value="<?= $detail->gbr_thumb ?>">
                                                        <input type="hidden" id="old_gambar2" value="<?= $detail->gbr_thumb ?>">                                            
                                                        <script>
                                                            var load = function (event) {
                                                                var output = document.getElementById('output_foto');
                                                                var old = document.getElementById('old_gambar');
                                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                                old.value = "";

                                                            };
                                                        </script>
                                                    </div>
                                                </div>                            
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
            <script>
                CKEDITOR.replace('isi', {
                    filebrowserImageBrowseUrl: "<?= UPLOADER_WEBAPP_URL ?>?type=image&key=artikel",
                    removeDialogTabs: 'link:upload;image:upload'});
                var token = "<?= $this->session->userdata['web_token'] ?>";
                localStorage.setItem('token', token);

            </script>
    </section>         
    <?php $this->load->view('admin/include/footer_menu'); ?>
</html>