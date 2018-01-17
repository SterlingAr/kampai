<template>

</template>


<script>


    export default
    {
        name: 'bar-view',
        mounted(){
            console.log('*DEBUGGER* : bar component created');
        },

        data () {
            return {

                test : "Test Message",

            }
        },

        props: ['bar'],

    }
</script>