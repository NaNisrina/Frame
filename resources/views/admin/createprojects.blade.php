@extends('admin.admin')

@section('title_admin', 'Create Projects')
@section('content-title', 'Create Projects - ' .$data->name)

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="card border-0">

                <div class="card-header">
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-info">
                        <i class="bi bi-arrow-bar-left"></i>
                        Back to Masterprojects
                    </a>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="siswa_id" value="{{ $data->id }}">

                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input type="text" name="project_name" id="project_name"
                                class="form-control @error('project_name') is-invalid @enderror"
                                value="{{ old('project_name') }}">

                            @error('project_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="project_date">Project Date</label>
                            <input type="date" name="project_date" id="project_date"
                                class="form-control @error('project_date') is-invalid @enderror"
                                value="{{ old('project_date') }}">

                            @error('project_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" id="photo"
                                class="form-control @error('photo') is-invalid @enderror">

                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
