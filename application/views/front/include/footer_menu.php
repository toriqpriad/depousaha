<footer class="footer section clearfix footerBg" id="footer2">
    <div class="bgOverly"></div>
    <div class="topFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="footerWidget footerBox footerlocBox">
                        <div class="footerIcon">
                            <div class="footerLocationIcon">
                                <img src="<?= FRONTEND_STATIC_FILES ?>images/icons/locationIcon.png" alt="Locatoin Icon">
                            </div><!-- end of footerLocatoinIcon -->
                        </div><!-- end of footerIcon -->

                        <div class="footerInfoContent">
                            <h5><?= $website_information->city ?></h5>                            
                            <p>Office</p>
                        </div><!-- end of footerInfoContent -->

                    </div><!-- end of footerWidget -->
                </div><!-- end of col5 -->

                <div class="col-sm-3">
                    <div class="footerWidget footerBox footerphnBox">
                        <div class="footerIcon">
                            <div class="footerTelephoneIcon">
                                <img src="<?= FRONTEND_STATIC_FILES ?>images/icons/telephoneIcon.png" alt="Telephone Icon">
                            </div><!-- end of footerTelephoneIcon -->
                        </div><!-- end of footerIcon -->

                        <div class="footerInfoContent">
                            <h5><?= $website_information->contact ?></h5>
                            <p>Office</p>
                        </div><!-- end of footerInfoContent -->

                    </div><!-- end of footerWidget -->
                </div><!-- end of col3 -->

                <div class="col-sm-4">
                    <div class="footerWidget footerBox footermailBox">
                        <div class="footerIcon">
                            <div class="footerEmailIcon">
                                <img src="<?= FRONTEND_STATIC_FILES ?>images/icons/mailIcon.png" alt="E-mail Icon">
                            </div><!-- end of footerEmailIcon -->
                        </div><!-- end of footerIcon -->

                        <div class="footerInfoContent">
                            <h5><?= $website_information->email ?></h5>
                            <p>Support</p>
                        </div><!-- end of footerInfoContent -->

                    </div><!-- end of footerWidget -->
                </div><!-- end of col4 -->
            </div><!-- end of row -->
        </div><!-- end of container -->
    </div><!-- end of topFooter -->

    <div class="bottomFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright text-center"><strong><?= $website_information->name ?></strong> © 2017. All rights reserved by <a target="_blank" href="#"><?= $website_information->name ?></a>
                    </div><!-- end of copyright -->
                    <div class="footerSocialNav">
                        <ul class="footerSocial socialNav">
                            <li class="facebook"><a href="https://www.facebook.com/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li class="twitter"><a href="https://twitter.com/"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                            <li class="linkedin"><a href="https://www.linkedin.com/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                            <li class="behance"><a href="https://plus.google.com/"><i class="fa fa-behance-square" aria-hidden="true"></i></a></li>
                            <li class="googleplus"><a href="https://plus.google.com/"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                        </ul><!-- end of top social -->
                    </div>
                </div><!-- end of col12 -->
            </div><!-- end of row -->
        </div><!-- end of container -->
    </div><!-- end of bottomFooter -->
</footer>
<div id="toTop" class="hidden-xs">
    <i class="fa fa-chevron-up"></i>
</div> <!-- totop -->

</body>