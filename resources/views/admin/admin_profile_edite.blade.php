@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile Page</h4>
                        <br>
                        <br>
                        <form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
                            
                            <img class="rounded avatar-xl" src="{{(!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('backend/assets/images/small/img-5.jpg')}}" id="showimage" alt="Card image cap">
                            <br>
                            <br>
                            <br>
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" value="{{ $adminData->name }}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="email" value="{{ $adminData->email }}" id="example-email-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="username" value="{{ $adminData->username }}" id="example-email-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <!----<div class="row mb-3">
                                <label for="example-password-input" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="password" type="password" value="{{ $adminData->password }}" id="example-password-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-password-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="cpassword" type="password" value="{{ $adminData->password }}" id="example-password-input">
                                </div>
                            </div>-->

                            <div class="row mb-3">
                                <label for="example-password-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" value="{{ $adminData->profile_image }}" name="profile_image" id="image">
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


                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Update Profile</button>

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