<!-- Scritto da: Antonio Gravina, Marco Pernisco, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>Recupero account</title>

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

<body class="body">
<ul class="navMenu">
    <li>
        <button id="menuButton" class="item_menu1" onclick="window.location.href='/'">Home</button>

    </li>

     
     @auth
    <li>
        <button id="menuButton" class="item_menu2" onclick="window.location.href='/userpage/{{ Auth::id() }}'">Profilo</button>
      
    </li>
       @endauth


    <li>
        <button id="menuButton" class="item_menu3" onclick="window.location.href='/associationList'">Associazioni</button>
       
    </li>

    <li>
        <button id="menuButton" class="item_menu4" onclick="window.location.href='/info'">Chi siamo</button>

        
    </li>
</ul>
<header>
<div class="nav-icon">
        <div class="line line1"></div>
        <div class="line line2"></div>
        <div class="line line3"></div>
        <a class="menu_icon" href="#"><i class="material-icons"></i> </a>
    </div>
    <h1>Recupera l'account</h1>

  <nav>
        <ul id="menu">
            <li><a href="/">Home</a></li>
            <li><a href="/guide">Guida</a></li>
            @guest
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Registrati</a></li>
            @endguest

            @auth
            <li><a href="/logout">Logout</a></li>
            @endauth
       </ul>
    </nav>
</header></header>

<div class="Form">
    <form id="loginForm" method="POST" action="/accountRecovery">
        @csrf
        <h2 id="formTitle">RECUPERO ACCOUNT</h2>
        <input id="name" type="text" name="username" placeholder="Inserisci il tuo username" required> <br>
        <input id="email" type="email" name="email" placeholder="Inserisci la tua email" required> <br>
        <input type="submit" id="confirm" value="Continua">
    </form>
</div>
<script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
</body>
</html>