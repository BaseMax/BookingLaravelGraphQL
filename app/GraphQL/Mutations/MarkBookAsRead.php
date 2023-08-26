<?php

namespace App\GraphQL\Mutations;

use App\Models\Book;
use App\Models\ReadingProgress;
use Illuminate\Support\Facades\Auth;

final class MarkBookAsRead
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $rp = ReadingProgress::where('user_id', Auth::id())->where('book_id', $args['bookId'])->get();
        if(count($rp) > 0) {
            $rp[0]->status = 'read';
            $rp[0]->save();
            return $rp[0];
        }
        if(Book::where('id', $args['bookId'])->count() > 0){
            return ReadingProgress::create([
                'book_id' => $args['bookId'],
                'user_id' => Auth::id(),
                'status' => 'read'
            ]);
        }
        return null;
    }
}
