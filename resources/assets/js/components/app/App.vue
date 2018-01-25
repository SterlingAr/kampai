<template>
    <div>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div>
                <div class="navbar-header">
                    <div class="navbar-icon-container">
                        <a href="#" class="navbar-icon pull-right visible-xs" id="nav-btn"><i class="fa fa-bars fa-lg white"></i></a>
                        <a href="#" class="navbar-icon pull-right visible-xs" id="sidebar-toggle-btn"><i class="fa fa-search fa-lg white"></i></a>
                    </div>
                    <a class="navbar-brand" href="#">{{ appTitle.title }}</a>
                </div>
                <div class="navbar-collapse collapse">

                        <form class="navbar-form navbar-right " role="search">
                            <div class="input-group form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Search"    @input="updateKeywords">
                                <div class="input-group-btn">
                                    <router-link :to="{name: 'bar_list'}" >
                                     <button @click="updateBarsAction" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </router-link>
                                </div>
                            </div>
                        </form>
                    <ul class="nav navbar-nav">
                        <li class="divider hidden-xs"></li>
                        <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="login-btn"><i class="fa fa-user"></i>&nbsp;&nbsp;Iniciar sesión</a></li>

                        <!--<li><a >&nbspTest</a></li>-->

                        <li><a href="#"  data-toggle="collapse" data-target=".navbar-collapse.in" id="feature-btn"><i class="fa fa-user"></i>&nbsp;&nbsp;Feature</a></li>

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
                                    <label>Username:</label>
                                    <input type="text" class="form-control" id="username">
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
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



        <router-view name="bar-view"></router-view>


    </div>
</template>

<script>


    import {mapGetters, mapActions} from 'vuex';
    export default
    {
        name: 'app',
        mounted(){
        },

        data () {
            return {

                appObject: {
                    title: 'KAMPAI',
                },
                users: []


            }
        },

        methods: {

            ...mapActions([
                'changeTitle',
                'updateBarsAction',
                'updateBarModalAction'
            ]),

            updateKeywords: function (event)
            {
                this.$store.dispatch('updateKeywordsAction', event.target.value);
            },

            toggleModal: function ()
            {
                this.showModal = true;
            }

        },

        computed: {
            ...mapGetters(
                {
                   appTitle: 'currentTitle',
                   bbox: 'currentBBOX',
                   keywords: 'currentKeywords'
                }),
        },






    }


</script>