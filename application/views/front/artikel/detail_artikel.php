<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?= $title_page ?></title>    
        <?php $this->load->view('front/static/files'); ?>  
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-586b04d8864ba69e"></script> 
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

            <div class="blogSinglePost clearfix section graySectoin2" id="blogSingle">
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <article class="col-sm-12">
                                        <div class="post singlePost clearfix">
                                            <div class="postWrapper">
                                                <div class="postMedia">                                                    
                                                    <a href="#" target="_blank"><img src="<?= base_url() ?>assets/images/backend/artikel/<?= $detail->gbr_thumb ?>" alt="image"></a>
                                                </div><!-- end of postMedia -->

                                                <div class="postContents">                                                    
                                                    <a href="#" class="postTag">Artikel</a>
                                                    <div class="postTitle">
                                                        <h4><a href="#"> <?= $detail->judul ?></a></h4>
                                                    </div><!-- end of postTitle -->
                                                    <ul class="postMeta clearfix">
                                                        <li class="postAuthor">
                                                            <div class="metaContent">
                                                                <a href="#" title="author name">Admin | </a>
                                                            </div>
                                                        </li><!-- end of postAuthor -->
                                                        <li class="postDate">
                                                            <div class="metaContent"><?= $detail->tgl_post ?></div>
                                                        </li><!-- end of postDate -->
                                                    </ul><!-- end of mostMeta -->                                                    
                                                    <div class="postDetails">
                                                        <p><?= $detail->content ?></p>                                                                                                                  
                                                    </div><!-- end of postDetails -->
                                                </div><!-- end of postContents -->

                                            </div><!-- end of postWrapper -->
                                        </div><!-- end of blogListSingle -->
                                    </article><!-- end of col12 -->

                                    <div class="col-md-12">
                                        <div class="fb-comments" width="100%" data-href="<?= base_url() . 'artikel/detail/' . $detail->link ?>" data-numposts="3"></div>
                                    </div><!-- end of col6 -->


                                </div><!-- end of row -->
                            </div><!-- end of col-sm-9-->

                            <div class="col-md-3 sideBar2">
                                <div class="widget searchWidget clearfix">
                                    <div class="widgetBody">
                                        <form method="GET" class="sideSearch">
                                            <input type="search" value="Search here.." onblur="if (this.value == '')
                                                        this.value = 'Search here..'" onfocus="if (this.value == 'Search here..')
                                                                    this.value = ''" name="s">
                                        </form><!-- end of sideSearch -->
                                    </div><!-- end of widgetBody -->
                                </div><!-- end of searchWidget -->

                                <div class="widget categoriesWidget categoriesWidgetOne">
                                    <div class="widgetHeader">
                                        <h4>Kategori</h4>
                                    </div><!-- end of widgetHeader -->
                                    <div class="widgetBody">
                                        <?php //print_r($kategori_data);?>
                                        <ul class="categorylist">
                                            <?php foreach ($kategori_data as $kat) { ?>
                                                <li><a href="<?= base_url() . 'properti/kategori/' . $kat['name'] ?>" ><?= $kat['name'] ?><span class="pull-right"> (<?= $kat['properti_total'] ?>)</span></a></li>                                            
                                            <?php } ?>
                                        </ul><!-- end of categorylist -->
                                    </div><!-- end of widgetBody -->
                                </div><!-- end of categoriesWidget -->

                                <div class="widget widgetTwo">
                                    <div class="widgetBody clearfix">
                                        <div class="widgetHeader">
                                            <h4>Properti Terbaru</h4>
                                        </div><!-- end of widgetHeader -->

                                        <div class="recentWidgetPost">
                                            <ul class="categorylist">
                                                <?php
//                                                print_r($properti_related);
                                                foreach ($properti_data as $each) {
                                                    ?>
                                                    <li>                                                        
                                                        <article class="recentPost clearfix">
                                                            <div class="postMedia">
                                                                <img style="width:55px;height:65px;" src="<?= base_url() . BACKEND_IMAGE_DIRECTORY . 'properti/' . $each['image'] ?>" class="listimg" alt="Property Image">                                                    
                                                            </div><!-- end of postMedia -->

                                                            <div class="postContents">
                                                                <h5 class="postTitle"><a href="<?= base_url() . 'properi/detail/' . $each['link'] ?>"><?= $each['judul'] ?></a></h5>
                                                                <ul class="postMeta">
                                                                    <li class="postDate"><?= $each['tgl_dipasang'] ?></li>
                                                                </ul><!-- end of postMeta -->
                                                            </div><!-- end of postContents -->
                                                        </article>
                                                    </li>                                                       
                                                <?php } ?>
                                            </ul>
                                        </div><!-- end of post -->
                                    </div><!-- end of widgetBody -->
                                </div><!-- end of widget --> 

                                <div class="widget widgetTwo">
                                    <div class="widgetBody clearfix">
                                        <div class="widgetHeader">
                                            <h4>Artikel Terbaru</h4>
                                        </div><!-- end of widgetHeader -->

                                        <div class="recentWidgetPost">
                                            <ul class="categorylist">
                                                <?php foreach ($artikel_data as $each) { ?>
                                                    <li>                                                        
                                                        <article class="recentPost clearfix">
                                                            <div class="postMedia">
                                                                <img style="width:55px;height:65px;" src="<?= base_url() . BACKEND_IMAGE_DIRECTORY . 'artikel/' . $each->gbr_thumb ?>" class="listimg" alt="Property Image">                                                    
                                                            </div><!-- end of postMedia -->

                                                            <div class="postContents">
                                                                <h5 class="postTitle"><a href="<?= base_url() . 'artikel/detail/' . $each->link ?>"><?= $each->judul ?></a></h5>
                                                                <ul class="postMeta">
                                                                    <li class="postDate"><?= $each->tgl_post ?></li>
                                                                </ul><!-- end of postMeta -->
                                                            </div><!-- end of postContents -->
                                                        </article>
                                                    </li>                                                       
                                                <?php } ?>
                                            </ul>
                                        </div><!-- end of post -->
                                    </div><!-- end of widgetBody -->
                                </div><!-- end of widget -->                                                             

                            </div><!-- end of col3 -->

                        </div><!-- end of row -->
                    </div>
                </div>
            </div>



            <?php $this->load->view('front/include/footer_menu'); ?>            
        </div><!-- end of allWrapper -->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1867680373505064";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
</html>