<?php

namespace App\GraphQL\Queries;

use App\Models\Book;

final class TopRatedBooks
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Book::orderBy('rating', 'DESC')->limit(10)->get();
    }
}
