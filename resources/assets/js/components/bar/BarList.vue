<template>
    <div>


        <ul v-for="bar in bars" class="nav navbar-nav">
            <li>

                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{bar.tags.name}}</h5>
                        <small class="text-muted">3 days ago</small>
                    </div>
                    <p class="mb-1">{{bar.tags.description}}</p>
                    <!--<small class="text-muted">{{ bar.tags.addr.street }}</small>-->
                </a>


            </li>
        </ul>


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