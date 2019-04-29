<?php

namespace App\Http\Controllers\Book;

use App\Models\Books;
use App\Repositories\BookRepository;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    private $bookRepository;

    public function __construct(BookRepository $book)
    {
        $this->bookRepository = $book;

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = \Auth::user()->book;

        return view('home', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\BookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $input = $request->only('title', 'isbn');

        $input['user_id'] = $request->user()->id;

        empty($request->get('status')) ? $input['status'] = 0 : $input['status'] = 1;

        $this->bookRepository->store($input);

        return redirect()->route('home')->with('ok', __('A new book is saved successfully'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->bookRepository->getById($id);

        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\RookRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {

        $input = $request->only('title', 'isbn', 'status');

        $input['user_id'] = $request->user()->id;

        empty($request->get('status')) ? $input['status'] = 0 : $input['status'] = 1;

        $this->bookRepository->update($input, $id);

        return redirect()->route('home')->with('ok', __('Update done successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rest = $this->bookRepository->destroy($id);

        return redirect()->route('home')->with('ok', __('Delete successfully'));

    }

}
