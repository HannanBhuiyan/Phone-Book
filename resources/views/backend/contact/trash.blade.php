@extends('layouts.backend-master')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Contact</a></li>
                    <li class="breadcrumb-item active">Trash</li>
                </ol>
            </div>
            <h4 class="page-title">All Trash Contacts</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="row">
   @forelse ($trash_contacts as $contact)
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
                    <a class="permanentDelete" data-id="{{ $contact->id }}"><i class="fas fa-trash-alt text-danger"></i></a>
                    <a href="{{ route('contact.restore', $contact->id) }}">Restore</a>
                </div>

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



@section('scripts')

<script type="text/javascript">
    $(".permanentDelete").click(function(){
        let id = $(this).attr('data-id')
        swal({
            title: "Are you sure?",
            text: "Permanent delete this contacts !",
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
                        url: "/permanent-delete/"+id,
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

