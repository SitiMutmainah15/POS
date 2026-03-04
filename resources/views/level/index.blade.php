@extends('layout.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover table-sm" id="table_level">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Level</th>
                    <th>Nama Level</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
$(function () {
    $('#table_level').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('level/list') }}",
            type: "POST",
            data: { _token: "{{ csrf_token() }}" }
        },
        columns: [
            { data: "DT_RowIndex", orderable:false, searchable:false, className:"text-center" },
            { data: "level_kode" },
            { data: "level_nama" }
        ]
    });
});
</script>
@endpush