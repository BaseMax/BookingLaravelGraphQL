<?php

namespace App\GraphQL\Mutations;

use App\Models\Reveiw;
use Illuminate\Support\Facades\Auth;

final class DeleteReview
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $r = Reveiw::where('id', $args['id'])->where('user_id', Auth::id())->get();
        if(count($r) > 0){
            $r[0]->delete();
            return true;
        }
        return false;
    }
}
