<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
</head>
<body>
    <header>
        <h1>Daftar Menu</h1>
        <p>Nama Toko</p> <!--gimana yak cara masukin nama tokonya??-->
    </header>

    <div>
        <h3>Menambah Menu</h3>
        <form action="/" method="POST"> 
            <!-- @csrf -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Deskripsi Produk</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Satuan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Stok</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="imageInput">Choose Image</label>
                <input type="file" class="form-control-file" id="imageInput" name="image">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan Tambahan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Save"> <br> 
        </form>
    </div>
</body>
</html>