<!-- Scritto da: Antonio Gravina, Marco Pernisco, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    

    <title>I love pizza - Userpage</title>

    <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userPage.css') }}" >

    <style>
        body {
        background-image: url("/img/pizza.png"); 
        background-size: cover;
        background-repeat: no-repeat;
        }
    </style>

    <script>
        
            //Questo script serve per far apparire i messaggi di feedback corrispondenti
            function displayFeedback() {
            var referrer = document.referrer;
            if (referrer) {
                switch (sessionStorage.getItem("buttonClicked")) {
                case "changePropic":
                    document.getElementById("changePropicFeedback").style.display = "block";
                    break;
                case "changePassword":
                    document.getElementById("changePasswordFeedback").style.display = "block";
                    break;
                case "changeBio":
                    document.getElementById("changeBioFeedback").style.display = "block";
                    break;
                case "deleteAdmin":
                    document.getElementById("deleteAdminFeedback").style.display = "block";
                    break;
                case "addAdmin":
                    document.getElementById("addAdminFeedback").style.display = "block";
                    break;
                default:
                    break;
                }
            }
        }
        function sectionDisappear(sectionId) {
            document.getElementById(sectionId).style.display = "none";
        }
    </script>


</head>
<body class="body" onload="displayFeedback()">
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
    <h1>Userpage</h1>

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
<button id="buttonTop"><i class="fa-solid fa-arrow-up"></i></button>
<section id="profileContainer">
    <img id="propic" src="/img/propics/{{ $propic->name }}">
    <div id="accountData">
        <h2><b>{{ $user->name }}</b></h2>
        <p><b>BIO UTENTE:</b> {{ $user->bio }}</p>
        <p><b>ISCRITTO IL:</b> {{ $user->created_at }}</p>
        <p><b>ASSOCIAZIONI DI CUI FA PARTE:</b>
        <ul>
        @foreach($associations as $association) 
        <a href="/association/{{ $association->id }}"><li>{{ $association->name}}</li></a>
        @endforeach
        </ul>
        </p>
        @if (Auth::id() == $user->id or App\Models\User::find(Auth::id())->role == 'admin')
        <div id="accountSettings">
           <div class="grid_container"> 
           @if (Auth::id() == $user->id)
                <input class="account" type="button" value="Cambia password" onclick=changePassword()>
            @endif
            <input class="account" type="button" value="Cancella account" onclick=deleteAccount()>
            <input class="account" type="button" value="Modifica bio" onclick=changeBio()> 
            <input class="account" type="button" value="Cambia immagine profilo" onclick=changePropic()> 
            <form method="post" action="/userpage/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            <input id="changePropicFile" class="account" type="file" name="image" style="display: none; border-radius: 0px;">
            <input id="changePropicSubmit" class="account" type="submit" name="Upload" style="margin-left: 3%; display: none;">
            </form>
            @if (Auth::user()->role == 'admin')
                <form method="post" action="/setadmin/{{ $user->id }}">
                @csrf
                @if ($user->role == 'admin')
                    <input type="hidden" name="action" value="removeAdmin" onclick=deleteAdmin()>
                    <input class="account" type="submit" value="Rimuovi amministratore">
                @else
                    <input type="hidden" name="action" value="addAdmin" onclick=addAccount()>
                    <input class="account" type="submit" value="Nomina amministratore">
                @endif
                </form>
            @endif
             </div>
        </div>
        @endif
        <h2 id="changePasswordFeedback" style="display: none;">Password modificata con successo</h2>
        <h2 id="changeBioFeedback" style="display: none;">La bio è stata modificata con successo</h2>
        <h2 id="changePropicFeedback" style="display: none;">Immagine modificata</h2>
        <h2 id="deleteAdminFeedback" style="display: none;">L'utente non è più amministratore</h2>
        <h2 id="addAdminFeedback" style="display: none;">L'utente è diventato amministratore</h2>
    </div>
</section>

<section id="changePasswordContainer">
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <input type="button" id="closeSection" value="X" onclick="sectionDisappear('changePasswordContainer')">
        <div>
            <x-text-input id="old_password" name="old_password" type="password" class="mt-1 block w-full" placeholder="Password corrente" />
            <b><x-input-error :messages="$errors->updatePassword->get('old_password')" class="mt-2" style="color:red; font-size:150%;"/></b>
        </div>

        <div>
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" placeholder="Nuova password" />
            <b><x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" style="color:red; font-size:150%;"/></b>
        </div>

        <div>
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" placeholder="Conferma password" />
            <b><x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" style="color:red; font-size:150%;"/> </b>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button id="confirm">{{ __('Conferma') }}</x-primary-button>
        </div>
    </form>
</section>

<section id="deleteAccountContainer">
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')
            <input type="button" id="closeSection" value="X" onclick="sectionDisappear('deleteAccountContainer')">
            @if (App\Models\User::find($user->id)->role == 'admin')
                <h2 class="text-lg font-medium text-gray-900">Non è possibile cancellare l'account dell'admin.</h2>
            @else
                <h2 class="text-lg font-medium text-gray-900">Sei sicuro di voler cancellare l'account?</h2>
                @if (Auth::user()->role == 'admin')
                    <input type="button" class="account" value="Conferma" onclick="window.location.href='/userpage/{{ $user->id }}/delete'">
                @else
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Una volta cancellato questo account non sarà più possibile recuperarlo. Inserisci la tua password per continuare.') }}
                    </p>

                    <div class="mt-6">
                        <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Password"
                        />

                        <b><x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" style="color:red; font-size:150%;"/></b>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-danger-button class="account">
                            {{ __('Cancella Account') }}
                        </x-danger-button>
                    </div>
                @endif
            @endif
        </form>
</section>

<section id="changeBioContainer">
    <h2 class="text-lg font-medium text-gray-900">Inserisci la tua nuova bio</h2>
    <form method="post" action="/userpage/{{ $user->id }}/bio">
    @csrf
    <input type="button" id="closeSection" value="X" onclick="sectionDisappear('changeBioContainer')">
    <textarea id="bio" name="bio" rows="4" cols="50" placeholder="Inserisci una bio">
    </textarea> <br>
    <input class="account" type="submit" value="Conferma">
    </form>
</section>

<script type="text/javascript" src="{{ asset('js/userPage.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backtoTop.js') }}"></script>
</body>

</html>