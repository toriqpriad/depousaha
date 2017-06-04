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
            <?php $this->load->view('front/include/function'); ?>



            <!-- Slider Section Start -->        
            <div class="esBanner es_rv_slider clearfix" id="esBannerstyle7" style="margin-top:200px"> 
                <div class="fullwidthbanner-container" id="bannerBullets">
                    <div class="fullwidthbanner">
                        <div class="bannercontainer" >                            
                            <div class="banner bannerStyleFive">
                                <ul style="margin-top:-300px">
                                    <?php foreach ($newest_slide_properti as $properti) { ?>

                                        <li data-transition="slideleft" data-slotamount="7" data-masterspeed="1000" data-thumb="<?= BACKEND_IMAGE_DIRECTORY . 'properti/' . $properti['image'] ?>"  data-saveperformance="off" data-title="Slide">
                                            <!-- MAIN IMAGE -->
                                            <img src="<?= BACKEND_IMAGE_DIRECTORY . 'properti/' . $properti['image'] ?>"  alt="Slider Image 1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                            <!-- LAYERS -->
                                            <div class="bgOverly"></div><!-- end of bgOverly -->

                                            <!-- LAYER NR. 1 -->
                                            <div class="tp-caption bannerlrgtxt sfl tp-resizeme"
                                                 data-x="left" data-hoffset="0"
                                                 data-y="center" data-voffset="-40"
                                                 data-speed="600"
                                                 data-start="800"
                                                 data-easing="Power4.easeOut"
                                                 data-splitin="none"
                                                 data-splitout="none"
                                                 data-elementdelay="0.01"
                                                 data-endelementdelay="0.1"
                                                 data-endspeed="500"
                                                 data-endeasing="Power4.easeIn"
                                                 style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;"><p><h1><?= mb_strimwidth($properti['judul'], 0, 20, "...") ?></h1></p>
                                            </div>

                                            <!-- LAYER NR. 2 -->
                                            <div class="tp-caption sfb ltt tp-resizeme"
                                                 data-x="left" data-hoffset="0"
                                                 data-y="center" data-voffset="137"
                                                 data-speed="600"
                                                 data-start="800"
                                                 data-easing="Power4.easeOut"
                                                 data-splitin="none"
                                                 data-splitout="none"
                                                 data-elementdelay="0.01"
                                                 data-endelementdelay="0.1"
                                                 data-endspeed="500"
                                                 data-endeasing="Power4.easeIn"
                                                 style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap; margin-top:-100px;"><h1 style="color:white"><?= mb_strimwidth($properti['deskripsi'], 0, 120, "...") ?></h1>
                                            </div>

                                            <!-- LAYER NR. 3 -->
                                            <div class="tp-caption scrollTxt sfl tp-resizeme"
                                                 data-x="left" data-hoffset="0"
                                                 data-y="center" data-voffset="247"
                                                 data-speed="600"
                                                 data-start="800"
                                                 data-easing="Power4.easeOut"
                                                 data-splitin="none"
                                                 data-splitout="none"
                                                 data-elementdelay="0.01"
                                                 data-endelementdelay="0.1"
                                                 data-endspeed="500"
                                                 data-endeasing="Power4.easeIn"
                                                 style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;"><a class="btn yellowBtn" href="<?= base_url() . 'properti/detail/' . $properti['link'] ?>">Read More</a>
                                            </div>

                                            <!-- LAYER NR. 4 -->                                                                                     
                                        </li>

                                    <? } ?>

                                </ul><!-- end of ul -->
                            </div><!-- end of banner -->
                        </div><!-- end of bannercontainer -->
                        <div class="tp-bannertimer"></div>
                    </div><!-- end of fullwidthbanner -->
                </div><!-- end of fullwidthbanner-container -->
            </div><!-- end of es_rv_slider -->        

            <section class="aboutSuccess clearfix sections" id="successStory">
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="successWrapper">                            

                                <div class="col-sm-12 noPadding">
                                    <div class="successContent">                                    
                                        <h2>Kami adalah penyedia  <span class="yellowTxt">“Informasi Properti”</span> <strong>di sekitar Kota Wisata Batu &Malang</strong> dengan menerapkan Marketing Strategy yang tepat sasaran bagi kebijakan pemasaran properti anda.</h2>                                    
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
                                    <h2 class="blackTitle">Properti<strong> Terbaru</strong><span class="generalBorder"></span></h2>
                                </div><!-- end of consSectionTitle -->
                            </div><!-- end of col12 -->
                        </div><!-- end of row -->

                        <div class="row">
                            <div class="updatePosts clearfix" id="consLatestPost">
                                <?php foreach ($newest_properti as $properti) { ?>                            
                                    <article class="col-sm-4" style="margin-bottom:20px;"> 
                                        <div class="postWrapper" data-wow-delay="0ms" data-wow-duration="1500ms">
                                            <div class="postMedia" >
                                                <a title="<?= $properti['judul'] ?>" href="<?= base_url() . 'properti/detail/' . $properti['link'] ?>" target="_blank"><img title="<?= $properti['judul'] ?>" style="height: 250px;" src="<?= BACKEND_IMAGE_DIRECTORY . 'properti/' . $properti['image'] ?>" alt="<?= $properti['judul'] ?>"></a>
                                            </div><!-- end of postMedia -->

                                            <div class="postContents">
                                                <div class="postLocatoin">
                                                    <button class="newsLocation"><?= $properti['kategori_properti'] ?></button>
                                                </div><!-- end of postLocation -->
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
                                <?php } ?>

                            </div><!-- end of latestPost -->
                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of sectionWrapper -->
            </section><!-- end of latestNewsUpdate -->
            <section class="aboutSuccess clearfix sections" id="successStory">
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="successWrapper">                            

                                <div class="col-sm-12 noPadding">
                                    <div class="successContent">                                    
                                        <h2>Kami juga memberikan  <span class="yellowTxt">“Artikel Menarik”</span> <strong>seputar properti</strong> yang menarik bagi Anda. </h2>                                    
                                    </div><!-- end of successContent -->
                                </div><!-- end of col7 -->                           
                            </div><!-- end of successWrapper -->

                        </div><!-- end of row-->
                    </div><!-- end of container -->
                </div><!-- end of sectionWrapper  -->
            </section><!-- end of aboutSuccess--> 
            <section class=" clearfix section" id="updateartikel">
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="consSectionTitle text-center">                                    
                                    <h2 class="blackTitle">Artikel<strong> Terbaru</strong><span class="generalBorder"></span></h2>
                                </div><!-- end of consSectionTitle -->
                            </div><!-- end of col12 -->
                        </div><!-- end of row -->

                        <div class="row">
                            <div class="updatePosts clearfix" id="consLatestPost">
                                <div class="propertylistContent">
                                    <?php foreach ($newest_artikel as $each) { ?>
                                        <!--                                        <div class="row propertySingle propertylist">
                                                                                    <div class="col-sm-5 noPaddingRight">
                                                                                        <div class="itemMedia">
                                                                                            <img style="height:250px;" src="<?= BACKEND_IMAGE_DIRECTORY . 'artikel/' . $each->gbr_thumb ?>" class="listimg" alt="Property Image">                                                    
                                                                                        </div> end of item-media 
                                                                                    </div> end of col5 
                                        
                                                                                    <div class="col-sm-7 noPaddingLeft">
                                                                                        <div class="propertyContent clearfix">
                                                                                            <h4>Artikel</h4>
                                                                                            <h5><a href="#"><?= $each->judul ?></a></h5>
                                                                                            <h6 class="priceText"><?= $each->tgl_post ?></h6>
                                                                                            <p class="Property-article" style="margin-top:-10px;"><?= mb_strimwidth($each->content, 0, 150, "...") ?></p>
                                        
                                        
                                        
                                                                                        </div> end of col2 
                                                                                    </div> end of propertySingle 
                                                                                </div> end of propertylistContent -->
                                        <article class="col-sm-12">
                                            <div class="post blogListSingle clearfix">
                                                <div class="postWrapper">
                                                    <div class="postMedia">
                                                        <a href="<?= base_url() . 'artikel/detail/' . $each->link ?>" target="_blank"><img style="height:400px" src="<?= BACKEND_IMAGE_DIRECTORY . 'artikel/' . $each->gbr_thumb ?>" alt="News Image"></a>
                                                    </div><!-- end of postMedia -->

                                                    <div class="postContents">                                                        
                                                        <div class="postTitle">
                                                            <h4><a href="<?= base_url() . 'artikel/detail/' . $each->link ?>"> <?= $each->judul ?></a></h4>
                                                        </div><!-- end of postTitle -->
                                                        <ul class="postMeta clearfix">
                                                            <li class="postAuthor">
                                                                <div class="metaContent">
                                                                    <a href="#" title="author name">admin </a>
                                                                </div>
                                                            </li><!-- end of postAuthor -->
                                                            <li class="postDate">
                                                                <div class="metaContent">/ <?= $each->tgl_post ?></div>
                                                            </li><!-- end of postDate -->
                                                        </ul><!-- end of mostMeta -->

                                                        <div class="postDetails">
                                                            <div style="color:white"><?= mb_strimwidth($each->content, 0, 150, "...") ?></div>
                                                        </div><!-- end of postDetails -->
                                                        <a href="<?= base_url() . 'artikel/detail/' . $each->link ?>" class="btn btn-warning">Continue reading </a>
                                                    </div><!-- end of postContents -->
                                                </div><!-- end of postWrapper -->
                                            </div><!-- end of blogListSingle -->
                                        </article>
                                        <br>
                                    <?php } ?>
                                </div>

                            </div><!-- end of latestPost -->
                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of sectionWrapper -->
            </section><!-- end of latestNewsUpdate -->
            <section class="aboutSuccess clearfix sections" id="successStory">
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="successWrapper">                            
                                <div class="col-sm-12 noPadding">
                                    <div class="successContent">                                    
                                        <h2>Kami juga mendokumentasikan  <span class="yellowTxt">“hasil kerja”</span> kami dalam video dan foto yang dapat dinikmati. </h2>                                    
                                    </div><!-- end of successContent -->
                                </div><!-- end of col7 -->                           
                            </div><!-- end of successWrapper -->

                        </div><!-- end of row-->
                    </div><!-- end of container -->
                </div><!-- end of sectionWrapper  -->
            </section><!-- end of aboutSuccess--> 

            <section class=" clearfix section" id="updateartikel">
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="consSectionTitle text-center">                                    
                                    <h2 class="blackTitle">Galeri<strong> Terbaru</strong><span class="generalBorder"></span></h2>
                                </div><!-- end of consSectionTitle -->
                            </div><!-- end of col12 -->
                        </div><!-- end of row -->

                        <div class="row">
                            <div class="updatePosts clearfix" id="consLatestPost">
                                <div class="propertylistContent">
                                    <div class="propertyGlarryWrapper clearfix" id="galleyColumn3">                                
                                        <?php
                                        foreach ($newest_images as $each) {
                                            if ($each != "") {
                                                if (!empty($each['images_properti'][0])) {
                                                    ?>                                    

                                                    <div class="portfolio-item col-sm-4">
                                                        <div class="gallerySingleItem">
                                                            <div class="portfolio-item-content">
                                                                <div class="itemThumbnail">
                                                                    <img style="height: 250px;" src="<?= BACKEND_IMAGE_DIRECTORY . 'properti/' . $each['images_properti'][0]; ?>" alt="<?= $each['judul_properti'] ?>">
                                                                    <div class="hoverBox">
                                                                        <div class="smallIcon">
                                                                            <a href="<?= BACKEND_IMAGE_DIRECTORY . 'properti/' . $each['images_properti'][0]; ?>" data-gal="prettyPhoto[gal]" class="viewDetials p-photo">View </a> 
                                                                        </div><!-- end of smallIcon -->
                                                                    </div><!-- end of hoverBox -->                 
                                                                </div><!-- end of itemThumbnail -->
                                                            </div><!-- end of portfolio-item-content -->
                                                        </div><!-- end of gallerySingleItem -->
                                                    </div>

                                                    <?php
                                                }
                                            }
                                        }
                                        ?>                                
                                    </div><!-- end of latestPost -->
                                </div><!-- end of row -->
                            </div><!-- end of container -->
                        </div><!-- end of sectionWrapper -->

                        <div class="row">
                            <?php foreach ($newest_properti_video as $each) { ?>                                                                                
                                <div class="col-sm-6" >
                                    <iframe style="width: 100%; height: 300px;" src="<?= $each->video_url ?>" frameborder="0" allowfullscreen></iframe>                                                                               
                                </div>
                            <?php } ?>                                

                        </div><!-- end of sectionWrapper -->
                    </div><!-- end of sectionWrapper -->
                </div><!-- end of sectionWrapper -->
            </section><!-- end of latestNewsUpdate -->
            <?php $this->load->view('front/include/footer_menu'); ?>            
        </div><!-- end of allWrapper -->

</html>