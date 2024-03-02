<template>
    <!-- <button @click="toggle()" type="button" style="float: right; margin-right: 30px;" class="btn btn-primary mt-2">Available Courses</button>
<button  type="button" style="float: right; margin-right: 30px;" class="btn btn-info mt-2">Attendance</button> -->




    <!-- <h5 class="mt-3 mb-2 ml-3">Registered Courses</h5> -->


    <!--
    <div class="row" style="margin-left: 2px; cursor: pointer;">
    <div v-for="item in registered" class="col-md-6 mb-5 col-xl-4 w-full">
        <div class="card bg-danger text-white">
            <div class="card-body" style="height: 200px;">
                <h4 class="card-title text-white">{{ item.courseName }}</h4>
                <p class="card-text truncate">{{ item.discription }}</p>

                <button @click="unRegister(item.id)" class="btn btn-dark unregister-button float-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 1 1 .708.708L8.707 8l2.647 2.646a.5.5 0 1 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                    Unregister
                </button>

            </div>
        </div>
    </div>
</div> -->



    <div v-show="toggleCourse" class="sidebar">

        <div class="register-header mb-2" style="display: flex; justify-content: space-between; align-items: center;">
            <h4 class="font-mono" style="display: inline;">Register New Courses</h4>
            <a class="close-btn" style="display: inline; cursor: pointer; color: #333; font-size: 20px;"
                @click="toggle()">X</a>
        </div>

        <div v-for="item in coursesR" class="course-item mb-3">
            <div class="d-flex align-items-center">
                <h1 class="course-name mb-0">{{ item.courseName }}</h1>
                <button @click="register(item.id)" class="btn btn-danger ml-auto">Register</button>
            </div>
        </div>
    </div>




    <!-- <div v-show="toggleCourse" class="container-fluid bg-white">
    <div class="row">

        <div class="col-md-3">
            <div class="sidebar">
                <h3>Register Course <button class="bg-primary text-white rounded-xl" v-on:click="toggle()"><i data-feather='x'></i></button></h3>
                <p>Register a new course. The course will be added to your course list.</p>
                <div v-for="item in coursesR" class="mb-3">
                    <div class="d-flex align-items-center">
                        <h1 class="mb-0 font-mono">{{ item.courseName }}</h1>
                        <button @click="register(item.id)" class="btn btn-danger ml-auto">Register</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> -->


    <div class="col-md-12  max-h-screen">
        <div class="card text-center">
            <div class="card-header py-2">
                <ul class="nav nav-pills card-header-pills ml-0" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                            aria-controls="pills-home" aria-selected="true">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Attendance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/user/profile" tabindex="-1" aria-disabled="true">Profile</a>
                    </li>
                </ul>
            </div>
            <button @click="toggle()" type="button" style="float: right; margin-right: 30px;"
                class="btn btn-primary mt-2">Register New Courses</button>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                        <div class="col-sm-12">


                            <ul class="list-group" id="handle-list-1">

                                <li v-for="items in registered" class="list-group-item  cursor-pointer">
                                    <div class="col-md-12" style="display: inline-flex;">
                                        <h3>{{ items.courseName }}</h3>
                                        <a @click.prevent="unRegister(items.id)" href=""
                                            style="margin-left: auto; cursor: pointer;">Unregister</a>

                                    </div>

                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">



                        <div class="container-fluid bg-light py-5">
                            <div class="container">
                                <h1 class="text-center mb-4">Check Attendance</h1>

                                <!-- Course Select -->
                                <div class="form-group">
                                    <label for="courseSelect">Select Course:</label>
                                    <select v-model="registered.id" v-on:change="onchange(registered.id)"
                                        class="form-control" id="courseSelect">
                                        <option value="">-- Select Course --</option>
                                        <option v-for="items in registered" :value="items.id">{{ items.courseName }}
                                        </option>

                                        <!-- Add more options as needed -->
                                    </select>
                                </div>

                                <!-- Attendance Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Attendance Status</th>
                                            </tr>
                                        </thead>
                                        <tbody v-if="attendance.length" id="attendanceTableBody">
                                            <!-- Attendance records will be dynamically populated here -->
                                            <!-- Sample row -->
                                            <tr v-for="items in  attendance">
                                                <td>{{ items.date }}</td>
                                                <td v-if="items.attendance == 1">Present</td>
                                                <td v-else>Absent</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- No Records Found Message -->
                                <div v-if="!attendance.length" class="text-center" id="noRecordsMessage">
                                    <p>No attendance records found for this course.</p>
                                </div>
                            </div>
                        </div>






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
            toggleCourse: false,
            coursesR: [],
            registered: [],
            attendance: [],
            courseId: null,
        }
    },

    methods: {
        getcourseR() {
            axios.get('gcfr').then(res => {
                this.coursesR = res.data;
                console.log(this.coursesR);
            }).catch(error => {
                console.log(error);
            })
        },


        toggle() {
            this.toggleCourse = !this.toggleCourse;
        },

        register(id) {

            if (this.registered.length < 6) {

                axios.post('/registerCourse/' + id).then(res => {
                    let instance = $toast.info('Course Registered!', {
                        position: 'top-right',
                    });
                    this.getcourseR();
                    this.registeredCourses();
                }).catch(error => {
                    console.log(error);
                })

            } else {
                let instance = $toast.error('You Canot Register More Than 6 Courses !', {
                    position: 'top-right',
                });

            }
        },

        registeredCourses() {
            axios.get('/registeredCourses').then(res => {
                this.registered = res.data;

                console.log(this.registered);
            }).catch(error => {
                console.log(error);
            })
        },

        unRegister(id) {

            axios.post('unregister/course/' + id).then(res => {
                let instance = $toast.info('Course Unregistered!', {
                    position: 'top-right',
                });
                this.getcourseR();
                this.registeredCourses();
            }).catch(error => {
                console.log(error);
            })

        },


        checkAttendance() {
            axios.post('/checkAttendance',
                { courseId: this.courseId }
            ).then(res => {
                this.attendance = res.data;
                console.log(this.attendance);
            }).catch(error => {
                console.log(error);
            })
        },


        onchange(id) {
            this.courseId = id;
            console.log(this.courseId);
            this.checkAttendance();
        }


    },

    mounted() {
        console.log('Component Student mounted.');
        this.getcourseR();
        this.registeredCourses();

    }
}
</script>
