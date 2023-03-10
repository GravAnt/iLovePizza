<!-- Scritto da: Antonio Gravina, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>I love pizza - Registrati</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Form.css') }}" >

  
    <style>
        body {
        background-image: url("/img/pizza.png"); 
        background-size: cover;
        background-repeat: no-repeat;
        }
    </style>

<script>
        function checkPassword() {
            var err = false;
    if (document.getElementById("password").value != document.getElementById("password_confirmation").value) {
        document.getElementById("passwCheckErr").style.display = "block";
        document.getElementById("confirm").style.backgroundColor = "rgb(248, 248, 237)";
        err = true;
    }

    if (document.getElementById("password").value.length < 8) {
        document.getElementById("passwCheckLength").style.display = "block";
        document.getElementById("confirm").style.backgroundColor = "rgb(248, 248, 237)";
        err = true;
    }

    if (err) {
        event.preventDefault();
    }
    }
    </script>

</head>

<body class="body" style="background-color: rgb(255, 253, 239);">
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
    <h1>Registrati</h1>

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
</header></header>

<div class="Form">
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h2 id="formTitle">REGISTRATI</h2>

            <!-- Name -->
            <div>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Inserisci username" required autofocus />
                <b> <x-input-error :messages="$errors->get('name')" class="mt-2" style="font-size: 150%;"/> </b>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Inserisci email" style="margin-top: 3%;" required />
                <b> <x-input-error :messages="$errors->get('email')" class="mt-2" style="font-size: 150%;"/> </b>
            </div>

            <!-- Password -->
            <div class="mt-4">

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Inserisci password"
                                required autocomplete="new-password" />

            </div>

            <!-- Confirm Password -->
            <div class="mt-4">

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" 
                                placeholder="Conferma password" required />

            </div>

            
            <b> <p class="noselect" id = "passwCheckErr" style = "display: none; font-size: 20px;">Errore: le due password non coincidono</p> </b>
            <b> <p class="noselect" id = "passwCheckLength" style = "display: none; font-size: 20px;">La password deve avere almeno 8 caratteri</p> </b>

            <input type="submit" id="confirm" value="Registrati" onclick="checkPassword()">
        </form>
    </x-auth-card>
    </div>
    <script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
    </body>
    </html>
