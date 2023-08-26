<?php

namespace App\GraphQL\Queries;

use App\Models\ReadingProgress as ModelsReadingProgress;
use Illuminate\Support\Facades\Auth;

final class ReadingProgress
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $rPs = ModelsReadingProgress::where('user_id', Auth::id())->where('book_id', $args['bookId'])->get();
        if(count($rPs) > 0) return $rPs[0];
        return null;
    }
}
