<template>
    <div class="users">
        <div v-if="error" class="error">
            <p>{{ error }}</p>
        </div>

        <ul v-if="users">
            <li v-for="{ id, name, email } in users">
                <strong>Name:</strong> {{ name }},
                <strong>Email:</strong> {{ email }}
                <router-link :to="{ name: 'users.edit', params: { id } }">Edit</router-link>
            </li>
        </ul>
        <div class="pagination">
            <button :disabled="! prevPage" @click.prevent="goToPrev">Previous</button>
            {{ paginatonCount }}
            <button :disabled="! nextPage" @click.prevent="goToNext">Next</button>
        </div>


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Add new user
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add new user</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form @submit.prevent="createUser($event)">

                    <div class="modal-body">

                        <div class="form-group">
                            <input v-model="form.name" type="text" name="name"
                                   placeholder="Name"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.email" type="email" name="email"
                                   placeholder="email"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.password" type="password" name="password"
                                   placeholder="password"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                        <div class="form-group">
                            <select name="bio" v-model="form.bio" id="bio" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('bio') }">
                                <option value="">Select user role</option>
                                <option value="1">Man</option>
                                <option value="2">Woman</option>
                            </select>
                            <has-error :form="form" field="bio"></has-error>
                        </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark"  >Add_user</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Registered</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody v-if="second_users">

            <tr v-for=" second_user in second_users">
                <td>{{ second_user.id }}</td>
                <td>{{ second_user.name | upText }}</td>
                <td>{{ second_user.email }}</td>
                <td>{{ second_user.created_at | myDate }}</td>
                <td><a href="#" @click="deleteUser(second_user.id)">DELETE</a></td>
            </tr>
            </tbody>
        </table>



    </div>

</template>
<script>
    import axios from 'axios';

    const getUsers = (page, callback) => {
        const params = { page };
        axios
            .get('/api/users', { params })
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
            callback(error, error.response.data);
        });
    };
    export default {
        data() {
            return {
                second_users: {},

                users: null,
                meta: null,
                links: {
                    first: null,
                    last: null,
                    next: null,
                    prev: null,
                },
                error: null,
                //V-form
                form: new Form(
                    {
                        name: '',
                        email:'',
                        password:'',
                        bio:'',
                        photo:''
                    }
                ),

            };
        },
        computed: {
            nextPage() {
                if (! this.meta || this.meta.current_page === this.meta.last_page) {
                    return;
                }
                return this.meta.current_page + 1;
            },
            prevPage() {
                if (! this.meta || this.meta.current_page === 1) {
                    return;
                }

                return this.meta.current_page - 1;
            },
            paginatonCount() {
                if (! this.meta) {
                    return;
                }

                const { current_page, last_page } = this.meta;
                return `${current_page} of ${last_page}`;
            },
        },
        beforeRouteEnter (to, from, next) {
            getUsers(to.query.page, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        // when route changes and this component is already rendered,
        // the logic will be slightly different.
        beforeRouteUpdate (to, from, next) {
            this.users = this.links = this.meta = null
            getUsers(to.query.page, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        methods: {

            deleteUser(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
if(result.value) {
    //send request to the server (only for V-form)
    this.form.delete('api/new_user/' + id).then(() => {

        Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
        Fire.$emit('AfterCreate');
    }).catch(() => {
        swal("Failed", "there was something wrong", "warning")
    });
}
                })
            },

            second_loadUsers(){
                axios.get("api/user").then(({ data }) => (this.second_users = data.data));

            },

            goToNext() {
                this.$router.push({
                    query: {
                        page: this.nextPage,
                    },
                });
            },
            goToPrev() {
                this.$router.push({
                    name: 'users.index',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            setData(err, { data: users, links, meta }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.users = users;
                    this.links = links;
                    this.meta = meta;
                }
            },
            createUser() {
                //progress bar
                this.$Progress.start();

                this.form.post('api/new_user')
                    //if successful
                    .then(() => {
                    Fire.$emit('AfterCreate');


                    //close modal window
                    $('#myModal').modal('hide');

                    //toaster
                    Toast.fire({
                        type: 'success',
                        title: 'User created successfully'
                    })
                    //progress bar
                    this.$Progress.finish();
                })
                //if not successful
                    .catch( () => {})

                ;
            }

        },
        created() {
            this.second_loadUsers();
            //resent function every 3 sec
            // setInterval(() =>this.second_loadUsers(),3000);

            Fire.$on('AfterCreate', () => {
                this.second_loadUsers();
            });
        }
    }
</script>