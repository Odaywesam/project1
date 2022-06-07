<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id' , 'desc')->Paginate(5);
        return response()->view('master.spaite.permissions.index' , compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('master.spaite.permissions.create');
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
            $permissions = new Permission();
            $permissions->name = $request->get('name');
            $permissions->guard_name = $request->get('guard_name');
            $isSaved = $permissions->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'Created successfully'], 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'Created failed '], 400);

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
        $permissions = Permission::findOrFail($id);
        return response()->view('master.spaite.permissions.edit' , compact('permissions'));
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
            $permissions = Permission::findOrFail($id);
            $permissions->name = $request->get('name');
            $permissions->guard_name = $request->get('guard_name');
            $isSaved = $permissions->save();
            return ['redirect' =>route('permissions.index')];

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
        $permissions = Permission::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'Deleted successfully'], 200);

    }
}
