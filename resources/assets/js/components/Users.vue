<template>
    <div>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody v-for="user in users">

            <tr v-for="(value,key) in user">
                <th scope="row">1</th>
                <td>{{key}} : {{value}}</td>
            </tr>

            </tbody>
        </table>
        {{users}}
    </div>
</template>


<script>

    export default
    {
        name: 'users',


        data () {
            return {
                users: [

                ]
            }
        },


        methods: {

            index: () =>
            {
                console.log('Index Method');
                axios.get('/api/users/1').then( (response) => {

                    console.log(response.data.data);
                    this.users.push(response.data.data);

//                    console.log(this.users[0]);

                })
                .catch((error) => {
                    console.log(error);
                });
            },


        },

//        mounted(){
//            console.log('*DEBUGGER* : Users component created');
//            this.index();
//        },

        created(){
            this.index();
        }




    }


</script>