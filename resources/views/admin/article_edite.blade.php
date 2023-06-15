@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile Page</h4>
                        <br>
                        <br>
                        <form action="{{ route('admin.update', $article->id) }}" method="post" enctype="multipart/form-data">
                            
                            <img class="rounded avatar-xl" src="{{ asset('backend/assets/images/small/img-5.jpg') }}" id="showimage" alt="Card image cap">
                            <br>
                            <br>
                            <br>
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name"  value="{{ $article->name }}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">qantity</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="qantity"  value="{{ $article->qantity }}" id="example-email-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">prix</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="price"  value="{{ $article->price }}"  id="example-email-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-password-input" class="col-sm-2 col-form-label">stock</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="stock" type="number" value="{{ $article->stock }}"   id="example-password-input">
                                </div>
                            </div>

                        

                            <div class="row mb-3">
                                <label for="example-password-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" value="{{ $article->image }}" name="image" id="image">
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


                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">add article</button>

                        </div></form>
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader=new FileReader();
            reader.onload=function(e){
              $('#showimage').attr('src',e.target.result);
}
           reader.readAsDataURL(e.target.files['0']);
          });
    });
    
    </script>
@endsection