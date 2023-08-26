<?php

namespace App\GraphQL\Mutations;

use App\Models\Book;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

final class AddToFavorites
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if(Favorite::where('user_id', Auth::id())->where('book_id', $args['bookId'])->count() == 0){
            if(Book::where('id', $args['bookId'])->count() > 0){
                return Favorite::create([
                    'user_id' => Auth::id(),
                    'bookId' => $args['bookId']
                ]);
            }
        }
        return null;
    }
}
