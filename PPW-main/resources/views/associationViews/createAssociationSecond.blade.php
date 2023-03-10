<!-- Scritto da: Antonio Gravina, Mattia Siragusa -->
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

<body class="body" onload="checkDatalist()">
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
    <h1>Crea Associazione</h1>

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

<div class="Form">
    <form method="post" action="/createAssociation/{{ $newAssociationId }}/{{ $pizzaTypesNumber }}">
        @csrf
        <h2>Inserisci le categorie di pizza trattate</h2>
        @for ($i = 1; $i <= $pizzaTypesNumber; $i++)
            <input id="pizzaType" type="text" name="pizzaType{{ $i }}" list="pizzas">
            <datalist id="pizzas">
            @foreach ($pizzaTypes as $pizzaType)
                <option value="{{ $pizzaType->name }}"> <br>
            @endforeach
            </datalist>
        @endfor
        <br>
        <input id="confirm"type="submit" value="Continua">
        <input type="reset" id="reset" value="Reset" onClick="document.getElementById('description').reset()">
    </form>
</div>

<script type="text/javascript" src="{{ asset('js/association.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
</body>
</html> 