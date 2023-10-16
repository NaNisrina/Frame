@extends('admin.admin')

@section('title_admin', 'Master Contact')
@section('content-title', 'Master Contact')

@section('content')

    <div class="row card-body">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display:inline-block;">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col-lg-12">
            <div class="card shadow">

                <div class="card-header">
                    <h6>List Siswa & Contact</h6>
                </div>

                <div class="card-body">

                    {{-- <table width="100%" class="table table-hover">

                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Name</td>
                                <td>Action</td>
                            </tr>
                        </thead> --}}

                        @foreach ($item as $item)
                            <div class="card mb-5">

                                <div class="card-header bg-dark text-white d-flex justify-content-between">
                                    <h6>{{ $loop->iteration }} . {{ $item->name }}</h6>
                                </div>


                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-6">
                                            <h6>Contact :</h6>
                                        </div>

                                        <div class="col-6 justify-content-end d-flex text-end">
                                            <a href="{{ route('createcontact', $item->id)}}" class="btn btn-sm btn-success">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>

                                    </div>

                                    @foreach ($item->contact as $contact)
                                    <h6>{{ $loop->iteration }} .  {{ $contact->name }}</h6>
                                    @endforeach

                                </div>


                                <div class="card-footer justify-content-end d-flex text-end" style="gap: 3px;">

                                    <!-- Edit -->
                                    <a href="{{ route('editcontact', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="text-white bi bi-pencil-square"></i>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('projects.destroy', $item->id) }}" method="post">
                                        @csrf

                                        @method('DELETE')
                                        <button class="btn btn-sm btn-success"
                                            onclick="return confirm ('Delete This Data?')">
                                            <i class="bi bi-trash3"></i>
                                        </button>

                                    </form>

                                </div>

                            </div>
                        @endforeach

                    {{-- </table> --}}

                </div>

            </div>
        </div>

    </div>

@endsection
