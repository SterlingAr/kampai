<template>
    <div>
        <table class="table">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody v-for="user in users">
                <tr>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                </tr>
            </tbody>

        </table>
    </div>
</template>


<script>

    export default
    {
        name: 'users',

        data () {
            return {
                users: []
            }
        },

        mounted: function () {

            console.log('*DEBUGGER* : Users component created');

            // this.$parent.debug(this.index, 'index');

        },

        methods: {

            index: function ()
            {
                axios.get('/api/users').then( (response) => {


                    let users = response.data;

                    users.forEach( (user) => {
                        this.users.push(user);
                    });

                }).catch( (error) => {
                    console.log(error);
                });
            },



        },


    }


</script>