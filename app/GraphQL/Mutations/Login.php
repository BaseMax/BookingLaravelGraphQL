<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class Login
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User::where('email', $args['email'])->get();
        if(count($user) == 0 || Hash::check($args['password'], $user[0]->password)){
            return null;
        }
        return $user[0]->createToken('auth')->plainTextToken;
    }
}
