<!-- Scritto da: Antonio Gravina, Marco Pernisco, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}"> 
    <title>Base</title>
    <script src="https://kit.fontawesome.com/c1bc715f60.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/associationPage.css') }}" >
    <script type="text/javascript" src="{{ asset('js/carouselAssociation.js') }}"></script>

    <script>
 
        //Funzione che memorizza il numero di ricette caricate in un'associazione (necessario per il carousel)
        function uploadRecipeNumber() {
            sessionStorage.setItem("recipeNumber", {{ $recipes->count() }});
        }

        //Questo script serve per far apparire i messaggi di feedback corrispondenti
        function displayFeedback() {
            var referrer = document.referrer;
            if (referrer) {
                switch (sessionStorage.getItem("buttonClicked")) {
                case "changeCoverpic":
                    document.getElementById("changeCoverpicFeedback").style.display = "block";
                    break;
                case "addMember":
                    document.getElementById("newMemberFeedback").style.display = "block";
                    break;
                case "leaveAssociation":
                    document.getElementById("leaveAssociationFeedback").style.display = "block";
                    break;
                case "joinAssociation":
                    document.getElementById("joinAssociationFeedback").style.display = "block";
                    break;
                default:
                    break;
                }
            }
            sessionStorage.setItem("buttonClicked", "none");
        }

        function sectionDisappear(sectionId) {
            document.getElementById(sectionId).style.display = "none";
        }
    </script>

    @for($i = 1; $i <= $recipes->count(); $i++)
    <style>  
      input:nth-of-type({{ $i }}):checked ~ main#carousel {
      --position: {{ $i }};
      }
    </style>
    @endfor

</head>

<body class="body" onload="uploadRecipeNumber();displayFeedback();checkDatalist()">
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
    <h1>{{ $association->name }}</h1>

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
<section id="titles">
<h3 id="association_text">Informazioni sull'associazione</h3>
<h3 id="recipes">Ricette caricate</h3>
</section>
<section id="associationContainer">
    <img id="coverpic" src="/img/associations/{{ $photoName }}">
    <div id="associationData">
        <h2><b>{{ $association->name }}</b></h2>
        <p>RAPPRESENTANTE: {{ $association->getFounder->name }}</p>
        <p>FONDATA IN DATA: {{ $association->created_at }}</p>
        <div id="associationSettings"> 
        @auth
            <a href="/association/{{ $association->id }}/memberList"><input class="account" type="button" value="Lista membri"></a>
                @if (Auth::user()->role == 'admin' or in_array(Auth::user(), $moderators))
                    <input class="account" type="button" value="Aggiungi membro" style="margin-left: 3%;" onclick=addMember()> 
                    <a href="/association/{{ $association->id }}/uploadrecipe"><input class="account" type="button" value="Aggiungi una nuova ricetta"></a> <br>
                    <input class="account" type="button" value="Cambia copertina" onclick=changeCoverpic()> 
                    @if (Auth::user()->role == 'admin' or Auth::user()->associationFounded)
                        @if (Auth::user()->role == 'admin' or Auth::user()->associationFounded->id == $association->id)
                            <input class="account" type="button" value="Rimuovi associazione" style="margin-left: 3%;" onclick=deleteAssociation()> <br>
                        @endif
                    @endif
                        <form method="post" action="/association/{{ $association->id }}" enctype="multipart/form-data">
                    @csrf
                    <input id="changeCoverpicFile" class="account" type="file" name="image" style="display: none; border-radius: 0px;">
                    <input id="changeCoverpicSubmit" class="account" type="submit" name="Upload" style="margin-left: 3%; display: none;">
                    <h2 id="changeCoverpicFeedback" style="display: none;">Immagine caricata con successo</h2>
                    <h2 id="newMemberFeedback" style="display: none;">L'utente Ã¨ stato invitato</h2>
                    <h2 id="leaveAssociationFeedback" style="display: none;">Hai abbandonato l'associazione</h2>
                    <h2 id="joinAssociationFeedback" style="display: none;">Richiesta inviata con successo</h2>
                    </form>
                @else
                    @if (in_array(Auth::user(), $members))
                        <a href="/association/{{ $association->id }}/leave"><input class="account" type="button" value="Lascia l'associazione" style="margin-left: 3%;" onclick=leaveAssociation()></a>
                        <a href="/association/{{ $association->id }}/uploadrecipe"><input class="account" type="button" value="Aggiungi una nuova ricetta" style="margin-left: 3%;"></a> <br>
                    @else
                        <a href="/association/{{ $association->id }}/join"><input class="account" type="button" value="Richiesta di ingresso" onclick=joinAssociation()></a> <br>
                    @endif
                @endif
            @endauth
        </div>
    </div>
</section>


<section id="pizzaCarousel">
    @if($recipes->count() != 1)
    <button type="button" id="forward" onclick="clickForward()"><i class="fa-solid fa-arrow-down"></i></button> 
    <button type="button" id="back" onclick="clickBack()"><i class="fa-solid fa-arrow-up"></i></button>
    @endif
    @for($i = 1; $i <= $recipes->count(); $i++)
    @if($i == 1)
        <input type="radio" name="position" id="radio{{ $i }}" checked style="opacity: 0; pointer-events: none;">
    @else
        <input type="radio" name="position" id="radio{{ $i }}" style="opacity: 0; pointer-events: none;">
    @endif
    @endfor
    <main id="carousel"> 
        @foreach($recipes as $recipe)
        <a href="/association/{{ $association->id }}/recipe/{{ $recipe->id }}">
        @if($loop->iteration == 1)
            <div class="item" style="background-image: url('/img/recipes/{{ $recipe->photo->name }}'); --offset: {{ $loop->iteration }}; margin-left: -{{ 65 * $recipes->count() }}%;"> 
        @else
            <div class="item" style="background-image: url('/img/recipes/{{ $recipe->photo->name }}'); --offset: {{ $loop->iteration }}; margin-left: -{{ 65 * $recipes->count() + 100 * ($loop->iteration - 1) }}%;"> 
        @endif
            <h2 id="pizzaName">{{ $recipe->name }}</h2> 
        </div>  
        </a>
        @endforeach             
      <main>
</section>

<section id="blocks">
    
<section id="addMemberContainer">
<h2 class="text-lg font-medium text-gray-900">Seleziona un membro da invitare</h2>
    <form method="post" action="/association/{{ $association->id }}/inviteMember">
    @csrf
    <input type="button" id="closeSection" value="X" onclick="sectionDisappear('addMemberContainer')">
    <input type="text" name="newMember" list="users">
    <datalist id="users">
    @foreach($potentialMembers as $user)
        <option value="{{ $user->name }}">
    @endforeach
    </datalist>
    <input class="account" type="submit" value="Invita">
    </form>
</section>

<section id="deleteAssociationContainer">
<h2 class="text-lg font-medium text-gray-900">Sei sicuro di voler rimuovere l'associazione?</h2>
    <form method="post" action="/association/{{ $association->id }}/delete">
    @csrf
    <input type="button" id="closeSection" value="X" onclick="sectionDisappear('deleteAssociationContainer')">
    <input class="account" type="submit" value="Conferma">
    </form>
</section>

</section>

<script type="text/javascript" src="{{ asset('js/association.js') }}"></script>

</body>
</html>