@if ($datas->isEmpty())
    <h6>Siswa Belum Mempunyai Project</h6>
@else
    @foreach ($datas as $data)
    <div class="card mb-5">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <span>{{ $data->project_name }}</span>
        </div>

        <div class="card-body">
            <div class="mb-3 row">
                <div class="col-5">
                    <h6>Project Name</h6>
                </div>

                <div class="col-1 text-end">
                    <h6>:</h6>
                </div>

                <div class="col-5 text-start">
                    <p>{{ $data->project_name }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-5">
                    <h6>Project Date</h6>
                </div>

                <div class="col-1 text-end">
                    <h6>:</h6>
                </div>

                <div class="col-5 text-start">
                    <p>{{ $data->project_date }}</p>
                </div>
            </div>

            {{ $data->photo }}
        </div>

        <div class="card-footer text-end">
            <a href="" class="btn btn-sm btn-success">Edit</a>
            <a href="" class="btn btn-sm btn-danger">Delete</a>
        </div>
    </div>
    @endforeach
@endif
