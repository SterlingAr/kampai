<template>

    <form >

        <div class="form-group"  >

            <label class="control-label">Name</label>

            <input v-model="name" class="form-control" type="text" placeholder="Name">


        </div>

        <div class="form-group" :class="{'has-error': errors.has('email') }" >

            <label class="control-label">Email</label>

            <input v-model="email" v-validate="'required|email'" class="form-control" type="email" placeholder="Email">

            <p v-show="errors.has('email')"> {{ errors.first('email')}}</p>

        </div>

        <div class="form-group" :class="{'has-error': errors.has('password') }" >

            <label class="control-label">Password</label>

            <input v-model="password" v-validate="'required|alpha'" class="form-control" type="password" placeholder="Password">

            <p v-show="errors.has('password')"> {{ errors.first('password')}}</p>

        </div>

        <div class="form-group" >

            <label class="control-label">Password</label>

            <input v-model="confirmPassword" class="form-control" type="password" placeholder="Confirm password">


        </div>

        <button v-on:click="register" type="submit" class="btn btn-default">Submit</button>

    </form>

</template>


<script>

    export default {
        //Install vue-password to meter the strength
        name: 'Register',

        data () {
            return {
                name: '',
                email: '',
                password: '',
                confirmPassword : ''
            }
        },

        methods: {

            register: function ()
            {
                axios.post('/api/auth/register' , {

                    name: this.name,
                    email: this.email,
                    password: this.password

                })
                    .then((response) => {

                        console.log(response);
                        this.$router.push({path:'/bars'});


                    })
                    .catch((error) => {

                        console.log(error);
                });
            }

        }

    }

</script>