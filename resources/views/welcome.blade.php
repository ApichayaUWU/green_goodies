<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=manjari:700" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
    }

    body {
      background-image: url('{{ asset('storage/images/bg.png') }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      font-family: 'manjari';
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: #4C4343;
      position: relative;
    }

    h1 {
      color: #4C4343;
    }

    h2 {
      color: #6A6B7C;
    }

    h5 {
      color: #7D7D7D;
      padding-top: 10px;
    }

    nav {
      display: flex;
      justify-content: center;
      gap: 20px;
      padding-top: 20px;
    }

    nav a img {
      width: 112px;
      height: 40px;
      transition: transform 0.3s ease, opacity 0.3s ease;
    }

    nav a.login img {
      content: url('{{ asset('storage/images/login.png') }}');
    }

    nav a.login:hover img {
      content: url('{{ asset('storage/images/loginhovered.png') }}');
    }

    nav a.register img {
      content: url('{{ asset('storage/images/register.png') }}');
    }

    nav a.register:hover img {
      content: url('{{ asset('storage/images/registerhovered.png') }}');
    }

    nav a.shopnow img {
      content: url('{{ asset('storage/images/shopnow.png') }}');
      width: 170px !important; /* Set specific width for shop now button */
      height: auto !important; /* Maintain aspect ratio */
    }

    nav a.shopnow:hover img {
      content: url('{{ asset('storage/images/shopnowhovered.png') }}');
    }

    .corner-image1 {
      position: absolute;
      width: 350px;
      height: auto;
    }

    .corner-image2 {
      position: absolute;
      width: 330px;
      height: auto;
    }

    .bottom-left {
      bottom: 0px;
      left: 0px;
    }

    .top-right {
      top: 0px;
      right: 0px;
    }

  </style>
</head>
<body>
  <h1>Welcome to Green Goodies Mart</h1>
  <h2>Goodies Grown with Love</h2>
  
  @if (Route::has('login'))
    <nav>
      @auth
      <a href="{{ route('home') }}" class="shopnow">
        <img src="{{ asset('storage/images/shopnow.png') }}" alt="Shop now">
      </a>
      @else
        <a href="{{ route('login') }}" class="login">
          <img src="{{ asset('storage/images/login.png') }}" alt="Log in">
        </a>

        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="register">
            <img src="{{ asset('storage/images/register.png') }}" alt="Register">
          </a>
        @endif
      @endauth
    </nav>
  @endif
  
  <h5>Please log in before shopping. If you don't have an account, please register.</h5>

  <img src="{{ asset('storage/images/component1.png') }}" alt="Corner Left" class="corner-image1 bottom-left">
  <img src="{{ asset('storage/images/component2.png') }}" alt="Corner Right" class="corner-image2 top-right">
</body>
</html>
