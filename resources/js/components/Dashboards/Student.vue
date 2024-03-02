<template>

  <div class="row match-height">

 <div class="col-lg-4 col-md-6 col-12">
      <div class="card card-developer-meetup">
        <div class="meetup-img-wrapper rounded-top text-center">
          <img src="../../../../public/app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
        </div>
        <div class="card-body">
          <div class="meetup-header d-flex align-items-center">
            <div class="meetup-day">
              <h6 class="mb-0">THU</h6>
              <h3 class="mb-0">24</h3>
            </div>
            <div class="my-auto">
              <h4 class="card-title mb-25">{{ user.name }}</h4>
              <p v-if="user.departments_id==0" class="card-text mb-0">Department Of Computer Science</p>
              <p v-if="user.departments_id==1" class="card-text mb-0">Departmant Of Electrical Engineering</p>
              <p v-if="user.departments_id==2" class="card-text mb-0">Departmant Of Maths</p>

            </div>
          </div>
          <div class="media">
            <div class="avatar bg-light-primary rounded mr-1">
              <div class="avatar-content">
                <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
              </div>
            </div>
            <div class="media-body">
              <h6 class="mb-0">Sat, May 25, 2020</h6>
              <small>10:AM to 6:PM</small>
            </div>
          </div>
          <div class="media mt-2">
            <div class="avatar bg-light-primary rounded mr-1">
              <div class="avatar-content">
                <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
              </div>
            </div>
            <div class="media-body">
              <h6 class="mb-0">Central Park</h6>
              <small>Manhattan, New york City</small>
            </div>
          </div>
          <div class="avatar-group">
            <div
              data-toggle="tooltip"
              data-popup="tooltip-custom"
              data-placement="bottom"
              data-original-title="Billy Hopkins"
              class="avatar pull-up"
            >
              <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar" width="33" height="33" />
            </div>
            <div
              data-toggle="tooltip"
              data-popup="tooltip-custom"
              data-placement="bottom"
              data-original-title="Amy Carson"
              class="avatar pull-up"
            >
              <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" width="33" height="33" />
            </div>
            <div
              data-toggle="tooltip"
              data-popup="tooltip-custom"
              data-placement="bottom"
              data-original-title="Brandon Miles"
              class="avatar pull-up"
            >
              <img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" width="33" height="33" />
            </div>
            <div
              data-toggle="tooltip"
              data-popup="tooltip-custom"
              data-placement="bottom"
              data-original-title="Daisy Weber"
              class="avatar pull-up"
            >
              <img
                src="../../../app-assets/images/portrait/small/avatar-s-20.jpg"
                alt="Avatar"
                width="33"
                height="33"
              />
            </div>
            <div
              data-toggle="tooltip"
              data-popup="tooltip-custom"
              data-placement="bottom"
              data-original-title="Jenny Looper"
              class="avatar pull-up"
            >
              <img
                src="../../../app-assets/images/portrait/small/avatar-s-20.jpg"
                alt="Avatar"
                width="33"
                height="33"
              />
            </div>
            <h6 class="align-self-center cursor-pointer ml-50 mb-0">+42</h6>
          </div>
        </div>
      </div>
    </div>
    <!--/ Developer Meetup Card -->




     <!-- Goal Overview Card -->
     <div class="col-lg-4 col-md-6 col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Attandance</h4>
          <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
        </div>
        <div class="card-body p-0">
          <div id="goal-overview-radial-bar-chart" class="my-2"></div>
          <div class="row border-top text-center mx-0">
            <div class="col-6 border-right py-1">
              <p class="card-text text-muted mb-0">Completed</p>
              <h3 class="font-weight-bolder mb-0">786,617</h3>
            </div>
            <div class="col-6 py-1">
              <p class="card-text text-muted mb-0">In Progress</p>
              <h3 class="font-weight-bolder mb-0">13,561</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Goal Overview Card -->

    <!-- Transaction Card -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card card-transaction">
        <div class="card-header">
          <h4 class="card-title">Registered Courses</h4>
          <div class="dropdown chart-dropdown">
            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="transaction-item">
            <div class="media">
              <div class="avatar bg-light-primary rounded">
                <div class="avatar-content">
                  <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="media-body">
                <h6 class="transaction-title">Wallet</h6>
                <small>Starbucks</small>
              </div>

            </div>
            <div class="avatar-group">
            <div
              data-toggle="tooltip"
              data-popup="tooltip-custom"
              data-placement="bottom"
              data-original-title="Billy Hopkins"
              class="avatar pull-up"
            >
              <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar" width="33" height="33" />
            </div>
            <div
              data-toggle="tooltip"
              data-popup="tooltip-custom"
              data-placement="bottom"
              data-original-title="Amy Carson"
              class="avatar pull-up"
            >
              <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" width="33" height="33" />
            </div>
            <div
              data-toggle="tooltip"
              data-popup="tooltip-custom"
              data-placement="bottom"
              data-original-title="Brandon Miles"
              class="avatar pull-up"
            >
              <img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" width="33" height="33" />
            </div>
            <div
              data-toggle="tooltip"
              data-popup="tooltip-custom"
              data-placement="bottom"
              data-original-title="Daisy Weber"
              class="avatar pull-up"
            >
              <img
                src="../../../app-assets/images/portrait/small/avatar-s-20.jpg"
                alt="Avatar"
                width="33"
                height="33"
              />
            </div>
            <div
              data-toggle="tooltip"
              data-popup="tooltip-custom"
              data-placement="bottom"
              data-original-title="Jenny Looper"
              class="avatar pull-up"
            >
              <img
                src="../../../app-assets/images/portrait/small/avatar-s-20.jpg"
                alt="Avatar"
                width="33"
                height="33"
              />
            </div>
            <h6 class="align-self-center cursor-pointer ml-50 mb-0  font-weight-bolder text-success" >+42</h6>
          </div>
          </div>












          <div class="transaction-item">
            <div class="media">
              <div class="avatar bg-light-success rounded">
                <div class="avatar-content">
                  <i data-feather="check" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="media-body">
                <h6 class="transaction-title">Bank Transfer</h6>
                <small>Add Money</small>
              </div>
            </div>
            <div class="font-weight-bolder text-success">+ $480</div>
          </div>
          <div class="transaction-item">
            <div class="media">
              <div class="avatar bg-light-danger rounded">
                <div class="avatar-content">
                  <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="media-body">
                <h6 class="transaction-title">Paypal</h6>
                <small>Add Money</small>
              </div>
            </div>
            <div class="font-weight-bolder text-success">+ $590</div>
          </div>
          <div class="transaction-item">
            <div class="media">
              <div class="avatar bg-light-warning rounded">
                <div class="avatar-content">
                  <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="media-body">
                <h6 class="transaction-title">Mastercard</h6>
                <small>Ordered Food</small>
              </div>
            </div>
            <div class="font-weight-bolder text-danger">- $23</div>
          </div>
          <div class="transaction-item">
            <div class="media">
              <div class="avatar bg-light-info rounded">
                <div class="avatar-content">
                  <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="media-body">
                <h6 class="transaction-title">Transfer</h6>
                <small>Refund</small>
              </div>
            </div>
            <div class="font-weight-bolder text-success">+ $98</div>
          </div>
        </div>
      </div>
    </div>
</div>

</template>

<script>
import axios from 'axios';

    export default {

        data(){

            return{
                user:{},
            }

        },

        methods:{
            getUser(){
       axios.get('getUser').then(res=>{
            this.user=res.data;
       }).catch(error=>{
        console.log(error);
       })
            },
        },

        mounted() {
            console.log('Component mounted.');
            this.getUser();
        }
    }
</script>
