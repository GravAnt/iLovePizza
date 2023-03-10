<!-- Scritto da: Marco Pernisco, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}">
  <title>Carica la tua ricetta</title>

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
    <script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
  <h1>Carica la tua ricetta</h1>
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
@if (Auth::user()->role == 'admin' or App\Models\User::find(Auth::id())->associations->contains($association_id))
<div class="Form">
  <form method="post" action="/association/{{ $association_id }}/uploadrecipe" enctype="multipart/form-data">
    @csrf
    <h2 id="formTitle">Carica la tua ricetta</h2>
      <input id="uploadImage" type="button" value="Carica immagine" style="margin-left: 3%;" onclick="showFileInput()"> <br>
      <input id="uploadFileInput" class="recipe" type="file" name="image" style="display: none; border-radius: 0px;">
      <br>
      <input type="text" id="formName" name="name" placeholder="Inserisci il nome della ricetta" required autofocus > 
      <br>
      <input id="pizzaType" type="text" name="pizzaType" list="pizzas" placeholder="Inserisci la categoria" required autofocus>
      <datalist id="pizzas">
      @foreach ($pizzaTypes as $pizzaType)
      <option value="{{ $pizzaType->name }}"> <br>
      @endforeach
      </datalist>
      <br>
    <input type="text" id="formIngredients" name="ingredients" placeholder="Inserisci gli ingredienti separati da ','" required autofocus > 
    <br>
    <textarea id="formDescription" name="description" placeholder="Inserisci la descrizione della ricetta" required autofocus rows='8' cols='40'></textarea>
    <br>
    <input type="submit" id="confirm" value="Carica">
    <input type="reset" id="reset" value="Reset" onClick="document.getElementById('description').reset()">

    @else
    <h2>Pagina di errore</h2>
    @endif
  </form>
</div>


<script type="text/javascript" src="{{ asset('js/association.js') }}"></script>

<script>
  //Funzione che mostra il nome del file che è stato caricato
  function showFileInput() {
    document.getElementById("uploadFileInput").style.display = "inline-block";
  }
</script>


</body>
</html>
