@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">edit Portfolio Page</h4>
                            <br>
                            <br>
                            <form action="{{ route('update.Portfolio') }}" method="post" enctype="multipart/form-data">

                                <img class="rounded avatar-xl" src="{{ url('backend/assets/images/small/img-5.jpg') }}"
                                    id="showimage" alt="Card image cap">
                                <br>
                                <br>
                                <br>
                                @csrf

                                <input type="hidden" name="id">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="portfolio_name" value="{{$Portfolio->portfolio_name}}"
                                            id="example-text-input">
                                            @error('portfolio_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="portfolio_title"
                                        value="{{$Portfolio->portfolio_title}}"
                                            id="example-email-input">
                                            @error('portfolio_title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">portfolio
                                        description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="portfolio_description"   >{{$Portfolio->portfolio_description}}</textarea>
                                        @error('portfolio_description')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- end row -->





                                <div class="row mb-3">
                                    <label for="example-password-input" class="col-sm-2 col-form-label">About
                                        Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="portfolio_image" id="image">
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


                                <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Add
                                    portfolio</button>

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
