

<!DOCTYPE html>
<html>
<head>
    <title>Kategori Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
</head>
<body>

<div class="container mt-5">
    <h1>Membuat Baru Kategori</h1>
    <form action="{{ route('kategori.store') }}" method="POST" class="mb-5">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
