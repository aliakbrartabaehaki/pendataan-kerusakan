
<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   
</head>
<body>

<div class="container mt-5">
    <h1>Edit Kategori</h1>
    <form method="POST" action="{{ route('kategori.update', $kategori->kategori_id) }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="post"/>
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>


</body>
</html>
