<template>
                <div class="row">
                        <!-- uncomment code for absolute positioning tweek see top comment in css -->
                        <!-- <div class="absolute-wrapper"> </div> -->
                        <!-- Menu -->
                        <div class="side-menu">

                                <nav class="navbar navbar-default" role="navigation">
                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                                <div class="brand-wrapper">
                                                        <!-- Hamburger -->
                                                        <button type="button" class="navbar-toggle">
                                                                <span class="sr-only">Toggle navigation</span>
                                                                <span class="icon-bar"></span>
                                                                <span class="icon-bar"></span>
                                                                <span class="icon-bar"></span>
                                                        </button>

                                                        <!-- Brand -->
                                                        <div class="brand-name-wrapper">
                                                                <a class="navbar-brand" href="#">
                                                                        {{ title.name }}
                                                                        <span class="glyphicon glyphicon-user"></span>

                                                                </a>
                                                        </div>

                                                        <!-- Search -->
                                                        <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">

                                                                <span class="glyphicon glyphicon-search"></span>
                                                        </a>

                                                        <!-- Search body -->
                                                        <div id="search" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                        <form class="navbar-form" role="search">
                                                                                <div class="form-group">
                                                                                        <input v-model="keywords" type="text" class="form-control" placeholder="Search">
                                                                                </div>
                                                                                <router-link :to="{name: 'bar_list', params: {
                                                                                    keywords: keywords,
                                                                                    bbox: bbox,
                                                                                }}">
                                                                                        <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                                                                                </router-link>
                                                                        </form>
                                                                </div>
                                                        </div>
                                                </div>

                                        </div>
                                </nav>
                                <!-- Main Menu -->
                                <div class="side-menu-container">
                                        <div class="panel-body">
                                                <button @click="changeTitle">ChangeTitle</button>
                                                <router-view></router-view>
                                                <router-view name="bar_list"></router-view>
                                        </div>
                                </div><!-- /.navbar-collapse -->
                        </div>

                        <!-- Main Content -->
                        <div class="container-fluid">
                                <div class="side-body">

                                        <osm-map></osm-map>
                                </div>
                        </div>
                </div>
</template>

<script>


    // import NavCustom from './NavCustom.vue'
    import {mapGetters} from 'vuex';
    export default
    {
        name: 'app',
        mounted(){
            console.log('*DEBUGGER* : App component created');
            console.log(this.$store.state.message);
        },

        data () {
            return {

                keywords: 'all',
                bbox: this.$parent.bbox,
            }
        },

        methods: {

            changeTitle: function () 
                {
                    this.$store.commit('changeTitle');
                }


        },

        computed: {


            ...mapGetters({

                           title: 'appTitle'

                       }),


        }





    }


</script>