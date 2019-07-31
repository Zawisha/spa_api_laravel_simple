<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <form >

                    <div class="form-group">
                        <input type="file" @change="updateProfile" name="photo" class="form-input">
                    </div>

                        <div class="form-group">
                            <button @click.prevent="updateInfo" type="submit" >Send</button>
                        </div>

                </form>




                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    id:"",
                    username: "",
                    password:"",
                    photo:""
                })
            };
        },


        methods:{
            updateInfo()
            {
                this.form.put('api/profile/')
                    .then(() => {})
                    .catch(() => {});
            },

            updateProfile(file_event)
            {


                let file = file_event.target.files[0];
                 console.log(file);
                let reader = new FileReader();

                let limit = 1024 * 1024 * 2;
                if(file['size'] > limit){
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'You are uploading a large file',
                    });
                    return false;
                }



                reader.onloadend =  (file) => {
                    this.form.photo = reader.result;
                };
                reader.readAsDataURL(file);
            }
        },

        mounted() {

        }
    }
</script>
