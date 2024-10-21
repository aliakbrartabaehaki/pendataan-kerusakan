@extends('partial.teamplate')

@section('content')
<div class="container mt-5">
    <h1>Barang</h1>
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Daftar Barang</h6>
                <div class="d-flex align-items-center">
                    <form class="d-flex me-3">
                        <div class="input-group me-2">
                            <input type="date" name="start_date" id="start_date" class="form-control" 
                                   value="{{ request()->input('start_date') }}">
                        </div>
                        <div class="input-group me-2">
                            <input type="date" name="end_date" id="end_date" class="form-control" 
                                   value="{{ request()->input('end_date') }}">
                        </div>
                        <button class="btn btn-secondary btn-sm" type="submit">Seleksi</button>
                    </form>
                    <a href="/barang/export_excel" class="btn btn-success btn-sm mt-2" target="_blank">Cetak Ke Excel</a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Barang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lokasi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Kerusakan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                            <tr>
                                <td class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</td>
                                <td class="text-xs font-weight-bold mb-0">{{ $item->nama_barang }}</td>
                                <td class="text-xs font-weight-bold mb-0">{{ $item->deskripsi }}</td>
                                <td class="text-xs font-weight-bold mb-0">{{ $item->kategori ? $item->kategori->nama_kategori : 'N/A' }}</td>
                                <td class="text-xs font-weight-bold mb-0">{{ $item->nama }}</td>
                                <td class="text-xs font-weight-bold mb-0">{{ $item->lokasi }}</td>
                                <td class="text-xs font-weight-bold mb-0">{{ $item->tanggal_kerusakan }}</td>
                                <td class="text-xs font-weight-bold mb-0">{{ $item->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
