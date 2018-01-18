
<template>

    <div>

        <form >

            <div class="form-group" :class="{'has-error': errors.has('email') }" >
                <label class="control-label" for="email">Email</label>
                <input v-model="email" v-validate.initial="email" data-rules="required|email" class="form-control" type="email" placeholder="Email">
                <p class="text-danger" v-if="errors.has('email')">{{ errors.first('email') }}</p>
            </div>

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
                passwd: ''
            }
        },

        methods: {

         
        }

    }


</script>