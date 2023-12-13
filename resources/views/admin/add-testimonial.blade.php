@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testimonials</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Testimonials</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Photos</h3>
                        </div>
                        @if (session()->has('msg'))
                        <div class="alert alert-success m-3">
                            {{session()->get('msg')}}
                            <button class="close" type="button" data-dismiss="alert">&times;</button>
                        </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group dropzone-div">
                                <label>Upload Images:</label>
                                <div class="clsbox-1" runat="server">
                                    <div class="dropzone clsbox" action="{{ route('testimonial.store') }}" id="mydropzone1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-info" name="save" id="add-imgs"><i
                                        class="icon-ok"></i> Save</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">Testimonials</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            @if(isset($img))
                            @foreach($img as $i)
                            <div class="col-md-3 position-relative gallery-img-box">
                                <a href="{{route('testimonial.delete', $i->id)}}">
                                <img src="{{asset('admin/testimonials')}}/{{$i->featured_image}}" alt="" class="w-100 gallery-img">
                                <span class="img-delete-gallery  position-absolute"><i class="fas fa-times-circle"></i></span></a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        {{---<div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form method="post" action="{{route('delete_post_category')}}">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete</h4>
                                            <button class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete this post category.
                                            <input type="hidden" name="id" id="delete">
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit" name="delete">Yes</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">No</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>--}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>
</section>
</div>

@endsection
@push('custom-script')
<script>

</script>
@endpush