<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Membership;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

/**
 * Predefinito di Breeze, modificato da: Antonio Gravina
 */
class ProfileController extends Controller
{
    //Funzione che permette ad un utente di cancellare il proprio account
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();
        Membership::where('user_id', $user->id)->delete();
        Recipe::where('user_id', $user->id)->delete();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('homeViews.confirmView');
    }

    //Funzione che permette ad un amministratore di cancellare un account
    public function deleteAccount(Request $request, $id)
    {
        Membership::where('user_id', $id)->delete();
        Recipe::where('user_id', $id)->delete();
        User::destroy($id);

        return view('homeViews.confirmView');
    }
}