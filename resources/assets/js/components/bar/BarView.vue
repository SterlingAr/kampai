<template>
    <div>
        <modal :show.sync="showModal">
            <div slot="modal-header" class="modal-header">
                <!--<h4 class="modal-title">{{bar.tags.name}}</h4>-->
            </div>
            <div slot="modal-body" class="modal-body">...</div>
        </modal>
        <p>test</p>
    </div>

</template>


<script>

    import {modal} from 'vue-strap';
    import {mapGetters} from 'vuex';

    export default
    {
        name: 'bar-view',
        mounted()
        {

        },

        data ()
        {
            return
            {


            }
        },

        computed:
        {

        ...mapGetters({
                showModal : 'currentBarModal'
        })

        },

        components:
        {
            modal,
        }


    }
</script>