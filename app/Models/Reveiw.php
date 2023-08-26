<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reveiw extends Model
{
    use HasFactory;

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
