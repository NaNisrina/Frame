@extends('admin.admin')

@section('title_admin', 'Master Siswa')
@section('content-title', 'Master Siswa')

@section('content')

    {{-- rc --}}
    <div class="row">
        <!-- Alert Success -->
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: inline-block">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dissmiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- /Alert Success -->

        <div class="col-lg-12">
            <div class="card-border-0">

                <!-- Header -->
                <div class="card-header">
                    <a href="{{ route('createsiswa') }}" class="btn btn-outline-dark">
                        <i class="bi bi-plus-circle"></i>
                        Create
                    </a>
                </div>
                <!-- /Header -->

                <!-- Body -->
                <div class="card-body overflow-auto table-responsive">
                    <!-- Table -->
                    <table class="table table-striped table-dark table-borderless table-hover">

                        <!-- Table Head -->
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">About</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <!-- /Table Head -->

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($siswas as $siswa)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $siswa->name }}</td>
                                    <td>{{ Str::substr($siswa->about, 0, 50) }} ... </td>
                                    <td>
                                        <img width="150px" class="img-thumbnail" src="{{ asset('storage/' . $siswa->photo) }}" alt="">
                                    </td>

                                    <td>
                                        <div class="d-flex" style="gap: 3px">
                                            <a href="{{ route('editsiswa', $siswa->id) }}" class="btn btn-success"> {{-- btn-info --}}
                                                <i class="text-white bi bi-pencil-square"></i>
                                            </a>
                                            <!-- Delete -->
                                            <form action="{{ route('destroysiswa', $siswa->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-info" onclick="return confirm('Delete this Data Siswa?')">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                            <!-- /Delete -->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!-- /Table Body -->

                    </table>
                    <!-- /Table -->
                </div>
                <!-- /Body -->

            </div>
        </div>
    </div>

    {{-- ci --}}
    {{-- <div class="card">

        <div class="card-header fs-2">Master Siswa</div>

        <div class="card-body">
            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

                <!-- Other Content -->
                <div class="datatable-container">

                    <div class="datatable-top">
                        <a class="btn btn-primary" href="{{ route('createsiswa') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-lg mr-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                            </svg>Create Siswa
                        </a>
                    </div>

                    <hr>

                    @if (count($siswas) > 0)
                        <table id="datatablesSimple" class="datatable-table">

                            <tbody>

                                <tr>
                                    <th data-sortable="true" style="width: 10%;">
                                        <a href="#" class="datatable-sorter">No</a>
                                    </th>
                                    <th data-sortable="true" style="width: 20%;">
                                        <a href="#" class="datatable-sorter">Photo</a>
                                    </th>
                                    <th data-sortable="true" style="width: 20%;">
                                        <a href="#" class="datatable-sorter">Name</a>
                                    </th>
                                    <th data-sortable="true" style="width: 20%;">
                                        <a href="#" class="datatable-sorter">About</a>
                                    </th>
                                    <th data-sortable="true" style="width: 10%;">
                                        <a href="#" class="datatable-sorter">Action</a>
                                    </th>
                                </tr>

                                @foreach ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('siswa_images/'.$siswa->photo) }}" alt="not found"
                                                width="100">
                                        </td>
                                        <td>{{ $siswa->name }}</td>
                                        <td>{{ $siswa->about }}</td>

                                        <td class="d-flex">
                                            <a class="btn btn-warning mr-2" href="{{ route('editsiswa', $siswa->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('destroysiswa', $siswa->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-small">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                    </svg>
                                                </button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                        @else
                        <p>No data available.</p>

                    @endif

                </div>

            </div>
        </div>

    </div> --}}

    {{-- backup --}}
    {{-- <a href="{{ route('createsiswa') }}"> Create Siswa </a>
    <br>
    <a href="{{ route('editsiswa') }}"> Edit Siswa </a> --}}

    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">

                <div class="card-header">
                    <a href="#" class="btn btn-success">Create</a>
                </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>About</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </thead>
                            @foreach ($siswas as $siswa)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $siswa->name}}</td>
                                <td>{{ $siswa->about}}</td>
                                <td>{{ $siswa->photo}}</td>

                                <td>
                                    <a href="" class="btn btn-warning">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

            </div>
        </div>
    </div> --}}

@endsection
