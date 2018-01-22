<template>
    <div>


            <table class="table table-hover" id="feature-list">
                <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nombre</th>
                </tr>
                </thead>

                <tbody  class="list">
                    <tr v-for="bar in bars">
                        <td class="fa fa-beer black"></td>
                        <td>{{bar.tags.name}}</td>
                    </tr>
                </tbody>
            </table>
            <!--<ul v-for="bar in bars">-->

                <!--<li>{{bar.tags.name}}</li>-->

            <!--</ul>-->



    </div>
</template>


<script>

    import {mapGetters} from 'vuex';

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

            ...mapGetters({
                bars: 'currentBars'
            })

        }


    }


</script>