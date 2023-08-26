<?php

namespace App\GraphQL\Queries;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class UserFavoriteCategories
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $bookIds = DB::table('favorites')->select(['book_id'])->where('user_id', '=', Auth::id());
        $categoryIds = DB::table('books')->select(['category_id'])->whereIn('id', $bookIds)->get();
        return Category::whereIn('id', $categoryIds)->get();
    }
}
