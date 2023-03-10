<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Scritto da: Marco Pernisco
 */
class CommentController extends Controller
{
    //Funzione che consente ad un utente di caricare un nuovo commento su di una ricetta
    public function createComment(Request $request, $association_id, $recipe_id)
    {
        $comment = Comment::create([
            'user_id' => Auth::id(),
            'recipe_id' => $recipe_id,
            'description' => $request->input('description'),
        ]);
        $comment->save();

        $data = ['association_id' => $association_id, 'recipe_id' => $recipe_id];
        return view('recipeViews.confirmUploadComment', $data);

    }

    //Funzione che consente di cancellare un commento
    public function deleteComment($association_id, $recipe_id, $comment_id) {
        Comment::destroy($comment_id);
        return view('homeViews.confirmView');
    }
}