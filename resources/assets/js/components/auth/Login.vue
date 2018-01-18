
<template>

    <div>

        <form >

            <div class="form-group" :class="{'has-error': errors.has('email') }" >

                <label class="control-label">Email</label>

                <input v-model="email" v-validate="'required|email'" class="form-control" type="email" placeholder="Email">

                <p v-show="errors.has('email')"> {{ errors.first('email')}}</p>

            </div>

            <div class="form-group" :class="{'has-error': errors.has('password') }" >

                <label class="control-label">Password</label>

                <input v-model="password" v-validate="'required|alpha'" class="form-control" type="password" placeholder="Password">

                <p v-show="errors.has('email')"> {{ errors.first('email')}}</p>

            </div>

            <button v-on:click="login" type="submit" class="btn btn-default">Submit</button>

        </form>

    </div>

</template>

<script>
    export default
    {
        name: 'Login',

        data () {
            return {
                email: '',
                password: '',
                user: {
                    name: 'Dibbler!'
                }
            }
        },

        mounted: function () {


        },

        methods: {

            login: function ()
            {
                axios.post('/api/auth/login', {

                    email: this.email,
                    password: this.password,


                }).then((response) =>{

                    console.log(response);

                    //If
                    if(response.status === 200)
                    {
                        //display 'Login success' and redirect

                        this.$router.push(
                            {
                                name:'profile',
                                params:
                                    {
                                        user: this.user
                                    }
                            });
                    }
                    // else
                    // Display error on screen


                }).catch((error) => {

                    console.log(error);

                })
            }
        }

    }


</script>