<?php

namespace App\Http\Controllers;

use App\Mail\NewPassword;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Scritto da: Antonio Gravina, Mattia Siragusa, Marco Pernisco
 */
class UserController extends Controller
{
    //Funzione che riporta alla pagina di visualizzaione delle informazioni dell'utente
    public function showUser($id)
    {
        $user = User::find($id);
        $propic = $user->photo;
        if ($propic == null) {
            $propic = Photo::where('name', 'default.jpg')->first();
        } else {
            $propic = $user->photo;
        }
        $associations = $user->associations()->get();
        $data = ['user' => $user, 'propic' => $propic, 'associations' => $associations];
        return view('accountViews.userPage', $data);
    }

    //Funzione che permette ad un utente di modificare la propria bio
    public function changeBio(Request $request, $id)
    {
        $user = User::find($id);
        $user->update(['bio' => $request->input('bio')]);
        return redirect()->back();
    }

    //Funzione che permette ad un amministratore di promuovere un altro utente ad amministratore
    public function setAdmin(Request $request, $id)
    {
        if ($request->input('action') == 'removeAdmin') {
            $user = User::find($id);
            $user->update(['role' => 'base']);
        } else {
            $user = User::find($id);
            $user->update(['role' => 'admin']);
        }
        return redirect()->back();
    }

    //Funzione che su richiesta dell'utente invia la mail per il reset della password
    public function accountRecovery(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $user = User::where('name', $username)->where('email', $email)->first();
        if ($user) {
            $token = Str::random(16);
            $user->reset_password_token = Hash::make($token);
            $user->save();
            $title = "Reset della password";
            $body = "localhost:8000/accountRecovery/" . strval($user->id) . "/" . $token;
            $details = [
                'title' => $title,
                'body' => $body,
            ];
            Mail::to($email)->send(new NewPassword($details));
            $data = ['user' => 'found'];
        } else {
            $data = ['user' => 'notFound'];
        }

        return view('accountViews.accountRecoverySecond', $data);
    }

    //Funzione che resetta la password
    public function resetPassword($user_id, $token)
    {
        $user = User::find($user_id);
        if (Hash::check($token, $user->reset_password_token)) {
            $view = 'accountViews.resetPassword';
            $data = ['user_id' => $user_id];
        } else {
            $view = 'errors.404';
            $data = null;
        }

        return view($view, $data);
    }
}