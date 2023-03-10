<!-- Scritto da: Antonio Gravina, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>Homepage</title>
    <script src="https://kit.fontawesome.com/c1bc715f60.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}"> 
    <script type="text/javascript" src="{{ asset('js/carouselHomepage.js') }}"></script>

    
    @for($i = 1; $i <= $pizzaNumber; $i++)
    <style>  
      div.item:nth-of-type({{ $i }}) {
        --offset: {{ $i }};
      }

      input:nth-of-type({{ $i }}) {
      display: none;
      }

      input:nth-of-type({{ $i }}):checked ~ main#carousel {
      --position: {{ $i }};
      }
    </style>
    @endfor

</head>
<body class="homepage">
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
    <h1>I love pizza</h1>

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
<img id="rotatingpizza" src="/img/rotatingpizza.png">
@for($i = 1; $i <= $pizzaNumber; $i++)
  @if($i == 1)
  <input type="radio" name="position" id="radio{{ $i }}" checked onclick="buttonDisappear('back');buttonAppear('forward')"/>
  @elseif($i == $pizzaNumber)
  <input type="radio" name="position" id="radio{{ $i }}" onclick="buttonDisappear('forward');buttonAppear('back')"/>
  @else
  <input type="radio" name="position" id="radio{{ $i }}" onclick="buttonAppear('back');buttonAppear('forward')"/>
  @endif
@endfor
<button type="button" id="back" onclick="clickBack();rotatePizzaBack()"><i class="fa-solid fa-arrow-left"></i></button>
<button type="button" id="forward" onclick="clickForward();rotatePizzaForward()"><i class="fa-solid fa-arrow-right"></i></button>



        <main id="carousel">  
          @foreach($pizzas as $pizza)       
            <div class="item">
                <a href="/pizzas/{{ $pizza->id }}">
                <img src="/img/pizzas/pizza{{ $pizza->id }}.jpg" style="width:100%; height: 90%; object-fit: cover;"> </a>
                <div class="container">
                  <h4><b>{{ $pizza->name }}</b></h4> 
                </div>
              </div>
          @endforeach       
          <main>
            
<script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
</body>


</html>