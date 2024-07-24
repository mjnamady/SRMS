@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">CREATE STUDENT CLASSES</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Create</a></li>
                        <li class="breadcrumb-item active">Classes</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Create Student Class</h4>
        <form action="{{route('admin.password.update')}}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Class Name</label>
                <div class="col-sm-10">
                    <input class="form-control" name="class_name" required type="text" placeholder="Class Name">
                   <p style="font-style: italic">Eg - First, Second, Third etc</p>
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Section</label>
                <div class="col-sm-10">
                    <input class="form-control" name="section" required type="text" placeholder="Section">
                   <p style="font-style: italic">Eg - A, B, C etc</p>
                </div>
            </div>
            <!-- end row -->

            <button type="submit" class="btn btn-primary waves-effect waves-light">Create Class</button>
        </form>
        </div>
    </div>
</div>

@endsection