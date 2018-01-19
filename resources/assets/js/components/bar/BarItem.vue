<template>
    <div>
        <div v-for="bar in bars">
                <!--<div  class="list-group">-->
                    <!--<a href="#" class="list-group-item active">-->
                        <!--<h4 class="list-group-item-heading">{{bar.tags.name}}</h4>-->
                        <!--<p class="list-group-item-text">...</p>-->
                    <!--</a>-->
                <!--</div>-->
            <div>
                <a>
                    <h4 >{{bar.tags.name}}</h4>
                    <p>{{bar.tags.description}}</p>

                </a>
            </div>
        </div>
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


            }
        },

        props: ['bars'],

    }

</script>