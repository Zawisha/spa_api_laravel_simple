<template>
    <div>
        <p>
            <router-link :to="{ name: 'log_pas' }">Login_passport</router-link> |
            <router-link :to="{ name: 'reg_pas' }">Register_passport</router-link> |
        </p>
        <h1>Vue Router Demo App</h1>

        <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'hello' }">Hello World</router-link>|
            <router-link :to="{ name: 'users.index' }">Users</router-link>
            <router-link :to="{ name: 'log' }">Account</router-link>
        </p>

        <div class="container">
            <router-view></router-view>
            <vue-progress-bar></vue-progress-bar>
        </div>
    </div>
</template>
<script>
    export default {}
</script>