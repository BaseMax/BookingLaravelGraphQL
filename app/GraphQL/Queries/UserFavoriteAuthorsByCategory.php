<?php

namespace App\GraphQL\Queries;

use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class UserFavoriteAuthorsByCategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookIds = DB::table('favorites')->select(['book_id'])->where('user_id', '=', Auth::id())
        ->where('category_id', $args['categoryId'])->get();
        $authorIds = DB::table('books')->select(['author_id'])->whereIn('id', $bookIds)->get();
        return Author::whereIn('id', $authorIds)->get();
    }
}
