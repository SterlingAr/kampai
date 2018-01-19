<template>

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

                        <!--<a class="navbar-brand" href="#">-->
                        <router-link class="navbar-brand"  :to="{name:'home'}">

                            Kampai

                        </router-link >

                        <!--</a>-->

                        <router-link class="navbar-brand"  to="/profile/user">
                            <span class="glyphicon glyphicon-user"></span>
                        </router-link >

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


                                <router-link :to="{name:'bar_list'}">
                                    <button type="submit" class="btn btn-default ">
                                            <span class="glyphicon glyphicon-ok">
                                            </span>
                                    </button>
                                </router-link>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <side-menu-container></side-menu-container>

        </nav>
    </div>

</template>


<script>

    import SideMenuContainer from "./SideMenuContainer.vue";

    export default {

        mounted(){
            console.log('*DEBUGGER* : SideMenu component created');
        },

        components: {SideMenuContainer}

    }

</script>