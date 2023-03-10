<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

/**
 * Predefinito di Breeze, modificato da: Antonio Gravina
 */
class PasswordController extends Controller
{
    //Funzione che aggiorna la password dell'utente
    public function update(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'old_password' => ['required', 'current_password'],
            //L'input inserito in 'old_password' deve rispettare le regole required
            //e current_password, definite in Illuminate\Validation\Rules\Password. La regola required stabilisce che 'old_password' non dev'essere
            //vuoto, mentre la regola current_password stabilisce che old_password coincida con la password corrente dell'utente.
            //Se non è rispettata la regola, ritorna alla pagina con un messaggio di errore
            'password' => ['required', Password::defaults(), 'confirmed'], //L'input password è required, deve seguire le regole di default delle password
            //(ad esempio minimo 8 caratteri) e dev'essere confermata (infatti bisogna riempire anche l'input 'password_confirmation')
            //Se non è rispettata la regola, ritorna alla pagina con un messaggio di errore
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]); //Se non ci sono eccezioni nella bag, la password è modificata

        return back()->with('status', 'updated');
    }
    //Funzione che permette all'utente di resettare la propria password nel caso in cui abbia dimenticato la vecchia password 
    public function reset(Request $request, $user_id)
    {
        $validated = $request->validateWithBag('updatePassword', ['password' => [Password::defaults(), 'confirmed']]); // Il controllo required si fa con JS
        User::find($user_id)->update(['password' => Hash::make($validated['password'])]);

        return back()->with('status', 'updated');
    }
}