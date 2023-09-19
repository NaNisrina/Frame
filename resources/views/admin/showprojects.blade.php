@if ($datas->isEmpty())
    <h6>Siswa Belum Mempunyai Project</h6>
@else
    @foreach ($datas as $data)
    <div class="card">
        <div class="card-header">
            {{ $data->project_name }}
        </div>
        <div class="card-body">
            {{ $data->project_date }}
            {{ $data->photo }}
        </div>
        <div class="card-footer text-end">
            <a href="" class="btn btn-sm btn-success">Edit</a>
            <a href="" class="btn btn-sm btn-danger">Delete</a>
        </div>
    </div>
    @endforeach
@endif
