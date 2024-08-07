<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Header -->
    <header class="header bg-info text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Profil Mahasiswa</h1>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                    <li><a class="dropdown-item" href="/dashboard">Profil</a></li>
                    <li><a class="dropdown-item" href="{{route('actionlogout')}}">Keluar</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Profil Mahasiswa -->
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Check if mahasiswa data exists -->
                @if ($mahasiswa)
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{$mahasiswa->nama}}</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{$mahasiswa->jeniskel}}</li>
                            <li class="list-group-item"><strong>Tempat Lahir:</strong> {{$mahasiswa->tempatlahir}}</li>
                            <li class="list-group-item"><strong>Tanggal Lahir:</strong> {{$mahasiswa->tanggallahir}}</li>
                            <li class="list-group-item"><strong>Alamat:</strong> {{$mahasiswa->alamat}}</li>
                            <li class="list-group-item"><strong>Status Mahasiswa:</strong> {{$mahasiswa->statusMahasiswa}}</li>
                        </ul>
                    </div>
                </div>
                @else
                <div class="alert alert-warning" role="alert">
                    Data mahasiswa tidak ditemukan.
                </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer bg-info text-white text-center py-3 fixed-bottom">
        <div class="container">
            &copy; 2024 
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>