@extends('admin.admin')

@section('title_admin', 'Create Projects')
@section('content-title', 'Create Projects')

@section('content')

    <!-- rc -->
    <div class="row">
        <div class="col-lg-12">

            <div class="card border-0">

                <div class="card-header">
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-info">
                        <i class="bi bi-arrow-bar-left"></i>
                        Back to Masterproject
                    </a>
                </div>

                <div class="card-body">

                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input type="text" name="project_name" id="project_name"
                                class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="project_date">Project Date</label>
                            <input type="date" name="project_date" id="project_date"
                                class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" id="photo"
                                class="form-control" required>
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <input class="btn btn-outline-success mx-2" type="submit" value="Save">
                            <input class="btn btn-outline-danger" type="reset" value="Reset">
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

@endsection
