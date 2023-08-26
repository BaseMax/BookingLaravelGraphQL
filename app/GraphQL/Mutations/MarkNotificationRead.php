<?php

namespace App\GraphQL\Mutations;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

final class MarkNotificationRead
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $n = Notification::where('id', $args['id'])->where('user_id', Auth::id())->get();
        if(count($n) > 0){
            $n[0]->read = true;
            $n[0]->save();
            return $n[0];
        }
        return null;
    }
}
