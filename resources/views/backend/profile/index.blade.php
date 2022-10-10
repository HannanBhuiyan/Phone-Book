@extends('layouts.backend-master')


@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile_tab" data-toggle="pill" href="#profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile_image_tab" data-toggle="pill" href="#profile_image">Change Image</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile_info_tab" data-toggle="pill" href="#profile_info">Profile Name & Email Change</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="change_password_tab" data-toggle="pill" href="#change_password">Change Password</a>
                        </li>
                    </ul>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="tab-content detail-list" id="pills-tabContent">
                <div class="tab-pane fade show active" id="profile">
                    <h2>profile</h2>
                </div><!--end general detail-->
                <div class="tab-pane fade show" id="profile_image">

                    <h2>sdfsdf</h2>
                </div><!--end general detail-->

                <div class="tab-pane fade" id="profile_info">
                    <h2>profile info</h2>
                </div><!--end education detail-->

                <div class="tab-pane fade" id="change_password">
                        <h2>change pass</h2>
                </div><!--end portfolio detail-->


            </div><!--end tab-content-->

        </div><!--end col-->
    </div><!--end row-->

@endsection
