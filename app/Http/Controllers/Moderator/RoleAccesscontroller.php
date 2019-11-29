<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\access_menu_users;
use App\menu_users;

class RoleAccesscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $menus = menu_users::where('id', '!=', 1)->get();
        $roles = DB::table('roles')->where('id', $id)->first();
        return view('moderator.role.access')->with('menus', $menus)->with('roles', $roles);
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
        $request->validate([
            'roleId' => 'required',
            'menuId' => 'required'
        ]);

        $menu_id = $request->menuId;
        $role_id = $request->roleId;

        $result = access_menu_users::where('role_id', $role_id)->where('menu_id', $menu_id)->count();

        if($result < 1) {
            $role               = new access_menu_users;
            $role->role_id      = $role_id;
            $role->menu_id      = $menu_id;
            $role->save();
        } else {
            access_menu_users::where('role_id', $role_id)->where('menu_id', $menu_id)->delete();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
