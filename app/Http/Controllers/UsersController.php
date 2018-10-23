<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;

class UsersController extends Controller {

    public function editAccount() {
        return view( 'user.form', [
            'user'   => auth()->user(),
            'method' => 'update-account',
            'title'  => 'My account',
        ] );
    }

    public function updateAccount( SaveUserRequest $request ) {
        auth()->user()->update( [
            'name'     => $request->get( 'name' ),
            'lastname' => $request->get( 'lastname' ),
            'email'    => $request->get( 'email' ),
            'password' => $request->has( 'password' ) ? bcrypt( $request->get( 'password' ) ) : auth()->user()->password,
        ] );

        return redirect()->route( 'students.index' )->with( 'success', 'Your account has been updated successfully!' );
    }
}
