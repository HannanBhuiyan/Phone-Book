@extends('layouts.backend-master')

@section('content')
 <!-- Page-Title -->
 <div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Sales</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    @if (Auth::user()->role == 1)
    <div class="col-lg-3">
        <div class="card card-eco">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="title-text mt-0">Total User</h4>
                        <h3 class="font-weight-semibold mb-1">{{ $total_users }}</h3>
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
    @else
    <div class="col-lg-3">
        <div class="card card-eco">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="title-text mt-0">Total Contacts</h4>
                        <h3 class="font-weight-semibold mb-1">{{ $total_contacts }}</h3>
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
    @endif

</div><!--end row-->
@endsection
