<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?= $title_page ?></title>    
        <?php $this->load->view('front/static/files'); ?>                
    </head>    
    <body id="top" class="homeStyleSeven style7">
        <!-- preloader-wrap -->
        <div id="preloader">
            <div class="preloader-top"></div>
            <div class="preloader-bottom"></div>
        </div>
        <!-- preloader-wrap -->


        <div class="allWrapper">
            <?php $this->load->view('front/include/top'); ?>
            <?php $this->load->view('front/include/menu'); ?>
            <?php $this->load->view('front/include/modal'); ?>

            <div style="margin-top:200px;"></div>



            <section class="aboutSuccess clearfix sections" id="successStory">
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="successWrapper">                            
                                <div class="col-sm-12 noPadding">
                                    <div class="successContent">                                    
                                        <center><h2><span class="yellowTxt"><?= $title_page ?> :</span></h2></center>                                    
                                    </div><!-- end of successContent -->
                                </div><!-- end of col7 -->                           
                            </div><!-- end of successWrapper -->

                        </div><!-- end of row-->                        
                    </div><!-- end of container -->
                </div><!-- end of sectionWrapper  -->                               
            </section><!-- end of aboutSuccess--> 

            <section class="latestNewsUpdate clearfix section" id="updateNews">
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="consSectionTitle text-center">                                    
                                    <h2 class="blackTitle">Pencarian<strong> Properti</strong><span class="generalBorder"></span></h2>
                                </div><!-- end of consSectionTitle -->
                            </div><!-- end of col12 -->
                        </div><!-- end of row -->

                        <div class="row">
                            <div class="updatePosts clearfix" id="consLatestPost">
                                <?php
                                if (empty($search_in_properti)) {
                                    echo '<center><h4 style="color:white">Tidak ditemukan</h4></center>';
                                } else {
                                    foreach ($search_in_properti as $properti) {
                                        ?>                            
                                        <article class="col-sm-4" style="margin-bottom:10px;"> 
                                            <div class="postWrapper" data-wow-delay="0ms" data-wow-duration="1500ms">
                                                <div class="postMedia" >
                                                    <a title="<?= $properti['judul'] ?>" href="<?= base_url() . 'properti/detail/' . $properti['link'] ?>" target="_blank"><img title="<?= $properti['judul'] ?>" style="height: 300px;" src="<?= $properti['image'] ?>" alt="<?= $properti['judul'] ?>"></a>
                                                </div><!-- end of postMedia -->

                                                <div class="postContents">                                                
                                                    <div class="postTitle">
                                                        <h4><a href="<?= base_url() . 'properti/detail/' . $properti['link'] ?>"> <?= mb_strimwidth($properti['judul'], 0, 20, "...") ?></a></h4>
                                                        <h5 style="margin-top:-30px;color:#ffc527">Rp. <?= $properti['harga'] ?></h5>
                                                    </div><!-- end of postTitle -->
                                                    <div class="postDetails">
                                                        <p><?= mb_strimwidth($properti['deskripsi'], 0, 100, "...") ?></p>
                                                    </div><!-- end of postDetails -->
                                                    <a href="<?= base_url() . 'properti/detail/' . $properti['link'] ?>" class="generalLink">Read More.. </a>
                                                </div><!-- end of postContents -->
                                            </div><!-- end of postWrapper -->
                                        </article><!-- end of col4 -->                            
                                    <?php
                                    }
                                }
                                ?>

                            </div><!-- end of latestPost -->
                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of sectionWrapper -->
            </section><!-- end of latestNewsUpdate -->

            <section class=" clearfix section" id="updateartikel">
                <div class="sectionWrapper">
                    <div class="container">                       
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="consSectionTitle text-center">                                    
                                        <h2 class="blackTitle">Pencarian<strong> Artikel</strong><span class="generalBorder"></span></h2>
                                    </div><!-- end of consSectionTitle -->
                                </div><!-- end of col12 -->
                            </div><!-- end of row -->
                            <div class="row">                            
                                <div class="updatePosts clearfix" id="consLatestPost">
                                    <div class="propertylistContent">

                                        <?php
                                        if (empty($search_in_artikel)) {
                                            echo '<center><h4 style="color:white">Tidak ditemukan</h4></center>';
                                        } else {
                                            foreach ($search_in_artikel as $each) {
                                                ?>
                                                <div class="row propertySingle propertylist">                                                
                                                    <div class="col-sm-5 noPaddingRight">
                                                        <div class="itemMedia">
                                                            <img style="height:250px;" src="<?= BACKEND_IMAGE_DIRECTORY . 'artikel/' . $each->gbr_thumb ?>" class="listimg" alt="Property Image">                                                    
                                                        </div><!-- end of item-media -->
                                                    </div><!-- end of col5 -->
                                                    <div class="col-sm-7 noPaddingLeft">
                                                        <div class="propertyContent clearfix">
                                                            <h4>Artikel</h4>
                                                            <h5><a href="<?= base_url() . 'artikel/detail/' . $each->link ?>"><?= $each->judul ?></a></h5>
                                                            <h6 class="priceText"><?= $each->tgl_post ?></h6>
                                                            <p class="Property-article"><?= mb_strimwidth($each->content, 0, 150, "...") ?></p>
                                                            <div class="metaContent">
                                                                <div class="itemContity">
                                                                    <p></p>
                                                                </div><!-- end of itemCon-->
                                                            </div><!-- end of property-meta -->

                                                            <ul class="furniture-metaList">
                                                                <li><a>
                                                                        <div class="furnitureIcon">
                                                                            <div class="furnitureBaseIcon bedicon1"></div>
                                                                        </div><!-- end of floortabIcon -->
                                                                    </a></li>

                                                                <li><a>
                                                                        <div class="furnitureIcon">
                                                                            <div class="furnitureBaseIcon bathtabicon1"></div>
                                                                        </div> </a>
                                                                </li>                                                        
                                                            </ul>
                                                        </div><!-- end of col2 -->
                                                    </div><!-- end of propertySingle -->
                                                </div><!-- end of propertylistContent -->
                                                <br>
                                            <?php }
                                        }
                                        ?>
                                    </div>

                                </div><!-- end of latestPost -->
                            </div><!-- end of row -->
                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of sectionWrapper -->
            </section><!-- end of latestNewsUpdate -->



<?php $this->load->view('front/include/footer_menu'); ?>            
        </div><!-- end of allWrapper -->

</html>