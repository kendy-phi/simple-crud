<?php
namespace App\Repositories;

use App\Models\Books;


class BookRepository extends BaseRepository
{
    
    public function __construct(Books $book)
    {
        $this->model = $book;
    }


}