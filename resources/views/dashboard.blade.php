
@if(auth()->user()->hasRole('admin'))
<x-app-layout>

    <div class="content">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="good-morning-blk">
            <div class="row">
                <div class="col-md-6">
                    <div class="morning-user">
                        <h2>
                            @if ($time < 12) Good Morning, @elseif ($time < 17) Good Afternoon, @else Good Evening, @endif <span class="text-capitalize">
                                {{ auth()->user()->first_name }}
                                {{ auth()->user()->last_name }}
                                </span>
                        </h2>
                        <p>Have a nice day at work</p>
                    </div>
                </div>
                <div class="col-md-6 position-blk">
                    <div class="morning-img">
                        <img src="assets/img/morning-img-01.png" alt>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <div class="dash-boxs comman-flex-center">
                        <img src="assets/img/icons/calendar.svg" alt>
                    </div>
                    <div class="dash-content dash-count">
                        <h4>Request</h4>
                        <h2><span class="counter-up">0</span></h2>
                        {{-- <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>40%</span> vs
                            last month</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <div class="dash-boxs comman-flex-center">
                        <img src="assets/img/icons/profile-add.svg" alt>
                    </div>
                    <div class="dash-content dash-count">
                        <h4>Staff</h4>
                        <h2><span class="counter-up">0</span></h2>
                        {{-- <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>20%</span> vs
                            last month</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <div class="dash-boxs comman-flex-center">
                        <img src="assets/img/icons/scissor.svg" alt>
                    </div>
                    <div class="dash-content dash-count">
                        <h4>Documents</h4>
                        <h2><span class="counter-up">0</span></h2>
                        {{-- <p><span class="negative-view"><i class="feather-arrow-down-right me-1"></i>15%</span>
                            vs last month</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <div class="dash-boxs comman-flex-center">
                        <img src="assets/img/icons/empty-wallet.svg" alt>
                    </div>
                    <div class="dash-content dash-count">
                        <h4>Storage</h4>
                        <h2><span class="counter-up">0</span></h2>
                        {{-- <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>30%</span> vs
                            last month</p> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
@endif