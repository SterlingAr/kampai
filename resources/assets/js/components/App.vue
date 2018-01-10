<template>
    <div>
        {{test}}
    </div>
</template>


<script>

    export default
    {
        name: 'app',
        mounted(){
            console.log('*DEBUGGER* : app component created');
        },

        data () {
            return {
                test : "Test Message",
                bbox:   "",

            }
        },

        methods: {


        }

    }


</script>