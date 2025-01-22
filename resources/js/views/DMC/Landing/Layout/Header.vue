<template>
    <div>
        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link color-pink-hover" href="index.html">Home</a>
                            </li>
                            <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                                <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <li>
                                        <div class="mega-menu-content clearfix">
                                            <div class="tab">
                                                <button class="tablinks active" onclick="openCategory(event, 'cat01')">Anniversary</button>
                                                <button class="tablinks" onclick="openCategory(event, 'cat02')">Awarding Ceremonies</button>
                                                <button class="tablinks" onclick="openCategory(event, 'cat03')">Convention</button>
                                                <button class="tablinks" onclick="openCategory(event, 'cat04')">Exhibits</button>
                                                <button class="tablinks" onclick="openCategory(event, 'cat05')">Forum</button>
                                                <button class="tablinks">More...</button>
                                            </div>

                                            <div class="tab-details clearfix">
                                                <div id="cat01" class="tabcontent active">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_01.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Morbi bibendum augue augue tempor massa</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_02.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Morbi bibendum augue augue tempor massa</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_03.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Morbi bibendum augue augue tempor massa</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_04.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Morbi bibendum augue augue tempor massa</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                                <div id="cat02" class="tabcontent">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_05.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Donec mollis ante ac libero porttitor pulvinar</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_06.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Donec mollis ante ac libero porttitor pulvinar</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_07.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Donec mollis ante ac libero porttitor pulvinar</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_08.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Donec mollis ante ac libero porttitor pulvinar</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                                <div id="cat03" class="tabcontent">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_09.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Proin varius sagittis diam ac facilisis</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_11.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Proin varius sagittis diam ac facilisis</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_12.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Proin varius sagittis diam ac facilisis</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_13.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Proin varius sagittis diam ac facilisis</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                                <div id="cat04" class="tabcontent">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_14.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Nullam finibus diam mauris auctor velit</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_15.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Nullam finibus diam mauris auctor velit</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_16.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Nullam finibus diam mauris auctor velit</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_17.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Nullam finibus diam mauris auctor velit</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                                <div id="cat05" class="tabcontent">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_18.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Sed eu lacus in sapien mattis tristique ut vel mi</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_19.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Sed eu lacus in sapien mattis tristique ut vel mi</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_20.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Sed eu lacus in sapien mattis tristique ut vel mi</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="custom/upload/menu_21.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <!-- <span class="menucat">Spa</span> -->
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Sed eu lacus in sapien mattis tristique ut vel mi</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                            </div><!-- end tab-details -->
                                        </div><!-- end mega-menu-content -->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <!-- <a class="nav-link color-pink-hover" href="blog-category-01.html">Events</a> -->
                                <router-link to="/events" class="nav-link color-grey-hover">
                                    Events
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <!-- <a class="nav-link color-red-hover" href="blog-category-02.html">Photos</a> -->
                                <router-link to="/photos" class="nav-link color-grey-hover">
                                    Photos
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-red-hover" href="blog-category-02.html">Coverages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-grey-hover" href="/home">
                                <!-- <router-link to="/home" class="nav-link color-grey-hover"> -->
                                    Contact
                                <!-- </router-link> -->
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container -->
        </header><!-- end header -->
    </div>
</template>