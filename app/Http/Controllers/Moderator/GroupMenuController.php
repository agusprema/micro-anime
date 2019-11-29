<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use App\menu_groups;
use Illuminate\Http\Request;
use App\menu_users;

class GroupMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group = menu_groups::join('menu_users', 'menu_groups.menu_id', '=', 'menu_users.id')->where('menu_groups.id', '>=', 1)->select('menu_groups.*', 'menu_users.menu')->orderBy('menu_groups.id', 'DESC')->get();
        $menus = menu_users::all();
        return view('moderator.group_menu.index')->with('groups', $group)->with('menus', $menus);
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
            'name' => 'required',
            'menu_id' => 'required|integer',
            'icon' => 'required'
        ]);

        $menu_groups            = new menu_groups;
        $menu_groups->name      = $request->name;
        $menu_groups->menu_id   = $request->menu_id;
        $menu_groups->icon      = $request->icon;
        $menu_groups->save();

        return redirect('moderator/group-menu')->with('success', 'Group Menu has been add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\menu_groups  $menu_groups
     * @return \Illuminate\Http\Response
     */
    public function show(menu_groups $menu_groups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\menu_groups  $menu_groups
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_groups = menu_groups::find($id);
        $menus = menu_users::all();
        return view('moderator.group_menu.edit')->with('menu_groups', $menu_groups)->with('menus', $menus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\menu_groups  $menu_groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'menu_id' => 'required|integer',
            'icon' => 'required'
        ]);

        $menu_groups            = menu_groups::find($id);
        $menu_groups->name      = $request->name;
        $menu_groups->menu_id   = $request->menu_id;
        $menu_groups->icon      = $request->icon;
        $menu_groups->save();

        return redirect('moderator/group-menu')->with('success', 'Group Menu has been change');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\menu_groups  $menu_groups
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        menu_groups::destroy($id);

        return redirect('moderator/group-menu')->with('warning', 'Group Menu has been deleted.');
    }
}
