@extends('partial.teamplate')
@section('content') 
<div class="container mt-5">
    <h1 style="color: #ffffff;">Kategori Barang</h1>
    <a href="{{ route('kategori.create') }}" class="btn btn-success mb-3">Membuat Kategori Baru</a>
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="text-white">Daftar Kategori</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Kategori</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $kategori)
                            <tr>
                                <td class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</td>
                                <td class="text-xs font-weight-bold mb-0">{{ $kategori->nama_kategori }}</td>
                                <td class="text-center">
                                    <a href="{{ route('kategori.edit', $kategori->kategori_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kategori.destroy', $kategori->kategori_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah kamu yakin ingin menghapus kategori ini?');">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
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
