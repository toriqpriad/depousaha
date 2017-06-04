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
                                        <center><h2>Kumpulan informasi <span class="yellowTxt"><?= $title_page ?></span> yang dapat berguna bagi Anda </h2></center>                                    
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
                        <div class="col-lg-12">
                            <div class="row">                            
                                <div class="updatePosts clearfix" id="consLatestPost">
                                    <div class="propertylistContent">
                                        <?php foreach ($record as $each) { ?>
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
                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of sectionWrapper -->
            </section><!-- end of latestNewsUpdate -->



            <?php $this->load->view('front/include/footer_menu'); ?>            
        </div><!-- end of allWrapper -->

</html>