
<template>
    <body class="theme-light">
        <div class="page">
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

        </div>
    </body>
</template>

<script>
    import Header from './Layout/_Header.vue';
    import Navbar from './Layout/_Navbar.vue';

    export default { 
        components: {
            Header,
            Navbar
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