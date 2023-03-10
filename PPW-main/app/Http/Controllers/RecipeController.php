<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\Pizza;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Scritto da: Marco Pernisco
 */
class RecipeController extends Controller
{
    //Funzione che riporta alla pagina di visualizzazione di una ricetta
    public function showRecipe($association_id, $recipe_id)
    {
        $recipe = Recipe::find($recipe_id);
        $photo = $recipe->photo;
        $photoName = $photo->name;

        $comment_recipe = $recipe->comments;

        $data = [
            'recipe' => $recipe,
            'association_id' => $association_id,
            'photo' => $photoName,
            'comments' => $comment_recipe,
        ];
        return view('recipeViews.recipeView', $data);
    }

    //Funzione che riporta all'elenco delle ricette dedicate a un certo tipo di pizza
    public function showRecipeList($pizza_id)
    {
        $pizza = Pizza::find($pizza_id);
        $recipes = Recipe::where('type', $pizza->name)->get();
        $data = [
            'recipes' => $recipes,
        ];
        return view('recipeViews.recipeList', $data);
    }

    //Funzione che porta alla pagina di caricamento di una ricetta
    public function uploadRecipe($association_id)
    {
        $pizzaTypes = Association::find($association_id)->pizzas;
        $data = ['association_id' => $association_id, 'pizzaTypes' => $pizzaTypes];
        return view('recipeViews.uploadRecipe', $data);
    }

    //Funzione che permette ad un utente di caricare una ricetta compilando il form adatto
    public function createRecipe(Request $request, $association_id)
    {
        $recipe = Recipe::create([
            'association_id' => $association_id, //recuperando l'id association
            'user_id' => Auth::id(), //recuperando l'id utente
            'name' => $request->input('name'),
            'type' => $request->input('pizzaType'),
            'ingredients' => $request->input('ingredients'),
            'description' => $request->input('description'),
        ]);
        $recipe->save();

        //caricamento immagine copertina
        $size = $request->file('image')->getSize();
        $name = $request->file('image')->getFilename();
        $file = $request->file("image");
        $file->storeAs('/img/recipes', $name, ['disk' => 'public_uploads']);
        $photo = new Photo();
        $photo->name = $name;
        $photo->size = $size;
        $photo->coverable_id = $recipe->id;
        $photo->coverable_type = "App\Models\Recipe";
        $photo->save();
        $data = ['association_id' => $association_id, 'recipe_id' => $recipe->id];
        return view('recipeViews.confirmUploadRecipe', $data);
    }

    //Funzione che consente di cancellare una ricetta 
    public function deleteRecipe($association_id, $recipe_id)
    {
        Comment::where('recipe_id', $recipe_id)->delete();
        Photo::where('coverable_type', 'App\Models\Recipe')->where('coverable_id', $recipe_id)->delete();
        Recipe::destroy($recipe_id);

        return view('homeViews.confirmView');

    }
}