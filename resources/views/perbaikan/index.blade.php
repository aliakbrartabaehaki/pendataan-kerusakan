@extends('partial.teamplate')

@section('content')
<div class="container mt-5">
    <h1>Perbaikan Barang</h1>
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Daftar Perbaikan</h6>
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
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perbaikan as $item)
                            <tr>
                                <td class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</td>
                                <td class="text-xs font-weight-bold mb-0">
                                    {{ $item->barang ? $item->barang->nama_barang : 'Barang tidak ditemukan' }}
                                </td>
                                <td class="text-xs font-weight-bold mb-0">
                                    {{ $item->barang ? $item->barang->deskripsi : 'Deskripsi tidak ditemukan' }}
                                </td>
                                <td class="text-xs font-weight-bold mb-0">{{ $item->tanggal_perbaikan }}</td>
                                <td class="text-xs font-weight-bold mb-0">
                                    {{ $item->barang ? $item->barang->nama : 'Pelapor tidak ditemukan' }}
                                </td>
                                <td class="text-center">
                                    @if ($item->keterangan == 'sudah di perbaiki')
                                        <span class="badge bg-success">Sudah di Perbaiki</span>
                                    @elseif ($item->keterangan == 'sedang di perbaiki')
                                        <span class="badge bg-warning">Sedang di Perbaiki</span>
                                    @else
                                        <span class="badge bg-secondary">Belum Diperbaiki</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- Aksi sedang diperbaiki -->
                                    <form action="{{ route('perbaikan.in-repair', $item->perbaikan_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            <i class="fas fa-wrench"></i> <!-- Icon untuk 'Sedang di Perbaiki' -->
                                        </button>
                                    </form>

                                    <!-- Aksi sudah diperbaiki -->
                                    <form action="{{ route('perbaikan.repaired', $item->perbaikan_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fas fa-check"></i> <!-- Icon untuk 'Sudah di Perbaiki' -->
                                        </button>
                                    </form>

                                    <!-- Aksi delete -->
                                    <!-- <form action="{{ route('perbaikan.destroy', $item->perbaikan_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> -->
                                             <!-- Icon untuk 'Hapus' -->
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    