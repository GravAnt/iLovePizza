<!-- Scritto da: Antonio Gravina, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Chi siamo</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/info.css') }}" >
    <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}">  

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

     
    <li>
        <button id="menuButton" class="item_menu2" onclick="window.location.href='/'">Profilo</button>
      
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
    <h1>Chi siamo</h1>
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

<section id='structure_page'>
<div class="infoBox">
<h2>Cos'è iLovePizza?</h2>
<p>iLovePizza è un sito in cui gli appassionati di pizze provenienti da tutt'Italia possono parlare, scambiarsi opinioni e ricette. <br> 
L'obiettivo di iLovePizza è la promozione della cultura i segreti delle pizze, dalla tradizione napoletana a quella romana. <br>
Inoltre, è possibile iscriversi a una o più associazioni presenti nel sito, oppure puoi creare una tua associazione dove invitare i tuoi amici! <br> </p>
<h2>Chi c'è dietro iLovePizza?</h2>
<p>iLovePizza è stato fondato da tre giovani appassionati del mondo delle pizze. Il nostro intento è fornire un ritrovo online per tutti coloro <br>
che condividono la nostra passione e che hanno la voglia di sperimentare nuove ricette caricate da altri utenti, o di caricare le proprie ricette personali, <br>
o per esprimere pareri culinari. <br> </p>
<h2>Come contattarci?</h2>
<p>Per qualsiasi informazione puoi inviare una mail al seguente indirizzo: <b>ilovepizzappw@gmail.com</b>.
</p>
</div>
</section>
<script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
</body>
</html>