<script>
    export default {
        data() {
            return {
            searchKeyword: ''
            };
        },
        methods: {
            performSearch() {
            if (this.searchKeyword.trim() !== '') {
                this.$router.push({
                path: '/events',
                query: {
                    search: this.searchKeyword.trim(),
                    page: 1 // always start from page 1 when searching
                }
                });
            }
            }
        }
    };
</script>


<template>

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="/" class="logo">
                            DMC
                        </a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/">Home</a></li>
                            <li class="has-sub">
                                <a href="javascript:void(0)">Browse</a>
                                <ul class="sub-menu">
                                    <li><a href="/events">Events</a></li>
                                    <li><a href="/photos">Photos</a></li>
                                    <li><a href="#">Videos</a></li>
                                    <li><a href="#">Categories</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="/">Upcoming Events</a></li>
                            <li class="scroll-to-section"><a href="#">Contact Us</a></li>
                            <li class="scroll-to-section">
                                <form @submit.prevent="performSearch" style="width: 300px;">
                                    <input
                                    v-model="searchKeyword"
                                    class="form-control"
                                    placeholder="Search events, photos, videos..."
                                    />
                                </form>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="/" class="logo">
                            <img src="hexaShop/assets/images/stii-logo.png">
                        </a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Browse</a>
                                <ul>
                                    <li><a href="/events">Events</a></li>
                                    <li><a href="#">Categories</a></li>
                                    <li><a href="/photos">Photos</a></li>
                                    <li><a href="#">Videos</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Contact</a></li>
                            <li>
                                <form @submit.prevent="performSearch" style="display: flex; align-items: center; width: 400px;">
                                    <input
                                    v-model="searchKeyword"
                                    class="form-control"
                                    placeholder="Search events, photos, videos..."
                                    />
                                </form>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header> -->

    <!-- <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">DMC</h1><span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home</a></li>
                <li class="dropdown"><a href="about.html"><span>Events</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="team.html">Photos</a></li>
                    <li><a href="team.html">Videos</a></li>
                    <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Category 1</a></li>
                        <li><a href="#">Category 2</a></li>
                        <li><a href="#">Category 3</a></li>
                    </ul>
                    </li>
                </ul>
                </li>
                <li><a href="#">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                <form @submit.prevent="performSearch">
                    <input
                    v-model="searchKeyword"
                    class="form-control"
                    placeholder="Search events, photos, videos..."
                    />
                </form>
            </div>

        </div>
    </header> -->

    <!-- <div class="header-area">
        <div class="main-header ">
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12 header-flex">
                            <div class="sticky-logo">
                                <a href="index.html">
                                    <img src="myCustom/img/logo/logo.png" alt="">
                                </a>
                            </div>
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li>
                                            <a href="/">
                                                Home
                                            </a>
                                        </li>
                                        <li><a href="/events">Events</a></li>
                                        <li><a href="/photos">Photos</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form @submit.prevent="performSearch">
                                <input
                                v-model="searchKeyword"
                                class="form-control"
                                placeholder="Search Keyword"
                                />
                            </form>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</template>
