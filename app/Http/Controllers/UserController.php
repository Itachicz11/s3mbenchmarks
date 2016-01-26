<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {

        return view('users/create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param CreateUser|Request $request
     * @return Response
     */
    public function store(CreateUser $request)
    {

        $user = new User;
        $user->email = $request->input('email');
        dd( $request->input('username') );
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = 2;
        $user->save();

        return redirect('/');
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified user in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
