<?php

namespace App\GraphQL\Mutations;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

final class RemoveFromFavorites
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $f = Favorite::where('user_id', Auth::id())->where('book_id', $args['bookId'])->get();
        if(count($f) > 0){
            $f[0]->delete();
            return true;
        }
        return false;
    }
}
