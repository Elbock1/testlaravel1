<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Permet l'assignation massive pour ces champs
    protected $fillable = ['title', 'content'];

    /**
     * Un article peut avoir plusieurs commentaires.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}