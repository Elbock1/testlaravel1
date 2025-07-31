<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Permet l'assignation massive pour ces champs
    protected $fillable = ['article_id', 'name', 'comment'];

    /**
     * Un commentaire appartient à un article.
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}