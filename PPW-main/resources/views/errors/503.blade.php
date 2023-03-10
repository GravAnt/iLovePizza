<!-- Scritto da: Marco Pernisco, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}">
  <title>Error - 503</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
  <link rel="stylesheet" type="text/css" href="{{ asset('css/Form.css') }}" >

  <style>
    body {
      background-image: url("/img/pizza.png");
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
</head>
<body class="body" class="errorpage">
<ul class="navMenu">
    <li>
        <button id="menuButton" class="item_menu1" onclick="window.location.href='/'">Home</button>

    </li>

         <li>
       @auth
    <li>
        <button id="menuButton" class="item_menu2" onclick="window.location.href='/userpage/{{ Auth::id() }}'">Profilo</button>
      
    </li>
       @endauth

      
    </li>


    <li>
        <button id="menuButton" class="item_menu3" onclick="window.location.href='/associationList'">Associazioni</button>
       
    </li>

    <li>
        <button id="menuButton" class="item_menu4" href="#">Chi siamo</button>
        
    </li>
</ul>
<header>
<div class="nav-icon">
        <div class="line line1"></div>
        <div class="line line2"></div>
        <div class="line line3"></div>
        <a class="menu_icon" href="#"><i class="material-icons"></i> </a>
    </div>
  <h1>Operazione non andata a buon fine - Error 503</h1>
</header>
<div class="errorForm">
  <form method="get" enctype="multipart/form-data">
    @csrf
    <br>
    <img id="status_photo" src="/img/error_image.jpg" width="400px">
    <br>
    <a href="/"><input type="button" id="backHome" value="Ritorna alla home"></a>
  </form>
</div>
<script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>

</body>
</html>