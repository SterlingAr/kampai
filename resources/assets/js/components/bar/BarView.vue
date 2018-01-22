<template>
    <modal :show.sync="showModal">
        <div slot="modal-header" class="modal-header">
            <h4 class="modal-title">Modal title</h4>
        </div>
        <div slot="modal-body" class="modal-body">...</div>
    </modal>


</template>


<script>

    import {modal} from 'vue-strap';

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

        components: {
            modal,

        }


    }
</script>