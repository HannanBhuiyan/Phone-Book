@extends('layouts.backend-master')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
                <h4 class="page-title">User List</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class=" text-center table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Change Role</th>
                            <th>Role</th>
                            <th>Online Status</th>
                            <th>Active Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ asset($user->image) }}" alt="" height="52">
                                    <p class="d-inline-block align-middle mb-0">
                                        <span class="d-inline-block align-middle mb-0 user-name">{{ $user->name }}</span>
                                        <br>
                                        <span class="text-muted font-13">Create at : {{ $user->created_at->diffForHumans() }}</span>
                                    </p>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <select name="" onchange="location = this.value" class="form-control">
                                        <option>--Change Role--</option>
                                        <option value="{{ route('admin.role.change', $user->id ) }}">Admin</option>
                                        <option value="{{ route('user.role.change', $user->id ) }}">User</option>
                                    </select>
                                </td>
                                <td>
                                    @if ($user->role == 1)
                                    <span class="badge badge-md badge-soft-primary">
                                        Admin
                                    </span>

                                    @else
                                    <span class="badge badge-md badge-soft-warning">
                                        User
                                    </span>
                                    @endif

                                </td>
                                <td>Online <sup class="round-status offline"></sup></td>
                                <td>
                                    @if ($user->active == 1)
                                        <span class="badge badge-md badge-soft-success">active</span>
                                    @else
                                        <span class="badge badge-md badge-soft-danger">Banned</span>
                                    @endif

                                </td>
                                <td>
                                    <a href="" class="btn btn-secondary mr-2">Send Mail</a>
                                    @if ($user->active == 0)
                                        <a href="{{ route('user.active', $user->id) }}" class="btn btn-success mr-2">Active Now</a>
                                    @else
                                        <a href="{{ route('user.banned', $user->id) }}" class="btn btn-info mr-2">Banned Now</a>
                                    @endif

                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <div class="text-center">
                                <h4 class="m-3 text-danger" >User Not Found</h2>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection
