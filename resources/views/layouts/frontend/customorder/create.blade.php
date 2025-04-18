<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BENGKEL LAS KANA JAYA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-center mt-5">
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
      </button>
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Kastemisasi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="{{ route('customorder.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form group">
            <label for="jenis_produk">Jenis Produk</label>
            <input type="text" class="form-control" name="jenis_produk" id="jenis_produk">

            <label for="model_produk">Model Produk</label>
            <input type="text" class="form-control" name="model_produk" id="model_produk">

            <label for="spesifikasi_produk">Spesifikasi Produk</label>
            <input type="text" class="form-control" name="spesifikasi_produk" id="spesifikasi_produk">

            <label for="dimensi_produk">Dimensi Produk</label>
            <input type="text" class="form-control" name="dimensi_produk" id="dimensi_produk">

            <label for="bahan_produk">Bahan Produk</label>
            <input type="text" class="form-control" name="bahan_produk" id="bahan_produk">

            <label for="gambarsampel_produk">Gambar Sampel Produk</label>
            <input type="file" class="form-control" name="gambarsampel_produk" id="gambarsampel_produk">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Place Order</button>
            <a href="{{ route('customorder.create') }}" class="btn btn-primary">Back</a>
          </div>
        </form>

        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>