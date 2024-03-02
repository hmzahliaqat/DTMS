<template>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center mb-2">
            <div class="col-lg-4 col-md-6 col-sm-8 col-10">
                <div class="input-group">
                    <input v-model="searchQuery" type="text" class="form-control" placeholder="Search..."
                        aria-label="Search" aria-describedby="search-button">
                    <!-- <button class="btn btn-primary" type="button" id="search-button">Search</button> -->
                </div>
            </div>
        </div>
    </div>




    <!--Table-->
    <table class="table table-hover table-fixed">

        <!--Table head-->
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Role</th>
                <!-- <th></th> -->
                <th>Action</th>


            </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
            <tr v-for="items in members">
                <th scope="row">{{ items.id }}</th>
                <td>{{ items.name }}</td>
                <td>{{ items.email }}</td>
                <td v-if="items.departments_id == 3">CS</td>
                <td v-if="items.departments_id == 1">EE</td>
                <td v-if="items.departments_id == 2">Maths</td>
                <td v-for="role in items.roles">{{ role.name }}</td>

                <!-- <td>Edit</td> -->
                <td @click="deleteUser(items.id)">Delete</td>


            </tr>

        </tbody>
        <!--Table body-->

    </table>
    <!--Table-->
</template>

<script>
import axios from 'axios';
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();
export default {


    data() {
        return {
            members: [],
            searchQuery: null,
        }
    },


    watch: {
        searchQuery(before, after) {
            this.getFilteredMembers(); // Invoke the getFilteredMembers method when searchQuery changes
        }
    },


    methods: {
        getMembers() {
            axios.get('/getMembers').then(res => {
                this.members = res.data;
                console.log(this.members);
            }).catch(error => {
                console.log(error);
            })
        },

        deleteUser(id) {
            axios.post('/delete/' + id).then(res => {
                let instance = $toast.success('Deleted Successfully!', {
                    position: 'top-right',
                });
                this.getMembers();
            }).catch(error => {
                console.log(error);
            })
        },

        getFilteredMembers() {
            axios.post('/getFilteredMembers', {
                'searchQuery': this.searchQuery,
            }).then(res => {
                this.members = res.data;
            }).catch(error => {
                console.log(error);
            })
        }

    },


    mounted() {
        console.log('Component mounted.');
        this.getMembers();
    }
}
</script>
