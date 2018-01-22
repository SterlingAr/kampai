<template>
    <!--<div class="modal fade" id="featureModal" tabindex="-1" role="dialog">-->
        <!--<div class="modal-dialog">-->
            <!--<div class="modal-content">-->
                <!--<div class="modal-header">-->
                    <!--<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                    <!--<h4 class="modal-title text-primary" id="feature-title"></h4>-->
                <!--</div>-->
                <!--<div class="modal-body" id="feature-info"></div>-->
                <!--<div class="modal-footer">-->
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <!--</div>-->
            <!--</div>&lt;!&ndash; /.modal-content &ndash;&gt;-->
        <!--</div>&lt;!&ndash; /.modal-dialog &ndash;&gt;-->
    <!--</div>&lt;!&ndash; /.modal &ndash;&gt;-->
<div>
</div>


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