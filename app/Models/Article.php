<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'image',
        'status',
        'date_creation',
    ];

    protected $dates = [
        'date_creation',
    ];


    public function getDateCreationAttribute($value)
    {
        return Carbon::parse($value);
    }
    public function commentaires()
{
    return $this->hasMany(Commentaire::class);
}

}
