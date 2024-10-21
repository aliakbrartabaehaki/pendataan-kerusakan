@extends('partial2.teamplate')

@section('content')
<div class="container mt-5 pt-5">
    <div class="container mt-5">
        <h1>Data Perbaikan Barang</h1>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <!-- Judul atau informasi tambahan -->
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-striped table-hover align-items-center mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Deskripsi Barang</th>
                                    <th>Tanggal Perbaikan</th>
                                    <th>Status Perbaikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perbaikan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->barang ? $item->barang->nama_barang : 'Tidak tersedia' }}</td>
                                    <td>{{ $item->barang ? $item->barang->deskripsi : 'Tidak tersedia' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_perbaikan)->format('d-m-Y') }}</td>
                                    <td class="text-center">
                                        @if ($item->keterangan == 'sudah di perbaiki')
                                            <span class="badge bg-success">Sudah Diperbaiki</span>
                                        @elseif ($item->keterangan == 'sedang di perbaiki')
                                            <span class="badge bg-warning">Sedang Diperbaiki</span>
                                        @else
                                            <span class="badge bg-secondary">Belum Diperbaiki</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination jika data perbaikan lebih dari satu halaman -->
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
</div>
@endsection
