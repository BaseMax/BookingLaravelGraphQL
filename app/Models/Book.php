<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function readingProgress(){
        return $this->hasMany(ReadingProgress::class);
    }

    public function reviews(){
        return $this->hasMany(ReadingProgress::class);
    }

    public function readingLists(){
        return $this->hasMany(ReadingList::class);
    }

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }
}
