<template>
    <!-- Greetings Card starts -->
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-congratulations">
            <div class="card-body text-center">
                <img src="../../../../public/app-assets/images/elements/decore-left.png" class="congratulations-img-left"
                    alt="card-img-left" />
                <img src="../../../../public/app-assets/images/elements/decore-right.png" class="congratulations-img-right"
                    alt="card-img-right" />
                <div class="avatar avatar-xl bg-primary shadow">
                    <div class="avatar-content">
                        <i data-feather="award" class="font-large-1"></i>
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="mb-1 text-white">Welcome </h1>
                    <p class="card-text m-auto w-75">
                        {{ authUser.name }},
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Greetings Card ends -->




    <div class="row match-height">

        <!-- Subscribers Chart Card starts -->
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="users" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">{{ stuCount }}</h2>
                    <p class="card-text">Students Enrolled</p>
                </div>
                <div id="gained-chart"></div>
            </div>
        </div>
        <!-- Subscribers Chart Card ends -->

        <!-- Orders Chart Card starts -->
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-warning p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="package" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">{{ courseCount }}</h2>
                    <p class="card-text">Courses Offered</p>
                </div>
                <div id="order-chart"></div>
            </div>
        </div>
        <!-- Orders Chart Card ends -->






    </div>
</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            stuCount: 0,
            courseCount: 0,
            authUser: {},
        }
    },

    methods: {
        getStudentCount() {
            axios.get('/getStudentCount').then(res => {
                this.stuCount = res.data;
            }).catch(error => {
                console.log(error);
            })
        },


        getCourseCount() {
            axios.get('/getCourseCount').then(res => {
                this.courseCount = res.data;
            }).catch(error => {
                console.log(error);
            })
        },

        getAuthUser() {
            axios.get('/getUser').then(res => {
                this.authUser = res.data;
                // console.log(this.authUser);
            }).catch(error => {
                console.log(error);
            })
        }

    },


    mounted() {
        console.log('Component mounted.');
        this.getStudentCount();
        this.getCourseCount();
        this.getAuthUser();
    }
}
</script>
