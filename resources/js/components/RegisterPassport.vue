<template>

    <div>
        register new user
        <form @submit.prevent="onSubmit()">
            <div class="form-group">
                <label for="account_name">Name</label>
                <input id="account_name" v-model="account.name" />
            </div>
            <div class="form-group">
                <label for="account_email">Email</label>
                <input id="account_email" type="email" v-model="account.email" />
            </div>
            <div class="form-group">
                <label for="account_email">Password</label>
                <input id="account_password" type="password" v-model="account.password" />
            </div>
            <div class="form-group">
                <button type="submit" >Register</button>
            </div>
        </form>
    </div>

</template>

<script>

    import axios from 'axios';
    export default {
        data() {
            return {
                account: new Form({
                    name: "",
                    email: "",
                    password:""
                })
            };
        },
        methods: {

            onSubmit() {
                this.account.post('api/reg_pas').then(({ data }) => { console.log(data) });
            },

        },
        created() {




        }

    };
</script>