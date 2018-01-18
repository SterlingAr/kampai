<template>
    <div>
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
                                Brand
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


                                    <router-link to="/bars">
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

                <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <li>
                            <router-view></router-view>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->

            </nav>

        </div>
        <maps></maps>
    </div>

</template>


<script>

    export default
    {
        name: 'app',
        mounted(){
            console.log('*DEBUGGER* : app component created');
        },

        data () {
            return {
                test : "Test Message",
                bbox:   "",
                keywords: 'Test'

            }
        },

    }


</script>