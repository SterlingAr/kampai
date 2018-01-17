<template>

        <h1>BAR</h1>

</template>


<script>

    export default
    {
        name: 'bar',
        mounted(){
            console.log('*DEBUGGER* : bar component created');
        },

        data () {
            return {
                test : "Test Message",


            }
        },

    }

</script>