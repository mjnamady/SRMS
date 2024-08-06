@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">DECLARE A RESULT </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Declare</a></li>
                        <li class="breadcrumb-item active">Result</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Declare Student Result</h4>
        <form action="{{route('store.subject')}}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Class</label>
                <div class="col-sm-10">
                    <select name="class_id" class="form-select" aria-label="Default select example">
                        <option selected="">-- Select a Class --</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Student Name</label>
                <div class="col-sm-10">
                    <select name="class_id" class="form-select" aria-label="Default select example">
                        <option selected="">-- Select a Student --</option>
                    
                    </select>
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-bullseye-arrow me-2"></i>
                        This Student's Result is Already Declared!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Subjects</label>
                <div class="col-sm-10">
                    <label for="english">English</label>
                    <input class="form-control" name="marks[]" required type="text" placeholder="Enter mark out of 100">
                </div>
            </div>
            <!-- end row -->

            <button type="submit" class="btn btn-primary waves-effect waves-light">Declare Result</button>
        </form>
        </div>
    </div>
</div>

@endsection