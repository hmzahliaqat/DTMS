<template>
    <hr style="border-bottom:1px solid black ;">
    <p style="padding-left: 4px;">Courses that you're teaching</p>
    <div @click="getdetails()" class="row" style="padding-left: 4px;">

        <div v-for="item in courses" class="col-xl-3 col-lg-4 col-md-5 cursor-pointer">
            <div class="card plan-card border-primary">
                <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
                    <h5 class="mb-0">{{ item.courseName }}</h5>
                    <span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top"
                        title="Expiry Date">July 22, <span class="nextYear"></span>
                    </span>
                </div>
                <div class="card-body">
                    <div class="badge badge-light-primary">Basic</div>
                    <ul class="list-unstyled my-1">
                        <li>
                            <span class="align-middle">5 Students Enrolled</span>
                        </li>

                    </ul>
                    <button class="btn btn-primary text-center btn-block">Details</button>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
import axios from 'axios';



export default {

    data() {
        return {
            'Cdetails': false,
            courses: [],
        }
    },


    methods: {
        getFCourses() {
            axios.get('/getFcourses').then(res => {
                this.courses = res.data;
                console.log(this.courses);
            }).catch(error => {
                console.log(error)
            })
        },

        getdetails() {
            this.Cdetails = true;
        },

        hideCdetails() {
            this.Cdetails = false;
        }


    },


    mounted() {
        console.log('Component mounted.');
        this.getFCourses();
    }
}
</script>
