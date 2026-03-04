@extends('layout.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>

    <div class="card-body">
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 col-form-label">Filter:</label>

                    <div class="col-3">
                        <select class="form-control" id="kategori_id">
                            <option value="">- Semua Kategori -</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->kategori_id }}">{{ $k->kategori_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Kategori</small>
                    </div>

                    <div class="col-3">
                        <select class="form-control" id="supplier_id">
                            <option value="">- Semua Supplier -</option>
                            @foreach($supplier as $s)
                                <option value="{{ $s->supplier_id }}">{{ $s->supplier_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Supplier</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Supplier</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
$(function () {
    const tableBarang = $('#table_barang').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('barang/list') }}",
            type: "POST",
            data: function (d) {
                d._token = "{{ csrf_token() }}";
                d.kategori_id = $('#kategori_id').val();
                d.supplier_id = $('#supplier_id').val();
            }
        },
        columns: [
            { data: "DT_RowIndex", orderable:false, searchable:false, className:"text-center" },
            { data: "barang_kode" },
            { data: "barang_nama" },
            { data: "kategori", orderable:false, searchable:false },
            { data: "supplier", orderable:false, searchable:false },
            { data: "harga_beli" },
            { data: "harga_jual" }
        ]
    });

    $('#kategori_id, #supplier_id').on('change', function () {
        tableBarang.ajax.reload();
    });
});
</script>
@endpush