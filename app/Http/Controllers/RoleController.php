<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //withCount عداد عشان يجيبلي عدد الصلاحيات مع اسم العلاقه
        $roles = Role::withCount('permissions')->orderBy('id' , 'desc')->Paginate(5);
        return response()->view('master.spaite.roles.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('master.spaite.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),
        [
            'guard_name' => 'required|string|in:admin',
            'name' => 'required|string'
        ]);

        if(! $validator->fails()){
            $roles = new Role();
            $roles->name = $request->get('name');
            $roles->guard_name = $request->get('guard_name');
            $isSaved = $roles->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تمت الاضافة بنجاح'], 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية الاضافة '], 400);

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);

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
        $roles = Role::findOrFail($id);
        return response()->view('master.spaite.roles.edit' , compact('roles'));
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
        $validator = Validator($request->all(),
        [
            'guard_name' => 'required|string|in:admin',
            'name' => 'required|string'
        ]);

        if(! $validator->fails()){
            $roles = Role::findOrFail($id);
            $roles->name = $request->get('name');
            $roles->guard_name = $request->get('guard_name');
            $isSaved = $roles->save();
            return ['redirect' =>route('roles.index')];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'Updated successfully'], 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'Updated failed'], 400);

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'Deleted successfully'], 200);

    }
}
