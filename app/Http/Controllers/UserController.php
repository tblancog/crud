<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Controllers\Input;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //Show all users
      return \App\User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display an specific user by a given id.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $user->name = $request->name;
        // $user->email = $request->email;
        $user->update([
          'name' => $request->name,
          'email' => $request->email,
        ]);
    }

    /**
     * Remove the specified user from database by id.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $user->delete();
    }

    /**
    * Upload profile image for user
    *
    * @param \App\User $user
    * @return \Illuminate\Http\Response
    */
    public function upload(Request $request, User $user)
    {
      $image = $request->file('image');

      if($image->getMimeType() == "image/png" ||
        $image->getMimeType() == "image/jpg") {

        $filename = str_slug($user->name).".".$image->getClientOriginalExtension();
        $path = $request->file('image')->storeAs(
          'uploads', $filename
        );
        Storage::url($path);
        $user->image = $path;
        $user-save();
      } else {
        return Response::json(["error" => 1, "Invalid image type!! should be either png o jpg"]);
      }
    }
}
