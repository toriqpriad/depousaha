<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>
            <?= $title_page ?>
        </title>
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
                                        <center>
                                            <h2>Tentang <span class="yellowTxt">Kami</span></h2></center>
                                    </div>
                                    <!-- end of successContent -->
                                </div>
                                <!-- end of col7 -->
                            </div>
                            <!-- end of successWrapper -->

                        </div>


                        <!-- end of row-->
                    </div>
                    <!-- end of container -->
                </div>
                <!-- end of sectionWrapper  -->
            </section>
            <!-- end of aboutSuccess-->
            <section class=" clearfix section">
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">



                            <div class="col-sm-7 ">
                                <div class="aboutUsWrapper">
                                    <div  class="sectionTitle text-left">
                                        <h6 style="color:white">Introduction</h6>
                                        <h1 style="color:white" class="sectionHeader"><?= $website_information->name ?><span class="generalBorder"></span></h1>                                                
                                        <p style="color:white"><?= $website_information->description ?></p>                                                

                                    </div><!-- end of sectionTitle -->
                                </div><!-- end of aboutUsWrapper-->
                            </div><!-- end of col6 -->

                            <div class="col-sm-5 noPaddingLeft">
                                <div class="aboutMidea"> 
                                    <img src="<?= base_url() . 'assets/images/backend/profile/' . $website_information->logo ?>" alt="About Property Image">
                                </div><!-- end of aboutMidea -->
                            </div><!-- end of col5 -->

                        </div><!-- end of aboutTab -->


                    </div><!-- end of aboutHistoryTab -->
                </div>
                <!-- end of row -->
            </section>
        </div>
        <!-- end of container -->


    </section>
    <!-- end of latestNewsUpdate -->



    <?php $this->load->view('front/include/footer_menu'); ?>
</div>
<!-- end of allWrapper -->

</html>