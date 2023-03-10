<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use PhpOption\None;

/**
 * Predefinito di Breeze
 */
class RegisteredUserController extends Controller
{
    //Funzione che riporta all'interfaccia di registrazione
    public function create()
    {
        return view('auth.register');
    }

    //Funzione per la registrazione di un utente
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'base',
            'bio' => 'Bio vuota', //Ogni utente nuovo ha una bio di default
        ]);

        Auth::login($user, $request->get('remember'));

        return redirect(RouteServiceProvider::HOME);
    }
}