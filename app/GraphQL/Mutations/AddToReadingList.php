<?php

namespace App\GraphQL\Mutations;

use App\Models\Book;
use App\Models\ReadingList;
use Illuminate\Support\Facades\Auth;

final class AddToReadingList
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if(ReadingList::where('user_id', Auth::id())->where('book_id', $args['bookId'])->count() == 0){
            if(Book::where('id', $args['bookId'])->count() > 0){
                return ReadingList::create([
                    'user_id' => Auth::id(),
                    'bookId' => $args['bookId']
                ]);
            }
        }
        return null;
    }
}
