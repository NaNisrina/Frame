@extends('admin.admin')

@section('title_admin', 'Edit Projects')
@section('content-title', 'Edit Projects')

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

                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('projects.update', $projects->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="project_name">Project Name</label>

                            <input type="text" name="project_name" id="project_name"
                                class="form-control"
                                value="{{ $projects->project_name }}">
                        </div>

                        <div class="form-group">
                            <label for="project_date">Project Date</label>

                            <input type="date" name="project_date" id="project_date"
                                class="form-control @error('project_date') is-invalid @enderror"
                                value="{{ $projects->project_date }}">
                        </div>

                        <div class="form-group">
                            <label for="photo" class="form-label">Photo</label>

                            <input type="hidden" name="oldProject" value="{{ $projects->photo }}">
                            <img src="{{ asset('storage/' . $projects->photo) }}" alt="" class="img-thumbnail mb-2" width="150px">
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo">

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
