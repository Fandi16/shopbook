<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateCategoryRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // $this->middleware( 'preventBackHistory' );
        // // OTORISASI GATE
        // $this->middleware( function ($request, $next) {
        //     if (Gate::allows( 'manage-users' ))
        //         return $next( $request );
        //     abort( 403, 'Anda tidak memiliki cukup hak akses' );
        // } );
        $this->middleware( 'preventBackHistory' );

    }
    public function index()
    {
        $users = User::all();
        return view( 'user.index', compact( 'users' ) );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'user.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateCategoryRequest $request)
    {
        // $request->validate( [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ] );
        $newuser           = new User();
        $newuser->name     = $request->get( 'name' );
        $newuser->email    = $request->get( 'email' );
        $newuser->password = Hash::make( $request->get( 'password' ) );
        $newuser->roles    = json_encode( ['USER'] );
        $newuser->save();
        return redirect( 'users' )->with( 'success', 'User has been successfully added' );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find( $id );
        return view( 'user.edit', compact( 'users', 'id' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user        = User::find( $id );
        $user->name  = $request->get( 'name' );
        $user->email = $request->get( 'email' );
        $user->roles = $request->get( 'roles' );
        $user->save();
        return redirect( 'users' )->with( 'success', 'User has been successfully update' );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find( $id );
        $user->delete();
        return redirect( 'users' )->with( 'success', 'User has been deleted' );
    }
}