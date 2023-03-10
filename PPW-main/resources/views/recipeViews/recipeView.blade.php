<!-- Scritto da: Antonio Gravina, Marco Pernisco, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $recipe->name }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/recipeStyle.css') }}" >
    <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}">
   
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
    <h1>{{ $recipe->name }}</h1>
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
                @if(App\Models\Membership::where('association_id', $association_id)->where('user_id', Auth::id())->first())
                    @if (Auth::user()->role == 'admin' or App\Models\Membership::where('association_id', $association_id)->where('user_id', Auth::id())->first()->moderator
                    or Auth::id() == $recipe->user_id)
                        <li><a href="/association/{{ $association_id }}/recipe/{{ $recipe->id }}/deleterecipe">Cancella Ricetta</a></li>
                    @endif
                @endif
            @endauth
       </ul>
    </nav>
</header>

<section id='structure_page'>
<button id="buttonTop"><i class="fa-solid fa-arrow-up"></i></button>
<section id ="ingredients">
<img id="recipe_photo" src="/img/recipes/{{ $photo }}">
<div id="ingredients_container">
    <div id="ingredients_recipe">
        <ul>
        @foreach (explode(',',  $recipe->ingredients ) as $ingredient)
        <li>
        {{ $ingredient }}
        </li>
        @endforeach
        </ul>
    </div>
</div>
</section>
<section id="container_recipe">
<h2>Preparazione:</h2>
<p>{{ $recipe->description }}</p>
</section>
@auth
@if (Auth::user()->role == 'admin' or App\Models\User::find(Auth::id())->associations->contains($association_id))
    <div id="container_insert_comment">
        <h2>Commenta la ricetta</h2>
        <form method="post" action ="/association/{{ $association_id }}/recipe/{{ $recipe->id }}" enctype="multipart/form-data">
        @csrf
        <textarea id="description" name="description" placeholder="Inserisci qui un commento..."  rows='6' cols='80'></textarea>
        <input type="submit" id="confirm" value="Invia"/>
        <input type="reset" id="reset" value="Reset" onClick="document.getElementById('description').reset()">
        </form>
    </div>
@endif                                    
@endauth

<div id="container_comments">
    <h2>Commenti</h2>
    @foreach ($comments as $comment)
    <div id="comment">
    <section id="comment_data">
    @if($comment->user->photo)
        <div id="user_photo_container">
        <img id="user_photo" src="/img/propics/{{ $comment->user->photo->name }}"> 
        </div>
    @else
        <div id="user_photo_container">
        <img id="user_photo" src="/img/propics/default.jpg"> 
        </div>
    @endif
    <form method="post" action="/association/{{ $association_id }}/recipe/{{ $recipe->id }}/deleteComment/{{ $comment->id }}">
    @csrf
    <p id="comment_date_name">{{ $comment->user->name }} {{ $comment->created_at }} 
    @auth
    @if (Auth::user()->associations->contains($association_id))
        @if(App\Models\Membership::where('association_id', $association_id)->where('user_id', Auth::id())->first()->moderator or Auth::id() == $recipe->user_id or Auth::id() == $comment->user_id)
            <input type="submit" id="delete_comment" value="Cancella"/></p>
        @endif
    @endif
    @if (Auth::user()->role == 'admin' and !App\Models\User::find(Auth::id())->associations->contains($association_id))
        <input type="submit" id="delete_comment" value="Cancella"/></p>
    @endif
    @endauth 
    </form>   
    </section>
    <p>{{ $comment->description }}</p>
    </div>
    @endforeach 
</div>                       

<script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backtoTop.js') }}"></script>
</body>
</html>