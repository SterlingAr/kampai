<template>
    <div>

        <p>test</p>
    </div>

</template>


<script>

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




    }
</script>