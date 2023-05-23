<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Controller extends \Illuminate\Routing\Controller
{
    // use AuthorizesRequests, ValidatesRequests;
    public function __construct()
    {
        $this->middleware( 'preventBackHistory' );
        // OTORISASI GATE
        $this->middleware( function ($request, $next) {
            if (Gate::allows( 'manage-users' ))
                return $next( $request );
            abort( 403, 'Anda tidak memiliki cukup hak akses' );
        } );
    }
}