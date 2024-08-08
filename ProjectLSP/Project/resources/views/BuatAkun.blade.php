<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Halaman Buat Akun</title>
</head>
<body>
    <div class="card">
      <div class="card-header bg-info text-white">
        Universitas Bersama
      </div>
      <div class="container mt-5">
      <div class="card-body">
        <div class="mx-auto" style="max-width: 800px;">
          <form action="/storeakun" method="POST">
           @csrf
            <h3 class="text-center">Formulir Pendaftaran Akun Baru</h3>
            <br>
            
            <div class="mb-3">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama Anda" id="nama" name = "nama"required>
            </div>
      
            {{-- <div class="mb-3">
              <label for="jeniskel">Jenis Kelamin</label>
              <select id="jeniskel" class="form-select" name="jeniskel">
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
      
            <div class="mb-3">
              <label for="tempatlahir">Tempat Lahir</label>
              <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir Anda" id="tempatlahir" name="tempatlahir" required>
            </div>
      
            <div class="mb-3">
              <label for="tanggallahir">Tanggal Lahir</label>
              <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" required>
            </div>
      
            <div class="mb-3">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" placeholder="Masukkan Alamat Anda" id="alamat" name="alamat" required>
            </div>  --}}
      
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="Masukkan Email Anda" name="email"required>
            </div>

            <div class="mb-3">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Masukkan Password Anda" name="password" >
            </div>

            {{-- <div class="mb-3">
              <label for="noktp">No.ktp</label>
              <input type="text" class="form-control" id="noktp" placeholder="Masukkan No.KTP Anda" name="noktp" >
            </div>

            <div class="mb-3">
              <label for="Prodi">Prodi</label>
              <select id="Prodi" class="form-select" name="Prodi">
                <option value="IF">Informatika</option>
                <option value="SI">Sistem Informasi</option>
                <option value="MJ">Manajemen</option>
              </select>
            </div> --}}

            
      
            <div class="d-grid gap-2">
              <button type="submit" name="submit" class="btn btn-outline-primary">Daftar</button>
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
