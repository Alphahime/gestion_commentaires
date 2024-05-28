<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;

// Routes pour les articles
Route::get('/articles', [ArticleController::class, 'liste_article']);
Route::get('/ajouter', [ArticleController::class, 'ajouter_article']);
Route::post('/ajouter/traitement', [ArticleController::class, 'ajouter_article_traitement']);
Route::get('/modifier/{id}', [ArticleController::class, 'modifier_article']);
Route::put('/modifier/{id}', [ArticleController::class, 'modifier_article_traitement']);
Route::delete('/supprimer/{id}', [ArticleController::class, 'supprimer_article']);

// Routes pour les commentaires
Route::post('/articles/{id}/commentaires', [CommentaireController::class, 'ajouter_commentaire']);
Route::get('/commentaires/{id}/modifier', [CommentaireController::class, 'modifier_commentaire']);
Route::put('/commentaires/{id}', [CommentaireController::class, 'modifier_commentaire_traitement']);
Route::delete('/commentaires/{id}', [CommentaireController::class, 'supprimer_commentaire']);


