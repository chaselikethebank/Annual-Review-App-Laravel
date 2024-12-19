<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class HierarchyController extends Controller {

    public function assign() {
        $users = User::all();
        return view( 'hierarchy.assign', compact( 'users' ) );
    }


    public function store( Request $request ) {
        // Create hierarchy relationship between users
        $user = User::findOrFail( $request->user_id );
        $manager = User::findOrFail( $request->manager_id );

        // Attach the manager to the user
        $user->managers()->attach( $manager );

        return redirect()->back()->with( 'success', 'Hierarchy assigned successfully!' );
    }
}
