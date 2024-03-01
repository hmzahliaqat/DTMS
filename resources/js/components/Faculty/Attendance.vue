<template>
    <div class="container ">
        <h2 class="my-4">Mark Attendance</h2>
        <div class="form-group">
            <label for="attendanceDate">Date:</label>
            <input v-model="attendanceData.date" type="date" class="form-control" id="attendanceDate">
        </div>
        <div class="form-group">
            <label for="courseSelect">Select Course:</label>
            <select v-model="attendanceData.courseId" v-on:change="getStudents(attendanceData.courseId)"
                class="form-control" id="courseSelect">
                <option v-for="items in courses" :value="items.id">{{ items.courseName }}</option>

                <!-- Add more options for additional courses -->
            </select>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Attendance</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(student, index) in students" :key="student.id">
                    <td>{{ student.name }}</td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input v-model="attendanceData.students[index].attendance" :value="1" class="form-check-input"
                                :id="'attendancePresent' + student.id" :name="'attendanceRadioPresent' + student.id"
                                type="radio">
                            <label class="form-check-label" :for="'attendancePresent' + student.id">Present</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input v-model="attendanceData.students[index].attendance" :value="0" class="form-check-input"
                                :id="'attendanceAbsent' + student.id" :name="'attendanceRadioAbsent' + student.id"
                                type="radio">
                            <label class="form-check-label" :for="'attendanceAbsent' + student.id">Absent</label>
                        </div>
                    </td>
                </tr>

                <!-- Add more rows for additional students -->
            </tbody>
        </table>
        <button type="submit" @click="markAttendance()" class="btn btn-primary mb-4 float-right">Submit</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {




    data() {
        return {
            courses: [],
            students: [],

            attendanceData: {
                date: '',
                courseId: null,
                students: [{
                    'attendance': '',
                }], // Will hold attendance data for each student
            },
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

        getStudents(id) {
            axios.post('/getStu/' + id).then(res => {
                this.students = res.data;

                this.attendanceData.students = this.students.map(student => ({
                    id: student.id,
                    attendance: null, // Initialize attendance as null
                }));
            }).catch(error => {
                console.log(error);
            })
        },



        markAttendance() {
            axios.post('/markAttendance', this.attendanceData).then(res => {
                let instance = $toast.success('Attendance Submitted!', {
                    position: 'top-right',
                });
            }).catch(error => {

                console.log(error);

            })
        }

    },



    mounted() {
        console.log('Component mounted.');
        this.getFCourses();
    }
}
</script>
