<template>
    <div>

        <div class="list-group">

            <a v-for="bar in bars" href="#" class="list-group-item list-group-item-action flex-column align-items-start active">

                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ bar.tags.name }}</h5>
                    <small>3 days ago</small>
                </div>

                <p class="mb-1">{{ bar.tags.description }}</p>

                <small>Donec id elit non mi porta.</small>
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
            this.$parent.debug(this.index, 'BARS index');

        },

        data () {
            return {
                bars: [],
                keywords: 'gintonic',
            }
        },

        methods: {

            index: function()
            {

                axios.get('/api/bars/custom/'+this.keywords+"/"+this.$parent.bbox).then( (response) => {
                    // console.log(response);

                    let temp_bars = response.data.elements;

                    temp_bars.forEach( (bar) => {
                        this.bars.push(bar);
                    });

                    console.log(response);


                })
                    .catch((error) => {
                        console.log(error);
                    });

            }

        }

    }


</script>