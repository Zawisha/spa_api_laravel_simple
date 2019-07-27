<template>

    <div>
        register new user
        <form @submit.prevent="onSubmit()">

            <div class="form-group">
                <label for="account_email">Email</label>
                <input id="account_email" type="email" v-model="account.username" />
            </div>
            <div class="form-group">
                <label for="account_email">Password</label>
                <input id="account_password" type="password" v-model="account.password" />
            </div>
            <div class="form-group">
                <button type="submit" >Login</button>
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
                    username: "",
                    password:"",
                    grant_type:"password",
                    client_id:"2",
                    client_secret:"97Bb6rHf3va9NElqDwmRuPihDpSWQCvih1oIOVPK"
                })
            };
        },
        methods: {

            onSubmit() {
                // this.account.post('api/log_pas').then(({ data }) => { console.log(data) });

                this.account.post('oauth/token').then(({ data }) => { console.log(data) });
            },

        },
        created() {




        }

    };
</script>
