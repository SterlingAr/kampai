<template>
    <div>


            <table class="table table-hover" data-toggle="collapse" data-target=".navbar-collapse.in" id="feature-btn">
                <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nombre</th>
                </tr>
                </thead>
                <tbody  class="list"  v-if="bars.length">
                    <tr v-for="bar in bars">
                        <router-link :to="{
                            name: 'bar_view',
                            params:{
//                                showModal: true,
                                bar: 'bar'
                        }}">
                        <td class="fa fa-beer black"></td>
                        <td >{{bar.tags.name}}</td>
                        </router-link>
                    </tr>
                </tbody>
                <div v-else>
                    <p>Ningún bar coinicide con tu criterio de búsqueda.</p>
                </div>
            </table>


    </div>
</template>


<script>

    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';
    export default
    {
        name: 'bar_list',

        mounted() {

        },

        data () {
            return {

            }
        },

        methods: {

            ...mapActions({
                showModal: 'updateBarModalAction'
            })



        },

        computed: {

            ...mapGetters({
                bars: 'currentBars',
            })

        }


    }


</script>