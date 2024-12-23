<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class HierarchyController extends Controller {

    public function index() {
        $hierarchies = User::with( 'managers', 'subordinates' )->get();

        return view( 'hierarchy.index', compact( 'hierarchies' ) );
    }

    public function assign() {
        $users = User::all();
        return view( 'hierarchy.assign', compact( 'users' ) );
    }

    public function store( Request $request ) {
        $user = User::findOrFail( $request->user_id );
        $manager = User::findOrFail( $request->manager_id );

        if ( !$user->managers->contains( $manager ) ) {
            $user->managers()->attach( $manager );
        }

        return redirect()->route( 'hierarchy.index' )->with( 'success', 'Hierarchy assigned successfully!' );
    }
}
