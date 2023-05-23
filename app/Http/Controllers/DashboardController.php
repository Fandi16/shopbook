<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware( 'auth' );
        $this->middleware( 'preventBackHistory' );
    }

    public function index()
    {
        $users = User::count();

        $categories = Category::count();
        $books      = Book::count();
        return view( 'dashboard', compact( 'users', 'categories', 'books' ) );
    }
}