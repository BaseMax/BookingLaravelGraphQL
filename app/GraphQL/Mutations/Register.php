<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class Register
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if(User::where('email', $args['email'])->orWhere('username', $args['username'])->count() > 0){
            return null;
        }

        $user = User::create([
            'username' => $args['username'],
            'email' => $args['email'],
            'password' => Hash::make($args['password'])
        ]);

        return $user->createToken('auth')->plainTextToken;
    }
}
