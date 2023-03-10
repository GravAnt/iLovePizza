<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [PizzaController::class, 'showHomepage']); //Route per Homepage  --- Realizzata da Antonio Gravina

//Routes dedicate alla gestione profilo --- Predefinite
Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Route per pagina di conferma --- Realizzata da Marco Pernisco
Route::get('/confirm', function () {
    return view('homeViews.confirmView');
});


//Routes dedicate all'utente  --- Route realizzate da Antonio Gravina
Route::group(['prefix' => '/userpage/{id}'], function () {

    Route::get('/', [UserController::class, 'showUser'])->middleware(['auth']); //Route per interfaccia profilo utente 

    Route::post('/', [PhotoController::class, 'storePropic']); //Route per cambiare foto profilo utente

    Route::get('/delete', [ProfileController::class, 'deleteAccount'])->middleware(['auth']); //Route per cancellazione profilo utente

    Route::post('/bio', [UserController::class, 'changeBio']); //Route per cambiare la bio profilo utente

});


Route::post('/setadmin/{id}', [UserController::class, 'setAdmin']); //Route di impostazione admin --- Route realizzata da Antonio Gravina

// Routes dedidicate al recupero account --- Route realizzate da Antonio Gravina
Route::group(['prefix' => '/accountRecovery'], function () {

    Route::get('/', function () {
        return view('accountViews.accountRecoveryFirst');
    });

    Route::post('/', [UserController::class, 'accountRecovery']); //Route di recupero password

    Route::get('/{user_id}/{token}', [UserController::class, 'resetPassword']); //Route di recupero password tramite link

    Route::post('/{user_id}/resetPassword', [PasswordController::class, 'reset']); //Route di interfaccia recupero password nuova

});


//Routes dedicate all'associazione --- Route realizzate da Antonio Gravina e Mattia Siragusa
Route::group(['prefix' => '/association/{association_id}'], function () {

    Route::get('/', [AssociationController::class, 'showAssociation']); //Route di reindirizzamento sull'interfaccia di presentazione dell'associazione

    Route::post('/', [PhotoController::class, 'storeCoverpic']); //Caricamento immagine copertina associazione
        
    Route::post('/inviteMember', [AssociationController::class, 'inviteMember']); //Route per l'invito utenti all'associazione
        
    Route::get('/memberList/removeUser/{member_id}', [AssociationController::class, 'removeMember']); //Route per rimozione utenti dall'associazione

    Route::get('/leave', [AssociationController::class, 'leaveAssociation']); //Route per lasciare l'associazione a cui si fa parte

    Route::get('/join', [AssociationController::class, 'joinAssociation']); //Route per fare richiesa ad un'associazione

    Route::post('/delete', [AssociationController::class, 'deleteAssociation']); //Route per cancellare l'associazione "SOLO Admin"

    Route::get('/memberList', [AssociationController::class, 'showMembers']); //Route per visionare tutti i membri dell'associazione

    Route::get('/memberList/newAssociationMod/{member_id}', [AssociationController::class, 'newMod']); //Route per eleggere a moderatore dell'associazione un membro di essa

    Route::get('/memberList/removeAssociationMod/{member_id}', [AssociationController::class, 'removeMod']); //Route per togliere a un membro dell'associazione il ruolo di moderatore
});

//Route realizzata da Mattia Siragusa
Route::get('/associationList', [AssociationController::class, 'showAllAssociations']); //Route per visionare tutte le associazioni nel sistema
//Route realizzata da Antonio Gravina
Route::get('/invite/{association_id}/{user_id}/{token}', [AssociationController::class, 'confirmMembership']); //Route per invito membro nell'associazione
//Route realizzata da Antonio Gravina
Route::get('/accept/{association_id}/{user_id}', [AssociationController::class, 'acceptMember']); //Route per conferma membro nell'associazione


// Route dedicate alla creazione di una associazione--- Route realizzate da Mattia Siragusa
Route::group(['prefix' => '/createAssociation'], function () {
    
    Route::get('/first', function () {
        return view('associationViews.createAssociationFirst'); //Interfaccia di creazione nuova associazione
    }
    );

    Route::post('/second', [AssociationController::class, 'createAssociation']); //Route di craezione assoziazione

    Route::post('/{association_id}/{pizza_types}', [AssociationController::class, 'uploadAssociation']); //Route di creazione associazione e tipo pizza
});


//Routes dedicate alle ricette di ogni associazione --- Route realizzate da Marco Pernisco
Route::group(['prefix' => '/association/{association_id}/recipe'], function () {

    Route::get('/{recipe_id}', [RecipeController::class, 'showRecipe']); //Route per la pagina di presentazione della ricetta

    Route::get('/{recipe_id}/deleterecipe', [RecipeController::class, 'deleteRecipe']); //Route per l'eliminazione di una ricetta

    Route::post('/{recipe_id}', [CommentController::class, 'createComment']); //Route per la sezione commenti all'interno di ogni ricetta

    Route::post('/{recipe_id}/deleteComment/{comment_id}', [CommentController::class, 'deleteComment']); //Route per l'eliminazione di un commento
});

//Routes dedicate alla creazione di una nuova ricetta --- Route realizzate da Marco Pernisco
Route::group(['prefix' => '/association/{association_id}'], function () {

    Route::get('/uploadrecipe', [RecipeController::class, 'uploadRecipe']); //Route di reindirizzamento sull'interfaccia di creazione della ricetta

    Route::post('/uploadrecipe', [RecipeController::class, 'createRecipe']); //Route dedicata all'upload della ricetta
});

//Routes dedicate alle pagine di un tipo di pizza --- Route realizzate da Mattia Siragusa
Route::group(['prefix' => '/pizzas/{pizza_id}'], function () {

    Route::get('/', [PizzaController::class, 'showPizza']); //Route per tipo pizza
    
    Route::get('/recipes', [RecipeController::class, 'showRecipeList']); //Route per la pagina dove sono elencate le ricette per un certo tipo di pizza
});

//Route per interfaccia della pagina Chi Siamo --- Route realizzata da Mattia Siragusa
Route::get('/info', function () {
    return view('homeViews.info');
});

//Route per interfaccia della pagina Guida --- Route realizzata da Mattia Siragusa
Route::get('/guide', function () {
    return view('homeViews.guide');
});
