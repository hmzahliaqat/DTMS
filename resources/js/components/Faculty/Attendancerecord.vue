<template>
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <h1 class="text-center mb-4">Attendance Records</h1>

            <div class="row">
                <div class="col-md-6">
                    <!-- Course Select -->
                    <div class="form-group">
                        <label for="courseSelect">Select Course:</label>
                        <select v-model="data.courseId" v-on:change="onchange(data.courseId)" class="form-control"
                            id="courseSelect">
                            <option value="">-- Select Course --</option>
                            <option v-for="items in courses" :value="items.id">{{ items.courseName }}</option>

                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Date Picker -->
                    <div class="form-group">
                        <label for="datePicker">Select Date:</label>
                        <input v-model="data.date" type="date" class="form-control" id="datePicker">
                    </div>
                </div>

                <div class="col-md-2 mt-2">
                    <!-- Get Records Button -->
                    <div class="form-group">
                        <button @click="getAttendance()" class="btn btn-primary btn-block" id="getRecordsBtn">Get
                            Records</button>
                    </div>
                </div>

            </div>

            <!-- Attendance Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody id="attendanceTableBody">
                        <tr v-if="attendanceData.length" v-for="items in attendanceData">
                            <td>{{ items.name }}</td>
                            <td v-if="items.attendance == 0">Absent</td>
                            <td v-else>Present</td>

                        </tr>
                        <div v-else class="container-fluid bg-light py-5 d-flex justify-content-center align-items-center">
                            <div class="container">
                                <!-- Other content -->

                                <div class="text-center" id="noRecordsMessage">
                                    <div class="alert alert-warning" role="alert">
                                        No records found.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            courses: [],
            'data': {
                'date': '',
                'courseId': '',
            },
            attendanceData: [],
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



        getAttendance() {
            axios.post('/getAttendance', {
                date: this.data.date,
                courseId: this.data.courseId,
            }).then(res => {
                this.attendanceData = res.data;
            }).catch(error => {
                console.log(error);
            })
        },

        onchange(id) {
            this.data.courseId = id;
        }

    },

    mounted() {
        console.log('Component mounted.');
        this.getFCourses();
    }
}
</script>
