@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-sm-10 m-auto">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contact</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Contact</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-body">
                <form class="form-parsley" action="{{ route('contact.update', $contact->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Contact Name</label>
                        <input type="text" name="contact_name" class="form-control @error('contact_name') is-invalid @enderror " value="{{ $contact->contact_name }}" placeholder="Contact Name" >
                        @error('contact_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Contact Email</label>
                        <input type="text" name="contact_email" class="form-control @error('contact_email') is-invalid @enderror " value="{{  $contact->contact_email }}" placeholder="Contact Email" >
                        @error('contact_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Contact Phone</label>
                        <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"  value="{{ $contact->phone_number }}" placeholder="Phone Number" >
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Contact Image</label>
                        <input type="file" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])"  name="image" class="form-control @error('image') is-invalid @enderror " value="{{ old('image') }}">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <img width="300" height="300" id="img_id" class="mt-3" src="{{ asset($contact->image) }}" alt="">
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Status</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="1" {{ $contact->is_favorite == '1' ? "checked" : '' }} name="is_favorite" class="custom-control-input" id="customCheck1" data-parsley-multiple="groups" data-parsley-mincheck="2">
                            <label class="custom-control-label" for="customCheck1">Is-Favorite</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="1" {{ $contact->is_status == '1' ? "checked" : '' }} name="is_status" class="custom-control-input" id="customCheck2" data-parsley-multiple="groups" data-parsley-mincheck="2">
                            <label class="custom-control-label" for="customCheck2">Is-Status</label>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-gradient-primary waves-effect waves-light">
                            Update
                        </button>
                        <button type="reset" class="btn btn-gradient-danger waves-effect m-l-5">
                            <a class="text-white" href="{{ route('contact.index') }}">Cancel</a>
                        </button>
                    </div><!--end form-group-->
                </form><!--end form-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div>
</div>
@endsection
