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
                bars: [''],

            }
        },

        methods: {


            index: function()
            {
                // this.bars = [];

                axios.get('https://kampai.local/api/bars/'+this.keywords+"/"+this.bbox).then( (response) => {
//                    axios.get('https://kampai.local/api/bars/vino/43.281204464332774,-2.0570182800292973,43.33741456256349,-1.8973731994628908').then( (response) => {

                    console.log(response);


                    this.bars = response.data.elements;

                    console.log(bars);

                    // bars.forEach( (bar ) => {
                    //     this.bars.push(bar);
                    // });

                    console.log('/api/bars/'+this.keywords+"/"+this.bbox);

                }).catch((error) => {
                    console.log(error);
                });


             },



        },

        props: ['keywords', 'bbox']

    }


</script>