<!-- Scritto da: Antonio Gravina, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>I love pizza - Login</title>

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
    <h1>Login</h1>

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
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf

            <h2 id="formTitle">ACCEDI</h2>

            <!-- Email Address -->
            <div>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Inserisci email" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" 
                                placeholder="Inserisci password"/>
            </div>
            <b> <x-input-error id="formTitle" :messages="$errors->get('email')" style="font-size: 150%;"/>
            <x-input-error id="formTitle" :messages="$errors->get('password')" class="mt-2" style="font-size: 150%;" /> </b>
            <input type="submit" id="confirm" value="Accedi"> <br>
            <a href="/accountRecovery"> <input type="button" id="forgotPassword" value="Password dimenticata"> </a>
        </form>
    </x-auth-card>
    <script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
    </body>

</html> 