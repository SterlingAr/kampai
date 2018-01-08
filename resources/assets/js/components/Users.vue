<template>
    <div>
        {{test}}

        
    </div>
</template>


<script>

    export default
    {
        name: 'users',
        mounted(){
            console.log('*DEBUGGER* : Users component created');
        },

        data () {
            return {
                test : "Users component",
            }
        },

        methods: {

        }

    }


</script>