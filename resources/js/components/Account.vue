<template>

    <div>
        <form @submit.prevent="onSubmit($event)">
            <div class="form-group">
                <label for="account_name">Name</label>
                <input id="account_name" v-model="account.name" />
            </div>
            <div class="form-group">
                <label for="account_email">Email</label>
                <input id="account_email" type="email" v-model="account.email" />
            </div>
            <div class="form-group">
                <button type="submit" >Update</button>
            </div>
        </form>
    </div>

</template>

<script>
    import Form from 'vform'
    import axios from 'axios';
    export default {
        data() {
            return {
                account: new Form({
                    id: "",
                    name: "",
                    email: ""
                })
            };
        },
        methods: {

            onSubmit(event) {},

        },
        created() {
var token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImFkMDkxZWYyZGFiMDAxY2U5ZjMwMGEzNzhkYTc5NmExZWRkNDkxMDYwMTBiZDhlYjZlMTBmY2EzODljYjRlMDVlZmNkMzhjZWJjMTZhYWIyIn0.eyJhdWQiOiIyIiwianRpIjoiYWQwOTFlZjJkYWIwMDFjZTlmMzAwYTM3OGRhNzk2YTFlZGQ0OTEwNjAxMGJkOGViNmUxMGZjYTM4OWNiNGUwNWVmY2QzOGNlYmMxNmFhYjIiLCJpYXQiOjE1NjQyMzUyMDIsIm5iZiI6MTU2NDIzNTIwMiwiZXhwIjoxNTk1ODU3NjAyLCJzdWIiOiI4MSIsInNjb3BlcyI6W119.mDk8UJ_xsJgF1yDU5hw4ZhZnjVbq_GSgoIBPUB6taBd0Fa75HsP4qNPCBXv-BCrvvlGk_AEb_NU_Feeq8S2HiQA4hTKVr_JPwKkhA56cRlUWtNvBxg5TngCF6Cy25fjc8Uo-ukoPKKuZhVEFrRj8-OHPY4J9e8dUgLR5-Ypq1w7NTWXUr3YSSwJUdnbhw3CbxekWXbsSklSGmo7sN_ZYqjl6WKfUv7sHHl6xivewjJPst8D94sUNOawJRjR9OMxp5S_cvWXqU5liVFnwBfmhtvlb7aiJoS7ElGOlPDqfo6vN9W3e5XoYN90EuIDTfXOstg0uPCJz875ux-5KgGj3RyZq-jWvelC2u4E8v3xV0ZRtmEL3bY6sfGxPxD7qXzKQ5hS8Ab_rVCR0bBtPxAoC6FeAhLMBPgcTOfWrKRR_xXqxo-29N-C7ogWf4jfERavGKIip3orJXomX3vARTd8AydIgSn1k-JpU5HZUGRgjzDya2TFUz8sTZcJPGiCoqK4D74E114XFGxawDvQuXMC47iS60FxeJpCtbK_Bdddll4Xo6oaColKXXuPZyy8wafH9Tb0LCRTwspkerAqPU-SFRssG8Uz8CdZH1g2vvYOHGfoGEYKEFj65dtI-g9FLmmBjAt6eCXDHi71ZoLoQPgZ4k8myNf1yAIegbcw9fjC4MKE"
            axios.get('api/profile', {
                headers: {
                    Authorization: 'Bearer ' + token //the token is a variable which holds the token
                }
            })
                .then(({ data }) => (this.account.fill(data)));

        }

    };
</script>
