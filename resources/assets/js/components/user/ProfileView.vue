<template>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card hovercard">
            <div class="card-background">
                <img class="card-bkimg" alt="" src="https://lorempixel.com/output/people-q-c-100-100-1.jpg">
                <!-- http://lorempixel.com/850/280/people/9/ -->
            </div>
            <div class="useravatar">
                <img alt="" src="https://lorempixel.com/output/people-q-c-100-100-1.jpg">
            </div>
            <div class="card-info"> <span class="card-title">{{ user.name }}</span>

            </div>
        </div>
        <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">

            <div class="btn-group" role="group">
                <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <div class="hidden-xs">Me</div>
                </button>
            </div>

            <div class="btn-group" role="group">
                <button type="button" id="favorites" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <div class="hidden-xs">Favorites</div>
                </button>
            </div>


        </div>

        <div class="well">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <h3>This is tab 1</h3>
                </div>

                <div class="tab-pane fade in" id="tab3">
                    <h3>This is tab 3</h3>
                </div>
            </div>
        </div>

    </div>
</div>
</template>


<script>

    export default
    {
        name: 'ProfileView',

        mounted: function () {

            console.log('*DEBUGGER* : ProfileView component created');


        },


        methods: {



        },

        props: ['user']



    }


</script>