<!-- Scritto da: Antonio Gravina, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}"> 
    <title>{{ $pizza->name }}</title>
    <script src="https://kit.fontawesome.com/c1bc715f60.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pizzasStyle.css') }}" >
    <script type="text/javascript" src="{{ asset('js/carouselPizzas.js') }}"></script>

    <script>
    //Funzione che memorizza il numero di associazioni che trattano il tipo di pizza (necessario per il carousel)
    function uploadAssociationNumber() {
          sessionStorage.setItem("associationNumber", {{ $associations->count() }});
    }
    </script>

    @for($i = 1; $i <= $associations->count(); $i++)
    <style>  
      input:nth-of-type({{ $i }}):checked ~ main#carousel {
      --position: {{ $i }};
      }
    </style>
    @endfor

</head>

<body class="body" class="body" onload="uploadAssociationNumber()">
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
    <script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
    <h1> {{ $pizza->name }} </h1>

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
<section id="pizzaContainer">
    <img id="coverpic" src="/img/pizzas/pizza{{ $pizza->id }}.jpg">
    <div id="pizzasData">
        <h2><b>{{ $pizza->name }}</b></h2>
        <p>{{ $pizza->description }}</p>
        <a href="/pizzas/{{ $pizza->id }}/recipes"><input type="button" id="recipes" value="Vai alle ricette"></a>
</section>

     <h1 id="text">Associazioni che trattano questa pizza</h1>

  <section id="pizzaCarousel">
    <button type="button" id="forward" onclick="clickForward()"><i class="fa-solid fa-arrow-right"></i></button> 
    <button type="button" id="back" onclick="clickBack()"><i class="fa-solid fa-arrow-left"></i></button>
    @for($i = 1; $i <= $associations->count(); $i++)
      @if($i == 1)
          <input type="radio" name="position" id="radio{{ $i }}" checked style="opacity: 0; pointer-events: none;">
      @else
          <input type="radio" name="position" id="radio{{ $i }}" style="opacity: 0; pointer-events: none;">
      @endif
    @endfor
        <main id="carousel">
        @foreach($associations as $association)
            @if($association->photo)
            <div class="item" style="background-image: url('/img/associations/{{ $association->photo->name }}'); --offset: {{ $loop->iteration }}; cursor: pointer;" onclick="window.location='/association/{{ $association->id }}';">
            @else
            <div class="item" style="background-image: url('/img/associations/associazioneDefault.jpg'); --offset: {{ $loop->iteration }}; cursor: pointer;" onclick="window.location='/association/{{ $association->id }}';"> 
            @endif
            
                <div class="container">
                  <h4><b>{{ $association->name }}</b></h4> 
                  <p>Fondata da: {{ App\Models\User::find($association->founder)->name }}</p> 
                </div>
            </div>
        @endforeach         
        <main>
    </section>
</body>
</html>