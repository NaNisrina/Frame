@extends('admin.admin')

@section('title_admin', 'Master Projects')
@section('content-title', 'Master Projects')
@section('content')

    <div class="row card-body">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display:inline-block;">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col-lg-6">
            <div class="card shadow">

                <div class="card-header">
                    <h6>List Siswa</h6>
                </div>

                <div class="card-body">

                    <table width="100%" class="table table-hover">

                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <a class="btn btn-info" onclick="show({{ $data->id }})">
                                        <i class="text-white fas fa-fw fa-solid fa-folder-open"></i>
                                    </a>
                                    <a class="btn btn-success" href="{{ route('projects.create', $data->id) }}">
                                        <i class="fas fa-fw fa-solid fa-plus"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </table>

                </div>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow">

                <div class="card-header">
                    <h6>List Project</h6>
                </div>

                <div id="project" class="card-body">
                    <div class="text-center">Silahkan pilih siswa terlebih dahulu</div>
                </div>

            </div>
        </div>

    </div>

    <script>
        function show(id) {
            $.get('projects/' + id, (data) => {
                $("#project").html(data);
            })
        }
    </script>

    {{-- <h1>
        Project
    </h1>
    <div class="row">
        <div class="col-lg-5">
            <div class="card shadow">
                <div class="card-header">
                    <h1>Daftar Siswa</h1>
                </div>
                <div class="card-body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th width="60%">Name</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        @foreach ($siswas as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->name }}</td>
                            <td>
                                <a class="btn btn-sm btn-info" onclick="show({{ ($siswa->id) }})"><i class="fas fa-folder-open"></i></a>
                                <a class="btn btn-sm btn-success" href="{{ route('projects.create', $siswa->id) }}"><i class="fas fa-plus"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card shadow">
                <div class="card-header">
                    <h1>Daftar Project</h1>
                </div>
                <div id="project" class="card-body">
                    <h4 class="text-center">
                        Silahkan Pilih Siswa Terlebih Dahulu
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <script>
        function show(id){
            $.get('projects/' + id, (data) => {
                $("#project").html(data);
            })
        }
    </script> --}}

@endsection
