@extends('layouts.backend-master')

@section('content')
 <!-- Page-Title -->
 <div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Crovex</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sales</li>
                </ol>
            </div>
            <h4 class="page-title">Sales</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-lg-3">
        <div class="card card-eco">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="title-text mt-0">Visits</h4>
                        <h3 class="font-weight-semibold mb-1">24k</h3>
                        <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p>
                    </div><!--end col-->
                    <div class="col-4 text-center align-self-center">
                        <!-- <span class="card-eco-icon">👳🏻</span> -->
                        <i class="dripicons-user-group card-eco-icon  align-self-center"></i>
                    </div>  <!--end col-->
                </div> <!--end row-->
                <div class="bg-pattern"></div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-3">
        <div class="card card-eco">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="title-text mt-0">New Orders</h4>
                        <h3 class="font-weight-semibold mb-1">10k</h3>
                        <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Up From Last Week</p>
                    </div><!--end col-->
                    <div class="col-4 text-center align-self-center">
                        <!-- <span class="card-eco-icon">🛒</span> -->
                        <i class="dripicons-cart card-eco-icon  align-self-center"></i>
                    </div>  <!--end col-->
                </div> <!--end row-->
                <div class="bg-pattern"></div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-3">
        <div class="card card-eco">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="title-text mt-0">Return Orders</h4>
                        <h3 class="font-weight-semibold mb-1">8400</h3>
                        <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p>
                    </div><!--end col-->
                    <div class="col-4 text-center align-self-center">
                        <!-- <span class="card-eco-icon">🎲</span> -->
                        <i class="dripicons-jewel card-eco-icon  align-self-center"></i>
                    </div>  <!--end col-->
                </div> <!--end row-->
                <div class="bg-pattern"></div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-3">
        <div class="card card-eco">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="title-text mt-0">Revenue</h4>
                        <h3 class="font-weight-semibold mb-1">$1590</h3>
                        <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Up From Yesterday</p>
                    </div><!--end col-->
                    <div class="col-4 text-center align-self-center">
                        <!-- <span class="card-eco-icon">💰</span> -->
                        <i class="dripicons-wallet card-eco-icon  align-self-center"></i>
                    </div>  <!--end col-->
                </div> <!--end row-->
                <div class="bg-pattern"></div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
@endsection
