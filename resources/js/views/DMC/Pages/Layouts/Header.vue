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

    <div class="header-area">
        <div class="main-header ">
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="index.html">
                                    <img src="myCustom/img/logo/logo.png" alt="">
                                </a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li>
                                            <a href="/">
                                                Home
                                            </a>
                                        </li>
                                        <li><a href="#">Category</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Anniversaries</a></li>
                                                <li><a href="blog_details.html">Awarding Ceremonies</a></li>
                                                <li><a href="elements.html">Convention</a></li>
                                                <li><a href="elements.html">Exhibits</a></li>
                                                <li><a href="elements.html">Forums</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/events">Events</a></li>
                                        <li><a href="/photos">Photos</a></li>
                                        <li><a href="contact.html">Contact</a></li>
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
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
