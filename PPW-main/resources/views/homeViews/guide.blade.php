<!-- Scritto da: Antonio Gravina, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Guida</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/guide.css') }}" >
    <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}">  

    <style>
        body {
        background-image: url("/img/pizza.png"); 
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
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
    <h1>Guida</h1>
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
<div class="guideBox">
<h2>Come registrarsi?</h2>
<p>Per registrarti devi:<br> 
<ol>
  <li>Cliccare sul tasto "Registrati" in alto a destra</li>
  <li>Riempire il form di registrazione</li>
</ol>
<b>Nota:</b> non è prevista la verifica via mail, ma è necessario usare una mail valida per poter entrare in un'associazione.</p>
<h2>Come modificare il mio profilo?</h2>
<p>Per modificare il profilo devi:<br> 
<ol>
  <li>Cliccare sul menù a tendina in alto a sinistra</li>
  <li>Cliccare su "Profilo"</li>
  <li>Cliccare sul bottone corrispondente all'azione che vuoi eseguire</li>
</ol> </p>
<h2>Cosa fare se ho dimenticato la password?</h2>
<p>Se hai dimenticato la password devi:<br> 
<ol>
  <li>Cliccare sul tasto "Login" in alto a destra</li>
  <li>Cliccare su "Password dimenticata"</li>
  <li>Inserire nel form le credenziali richieste</li>
  <li>Aprire il link ricevuto tramite mail</li>
  <li>Compilare il form per la creazione di una nuova password</li>
</ol> </p>
<h2>Come accedere a un'associazione?</h2>
<p>Per accedere ad un'associazione devi:<br> 
<ol>
  <li>Andare nella homepage</li>
  <li>Cliccare su un tipo di pizza</li>
  <li>Scegliere l'associazione che tratta quel tipo di pizza</li>
  <li>Cliccare su "Richiesta di ingresso"</li>
  <li>Attendere che il rappresentante accetti la richiesta</li>
  <li>Se il rappresentante ha accettato la richiesta, arriverà una mail contenente un link</li>
  <li>Apri il link. Una volta fatto, sarai membro dell'associazione</li>
</ol>
<b>Nota:</b> è possibile che un moderatore dell'associazione possa invitarti senza che tu faccia richiesta. In questo caso non è necessaria la verifica via mail.</p>
<h2>Come faccio a visualizzare una ricetta e aggiungere commenti?</h2>
<p>Per visualizzare una ricetta e aggiungere commenti devi:<br> 
<ol>
  <li>Raggiungere la pagina dell'associazione dove si trova la ricetta</li>
  <li>Cliccare su una ricetta fra quelle presenti nel carousel a destra</li>
  <li>Scrollare la pagina fino a raggiungere il box per inserire un commento</li>
  <li>Scrivere un commento e cliccare su "Invia"</li>
</ol>
<b>Nota:</b> puoi caricare un commento solo se fai parte dell'associazione.</p>
<h2>Come faccio a caricare una ricetta?</h2>
<p>Per caricare una ricetta devi:<br> 
<ol>
  <li>Raggiungere la pagina dell'associazione dove vuoi caricare la ricetta</li>
  <li>Cliccare su "Aggiungi una nuova ricetta"</li>
  <li>Compilare il form</li>
</ol>
<b>Nota:</b> puoi caricare una ricetta solo se fai parte dell'associazione; gli ingredienti devono essere separati da una virgola.</p>
</div>
</section>
<script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
</body>
</html>