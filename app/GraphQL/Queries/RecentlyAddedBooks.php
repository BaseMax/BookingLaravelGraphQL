<?php

namespace App\GraphQL\Queries;

use App\Models\Book;

final class RecentlyAddedBooks
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Book::orderBy('created_at', 'DESC')->limit(10)->get();
    }
}
