<?php

namespace App\GraphQL\Mutations;

use App\Models\Book;
use App\Models\Reveiw;
use Illuminate\Support\Facades\Auth;

final class AddReview
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if(Book::where('id', $args['bookId'])->count() == 0){
            return null;
        }
        if(Reveiw::where('user_id', Auth::id())->where('book_id', $args['bookId'])->count() > 0){
            return null;
        }

        $book = Book::where('id', $args['bookId'])->first();
        if($book->rating == null){
            $book->rating = floatval($args['rating']);
            $book->save();
        } else {
            $reviewCounts = Reveiw::where('book_id', $args['bookId'])->count();
            $book->rating = (floatval($args['rating']) + ($book->rating * $reviewCounts)) / (float) ($reviewCounts + 1);
            $book->save();
        }

        return Reveiw::create([
            'user_id' => Auth::id(),
            'book_id' => $args['bookId'],
            'content' => $args['content'],
            'rating' => $args['rating'],
        ]);
    }
}
