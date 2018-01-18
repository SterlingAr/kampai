<template>

    <div class="list-group">
        <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">{{bar.tags.name}}</h4>
            <p class="list-group-item-text">...</p>
        </a>
    </div>

</template>


<script>

    export default
    {
        name: 'bar-item',
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