<!-- Scritto da: Antonio Gravina, Marco Pernisco, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Lista utenti</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
    <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/associationList.css') }}" > 
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
    <h1>Lista Associazioni</h1>
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
            @if (!Auth::user()->associationFounded)
                <li><a href="/createAssociation/first">Crea Associazione</a></li>
            @endif
            @endauth
       </ul>
    </nav>
    </header>
    <section id='structure_page'>
        
        <table>
            <thead>
              @foreach ($associations as $association)
                <tr>
                  <td id="username">{{  $association->name }}</td>
                  <td> <a href="/association/{{ $association->id }}"> <button class="button"> Visualizza Informazioni </button> </a> </td>
                </tr>
                @endforeach
              </thead>
        </table>
</section>
<script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
</body>
</html>