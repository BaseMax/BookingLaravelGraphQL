<?php

namespace App\GraphQL\Queries;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

final class UserNotificationsByType
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Notification::where('user_id', Auth::id())->where('type', $args['type'])->get();
    }
}
