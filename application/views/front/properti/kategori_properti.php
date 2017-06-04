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
                                        <h2>Properti dengan kategori  <span class="yellowTxt">“<?= $title_page ?>”</span> : </h2>                                    
                                    </div><!-- end of successContent -->
                                </div><!-- end of col7 -->                           
                            </div><!-- end of successWrapper -->

                        </div><!-- end of row-->                        
                    </div><!-- end of container -->
                </div><!-- end of sectionWrapper  -->                               
            </section><!-- end of aboutSuccess--> 
            <section>
                <div class="sectionWrapper">
                    <div class="container">         
                        <div class="row">
                            <div class="updatePosts clearfix" id="consLatestPost">

                                <?php
                                foreach ($properti_list as $each) {
                                    ?>                            
                                    <article class="col-sm-4" style="margin-bottom:20px;"> 
                                        <div class="postWrapper wow slideInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                            <div class="postMedia" >
                                                <a href="<?= base_url() . 'properti/detail/' . $each['properti_link'] ?>" target="_blank"><img style="height: 300px;" src="<?= $each['image_properti_thumb'] ?>" alt="<?= $each['judul_properti'] ?>"></a>
                                            </div><!-- end of postMedia -->

                                            <div class="postContents" stlye="background-color:#2f3031">                                    
                                                <div class="postTitle">
                                                    <h4><a href="<?= base_url() . 'properti/detail/' . $each['properti_link'] ?>"> <?= $each['judul_properti'] ?></a></h4>
                                                    <h5 style="margin-top:-30px;color:#ffc527">Rp. <?= $each['harga'] ?></h5>
                                                </div><!-- end of postTitle -->
                                                <div class="postDetails">
                                                    <p><?= mb_strimwidth($each['deskripsi'], 0, 100, "...") ?></p>
                                                </div><!-- end of postDetails -->
                                                <a href="#" class="generalLink">Read More.. </a>
                                            </div><!-- end of postContents -->
                                        </div><!-- end of postWrapper -->
                                    </article><!-- end of col4 -->                            
                                <?php } ?>
                            </div><!-- end of latestPost -->
                        </div><!-- end of latestPost -->
                    </div><!-- end of row -->   
                </div><!-- end of row -->   
            </section>



            <?php $this->load->view('front/include/footer_menu'); ?>            
        </div><!-- end of allWrapper -->

</html>