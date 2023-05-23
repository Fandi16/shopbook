<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware( 'preventBackHistory' );
        // OTORISASI GATE
        // $this->middleware( function ($request, $next) {
        //     if (Gate::allows( 'manage-books' )) {
        //         return $next( $request );
        //     }
        //     abort( 403, 'Anda tidak memiliki cukup hak akses' );
        // } );
    }
    public function index()
    {
        $books = Book::with( 'categories' )->get();
        return view( 'book.index', compact( 'books' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view( 'book.create', compact( 'categories' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookRequest $request)
    {
        // $request->validate( [
        //     'name' => 'required',
        //     'categories' => 'required',
        //     'price' => 'required',
        //     'cover' =>
        //     'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        // ] );
        $book              = new Book();
        $book->name        = $request->get( 'name' );
        $book->category_id = $request->get( 'categories' );
        $book->price       = $request->get( 'price' );
        $cover             = $request->file( 'cover' );
        if ($cover) {
            $cover_path  = $cover->store( 'images/books', 'public' );
            $book->cover = $cover_path;
        }
        $book->save();
        return redirect( 'books' )->with(
            'success',
            'Book has been successfully added'
        );

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book       = Book::find( $id );
        $categories = Category::all();
        return view( 'book.edit', compact( 'book', 'categories', 'id' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, string $id)
    {
        $book              = Book::find( $id );
        $book->name        = $request->get( 'name' );
        $book->category_id = $request->get( 'categories' );
        $book->price       = $request->get( 'price' );
        $new_cover         = $request->file( 'cover' );
        if ($new_cover) {
            if (
                $book->cover &&
                file_exists( storage_path( 'app/public/' . $book->cover ) )
            ) {
                \Storage::delete( 'public/' . $book->cover );
            }
            $new_cover_path = $new_cover->store(
                'images/books',
                'public'
            );
            $book->cover    = $new_cover_path;
        }
        $book->save();
        return redirect( 'books' )->with(
            'success',
            'Book has been successfully update'
        );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find( $id );
        $book->delete();
        return redirect( 'books' )->with( 'success', 'Book has been deleted' );

    }
}