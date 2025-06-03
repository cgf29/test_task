<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {
    protected $fillable = ['title', 'is_published', 'poster'];

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }

    public function getPosterUrlAttribute() {
        return $this->poster ? asset('storage/' . $this->poster) : asset('storage/default.jpg');
    }
}