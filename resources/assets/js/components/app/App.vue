<template>
    <div>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="navbar-icon-container">
                        <a href="#" class="navbar-icon pull-right visible-xs" id="nav-btn"><i class="fa fa-bars fa-lg white"></i></a>
                        <a href="#" class="navbar-icon pull-right visible-xs" id="sidebar-toggle-btn"><i class="fa fa-search fa-lg white"></i></a>
                    </div>
                    <a class="navbar-brand" href="#">{{ appTitle.title }}</a>
                </div>
                <div class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group has-feedback">
                            <input  v-on:keyup.enter="updateBarsAction" id="searchbox" type="text" placeholder="Search" class="form-control" @input="updateKeywords">
                            <span id="searchicon" class="fa fa-search form-control-feedback">
                               <router-link :to="{name: 'bar_list'}">
                                    <button  type="submit" class="btn btn-default">
                                        <span class="sr-only">Search...</span>
                                    </button>
                               </router-link>
                            </span>
                        </div>
                    </form>


                    <ul class="nav navbar-nav">


                        <li class="divider hidden-xs"></li>
                        <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="login-btn"><i class="fa fa-user"></i>&nbsp;&nbsp;Iniciar sesión</a></li>

                        <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="feature-btn"><i class="fa fa-user"></i>&nbsp;&nbsp;Feature</a></li>

                        <li class="hidden-xs"><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="list-btn"><i class="fa fa-beer white"></i>&nbsp;&nbsp;Bares</a></li>
                    </ul>
                </div><!--/.navbar-collapse -->
            </div>
        </div>

        <div id="container">
            <div id="sidebar">
                <div class="sidebar-wrapper">
                    <div class="panel panel-default" id="features">
                        <div class="panel-heading">
                            <h3 class="panel-title">Bares encontrados
                                <button type="button" class="btn btn-xs btn-default pull-right" id="sidebar-hide-btn"><i class="fa fa-chevron-left"></i></button></h3>
                        </div>

                        <div class="sidebar-table">
                            <router-view></router-view>

                            <router-view name="bar-list"></router-view>
                            <router-view name="bar_view"></router-view>
                        </div>
                    </div>
                </div>
            </div>
            <osm-map></osm-map>

        </div>




        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body">
                        <form id="contact-form">
                            <fieldset>
                                <div class="form-group">
                                    <label for="name">Username:</label>
                                    <input type="text" class="form-control" id="username">
                                </div>
                                <div class="form-group">
                                    <label for="email">Password:</label>
                                    <input type="password" class="form-control" id="password">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Login</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="featureModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-primary" id="feature-title"></h4>
                    </div>
                    <div class="modal-body" id="feature-info"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </div>
</template>

<script>


    import {mapGetters} from 'vuex';
    import {mapMutations} from 'vuex';
    import {mapActions} from 'vuex';
    export default
    {
        name: 'app',
        mounted(){
            console.log('*DEBUGGER* : App component created');
        },

        data () {
            return {

                appObject: {
                    title: 'KAMPAI'
                }

            }
        },

        methods: {

            ...mapMutations([
                // 'changeTitle'
            ]),

            ...mapActions([
                'changeTitle',
                'updateBarsAction'
            ]),


            updateKeywords: function (event)
            {

                this.$store.dispatch('updateKeywordsAction', event.target.value);

            }


        },

        computed: {
            ...mapGetters({

                           appTitle: 'currentTitle',
                           bbox: 'currentBBOX',
                           keywords: 'currentKeywords'
                       }),


        }





    }


</script>