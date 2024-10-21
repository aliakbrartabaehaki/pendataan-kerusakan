@extends('partial.teamplate')

@section('content')
<div class="container mt-5">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Daftar Data Perbaikan </h6>
                <div class="d-flex align-items-center">
                    <!-- Form untuk filter berdasarkan tanggal -->
                    <form class="d-flex me-3" method="GET" action="{{ route('perbaikan.index3') }}">
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
                    <a href="/perbaikan/export_excel" class="btn btn-success btn-sm" target="_blank">CETAK  EXCEL</a>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Barang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi Barang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Melapor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelapor</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($perbaikan as $item)
                            <tr>
                                <td class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</td>
                                <td class="text-xs font-weight-bold mb-0">
                                    {{ $item->barang->nama_barang ?? 'Barang tidak ditemukan' }}
                                </td>
                                <td class="text-xs font-weight-bold mb-0">
                                    {{ $item->barang->deskripsi ?? 'Deskripsi tidak ditemukan' }}
                                </td>
                                <td class="text-xs font-weight-bold mb-0">{{ $item->tanggal_perbaikan }}</td>
                                <td class="text-xs font-weight-bold mb-0">
                                    {{ $item->barang->nama ?? 'Pelapor tidak ditemukan' }}
                                </td>
                                <td class="text-center">
                                    @if ($item->keterangan == 'sudah di perbaiki')
                                        <span class="badge bg-success">Sudah di Perbaiki</span>
                                    @else
                                        <span class="badge bg-warning">Sedang di Perbaiki</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data tidak ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination jika menggunakan paginated data -->
                    @if (method_exists($perbaikan, 'links'))
                        <div class="d-flex justify-content-center mt-3">
                            {{ $perbaikan->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
