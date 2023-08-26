<?php

namespace App\GraphQL\Mutations;

use App\Models\Reveiw;

final class UpdateReview
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $r = Reveiw::where('id', $args['id'])->get();
        if(count($r) == 0){
            return null;
        }
        $review = $r[0];
        if(array_key_exists('content', $args['content'])) $review->content = $args['content'];
        if(array_key_exists('rating', $args['rating'])) $review->rating = $args['rating'];
        $review->save();
        return $review;
    }
}
