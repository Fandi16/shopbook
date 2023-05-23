<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

// use Illuminate\Support\Facades\Gate;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware( 'preventBackHistory' );
        // // OTORISASI GATE
        // $this->middleware( function ($request, $next) {
        //     if (Gate::allows( 'manage-category' ))
        //         return $next( $request );
        //     abort( 403, 'Anda tidak memiliki cukup hak akses' );
        // } );
    }

    public function index()
    {
        $categories = Category::all();
        return view( 'category.index', compact( 'categories' ) );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'category.create' );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        // $request->validate( [
        //     'name' => 'required',
        // ] );
        $category       = new Category();
        $category->name = $request->get( 'name' );
        $category->save();
        return redirect( 'categories' )->with( 'success', 'Category has been successfully added' );

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
        $category = Category::find( $id );
        return view( 'category.edit', compact( 'category', 'id' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category       = Category::find( $id );
        $category->name = $request->get( 'name' );
        $category->save();
        return redirect( 'categories' )->with( 'success', 'Category has been successfully update' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find( $id );
        $category->delete();
        return redirect( 'categories' )->with( 'success', 'Category has been deleted' );

    }
}