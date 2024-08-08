<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Penambahan Pengumuman</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
  

<header class="header d-flex justify-content-between align-items-center bg-info text-white">
  <div class="container">
      <h1>Universitas Bersama</h1>
  </div>
  
  <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
              @if (Auth::user()->role == 'Mahasiswa')
              <li><a class="dropdown-item" href="/profile">Profile</a></li>
              @endif
              @if (Auth::user()->role == 'admin')
             
              <li><a class="dropdown-item" href="/datamhs">Data Mahasiswa</a></li>
              <li><a class="dropdown-item" href="/pengumuman">Pengumuman</a></li>
              <li><a class="dropdown-item" href="/pengajuan">Pengajuan Mahasiswa</a></li>
              <li><a class="dropdown-item" href="/akun">Pengajuan Akun</a></li>
              @endif 
              <li><a class="dropdown-item" href="{{route('actionlogout')}}">Keluar</a></li>
            </ul>
          </div>
    </header>
    <br>

      <div class="container mt-5">
      <div class="card-body">
        <div class="mx-auto" style="max-width: 500px;">
          <form action="/storepengumuman" method="POST" enctype="multipart/form-data">
           @csrf
            <h3 class="text-center">Penambahan Pengumuman</h3>
            <br>
            <div class="mb-3">
              <label for="judul">Judul Pengumuman </label>
              <input type="text" class="form-control"  id="judul" name = "judul"  required>
            </div>
      
            <div class="mb-3">
              <label for="isi">Isi Pengumuman </label>
              <input type="text" class="form-control"  id="isi" name="isi" required>
            </div>

            <div class="mb-3">
              <label for="thumbnail" class="form-label">Unggah Thumbnail</label>
              <input class="form-control" type="file" id="thumbnail" value="thumbnail" name="thumbnail" accept="image/*">
          </div>
      
            <div class="d-grid gap-2">
              <button type="submit" name="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
      <div class="card-footer bg-info text-white text-center fixed-bottom">
        &copy; 2024
      </div>
    </div>
</body>
</html>
