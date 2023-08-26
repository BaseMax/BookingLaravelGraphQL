<?php

namespace App\GraphQL\Queries;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class UserFavoriteBooks
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookIds = DB::table('favorites')->select(['book_id'])->where('user_id', '=', Auth::id())->get();
        return Book::whereIn('id', $bookIds)->get();
    }
}
