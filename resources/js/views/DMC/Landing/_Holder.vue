
<template>
    <div>

        <!-- LOADER -->
        <div id="preloader">
            <img class="preloader" src="custom/images/loader.gif" alt="">
        </div><!-- end loader -->
        <!-- END LOADER -->

        <div id="wrapper">
            <!-- <Search />
            <TopBar />
            <LogoBar /> -->
            <Header />

            <router-view> </router-view>
        </div>

        <!-- <div class="page">
            <div class="sticky-top">
                <header class="navbar navbar-expand-md d-print-none"  data-bs-theme="dark">
                    <Header />
                </header>
                <header class="navbar-expand-md" data-bs-theme="dark">
                    <Navbar />
                </header>
            </div>
            <div class="page-wrapper" data-bs-theme="light">
                <router-view> </router-view>
            </div>
        </div> -->
    </div>
</template>

<script>
    // import Search from './Layout/Search.vue';
    // import TopBar from './Layout/TopBar.vue';
    // import LogoBar from './Layout/Logo.vue';
    import Header from './Layout/Header.vue';

    export default { 
        components: {
            // Search,
            // TopBar,
            // LogoBar,
            Header
        },
        data(){
            return {
            }
        },
        mounted(){
        },
        methods:{
        }
    }
</script>