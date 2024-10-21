@extends('partial2.teamplate')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        padding: 10px;
    }

    .table th {
        background-color: #007bff; /* Warna latar belakang header */
        color: white; /* Warna teks header */
    }

    .table td {
        word-wrap: break-word; /* Memastikan teks tidak melampaui batas kolom */
        max-width: 200px; /* Mengatur batas lebar kolom */
    }

    .action-btn {
        display: flex;
        justify-content: center;
    }

    .action-btn .btn {
        margin: 0 5px; /* Jarak antar tombol */
    }

    .btn {
        padding: 5px 10px; /* Ukuran tombol */
    }

    .card {
        margin-bottom: 30px;
    }

    .table-responsive {
        overflow-x: auto; /* Memungkinkan scroll horizontal jika konten lebih lebar */
    }
</style>

<script>
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus barang ini?");
    }
</script>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header text-center">
                    <h1 class="mb-0">Daftar Barang</h1>
                </div>
                <div class="card-body">
                    <a href="{{ route('barang.create') }}" class="btn btn-success mb-3">
                        <i class="fas fa-plus-circle"></i> Tambah Barang
                    </a>
                    @if($barang->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Deskripsi</th>
                                        <th>Kategori</th>
                                        <th>Nama</th>
                                        <th>Lokasi</th>
                                        <th>Tanggal Kerusakan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td> <!-- Menggunakan loop iteration untuk nomor urut -->
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>{{ $item->kategori ? $item->kategori->nama_kategori : 'N/A' }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->lokasi }}</td>
                                            <td>{{ $item->tanggal_kerusakan }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td class="action-btn">
                                                <a href="{{ route('barang.edit', $item->barang_id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('barang.destroy', $item->barang_id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete();">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>   
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">Tidak ada data barang yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
