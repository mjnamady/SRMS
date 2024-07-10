@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">ADMIN'S PROFILE</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-body">

            <h4 class="card-title">ADMIN PROFILE - Update</h4>
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input class="form-control" name="name" type="text" value="{{$adminData->name}}">
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-search-input" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input class="form-control" name="email" type="email" value="{{$adminData->email}}">
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-email-input" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" >
                </div>
            </div>
            <!-- end row -->

             <!-- end row -->
             <div class="row mb-3">
                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <img src="{{asset('backend/assets/images/users/avatar-4.jpg')}}" alt="avatar-4" class="rounded avatar-md">
                </div>
            </div>

            

            <button type="button" class="btn btn-primary waves-effect waves-light">Update Profile</button>
        </div>
    </div>
</div>
@endsection