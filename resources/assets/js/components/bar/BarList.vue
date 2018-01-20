<template>
    <div>


        <ul v-for="bar in bars" class="nav navbar-nav">
            <li><a href="#">{{bar.tags.name}}</a></li>
        </ul>

    </div>
</template>


<script>

    export default
    {
        name: 'bar_list',

        mounted() {
            console.log('*DEBUGGER* : Bars component created');

        },

        data () {
            return {

            }
        },

        methods: {





        },

        computed: {

        }


    }


</script>