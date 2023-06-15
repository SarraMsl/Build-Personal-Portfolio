@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="">Change Password</h4>
                        <br>
                        
                        <form action="{{ route('change.password') }}" method="post" enctype="multipart/form-data">
                            
                            <br>
                            
                            @csrf
                            <div class="row mb-3">
                                <label for="example-password-input" class="col-sm-2 col-form-label"> Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="oldpassword" type="password"  id="example-password-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-password-input" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="password" type="password"  id="example-password-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-password-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="cpassword" type="password"  id="example-password-input">
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


                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Update Password</button>

                        </div></form>
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
     @if(Session::has('message'))
     var type = "{{ Session::get('alert-type','info') }}"
     switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
    
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
    
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
    
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break; 
     }
     @endif 
    </script>
@endsection