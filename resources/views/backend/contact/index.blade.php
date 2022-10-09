@extends('layouts.backend-master')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Crovex</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                    <li class="breadcrumb-item active">Cantacts</li>
                </ol>
            </div>
            <h4 class="page-title">Cantacts</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="row">
   @forelse ($contacts as $contact)
   <div class="col-lg-3">
    <div class="card profile-card">
        <div class="card-body p-0">
            <div class="media p-3 pb-0 align-items-center">
                <img src="{{ asset($contact->image) }}" alt="user" class="rounded-circle thumb-xl">
                <div class="media-body ml-3 align-self-center">
                    <h5 class="pro-title">{{ $contact->contact_name }}</h5>
                    <p class="mb-2 text-muted">{{ $contact->contact_email }}</p>
                </div>
                <div class="action-btn">
                    <a href="{{ route('contact.show', $contact->id) }}"><i class="far fa-eye text-primary mr-2"></i></a>
                    <a href="{{ route('contact.edit', $contact->id) }}"><i class="fas fa-pen text-info mr-2"></i></a>
                    <a href="{{ route('contact.delete', $contact->id) }}"><i class="fas fa-trash-alt text-danger"></i></a>
                </div>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-sm btn-gradient-primary mb-3">Send Mail</button>
            </div>
        </div><!--end card-body-->
    </div><!--end card-->
</div>
   @empty
    <div class="text-center">
        <h4 class="m-3 text-danger" >Data Not Found</h2>
    </div>
   @endforelse
</div>
@endsection
