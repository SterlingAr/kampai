<template>
    <div>

        <div class="list-group">

            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">

                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small>3 days ago</small>
                </div>

                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>

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
                keywords: 'vino',
            }
        },

        methods: {

            index: function()
            {

                axios.get('api/bars/custom/'+this.keywords+"/"+this.$parent.bbox).then( (response) => {
                    console.log(response);
                    console.log('SENT BBOX'+this.$parent.bbox);

                })
                    .catch((error) => {
                        console.log(error);
                    });

            }


        }

    }


</script>