<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa Baru</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <header class="header d-flex justify-content-between align-items-center bg-info text-white py-2">
        <div class="container">
            <h1>Universitas Bersama</h1>
        </div>
        
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </button>
            <ul class="dropdown-menu">
                @if (Auth::user()->role == 'Mahasiswa')
                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
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
    
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status Akun</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $index => $mahasiswa)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>
                            <form action="/akun/{{ $mahasiswa->id }}" method="POST">
                                @csrf
                                <select name="statusAkun" class="form-select" onchange="this.form.submit()" {{ in_array($mahasiswa->statusAkun, ['diterima', 'ditolak']) ? 'disabled' : '' }}>
                                    <option value="diproses" {{ $mahasiswa->statusAkun == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="diterima" {{ $mahasiswa->statusAkun == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="ditolak" {{ $mahasiswa->statusAkun == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <footer class="bg-info text-white text-center py-3 fixed-bottom">
        &copy; 2024
    </footer>
</body>
</html>
