<?php

namespace App\Http\Controllers;

use App\Mail\AssociationInvite;
use App\Mail\AssociationAcceptedMember;
use App\Mail\AssociationRequest;
use App\Models\Association;
use App\Models\Pizza;
use App\Models\User;
use App\Models\AssociationPizza;
use App\Models\Membership;
use App\Models\Recipe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/**
 * Scritto da: Antonio Gravina
 */
class AssociationController extends Controller
{
    //Funzione per la creazione di una nuova associazione
    public function createAssociation(Request $request)
    {
        $association = new Association();
        $lastId = Association::max('id');
        $lastId++;
        $association->id = $lastId;
        $association->name = $request->input('associationName');
        $association->founder = Auth::id();
        $association->save();
        $data = ['pizzaTypesNumber' => $request->input('pizzaTypesNumber'), 'pizzaTypes' => Pizza::all(), 'newAssociationId' => $lastId,];

        return view('associationViews.createAssociationSecond', $data); //Riporta al secondo step della creazione
    }

    //Funzione che completa l'upload di un'associazione
    public function uploadAssociation(Request $request, $association_id, $pizzaTypesNumber)
    {
        for ($i = 1; $i <= $pizzaTypesNumber; $i++) {
            $associationPizza = new AssociationPizza();
            $associationPizza->association_id = $association_id;
            $inputName = 'pizzaType' . strval($i);
            $pizza = Pizza::where('name', $request->input($inputName))->first();
            $associationPizza->pizza_id = $pizza->id;
            $associationPizza->save();
        }
        $membership = new Membership();
        $membership->user_id = Auth::id();
        $membership->association_id = $association_id;
        $membership->token = Hash::make(Str::random(16));
        $membership->verified = 1;
        $membership->moderator = 1;
        $membership->save();

        return view('homeViews.confirmView'); //Riporta alla view di conferma
    }

    //Funzione che rimuove un'associazione
    public function deleteAssociation($association_id)
    {
        Recipe::where('association_id', $association_id)->delete();
        Membership::where('association_id', $association_id)->delete();
        AssociationPizza::where('association_id', $association_id)->delete();
        Association::find($association_id)->delete();

        return view('homeViews.confirmView');
    }

    //Funzione che riporta alla pagine di un'associazione
    public function showAssociation($id)
    {
        $association = Association::find($id);
        if ($association->photo == null) {
            $photoName = 'associazioneDefault.jpg';
        } else {
            $photoName = $association->photo->name;
        }
        $users = User::all();
        $potentialMembers = [];
        $members = [];
        $moderators = [];
        foreach ($users as $user) {
            $associations = $user->associations()->get();
            if ($associations->contains($association)) {
                $isVerified = Membership::where('user_id', $user->id)->where('association_id', $association->id)->first()->verified;
                if($isVerified) {
                    $members[] = $user; //Ottengo un'array contenente gli utenti che fanno parte di quell'associazione
                    if (Membership::where('association_id', $id)->where('user_id', $user->id)->value('moderator') == '1') {
                        $moderators[] = $user;
                    }
                }
            } else {
                $potentialMembers[] = $user; //Ottengo un'array contenente gli utenti che non fanno parte di quell'associazione
            }
        }

        $data = ['association' => $association, 'photoName' => $photoName, 'potentialMembers' => $potentialMembers, 'members' => $members, 'moderators' => $moderators, 'recipes' => $association->recipes];
        return view('associationViews.association', $data);
    }

    //Funzione che consente a un moderatore di invitare dei nuovi utenti
    public function inviteMember(Request $request, $id)
    {
        $username = $request->input('newMember');
        $associationName = Association::find($id)->name;
        $user = User::all()->where('name', $username)->first();
        $token = Str::random(16);
        Membership::insert(['user_id' => $user->id, 'association_id' => $id, 'token' => Hash::make($token), 'verified' => '1', 
        'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        $title = "Sei stato invitato all'associazione " . $associationName;
        $body = "localhost:8000/association/" . strval($id);
        $details = [
            'title' => $title,
            'body' => $body,
        ];

        Mail::to($user->email)->send(new AssociationInvite($details));
        return view('homeViews.confirmView');
    }

    //Funzione che permette a un utente di lasciare un'associazione 
    public function leaveAssociation(Request $request, $association_id)
    {
        $user = $request->user();
        Membership::where('user_id', $user->id)->where('association_id', $association_id)->delete();
        return view('homeViews.confirmView');
    }

    //Funzione che permette a un'utente di richiedere di entrare in un associazione
    public function joinAssociation(Request $request, $association_id)
    {
        $founderId = Association::where('id', $association_id)->value('founder');
        $founder = User::where('id', $founderId)->first();
        $token = Str::random(16);
        Membership::insert(['user_id' => Auth::id(), 'association_id' => $association_id, 'token' => Hash::make($token), 'verified' => '0', 
        'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        $associationName = Association::find($association_id)->name;
        $title = "Richiesta di ingresso nell'associazione " . $associationName;
        $body = "localhost:8000/accept/" . strval($association_id) . "/" . strval($request->user()->id);
        $details = [
            'title' => $title,
            'body' => $body,
            'user' => $request->user()->name,
        ];

        Mail::to($founder->email)->send(new AssociationRequest($details));
        return view('homeViews.confirmView');
    }

    //Funzione che permette a un moderatore di accettare la richiesta di ingresso di un utente tramite link
    public function acceptMember($association_id, $user_id)
    {
        // Aggiunta del membro nell'associazione
        if (Membership::where('association_id', $association_id)->where('user_id', Auth::id())->value('moderator') == '1') { //controllo se chi apre il link è fondatore/moderatore dell'associazione
            DB::table('association_user')->where('association_id',$association_id)->where('user_id', $user_id)->update(['verified' => '1']);
        }

        // Il membro riceve la notifica di ingresso nell'accettazione
        $title = "Benvenuto nell'associazione: " . Association::find($association_id)->name;
        $body = "localhost:8000/association/" . strval($association_id);
        $details = [
            'title' => $title,
            'body' => $body,
        ];
        Mail::to(User::find($user_id))->send(new AssociationAcceptedMember($details));
        return view('homeViews.confirmView');
    }

    //Funzione che riporta all'interfaccia che mostra i membri iscritti ad un'associazione
    public function showMembers($association_id)
    {
        $association = Association::find($association_id);
        $members = $association->users;
        if(Membership::where('association_id', $association_id)->where('user_id', Auth::id())->first()) {
            $isMod = Membership::where('association_id', $association_id)->where('user_id', Auth::id())->first()->moderator;
        }
        else {
            $isMod = 0;
        }
        $data = ['association' => $association, 'members' => $members, 'isMod' => $isMod];
        return view('associationViews.userList', $data);
    }

    //Funzione che riporta alla view che mostra tutte le associazioni presenti sulla piattaforma
    public function showAllAssociations()
    {
        $associations = Association::all();
        $data = ['associations' => $associations];
        return view('associationViews.associationList', $data);
    }

    //Funzione che permette a un moderatore di rimuovere un membro dall'associazione
    public function removeMember($association_id, $user_id)
    {
        $isMod = Membership::where('association_id', $association_id)->where('user_id', Auth::id())->first()->moderator;
        if ($isMod) {
            Membership::where('association_id', $association_id)->where('user_id', $user_id)->delete();
            $view = 'homeViews.confirmView';
        } else {
            $view = 'homeViews.errorView';
        }
        return view($view);
    }

    //Funzione che permette a un moderatore di nominare un ulteriore moderatore
    public function newMod($association_id, $user_id)
    {
        $isMod = Membership::where('association_id', $association_id)->where('user_id', Auth::id())->first()->moderator;
        if ($isMod) {
            Membership::where('user_id', $user_id)->where('association_id', $association_id)->update(['moderator' => '1']);
            $view = 'homeViews.confirmView';
        } else {
            $view = 'homeViews.errorView';
        }
        return view($view);
    }

    //Funzione che permette a un moderatore di rimuovere i privilegi ad un altro moderatore
    public function removeMod($association_id, $user_id)
    {
        $isMod = Membership::where('association_id', $association_id)->where('user_id', Auth::id())->first()->moderator;
        if ($isMod) {
            Membership::where('user_id', $user_id)->where('association_id', $association_id)->update(['moderator' => '0']);
            $view = 'homeViews.confirmView';
        } else {
            $view = 'homeViews.errorView';
        }
        return view($view);
    }

}