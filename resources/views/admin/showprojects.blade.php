@if ($datas->isEmpty())
    <h6 class="text-center">Siswa Belum Mempunyai Project</h6>
@else

    @foreach ($datas as $data)

        <div class="card mb-5">

            <div class="card-header bg-dark text-white d-flex justify-content-between">
                <h6>{{ $loop->iteration }} . {{ $data->project_name }}</h6>
            </div>

            <div class="card-body">

                <h6>Project Date : {{ $data->project_date }}</h6>

                <div class="row">
                    <div class="col-2">
                        <h6>Photo : </h6>

                    </div>
                    <div class="col-10">
                        <p>
                            <img src="{{ asset('storage/' . $data->photo) }}" alt="" width="150px" class="img-thumbnail">
                        </p>
                    </div>
                </div>

            </div>

            <div class="card-footer justify-content-end d-flex text-end" style="gap: 3px;">

                <!-- Edit -->
                <a href="{{ route('projects.edit', $data->id) }}" class="btn btn-sm btn-info">
                    <i class="text-white bi bi-pencil-square"></i>
                </a>

                <!-- Delete -->
                <form action="{{ route('projects.destroy', $data->id) }}" method="post">
                    @csrf

                    @method('DELETE')
                    <button class="btn btn-sm btn-success" onclick="return confirm ('Delete This Data?')">
                        <i class="bi bi-trash3"></i>
                    </button>

                </form>

            </div>

        </div>

    @endforeach

@endif
