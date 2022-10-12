@extends('layouts.backend-master')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Cantact</li>
                </ol>
            </div>
            <h4 class="page-title">Cantacts</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>

<div class="serach_area mb-4">
    <form action="">
        <div class="row">
            <div class="col-md-3">
                <span>Favorite</span>:
                <select name="favorite" class="form-control">
                    <option>--Choose--</option>
                    <option value="1">Favorite</option>
                    <option value="2">Disfavorite</option>
                </select>
            </div>
            <div class="col-md-3">
                <span>Status</span>:
                <select name="status" class="form-control">
                    <option>--Choose--</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                </select>
            </div>
            <div class="col-md-3">
                <span>Favorite</span>:
                <input type="search" placeholder="Search by name/email" value="{{ $search }}" name="search" class="form-control">
            </div>
            <div class="col-md-3">
                <button class="search__btn btn btn-sm btn-gradient-success">Search</button>
            </div>
        </div>
    </form>
</div>

<div class="row">
   @forelse ($contacts as $contact)
   <div class="col-lg-4">
    <div class="card profile-card">
        <div class="card-body p-0">
            <div class="media p-3 pb-0 align-items-center">
                <img src="{{ asset($contact->image) }}" alt="user" class="rounded-circle thumb-xl">
                <div class="media-body ml-3 align-self-center">
                    <h5 class="pro-title">{{ $contact->contact_name }}</h5>
                    <p class="mb-2 text-muted">{{ $contact->contact_email }}</p>
                </div>
                <div class="action-btn">
                    <a href="{{ route('contact.show', $contact->id) }}"><i class="far fa-eye text-primary"></i></a>
                    <a href="{{ route('contact.edit', $contact->id) }}"><i class="fas fa-pen text-info"></i></a>
                    <a class="contactDelete" data-id="{{ $contact->id }}" ><i class="fas fa-trash-alt text-danger"></i></a>
                    <i class=" {{ $contact->is_favorite == 1 ? 'fas fa-heart' : 'far fa-heart' }}"></i>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('send-mail', $contact->id) }}"  class="btn btn-sm btn-gradient-primary mb-3">Send Mail</a>
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
<nav aria-label="Page navigation example">
     {{ $contacts->links() }}
</nav>

@endsection

@section('scripts')

<script type="text/javascript">
    $(".contactDelete").click(function(){
        let id = $(this).attr('data-id')
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
                $.ajax({
                        type:'GET',
                        url: "/delete/"+id,
                        dataType: 'json',
                        success: function(data){
                            setInterval(() => {
                                window.location.reload(true);
                            }, 1000);

                        },
                        error: function(data){
                            console.log(data);
                        }
                    })
            } else {
                swal("Your imaginary file is safe!");
            }
            });
        })
</script>







@endsection
