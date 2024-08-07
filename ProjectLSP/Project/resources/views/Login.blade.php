<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Halaman Login</title>
</head>
<body>
    <div class="card">
      <div class="card-header bg-info text-white">
        Universitas Bersama
      </div>
      @if (session()->has('loginError'))
    <div class="alert alert-danger" role="alert">
      {{ session('loginError') }}
    </div>
        
    @endif
      <div class="container mt-5">
      <div class="card-body" style="height: 500px">
        <div class="mx-auto" style="max-width: 300px;">
          @if(session('error'))
          <div class="alert alert-danger">
              <b>Opps!</b> {{session('error')}}
          </div>
          @endif
          <form action="{{route('actionlogin')}}" method="POST">
            @csrf
            <img src="{{asset('images/profile.png')}}" class="rounded mx-auto d-block" alt="..." width="100px" height="100px">
            <h3 class="text-center">Log in</h3>
            <br>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email Anda" required>
            </div>

            <div class="mb-3">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Anda" required>
            </div>
      
            <div class="d-grid gap-2">
              <button type="login" class="btn btn-outline-primary">login</button>
            </div>
            <div class="mt-3 text-center">
              <small> <a href="/daftar">Buat Akun</a></small>
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
