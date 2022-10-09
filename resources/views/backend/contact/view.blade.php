@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contact</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
            <h4 class="page-title">Single View</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card profile-card">
            <div class="card-body p-0">
                <div class="media p-3 pb-0 align-items-center">
                <img width="300" height="300" src="{{ asset($single_contact->image) }}" alt="user" class="rounded-circle">
                    <div class="media-body ml-3 align-self-center">
                        <h5 class="pro-title">Name: {{ $single_contact->contact_name }}</h5>
                        <p class="mb-2 text-muted"><span style="font-weight: 700; color:black">Email</span> : {{ $single_contact->contact_email }}</p>
                        <p class="mb-2 text-muted"><span style="font-weight: 700; color:black">Phone</span>: {{ $single_contact->phone_number }}</p>
                        <p class="mb-2 text-muted"><span style="font-weight: 700; color:black">Is-Favorite</span>:@if ($single_contact->is_favorite == 1) Favorite @else Disfavour @endif</p>
                        <p class="mb-2 text-muted"><span style="font-weight: 700; color:black">Is-Status</span>: @if ($single_contact->is_status == 1) Active @else Inactive @endif </p>
                    </div>
                </div>

            </div><!--end card-body-->
        </div><!--end card-->
    </div>
</div>
@endsection
