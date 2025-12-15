<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'genre',
        'description',
        'cover',
        'pdf_path',
        'pdf_name',
    ];


    /**
     * Relasi: buku bisa difavoritkan oleh banyak user
     */
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
}
