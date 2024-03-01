<template>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Add Faculty</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>

                                    <li class="breadcrumb-item active">Add Faculty
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <!-- Basic multiple Column Form section start -->
                        <section id="multiple-column-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Enter Faculty Details</h4>

                                            <p v-if="authRole == 'hod_cs'">Department Of Computer Science</p>

                                            <p v-else-if="authRole == 'hod_eed'">Department Of Electrical Engineering</p>
                                            <p v-else-if="authRole == 'hod_mth'">Department Of Maths</p>

                                        </div>
                                        <div class="card-body">
                                            <div class="form">

                                                <div v-for="(items, index) in Facultydata" :key="index" class="row">

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Name</label>
                                                            <input type="text" v-model="Facultydata[index].name"
                                                                id="first-name-column" class="form-control"
                                                                placeholder="First Name" name="name" />
                                                            <p style="color: red;" v-if="error.name">{{ error.name }}</p>

                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 col-12 ">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Email</label>
                                                            <input type="email" v-model="Facultydata[index].email"
                                                                id="email-id-column" class="form-control" name="email"
                                                                placeholder="Email" />
                                                            <p style="color: red;" v-if="error.email">{{ error.email }}</p>

                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Phone</label>
                                                            <input type="text" v-model="Facultydata[index].phone" id="ph"
                                                                class="form-control" placeholder="phone" name="phone" />
                                                            <p style="color: red;"
                                                                v-if="error[index] && error[index].phone">{{
                                                                    error[index].phone }}</p>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Age</label>
                                                            <input type="text" v-model="Facultydata[index].age" id="age"
                                                                class="form-control" placeholder="phone" name="phone" />
                                                            <p style="color: red;" v-if="error[index] && error[index].age">
                                                                {{ error[index].age }}</p>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mb-1">
                                                        <label>State</label>
                                                        <select v-model="Facultydata[index].state"
                                                            class="select2 form-control">
                                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                                <option value="AK">Alaska</option>
                                                                <option value="HI">Hawaii</option>
                                                            </optgroup>
                                                            <optgroup label="Pacific Time Zone">
                                                                <option value="CA">California</option>
                                                                <option value="NV">Nevada</option>
                                                                <option value="OR">Oregon</option>
                                                                <option value="WA">Washington</option>
                                                            </optgroup>
                                                            <optgroup label="Mountain Time Zone">
                                                                <option value="AZ">Arizona</option>
                                                                <option value="CO">Colorado</option>
                                                                <option value="ID">Idaho</option>
                                                                <option value="MT">Montana</option>
                                                                <option value="NE">Nebraska</option>
                                                                <option value="NM">New Mexico</option>
                                                                <option value="ND">North Dakota</option>
                                                                <option value="UT">Utah</option>
                                                                <option value="WY">Wyoming</option>
                                                            </optgroup>
                                                            <optgroup label="Central Time Zone">
                                                                <option value="AL">Alabama</option>
                                                                <option value="AR">Arkansas</option>
                                                                <option value="IL">Illinois</option>
                                                                <option value="IA">Iowa</option>
                                                                <option value="KS">Kansas</option>
                                                                <option value="KY">Kentucky</option>
                                                                <option value="LA">Louisiana</option>
                                                                <option value="MN">Minnesota</option>
                                                                <option value="MS">Mississippi</option>
                                                                <option value="MO">Missouri</option>
                                                                <option value="OK">Oklahoma</option>
                                                                <option value="SD">South Dakota</option>
                                                                <option value="TX">Texas</option>
                                                                <option value="TN">Tennessee</option>
                                                                <option value="WI">Wisconsin</option>
                                                            </optgroup>
                                                            <optgroup label="Eastern Time Zone">
                                                                <option value="CT">Connecticut</option>
                                                                <option value="DE">Delaware</option>
                                                                <option value="FL" selected>Florida</option>
                                                                <option value="GA">Georgia</option>
                                                                <option value="IN">Indiana</option>
                                                                <option value="ME">Maine</option>
                                                                <option value="MD">Maryland</option>
                                                                <option value="MA">Massachusetts</option>
                                                                <option value="MI">Michigan</option>
                                                                <option value="NH">New Hampshire</option>
                                                                <option value="NJ">New Jersey</option>
                                                                <option value="NY">New York</option>
                                                                <option value="NC">North Carolina</option>
                                                                <option value="OH">Ohio</option>
                                                                <option value="PA">Pennsylvania</option>
                                                                <option value="RI">Rhode Island</option>
                                                                <option value="SC">South Carolina</option>
                                                                <option value="VT">Vermont</option>
                                                                <option value="VA">Virginia</option>
                                                                <option value="WV">West Virginia</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>





                                                    <div class="col-md-6 mb-1">
                                                        <label>City</label>
                                                        <select v-model="Facultydata[index].city"
                                                            class="select2 form-control">
                                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                                <option value="AK">Alaska</option>
                                                                <option value="HI">Hawaii</option>
                                                            </optgroup>
                                                            <optgroup label="Pacific Time Zone">
                                                                <option value="CA">California</option>
                                                                <option value="NV">Nevada</option>
                                                                <option value="OR">Oregon</option>
                                                                <option value="WA">Washington</option>
                                                            </optgroup>
                                                            <optgroup label="Mountain Time Zone">
                                                                <option value="AZ">Arizona</option>
                                                                <option value="CO">Colorado</option>
                                                                <option value="ID">Idaho</option>
                                                                <option value="MT">Montana</option>
                                                                <option value="NE">Nebraska</option>
                                                                <option value="NM">New Mexico</option>
                                                                <option value="ND">North Dakota</option>
                                                                <option value="UT">Utah</option>
                                                                <option value="WY">Wyoming</option>
                                                            </optgroup>
                                                            <optgroup label="Central Time Zone">
                                                                <option value="AL">Alabama</option>
                                                                <option value="AR">Arkansas</option>
                                                                <option value="IL">Illinois</option>
                                                                <option value="IA">Iowa</option>
                                                                <option value="KS">Kansas</option>
                                                                <option value="KY">Kentucky</option>
                                                                <option value="LA">Louisiana</option>
                                                                <option value="MN">Minnesota</option>
                                                                <option value="MS">Mississippi</option>
                                                                <option value="MO">Missouri</option>
                                                                <option value="OK">Oklahoma</option>
                                                                <option value="SD">South Dakota</option>
                                                                <option value="TX">Texas</option>
                                                                <option value="TN">Tennessee</option>
                                                                <option value="WI">Wisconsin</option>
                                                            </optgroup>
                                                            <optgroup label="Eastern Time Zone">
                                                                <option value="CT">Connecticut</option>
                                                                <option value="DE">Delaware</option>
                                                                <option value="FL" selected>Florida</option>
                                                                <option value="GA">Georgia</option>
                                                                <option value="IN">Indiana</option>
                                                                <option value="ME">Maine</option>
                                                                <option value="MD">Maryland</option>
                                                                <option value="MA">Massachusetts</option>
                                                                <option value="MI">Michigan</option>
                                                                <option value="NH">New Hampshire</option>
                                                                <option value="NJ">New Jersey</option>
                                                                <option value="NY">New York</option>
                                                                <option value="NC">North Carolina</option>
                                                                <option value="OH">Ohio</option>
                                                                <option value="PA">Pennsylvania</option>
                                                                <option value="RI">Rhode Island</option>
                                                                <option value="SC">South Carolina</option>
                                                                <option value="VT">Vermont</option>
                                                                <option value="VA">Virginia</option>
                                                                <option value="WV">West Virginia</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>


                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Cnic</label>
                                                            <input type="text" @input="formatInput"
                                                                v-model="Facultydata[index].cnic" id="cnic"
                                                                class="form-control" placeholder=" 99999-9999999-9"
                                                                name="phone" />
                                                            <p style="color: red;" v-if="error[index] && error[index].cnic">
                                                                {{ error[index].cnic }}</p>

                                                        </div>
                                                    </div>


                                                    <button v-show="Facultydata.length > 1" @click="remove(index)"
                                                        class="btn btn-danger  mr-1">-</button>








                                                </div>

                                            </div>
                                            <div class="col-12 mt-3">
                                                <button @click="add()" class="btn btn-primary  mr-1">+</button>


                                                <button @click="addFaculty()" type="reset"
                                                    class="btn btn-primary float-right mr-1">Add Faculty</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Basic Floating Label Form section end -->
                    </div>
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
            authRole: null,
            error: {},
            'Facultydata': [{
                'name': '',
                'email': '',
                'phone': '',
                'cnic': '',
                'city': '',
                'state': '',
                'age': '',
            }],
        }
    },

    methods: {
        getAuthRole() {
            axios.post('/getAuthRole').then(res => {
                this.authRole = res.data;
            }).catch(error => {
                console.log(error);
            })
        },


        addFaculty() {

            axios.post('/addFaculty', { dynamic_faculty: this.Facultydata }).then(res => {

            }).catch(error => {
                this.error = error?.response?.data?.errors;

                console.log(error);
            })

        },


        add() {
            this.Facultydata.push({
                name: '',
                email: '',
            });
        },

        remove(index) {
            this.Facultydata.splice(index, 1);
        },


    },


    mounted() {
        console.log('Component mounted.')
    }
}
</script>
