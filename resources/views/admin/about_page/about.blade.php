@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">About Page</h4>
                            <br>
                            <br>
                            <form action="{{ route('update.about') }}" method="post" enctype="multipart/form-data">

                                <img class="rounded avatar-xl"
                                    src="{{ !empty($about->about_image) ? url($about->about_image) : url('backend/assets/images/small/img-5.jpg') }}"
                                    id="showimage" alt="Card image cap">
                                <br>
                                <br>
                                <br>
                                @csrf

                                <input type="hidden" name="id" value="{{ $about->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="title"
                                            value="{{ $about->title }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="short_title"
                                            value="{{ $about->short_title }}" id="example-email-input">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">short
                                        description</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="short_description"
                                            value="{{ $about->short_description }}" id="example-email-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label"
                                    >long description</label>
                                    <div class="col-sm-10">
                                        <textarea required=""   
                                            rows="5"name="long_description"  class="form-control"  >{{ $about->long_description }}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">About
                                        description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="about_description">{{ $about->about_description }}</textarea>

                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="example-password-input" class="col-sm-2 col-form-label">About
                                        Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" value="{{ $about->about_image }}"
                                            name="about_image" id="image">
                                    </div>
                                </div>

                                <!-- Display error message -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Update
                                    Slider</button>

                        </div>
                        </form>
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showimage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
   
    
       
@endsection
