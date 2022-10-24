<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\roles;
use App\Models\permissions;


class directorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $roles = roles::get();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new roles;
        $role->name = "Yeni Rol";
        $role->save();
        return redirect()->back();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = roles::find($id);
        $permissions = permissions::where('role_id',$id)->orderBy('menuStatu')->get();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $role = roles::where('id',$id)->first();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        if (isset($request->permissions)) {
            foreach ($request->permissions as $permission_val ) {
                $arr = explode(',', $permission_val['menu_id']);
                $menu_id = $arr[0];
                $menuStatu = $arr[1];
                $control = isset($permission_val['permission_id']) ? true : false;
                if ($control) {
                    $control = $permission_val['permission_id'] == "" ? false : $permission_val['permission_id']; 
                }
                if($control){
                    $permission = permissions::where('id',$control)->first();
                    $permission->menu_id = $menu_id;
                    $permission->menuStatu = $menuStatu;
                    $permission->save();
                }
                else{
                    
                    $permission = new permissions;
                    $permission->menu_id = $menu_id;
                    $permission->role_id = $role->id;
                    $permission->menuStatu = $menuStatu;
                    $permission->save();
                }
            }
        }
        toastr()->success('Başarı ile güncellendi!', 'Başarılı');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {  
        $id = $request->id;
        $permission = permissions::where('id',$id)->first();
        if($permission==null){
            return response(['status'=>0],400);
        }
        $permission->delete();
        return response(['status'=>1],200);
    }
}
