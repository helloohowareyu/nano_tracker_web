<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    /* Add font files for ABeeZee */
    @font-face {
      font-family: 'ABeeZee';
      src: url('{{ asset('figma-export/fonts/abeezee.woff2') }}') format('woff2'),
           url('{{ asset('figma-export/fonts/abeezee.woff') }}') format('woff');
      font-weight: normal;
      font-style: normal;
    }

    /* Add font files for Cossette Texte */
    @font-face {
      font-family: 'Cossette Texte';
      src: url('{{ asset('figma-export/fonts/cossette-texte.woff2') }}') format('woff2'),
           url('{{ asset('figma-export/fonts/cossette-texte.woff') }}') format('woff');
      font-weight: normal;
      font-style: normal;
    }

    /* Add font files for Koulen */
    @font-face {
      font-family: 'Koulen';
      src: url('{{ asset('figma-export/fonts/koulen.woff2') }}') format('woff2'),
           url('{{ asset('figma-export/fonts/koulen.woff') }}') format('woff');
      font-weight: normal;
      font-style: normal;
    }

    :root {
      --font-family-abeezee: 'ABeeZee', sans-serif;
      --font-family-cossette-texte: 'Cossette Texte', sans-serif;
      --font-family-koulen: 'Koulen', sans-serif;
      --text-white: rgba(255, 255, 255, 1);
      --text-rgb-23-22-22: rgba(23, 22, 22, 1);
      --text-rgb-227-220-220: rgba(227, 220, 220, 1);
      --text-rgb-0-229-50: rgba(0, 229, 50, 1);
    }

    .text-white {
      color: var(--text-white);
    }

    .text-rgb-23-22-22 {
      color: var(--text-rgb-23-22-22);
    }

    .text-rgb-227-220-220 {
      color: var(--text-rgb-227-220-220);
    }

    .text-rgb-0-229-50 {
      color: var(--text-rgb-0-229-50);
    }

    /* CSS Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      width: 100%;
      min-height: 100vh;
      overflow-x: hidden;
      background-color: rgba(0, 34, 68, 1);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    .login-43 {
      width: 100%;
      max-width: 1440px;
      padding: 24px;
      background-color: rgba(0, 34, 68, 1);
      display: flex;
      gap: 40px;
    }

    @media (max-width: 1440px) {
      .login-43 {
        padding-left: 24px;
        padding-right: 24px;
      }
    }

    @media (max-width: 768px) {
      .login-43 {
        padding-left: 16px;
        padding-right: 16px;
        flex-direction: column;
      }
    }

    .rectangle-793-44 {
      flex: 1;
      border: 0.7332361340522766px solid rgba(255, 255, 255, 1);
      border-radius: 39.00575637817383px;
      padding: 40px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .group-555-45 {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .tombol-info-saldo-46 {
      background-color: rgba(255, 255, 255, 1);
      border-radius: 7.332361698150635px;
      padding: 15px 30px;
      box-shadow: 0px 0px 4.399416446685791px 0px rgba(0,0,0,0.5);
      cursor: pointer;
      border: none;
    }

    .text-48 {
      text-align: center;
      font-family: var(--font-family-abeezee);
      font-weight: normal;
      font-size: 11.054764747619629px;
      letter-spacing: -5%;
      line-height: 10.654254913330078px;
      text-decoration: none;
      text-transform: none;
      color: var(--text-white);
    }

    .text-49 {
      text-align: center;
      font-family: var(--font-family-cossette-texte);
      font-weight: normal;
      font-size: 14.664006233215332px;
      letter-spacing: -5%;
      line-height: 20.301048278808594px;
      text-decoration: none;
      text-transform: none;
      color: var(--text-rgb-23-22-22);
    }

    .group-563-50 {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .group-560-51 {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .tombol-info-saldo-52 {
      background-color: rgba(255, 255, 255, 1);
      border-radius: 7.332361698150635px;
      padding: 15px 30px;
      box-shadow: 0px 0px 4.399416446685791px 0px rgba(0,0,0,0.5);
      cursor: pointer;
      border: none;
      flex: 1;
    }

    .text-54 {
      text-align: center;
      font-family: var(--font-family-cossette-texte);
      font-weight: normal;
      font-size: 10.998541831970215px;
      letter-spacing: -5%;
      line-height: 14.778769493103027px;
      text-decoration: none;
      text-transform: none;
      color: var(--text-white);
    }

    .image-8-55 {
      width: 24px;
      height: 24px;
    }

    .text-56 {
      text-align: center;
      font-family: var(--font-family-cossette-texte);
      font-weight: normal;
      font-size: 12.46501350402832px;
      letter-spacing: -5%;
      line-height: 21.602161407470703px;
      text-decoration: none;
      text-transform: none;
      color: var(--text-rgb-227-220-220);
    }

    .text-57 {
      text-align: center;
      font-family: var(--font-family-cossette-texte);
      font-weight: normal;
      font-size: 12.46501350402832px;
      letter-spacing: -5%;
      line-height: 21.602161407470703px;
      text-decoration: none;
      text-transform: none;
      color: var(--text-rgb-0-229-50);
    }

    .text-58 {
      text-align: center;
      font-family: var(--font-family-cossette-texte);
      font-weight: normal;
      font-size: 14.66472339630127px;
      letter-spacing: -5%;
      line-height: 21.602161407470703px;
      text-decoration: none;
      text-transform: none;
      color: var(--text-rgb-227-220-220);
    }

    .text-59 {
      text-align: center;
      font-family: var(--font-family-cossette-texte);
      font-weight: normal;
      font-size: 12.46501350402832px;
      letter-spacing: -5%;
      line-height: 21.602161407470703px;
      text-decoration: none;
      text-transform: none;
      color: var(--text-rgb-227-220-220);
    }

    .text-60 {
      text-align: center;
      font-family: var(--font-family-cossette-texte);
      font-weight: normal;
      font-size: 14.66472339630127px;
      letter-spacing: -5%;
      line-height: 21.602161407470703px;
      text-decoration: none;
      text-transform: none;
      color: var(--text-rgb-227-220-220);
    }

    .text-61 {
      box-shadow: 0px 3.1123321056365967px 3.1123321056365967px 0px rgba(0,0,0,0.5);
      text-align: left;
      font-family: var(--font-family-koulen);
      font-weight: normal;
      font-size: 31.123319625854492px;
      letter-spacing: -5%;
      line-height: 14.9978666305542px;
      text-decoration: none;
      text-transform: none;
      color: var(--text-white);
    }

    .container-63 {
      background-color: rgba(255, 255, 255, 1);
      border-radius: 7.332361698150635px;
      padding: 15px;
      border: none;
    }

    .tombol-info-saldo-62 {
      background-color: rgba(255, 255, 255, 1);
      border-radius: 7.332361698150635px;
      padding: 15px;
      box-shadow: 0px 0px 4.399416446685791px 0px rgba(0,0,0,0.5);
      border: none;
    }

    .container-64 {
      background-color: rgba(255, 255, 255, 1);
      border-radius: 7.332361698150635px;
      padding: 15px;
      border: none;
    }

    .our-logo {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 20px;
    }

    .logo-name-69 {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .vector-1-70 {
      width: 60px;
      height: 60px;
    }

    .text-71 {
      text-align: left;
      font-family: var(--font-family-koulen);
      font-weight: normal;
      font-size: 78.39328002929688px;
      letter-spacing: -4%;
      line-height: 62.714622497558594px;
      text-decoration: none;
      text-transform: none;
      color: var(--text-white);
    }

    .caddle-72 {
      display: flex;
      gap: 5px;
    }

    .rectangle-771-73,
    .rectangle-773-74,
    .rectangle-772-75,
    .rectangle-774-76,
    .rectangle-775-77,
    .rectangle-776-78 {
      background-color: rgba(0, 34, 68, 1);
      width: 10px;
      height: 40px;
    }

    /* Form styling */
    .login-form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .login-form input {
      background-color: rgba(255, 255, 255, 1);
      border-radius: 7.332361698150635px;
      padding: 15px;
      border: none;
      font-family: var(--font-family-cossette-texte);
      font-size: 14px;
      color: rgba(23, 22, 22, 1);
    }

    .login-form input::placeholder {
      color: rgba(227, 220, 220, 1);
    }

    .login-form input:focus {
      outline: none;
    }

    .google-link {
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .register-link {
      text-decoration: none;
    }
  </style>
</head>
<body>
<div class="login-43">
  <div class="rectangle-793-44">
    <p class="text-61"><span class="text-white">Selamat datang kembali</span></p>
    
    <form action="{{ route('login') }}" method="POST" class="login-form">
      @csrf
      <p class="text-58"><span class="text-rgb-227-220-220">Email</span></p>
      <input type="email" name="email" placeholder="Masukkan email kamu" required>
      
      <p class="text-60"><span class="text-rgb-227-220-220">Password</span></p>
      <input type="password" name="password" placeholder="Masukkan password kamu" required>
      
      <div class="group-555-45">
        <button type="submit" class="tombol-info-saldo-46">
          <p class="text-48"><span class="text-white">Masuk</span></p>
        </button>
      </div>
    </form>

    <p class="text-59"><span class="text-rgb-227-220-220">atau</span></p>

    <div class="group-563-50">
      <a href="{{ route('login.google') }}" class="google-link">
        <div class="group-560-51">
          <button type="button" class="tombol-info-saldo-52">
            <p class="text-54"><span class="text-white">Masuk dengan google</span></p>
          </button>
          <img src="{{ asset('assets/google-icon.png') }}" class="image-8-55" alt="Google" />
        </div>
      </a>
    </div>

    <p class="text-56"><span class="text-rgb-227-220-220">Belum punya akun? </span></p>
    <a href="{{ route('register') }}" class="register-link">
      <p class="text-57"><span class="text-rgb-0-229-50">Daftar Sekarang</span></p>
    </a>
  </div>

  <div class="our-logo">
    <div class="logo-name-69">
      <img src="{{ asset('assetss/auth-logo.png') }}" class="vector-1-70" alt="Logo" />
      <p class="text-71">ANO TRACKER</p>
    </div>
    <div class="caddle-72">
      <div class="rectangle-771-73"></div>
      <div class="rectangle-773-74"></div>
      <div class="rectangle-772-75"></div>
      <div class="rectangle-774-76"></div>
      <div class="rectangle-775-77"></div>
      <div class="rectangle-776-78"></div>
    </div>
  </div>
</div>
</body>
</html>