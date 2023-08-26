<?php

namespace App\GraphQL\Mutations;

use App\Models\ReadingProgress;
use Illuminate\Support\Facades\Auth;

final class UpdateReadingProgress
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $rp = ReadingProgress::where('user_id', Auth::id())->where('book_id', $args['bookId'])->get();
        if(count($rp) > 0) {
            $rp[0]->status = $args['status'];
            $rp[0]->save();
            return $rp[0];
        }
        return null;
    }
}
