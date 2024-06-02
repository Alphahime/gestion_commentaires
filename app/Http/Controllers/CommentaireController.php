<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    //
    public function ajouter_commentaire(Request $request, $articleId)
{
    $request->validate([
        'contenu' => 'required',
        'nom_complet_auteur' => 'required',
    ]);
    //Article::create($request->all());
    $commentaire = new Commentaire([
        'article_id' => $articleId,
        'contenu' => $request->contenu,
        'nom_complet_auteur' => $request->nom_complet_auteur,
        'date_heure_creation' => now(),
    ]);

    $commentaire->save();

    return redirect()->back()->with('reussi', 'Commentaire ajouté avec succès.');
}
public function modifier_commentaire($id)
{
    $commentaire = Commentaire::findOrFail($id);
    return view('commentaires.modifier', compact('commentaire'));
}

public function modifier_commentaire_traitement(Request $request, $id)
{
    $request->validate([
        'contenu' => 'required',
        'nom_complet_auteur' => 'required',
    ]);

    $commentaire = Commentaire::findOrFail($id);
    $commentaire->contenu = $request->contenu;
    $commentaire->nom_complet_auteur = $request->nom_complet_auteur;
    $commentaire->save();

    return redirect('/articles')->with('success', 'Commentaire modifié avec succès.');
}


public function supprimer_commentaire($id)
{
    $commentaire = Commentaire::findOrFail($id);
    $commentaire->delete();

    return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
}

}
