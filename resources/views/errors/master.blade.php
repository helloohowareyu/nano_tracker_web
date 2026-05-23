<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Terjadi Kesalahan | {{ $code }}</title>
    <style>
        body { font-family: sans-serif; background: #f8fafc; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; max-width: 400px; }
        h1 { color: #e11d48; margin-bottom: 0.5rem; }
        p { color: #475569; }
        .btn { display: inline-block; margin-top: 1.5rem; padding: 10px 20px; background: #2563eb; color: white; text-decoration: none; border-radius: 6px; }
    </style>
</head>
<body>
    <div class="card">
        <h1>{{ $code }}</h1>
        <p>{{ $message }}</p>
        <a href="/" class="btn">Kembali ke Beranda</a>
    </div>
</body>
</html>