<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'contenu', 'nom_complet_auteur', 'date_heure_creation'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
