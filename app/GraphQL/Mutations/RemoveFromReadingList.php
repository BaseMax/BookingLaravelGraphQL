<?php

namespace App\GraphQL\Mutations;

use App\Models\ReadingList;
use Illuminate\Support\Facades\Auth;

final class RemoveFromReadingList
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $rl = ReadingList::where('user_id', Auth::id())->where('book_id', $args['bookId'])->get();
        if(count($rl) > 0){
            $rl[0]->delete();
            return true;
        }
        return false;
    }
}
