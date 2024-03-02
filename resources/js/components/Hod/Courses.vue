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

    <button v-on:click="toggleCourseAdd()" style="float: right; margin-bottom: 10px; margin-right: 20px;" type="button"
        class="btn btn-dark" data-mdb-ripple-init>Add Course</button>
    <!--Table-->
    <table class="table table-hover table-fixed">

        <!--Table head-->
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Instructor</th>
                <th>Status</th>

            </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
            <tr v-for="items in courses">
                <th scope="row">{{ items.id }}</th>
                <td>{{ items.courseName }}</td>
                <td>{{ items.Instructor }}</td>
                <td>{{ items.courseStatus }}</td>

            </tr>

        </tbody>
        <!--Table body-->

    </table>
    <!--Table-->


    <div v-show="toggleAddCourse" class="container-fluid bg-white">
        <div class="row">

            <div class="col-3">
                <!-- Right sidebar -->
                <div class="sidebar">


                    <h3>Add New Course <button class="bg-primary text-white rounded-xl" v-on:click="toggleCourseAdd()"
                            style="float: right; cursor: pointer;"><i data-feather='x'></i></button></h3>

                    <p>Create a new course. The course will be added for your department</p>

                    <div class="" style="padding-top: 30px; border-top: 1px solid gray;">

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="course-name-column">Course Name</label>
                                <input v-model="data.courseName" type="text" id="course-name-column" class="form-control"
                                    placeholder="Course Name" name="courseName" />
                                <p style="color: red;" v-if="error.courseName">{{ error.courseName }}</p>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="instructor-column">Instructor</label>
                                <input v-model="data.instructor" type="text" id="instructor-column" class="form-control"
                                    placeholder="Instructor Name" name="instructor" />
                                <p style="color: red;" v-if="error.instructor">{{ error.instructor }}</p>

                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="discription-column">Discription</label>
                                <textarea v-model="data.discription" id="discription-column" class="form-control"
                                    placeholder="Course Discription" name="discription"></textarea>
                                <p style="color: red;" v-if="error.discription">{{ error.discription }}</p>

                            </div>
                        </div>

                        <button @click="createCourse()" style="float: right;" class="btn btn-primary sidebar-button">Create
                            Course</button>

                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();
export default {


    data() {
        return {

            toggleAddCourse: false,
            searchQuery: null,
            courses: [],

            error: {},

            'data': {
                'courseName': '',
                'instructor': '',
                'discription': '',
            },
        }
    },


    watch: {
        searchQuery(before, after) {
            this.getFilteredCourses(); // Invoke the getFilteredMembers method when searchQuery changes
        }
    },

    methods: {

        createCourse() {
            axios.post('/createCourse', this.data).then(res => {

                this.getCourses();
                let instance = $toast.success('Course Added!', {
                    position: 'top-right',
                });

                this.data = {
                    'courseName': '',
                    'instructor': '',
                    'discription': '',
                }

            }).catch(error => {
                console.log(error);
                this.error = error?.response?.data?.errors;

            })
        },

        getCourses() {
            axios.get('/getCourses').then(res => {
                this.courses = res.data;
                console.log(this.courses);
            }).catch(error => {
                console.log(error);
            })
        },

        toggleCourseAdd() {
            this.toggleAddCourse = !this.toggleAddCourse;
        },

        getFilteredCourses() {
            axios.post('getFilteredCourses', { 'searchQuery': this.searchQuery }).then(res => {
                this.courses = res.data;
            }).catch(error => {
                console.log(this.error);
            })
        }

    },


    mounted() {

        console.log('course  Component mounted.');
        this.getCourses();
    }
}
</script>
