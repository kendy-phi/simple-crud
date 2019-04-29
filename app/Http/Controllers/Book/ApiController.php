<?php

namespace App\Http\Controllers\Book;

use App\Models\Books;
use App\Repositories\BookRepository
use App\Http\Resources\Book\BookResources;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    private $bookRepository;

    public function __construct(BookRepository $book)
    {
        $this->bookRepository = $book;
        
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Response
     */
    public function index()
    {
        return BookResources::collection(\Auth::user()->book);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @return \App\Http\Response
     */
    public function store(BookRequest $request)
    {
        $input = $request->only('title', 'isbn', 'status');

        $input['user_id'] = $request->user()->id;

        $book = Books::create($input);

        return new BookResources($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \App\Http\Response
     */
    public function show($id)
    {
        $book = Books::findOrFail($id);

        return new BookResources($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @param  int  $id
     * @return \App\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $input = $request->only('title', 'isbn', 'status');

        $book = Books::findOrFail($id);

        if($book->user_id !== $request->user()->id)
            return response()->json([
                "message"=> "it's not your ceation please edit your's"
            ], 403);

        $book->fill($input)->save();

        return new BookResources($book);       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \App\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::findOrFail($id);

        if($book->user_id !== \Auth::user()->id)
            return response()->json([
                "message"=> "it's not your ceation please delete your's"
            ], 403);

        $book->delete();

        return response()->json([
            'message'=> 'the book was deleted successfully'
        ], 204);
    }


}
