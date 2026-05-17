<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <img src="{{ asset('assets/logo.png') }}" alt="Logo">
    <h1>Selamat Datang 
        <br>
        di Nano Tracker</h1>

    <p>Website pencatatan keuangan Anda yang cerdas dan </p>
    <p>mudah. Mulai kelola uang Anda lebih baik.</p>
    
    <a href="{{ route('register') }}"><button type="button">Buat Akun Sekarang!</button></a>
</body>
</html>