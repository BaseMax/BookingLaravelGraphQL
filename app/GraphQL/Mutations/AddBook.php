<?php

namespace App\GraphQL\Mutations;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

final class AddBook
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if(Author::where('id', $args['authorId'])->count() == 0 || Category::where('id', $args['categoryId'])->count() == 0){
            return null;
        }
        return Book::create([
            'title' => $args['title'],
            'author_id' => $args['authorId'],
            'category_id' => $args['categoryId'],
        ]);
    }
}
