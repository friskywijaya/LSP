<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .card {
            overflow: hidden;
        }

        .card-img-top {
            width: 100%;
            height: 200px; /* Ganti sesuai ukuran yang diinginkan */
            object-fit: cover; /* Mengisi area dengan memotong gambar jika perlu */
        }

        .card-body {
            text-align: center; /* Menjaga teks card berada di tengah */
        }
    </style>
</head>
<body>
    <!-- Header -->
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
              <li><a class="dropdown-item" href="/daftar">Pendaftaran Mahasiswa</a></li>
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
   
    <div class="container">
        <div class="row">
            @foreach ($pengumuman as $p)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <!-- Menampilkan gambar jika ada -->
                        @if($p->thumbnail)
                            <img src="{{ asset('storage/' . $p->thumbnail) }}" alt="Gambar {{ $p->judul }}" class="card-img-top">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->judul }}</h5>
                            <p class="card-text">{{ $p->isi }}</p>
                        </div>
                        
                        <!-- Button Edit dan Delete -->
                        @if (Auth::user()->role == 'admin')
                            <div class="card-footer text-center">
                                <a href="/{{ $p->id }}/edit" class="btn btn-warning me-2">Edit</a>
                                <form action="/{{ $p->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="card-footer bg-info text-white text-center fixed-bottom">
        &copy; 2024
    </div>
</body>
</html>
