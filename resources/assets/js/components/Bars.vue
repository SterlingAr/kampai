<template>
    <div>
        {{test}}
    </div>
</template>


<script>

    export default
    {
        name: 'bars',
        mounted(){
            console.log('*DEBUGGER* : Bars component created');
        },

        data () {
            return {
                test : "Bars component",
            }
        },

        methods: {



        }

    }


</script>