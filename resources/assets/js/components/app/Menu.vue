<template>

    <div class="side-menu-container">
        <ul class="nav navbar-nav">
            <li>
                <!--<router-link to="/bars">-->
                    <!--<a href="#"><span class="glyphicon glyphicon-send"></span> Link</a>-->
                <!--</router-link>-->
            </li>
            <router-view></router-view>
        </ul>
    </div><!-- /.navbar-collapse -->

</template>


<script>

    export default
    {
        name: 'menu',
        mounted(){
            console.log('*DEBUGGER* : menu component created');
        },

        data () {
            return {
                test : "Test Message",


            }
        },

    }

</script>