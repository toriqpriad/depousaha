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
    $this->load->view('admin/setting/function');
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
                            <input type="hidden" class="form-control" id="web_id" value="<?= $detail->id ?>">
                            <div class="col-md-12">
                                <div class="form-group form-float form-group-md">
                                    <label class="form-label">Nama</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="name" value="<?= $detail->name ?>">
                                    </div>
                                </div>  
                                <div class="form-group form-float form-group-md">
                                    <label class="form-label">Kontak</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="contact" value="<?= $detail->contact ?>">
                                    </div>
                                </div>  
                                <div class="form-group form-float form-group-md">
                                    <label class="form-label">Alamat</label>
                                    <div class="form-line">
                                        <textarea class="form-control" id="address"><?= $detail->address ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group form-float form-group-md">
                                    <label class="form-label">Kota</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="city" value="<?= $detail->city ?>">
                                    </div>
                                </div>  
                                <div class="form-group form-float form-group-md">
                                    <label class="form-label">Deskripsi</label>
                                    <div class="form-line">
                                        <textarea class="form-control" id="description"><?= $detail->description ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group form-float form-group-md">
                                    <label class="form-label">Moto / Tagline</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="moto" value="<?= $detail->moto ?>">
                                    </div>
                                </div>  
                                <div class="form-group form-float form-group-md">
                                    <label class="form-label">Logo</label>                                                                                            
                                    <div class="row" id='uploadarea_gallery' >
                                        <div class="col-md-6">
                                            <?php
                                            if ($detail->logo == "") {
                                                $src = base_url() . "assets/images/backend/noimg.png";
                                            } else {
                                                $src = base_url() . "assets/images/backend/profile/" . $detail->logo;
                                            }
                                            ?>
                                            <img id="output_foto" style="width:60%" class="img img-thumbnail" src="<?= $src; ?>"/>
                                            <br><br>
                                            <input type="file" accept="image/*" class="" name="gambar" onchange="load(event)" id="image">                                                                                        
                                            <input type="hidden" id="old_gambar" value="<?= $detail->logo ?>">       
                                            <input type="hidden" id="old_gambar2" value="<?= $detail->logo ?>">                                            
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

                            <div class="text-right"><button type="button " class="btn bg-teal btn-lg waves-effect" onclick="Put()">Simpan</button></div>
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