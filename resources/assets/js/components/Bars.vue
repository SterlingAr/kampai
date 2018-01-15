<template>
    <div>

        <form action="">

            <div class="form-group row">

                <div class="col-10">
                    <input v-model="keywords" class="form-control" type="search" placeholder="How do I shoot web" id="example-search-input">

                    <input  v-on:click="index()" type="button" value="">
                </div>


            </div>

        </form>

        <div class="list-group">

            <a v-for="bar in bars" href="#" class="list-group-item list-group-item-action flex-column align-items-start active">

                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ bar.tags.name }}</h5>
                    <small>3 days ago</small>
                </div>

                <p class="mb-1">{{ bar.tags.description }}</p>

                <small>{{ bar.tags.address }}</small>
            </a>

        </div>

    </div>
</template>


<script>

    export default
    {
        name: 'bars',

        mounted() {
            console.log('*DEBUGGER* : Bars component created');
//            this.$parent.debug(this.index, 'BARS index');

        },

        data () {
            return {
                bars: [],
                keywords: '',
            }
        },

        methods: {

            index: function()
            {

                axios.get('/api/bars/'+this.keywords+"/"+this.$parent.bbox).then( (response) => {
                     console.log('/api/bars/'+this.keywords+"/"+this.$parent.bbox);

                    let temp_bars = response.data.elements;

                    temp_bars.forEach( (bar) => {
                        this.bars.push(bar);
                    });

                    console.log('/api/bars/'+this.keywords+"/"+this.$parent.bbox);

                })
                    .catch((error) => {
                        console.log(error);
                    });

            }

        }

    }


</script>