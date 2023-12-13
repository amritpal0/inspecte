@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Topbar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Topbar</li>
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Topbar</h3>
              </div>
              @if (session()->has('msg'))
                  <div class="alert alert-success m-3">
                    {{session()->get('msg')}}
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                  </div>
              @endif
              <!-- /.card-header -->
              <!-- form start -->
              <form method = "post" enctype="multipart/form-data" action="{{route('addtopbar')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" placeholder="Enter your message."
                        name="message" id="description"
                        rows="3">{{isset($product->message)? $product->message: old('message') }}</textarea>
                    <span class="text-danger">
                        @error('description')
                        {{$message}}
                        @enderror
                    </span>
                    <input type="hidden" class="form-control" value="{{isset($product->id)? $product->id: old('id') }}" placeholder="Enter message" name="id">
                    <span class="text-danger">
                        @error('message')
                        {{$message}}                          
                        @enderror
                      </span>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    </section>
</div>
    
@endsection

@push('custom-script')

<script>
     var myEditor;
ClassicEditor
    .create(document.querySelector('#description'), {
        ckfinder: {
            uploadUrl: "{{route('ckeditor.upload').'?_token='.csrf_token()}}"
        }
    })
    .then(editor => {
        console.log('Editor was initialized', editor);
        myEditor = editor;
    })
    .catch(error => {
        console.error(error);
    });
</script>

@endpush