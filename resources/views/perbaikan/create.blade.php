<!DOCTYPE html>
<html>
<head>
    <title>Membuat Laporan Perbaikan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Membuat Laporan Perbaikan</h1>
    <form action="{{ route('perbaikan.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
        <select name="barang_id" id="barang_id" class="form-control" required>
    <option value="">Pilih Kerusakan</option>
    @foreach($barang as $item)
        <option value="{{ $item->barang_id }}">{{ $item->nama_barang }} ({{ $item->tanggal_kerusakan }})</option>
    @endforeach
</select>
  

        </div>
    
        <div class="form-group">
            <label for="catatan">Catatan:</label>
            <textarea class="form-control" name="catatan" id="catatan" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="tanggal_perbaikan">Tanggal Perbaikan:</label>
            <input type="date" class="form-control" name="tanggal_perbaikan" id="tanggal_perbaikan" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
