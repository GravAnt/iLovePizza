<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Predefinito di Breeze
 */
class AuthenticatedSessionController extends Controller
{
    //Funzione che riporta all'interfaccia di login
    public function create()
    {
        return view('auth.login');
    }

    //Funzione che effettua l'autenticazione dell'utente
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    //Funzione che effettua il logout dell'utente
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}