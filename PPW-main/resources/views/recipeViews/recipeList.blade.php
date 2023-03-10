<!-- Scritto da: Antonio Gravina, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Lista Ricette</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
    <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/recipeList.css') }}" > 
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
    <h1>Lista Ricette</h1>
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
        
        <table>
            <thead>
                @foreach($recipes as $recipe)
                <tr>
                <td id="username"> <a href="/association/{{ $recipe->association_id }}/recipe/{{ $recipe->id }}">{{ $recipe->name }}</a> </td>
                <td id="association"> <b>Caricata in: </b><a href="/association/{{ $recipe->association_id }}"> <button class="button"> {{ $recipe->association->name }}</button> </a> </td>
                <td id="creator"> <b>Autore: </b><a href="/userpage/{{ $recipe->user->id }}"> <button class="button">  {{ $recipe->user->name }} </button></a> </td>
                </tr>
                @endforeach
              </thead>
        </table>
</section>
<script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
</body>
</html>