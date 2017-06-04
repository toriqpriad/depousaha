
<header class="header headerStyle7" id="header">
    
    <div class="sticky scrollHeaderWrapper navbar hidden-xs hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="logoWrapper text-left">
                        <div class="logo">
                            <a href="#"><img src="<?= base_url() . 'assets/images/backend/profile/' . $website_information->logo ?>" alt="Marksproperti" style="margin-top:18px;"></a>
                        </div><!-- end of logo -->
                    </div><!-- end of logoWrapper -->
                </div><!-- end of col3 -->

                <div class="col-sm-10">
                    <nav class="mainMenu mainNav clearfix" id="mainNav">
                        <ul class="navTabs">
                            <li>
                                <a href="<?= base_url() . 'home' ?>">Home</a>                                
                            </li><!-- end of li -->
                            <li>
                                <a href="#">Properti</a>
                                <ul class="dropDown sub-menu">
                                    <?php
                                    if (isset($kategori_properti)) {
                                        foreach ($kategori_properti as $each) {
                                            echo '<li><a href="' . base_url() . 'properti/kategori/' . $each->nama . '">' . $each->nama . '</a></li>';
                                        }
                                    }
                                    ?>
                                    <!--<li><a href="properties-grid.html">Projects Grid</a></li>-->                                    
                                </ul><!-- end of dropdown -->
                            </li><!-- end of li -->
                            <li><a href="<?= base_url() . 'artikel' ?>">Artikel</a></li><!-- end of li -->
                            <li><a>Galeri</a>
                                <ul class="dropDown sub-menu">
                                    <li><a href="<?= base_url() . 'foto' ?>">Foto</a></li>
                                    <li><a href="<?= base_url() . 'video' ?>">Video</a></li>                                    
                                    <li><a href="<?= base_url() . 'portfolio' ?>">Portfolio</a></li>                                    
                                    <li><a href="#">Desain</a></li><!-- end of li -->
                                </ul><!-- end of dropdown -->
                            </li><!-- end of li -->
                            <li><a href="<?= base_url() . 'konsultan_projek' ?>">Konsultan & Project</a></li><!-- end of li -->
                            <li><a href="<?= base_url() . 'vendor' ?>">Vendor</a></li><!-- end of li -->
                            <li>
                                <a href="<?= base_url() . 'tentang_kami' ?>">Tentang Kami</a>                                
                            </li><!-- end of li -->
                            <li class="searchNavPopup">
                                <a onclick="searchModal()" class="btn">
                                    <img src="<?= FRONTEND_STATIC_FILES ?>images/icons/searchIcon.png" alt="Search Icon">
                                </a>
                            </li>
                        </ul><!-- end of navTabs -->
                    </nav><!-- end of main nav -->

                </div><!-- end of col8-->

            </div><!-- end of row -->
        </div><!-- end of container -->
    </div><!-- end of sticky -->    
</header><!-- end of header -->
