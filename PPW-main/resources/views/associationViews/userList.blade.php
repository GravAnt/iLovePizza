<!-- Scritto da: Antonio Gravina, Mattia Siragusa -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Lista utenti</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" >
    <link rel="shortcut icon" href="{{ URL::asset('/img/logo/PizzaLogo.webp') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userList.css') }}" > 
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
    <h1>Lista Utenti</h1>
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
                @foreach($members as $member)
                <tr>
                <td >@if($member->photo)
                                      
                <img id="user_photo" src="/img/propics/{{$member->photo->name}}"> 
                        
                                        @else
                                
             <img id="user_photo" src="/img/propics/default.jpg"> 
                            
                                        @endif
                                   </td>
                  <td id="username"> <a href="/userpage/{{ $member->id }}"> {{ $member->name }} </a> </td>
                 @if ($isMod)
                    <td> <a href="/association/{{ $association->id }}/memberList/removeUser/{{ $member->id }}"> <button class="button"> Rimuovi Utente </button> </a> </td>
                    @if (App\Models\Membership::where('association_id', $association->id)->where('user_id', $member->id)->first()->moderator)
                        <td> <a href="/association/{{ $association->id }}/memberList/removeAssociationMod/{{ $member->id }}"> <button class="button"> Rimuovi Moderatore </button> </a> </td>
                    @else
                        <td> <a href="/association/{{ $association->id }}/memberList/newAssociationMod/{{ $member->id }}"> <button class="button"> Promuovi a Moderatore </button> </a> </td>
                    @endif
                @endif
                </tr>
                @endforeach
              </thead>
        </table>
</section>
<script type="text/javascript" src="{{ asset('js/navMenu.js') }}"></script>
</body>
</html>