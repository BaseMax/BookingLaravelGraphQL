<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

final class UpdateUserProfile
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if(array_key_exists('email', $args)){
            if(User::where('email', $args['email'])->count() == 0){
                Auth::user()->email = $args['email'];
            }
        }
        if(array_key_exists('username', $args)){
            if(User::where('username', $args['username'])->count() == 0){
                Auth::user()->username = $args['username'];
            }
        }
        Auth::user()->save();
        return Auth::user();
    }
}
