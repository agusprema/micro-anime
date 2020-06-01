<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\list_user_animes;
use App\User;
use App\Role;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'auth.admin', 'auth.moderator']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(10)->whereNotIn('email', 'agusprema@gmail.com');
        return view('moderator.users.index')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('moderator.users.edit')->with([
            'user'  => $user,
            'roles' => $roles
        ]);
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
        $user->roles()->sync($request->roles);

        return redirect()->route('moderator.users.index')->with('success', 'User has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(auth::user()->id == $user->id){
            return redirect()->route('moderator.users.index')->with('warning', 'You are not allowed to delete yourselft.');
        }

        if($user->email !== 'agusprema@gmail.com'){
            list_user_animes::where('id_user', $user->id_user)->delete();

            if($user->profile_image !== 'default.jpg'){Storage::delete('public/user/profile/' . $user->profile_image);}
            if($user->thumbnail_image !== 'default.jpg'){Storage::delete('public/user/thumb/' . $user->thumbnail_image);}

            $user->roles()->detach();
            $user->delete();

            return redirect()->route('moderator.users.index')->with('warning', 'User has been deleted.');
        }

        return redirect()->route('moderator.users.index')->with('warning', 'This user can not be delete.');
    }
}
