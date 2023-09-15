@extends('admin.admin')

@section('title_admin', 'Edit Siswa')
@section('content-title', 'Edit Siswa')

@section('content')

    <!-- rc -->
    <div class="row">
        <div class="col-lg-12">

            <div class="card border-0">

                <div class="card-header">
                    <a href="{{ route('mastersiswa') }}" class="btn btn-outline-info">
                        <i class="bi bi-arrow-bar-left"></i>
                        Back to Mastersiswa
                    </a>
                </div>

                <div class="card-body">

                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('updatesiswa', $siswa->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $siswa->name}}">
                        </div>

                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea name="about" id="about" class="form-control">{{ $siswa->about }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="hidden" name="oldPhoto" value="{{ $siswa->photo }}">
                            <img src="{{ asset('storage/' . $siswa->photo) }}" alt="" class="img-thumbnail mb-2" width="150px">

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

    {{-- <!-- backup -->
    <div class="card">

        <div class="card-header">Edit Siswa</div>

        <div class="card-body">
            <form action="{{ route('updatesiswa', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $siswa->name }}" required>
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <input type="text" name="about" class="form-control" value="{{ $siswa->about }}" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-danger" href="{{ route('mastersiswa') }}">Back to Master Siswa</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>

    </div> --}}

    {{-- <a href="{{ route('mastersiswa')}}">Master Siswa</a> --}}

@endsection
