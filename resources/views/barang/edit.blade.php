<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Edit Barang</h1>
    <form method="POST" action="{{ route('barang.update', $barang->barang_id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{ $barang->nama_barang }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="kategori_id">Kategori Barang:</label>
            <select name="kategori_id" class="form-control" id="kategori_id" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $kategori)
                    <option value="{{ $kategori->kategori_id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $barang->nama }}" required>
        </div>

        <div class="form-group">
    <label for="lokasi">Lokasi:</label>
    <select name="lokasi" class="form-control" id="lokasi" required>
        <option value="">Pilih Lokasi</option>
        <option value="Gedung Ir.Juanda - datin">Gedung Ir.Juanda - Datin</option>
        <option value="Gedung Ir.Juanda - strahan">Gedung Ir.Juanda - Strahan</option>
        <option value="Gedung Ir.Juanda - sumdahan">Gedung Ir.Juanda - Sumdahan</option>
        <option value="Gedung Ir.Juanda - alpahan">Gedung Ir.Juanda - Alpahan</option>
        <option value="Gedung Ir.Juanda - ruang_rpt_L5">Gedung Ir.Juanda - Ruang Rapat L5</option>
        <option value="Gedung Prof,IrSoepomo,Mr,Sh - TU">Gedung Prof,IrSoepomo,Mr,Sh - TU</option>
        <option value="Gedung Prof,IrSoepomo,Mr,Sh - Kabadan">Gedung Prof,IrSoepomo,Mr,Sh - Kabadan</option>
        <option value="Gedung Prof,IrSoepomo,Mr,Sh - Proglab">Gedung Prof,IrSoepomo,Mr,Sh - Proglab</option>
    </select>
</div>  



        <div class="form-group">
            <label for="tanggal_kerusakan">Tanggal Melaporkan:</label>
            <input type="date" class="form-control" name="tanggal_kerusakan" id="tanggal_kerusakan" value="{{ $barang->tanggal_kerusakan }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" id="status">
                <option value="">Pilih Status</option>
          
                <option value="rusak">Rusak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
