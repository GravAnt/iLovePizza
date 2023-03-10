<!-- Scritto da: Antonio Gravina, Marco Pernisco, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>Base</title>

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

    </li>

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
    <h1>Reset della Password</h1>

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
</header>
</header>

<div class="Form">
<form id="loginForm" method="POST" action="/accountRecovery/{{ $user_id }}/resetPassword">
            @csrf
            @if(session('status') == 'updated')
                <h2 id="formTitle">PASSWORD CAMBIATA CON SUCCESSO</h2>
            @else
                <h2 id="formTitle">RECUPERO ACCOUNT</h2>
                <b><p id="errorMessage" style="color: transparent; user-select: none; font-size: 1%;">Errore: verifica che la password sia di almeno 8 caratteri e che i due campi coincidano</p></b> <br>
                <input type="password" name="password" placeholder = "Inserisci Password" required> <br>
                <input type="password" name="password_confirmation" placeholder = "Conferma Password" required> <br>
                <input type="submit" value="Conferma">
            @endif

        </form>

        <script>
        // Funzione che mostra messaggi di errore
        if(document.referrer) {
            document.getElementById("errorMessage").style.color = "red";
            document.getElementById("errorMessage").style.fontSize = "125%";
        }
        </script>
         <script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
</body>
</html> 