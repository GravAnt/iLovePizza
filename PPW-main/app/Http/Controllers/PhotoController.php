<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;

/**
 * Scritto da: Mattia Siragusa
 */
class PhotoController extends Controller
{
    //Funzione per memorizzare l'immagine profilo di un utente all'interno del database
    public function storePropic(Request $request, $id)
    {
        $size = $request->file('image')->getSize();
        $name = "propic_" . strval($id) . ".jpg";
        //Cancello dal DB la vecchia propic dell'utente, se esiste
        try {
            Photo::where('coverable_type', 'App\Models\User')->where('coverable_id', $id)->delete();
        } catch (Exception $e) {
        }

        //Consente di caricare l'immagine nella cartella \public\img\propics
        $file = $request->file("image");
        $file->storeAs('/img/propics/', $name, ['disk' => 'public_uploads']);

        $photo = new Photo();
        $photo->name = $name;
        $photo->size = $size;
        $photo->coverable_id = $id;
        $photo->coverable_type = "App\Models\User";
        $photo->save();
        return redirect()->back();
    }

    //Funzione per memorizzare l'immagine di copertina di un'associazione nel database
    public function storeCoverpic(Request $request, $id)
    {
        $size = $request->file('image')->getSize();
        $name = "coverpic_" . strval($id) . ".jpg";
        //Cancello dal DB la vecchia coverpic dell'associazione, se esiste
        try {
            Photo::where('coverable_type', 'App\Models\Association')->where('coverable_id', $id)->delete();
        } catch (Exception $e) {
        }

        //Consente di caricare l'immagine nella cartella \public\img\associations
        $file = $request->file("image");
        $file->storeAs('/img/associations/', $name, ['disk' => 'public_uploads']);

        $photo = new Photo();
        $photo->name = $name;
        $photo->size = $size;
        $photo->coverable_id = $id;
        $photo->coverable_type = "App\Models\Association";
        $photo->save();
        return view('homeViews.confirmView');
    }

}