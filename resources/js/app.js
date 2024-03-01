/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});



import ExampleComponent from './components/ExampleComponent.vue';
import AddStudent from './components/Hod/AddStudent.vue';
import AddFaculty from './components/Hod/AddFaculty.vue';
import DepartmentMem from './components/Hod/DepartmentMem.vue';
import Courses from './components/Hod/Courses.vue';
import student from './components/Dashboards/student.vue';
import Tcourses from './components/Faculty/Tcourses.vue';
import Home from  './components/Hod/Home.vue';
import Stuhome from  './components/students/Stuhome.vue';
import Attendance from './components/Faculty/Attendance.vue';
import Attendancerecord from './components/Faculty/Attendancerecord.vue';









app.component('example-component', ExampleComponent);
app.component('add-student',AddStudent);
app.component('add-faculty', AddFaculty);
app.component('department-mem', DepartmentMem);
app.component('course-component', Courses);
app.component('student-dsh', student);
app.component('tcourses', Tcourses);
app.component('home-component', Home);
app.component('stuhome-component', Stuhome);
app.component('atten-component', Attendance);
app.component('atten-records', Attendancerecord);













/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#apper');
