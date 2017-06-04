
<div class="topHead clearfix" id="topHeader">    
    <div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_open" style="outline: none;"><span class="slicknav_menutxt">MENU</span><span class="slicknav_icon"><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a><ul class="slicknav_nav" aria-hidden="false" role="menu">
            <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="0" class="slicknav_item slicknav_row" style="outline: none;">
                    <a href="#" class="active" tabindex="0">Home</a>
                    <span class="slicknav_arrow">►</span></a><ul class="dropDown sub-menu slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                    <li><a href="index.html" class="active" role="menuitem" tabindex="0">Home 1</a></li>
                    <li><a href="index-2.html" role="menuitem" tabindex="0">Home 2</a></li>
                    <li><a href="index-3.html" role="menuitem" tabindex="0">Home 3</a></li>
                    <li><a href="index-4.html" role="menuitem" tabindex="0">Home 4</a></li>
                    <li><a href="index-5.html" role="menuitem" tabindex="0">Home 5</a></li>
                    <li><a href="index-6.html" role="menuitem" tabindex="0">Home 6</a></li>
                    <li><a href="index-7.html" role="menuitem" tabindex="0">Home 7</a></li>
                    <li><a href="index-8.html" role="menuitem" tabindex="0">Home 8</a></li>
                    <li><a href="index-9.html" role="menuitem" tabindex="0">Home 9</a></li>
                    <li><a href="index-10.html" role="menuitem" tabindex="0">Prallax Home</a></li>
                </ul><!-- end of dropdown -->
            </li><!-- end of li -->

            <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="0" class="slicknav_item slicknav_row" style="outline: none;">
                    <a href="#" tabindex="0">Properties</a>
                    <span class="slicknav_arrow">►</span></a><ul class="dropDown sub-menu slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                    <li><a href="properties-grid.html" role="menuitem" tabindex="0">Properties Grid</a></li>
                    <li><a href="properties-list.html" role="menuitem" tabindex="0">Properties List</a></li>
                    <li><a href="properties-single.html" role="menuitem" tabindex="0">Properties Single</a></li>
                    <li><a href="properties-single2.html" role="menuitem" tabindex="0">Properties Single 2</a></li>
                    <li><a href="properties-single3.html" role="menuitem" tabindex="0">Properties Single 3</a></li>
                </ul><!-- end of dropdown -->
            </li><!-- end of li -->

            <li><a href="about.html" role="menuitem" tabindex="0">About</a></li><!-- end of li -->

            <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="0" class="slicknav_item slicknav_row" style="outline: none;">
                    <a href="#" tabindex="0"> Pages</a>
                    <span class="slicknav_arrow">►</span></a><ul class="dropDown sub-menu slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                    <li><a href="agents.html" role="menuitem" tabindex="0">Agents</a></li>
                    <li><a href="error.html" role="menuitem" tabindex="0">Error</a></li>
                    <li><a href="faq.html" role="menuitem" tabindex="0">Faq</a></li>
                    <li><a href="floor-plan.html" role="menuitem" tabindex="0">Floor Plan</a></li>
                    <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="0" class="slicknav_item slicknav_row" style="outline: none;">
                            <a href="#" tabindex="0">Gallery</a>
                            <span class="slicknav_arrow">►</span></a><ul class="dropDown sub-menu slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                            <li><a href="gallery-2column.html" role="menuitem" tabindex="0">Gallery 2Column</a></li>
                            <li><a href="gallery-3column.html" role="menuitem" tabindex="0">Gallery 3Column</a></li>
                            <li><a href="gallery-full-width.html" role="menuitem" tabindex="0">Gallery Full Width</a></li>
                        </ul><!-- end of dropdown -->
                    </li>
                </ul><!-- end of dropdown -->
            </li><!-- end of li -->

            <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="0" class="slicknav_item slicknav_row" style="outline: none;">
                    <a href="#" tabindex="0">News</a>
                    <span class="slicknav_arrow">►</span></a><ul class="dropDown sub-menu slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                    <li><a href="blog-grid.html" role="menuitem" tabindex="0">News Grid</a></li>
                    <li><a href="blog-list.html" role="menuitem" tabindex="0">News List</a></li>
                    <li><a href="blog-masonry.html" role="menuitem" tabindex="0">News Masonry</a></li>
                    <li><a href="blog-single.html" role="menuitem" tabindex="0">News Single</a></li>
                </ul><!-- end of dropdown -->
            </li><!-- end of li -->

            <li><a href="contact.html" role="menuitem" tabindex="0">Contact</a></li><!-- end of li -->
        </ul></div>
    <div class="topHeaderInfo">
        <div class="container">            
            <div class="row">
                <div class="col-sm-4">
                    <p><?= $website_information->moto ?></p>
                </div><!-- en   d of col4 -->

                <div class="col-sm-8">
                    <div class="topContactInfo">
                        <ul class="topInfolist">
                            <li class="tele">
                                <img src="<?= FRONTEND_STATIC_FILES ?>images/icons/yellowPhoneIcon.png" alt="Yellow Phone Icon">
                                <a href="tele:<?= $website_information->contact ?>"><?= $website_information->contact ?></a>
                            </li>
                            <li class="mail">
                                <img src="<?= FRONTEND_STATIC_FILES ?>images/icons/yellowMailBox.png" alt="MailBox Icon">
                                <a href="mailto:<?= $website_information->email ?>"><?= $website_information->email ?></a>
                            </li>
                            <li class="mail">
                                <img src="<?= FRONTEND_STATIC_FILES ?>images/icons/yellowClockIcon.png" alt="Clock Icon">
                                <a href="mailto:<?= $website_information->email ?>"><?= $website_information->email ?></a>
                            </li>
                        </ul><!-- end of topContactlist -->
                    </div><!-- end of topContact -->
                </div><!-- end of col8 -->

            </div><!-- end of row -->
        </div><!-- end of container -->
    </div><!-- end of topHeaderInfo -->
</div><!-- end of topHead -->