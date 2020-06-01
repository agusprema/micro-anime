<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\sub_menu_users;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_menus  = DB::table('sub_menu_users')->join('menu_users', 'sub_menu_users.menu_id', '=', 'menu_users.id')->join('menu_groups', 'sub_menu_users.group_id', '=', 'menu_groups.id')->select('sub_menu_users.*', 'menu_users.menu', DB::raw('menu_groups.name AS g_name'))->orderBy('sub_menu_users.id', 'DESC')->get();
        $menus      = DB::table('menu_users')->get();
        $groups     = DB::table('menu_groups')->where('id', '>=', 1)->get();

        return view('moderator.submenu.index')->with('sub_menus', $sub_menus)->with('menus', $menus)->with('groups', $groups);
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
            'title'     => 'required',
            'menu_id'   => 'required|integer',
            'group_id'  => 'required|integer',
            'url'       => 'required',
            'icon'      => 'required'
        ]);

        if($request->is_active){ $active = $request->is_active; } else { $active = 0; }

        $sub_menu_users             = new sub_menu_users;
        $sub_menu_users->title      = $request->title;
        $sub_menu_users->menu_id    = $request->menu_id;
        $sub_menu_users->group_id   = $request->group_id;
        $sub_menu_users->url        = $request->url;
        $sub_menu_users->icon       = $request->icon;
        $sub_menu_users->is_active  = $active;
        $sub_menu_users->save();

        return redirect('moderator/submenu')->with('success', 'Submenu has been add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sub_menu_users  $sub_menu_users
     * @return \Illuminate\Http\Response
     */
    public function show(sub_menu_users $sub_menu_users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sub_menu_users  $sub_menu_users
     * @return \Illuminate\Http\Response
     */
    public function edit($request)
    {
        $menus          = DB::table('menu_users')->get();
        $sub_menu_users = sub_menu_users::find($request);
        $groups         = DB::table('menu_groups')->where('id', '>=', 1)->get();
        return view('moderator.submenu.edit')->with('sub_menu_users', $sub_menu_users)->with('menus', $menus)->with('groups', $groups);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sub_menu_users  $sub_menu_users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required',
            'menu_id'   => 'required|integer',
            'group_id'  => 'required|integer',
            'url'       => 'required',
            'icon'      => 'required'
        ]);

        if($request->is_active){
            $active = $request->is_active;
        } else {
            $active = 0;
        }

        $sub_menu_users             = sub_menu_users::find($id);
        $sub_menu_users->title      = $request->title;
        $sub_menu_users->menu_id    = $request->menu_id;
        $sub_menu_users->group_id   = $request->group_id;
        $sub_menu_users->url        = $request->url;
        $sub_menu_users->icon       = $request->icon;
        $sub_menu_users->is_active  = $active;
        $sub_menu_users->save();

        return redirect('moderator/submenu')->with('success', 'Menu has been change');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sub_menu_users  $sub_menu_users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sub_menu_users::destroy($id);

        return redirect('moderator/submenu')->with('warning', 'Role has been deleted.');
    }
}
