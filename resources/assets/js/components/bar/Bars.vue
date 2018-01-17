<template>
    <div>
aaa
        <bar></bar>

    </div>
</template>


<script>

    export default
    {
        name: 'bars',

        mounted() {
            console.log('*DEBUGGER* : Bars component created');

        },

        data () {
            return {
                bars: [],

            }
        },

        methods: {

            index: function()
            {
                // this.bars = [];

                axios.get('/api/bars/'+this.keywords+"/"+this.$parent.bbox).then( (response) => {

                    console.log(response);


                    let bars = response.data.elements;

                    console.log(bars);

                    bars.forEach( (bar ) => {
                        this.bars.push(bar);
                    });

                    console.log('/api/bars/'+this.keywords+"/"+this.$parent.bbox);

                }).catch((error) => {
                        console.log(error);
                    });

            }

        }

    }


</script>