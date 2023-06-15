@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Multimage Page</h4>
                            <br>
                            <br>
                            <form action="{{ route('update.MultiImage',$multiImage->id) }}" method="post" enctype="multipart/form-data">

                                <img class="rounded avatar-xl"
                                    src="{{ asset($multiImage->multi_images) }}"
                                    id="showimage" alt="Card image cap">
                                <br>
                                <br>
                                <br>
                                @csrf

                                <input type="hidden" name="id" >
                                
                                <div class="row mb-3">
                                    <label for="example-password-input" class="col-sm-2 col-form-label">update Multimage Page</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" 
                                            name="multi_images" id="image" >
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
