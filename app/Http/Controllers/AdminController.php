<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id' , 'desc')->paginate(5);
        return response()->view('master.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return response()->view('master.admin.create' , compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            // 'image'=>"image|max:2048|mimes:png,jpg,jpeg,pdf",

        ]);

        if(! $validator->fails()){
            $admins = new Admin();
            $admins->first_name = $request->get('first_name');
            $admins->last_name = $request->get('last_name');
            $admins->mobile = $request->get('mobile');
            $admins->age = $request->get('age');
            $admins->email = $request->get('email');
            $admins->city_id = $request->get('city_id');
            $admins->password = Hash::make($request->get('password'));


            if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/images/admin', $imageName);

            $admins->image = $imageName;

            }

            if (request()->hasFile('cv')) {

            $cv = $request->file('cv');

            $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();

            $cv->move('storage/files/admin', $fileName);

            $admins->cv = $fileName;
            }

            $isSaved = $admins->save();

            if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'created successfully'] , 200);

        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'created failed'] , 400);
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
        $cities = City::all();
        $admins = Admin::findOrFail($id);
        return response()->view('master.admin.edite' , compact('admins' , 'cities'));

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
        $validator = Validator($request->all(),[
          
        ]);

        if(!$validator->fails()){
            $admins = Admin::findOrFail($id);

            $admins->first_name = $request->get('first_name');
            $admins->last_name = $request->get('last_name');
            $admins->mobile = $request->get('mobile');
            $admins->age = $request->get('age');
            $admins->email = $request->get('email');
            $admins->city_id = $request->get('city_id');
            $admins->password = Hash::make($request->get('password'));

            if (request()->hasFile('image')) {

                $image = $request->file('image');
    
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
    
                $image->move('storage/images/admin', $imageName);
    
                $admins->image = $imageName;
    
                }
    
                if (request()->hasFile('cv')) {
    
                $cv = $request->file('cv');
    
                $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
    
                $cv->move('storage/files/admin', $fileName);
    
                $admins->cv = $fileName;
                }

            $isUpdate = $admins->save();
            return['redirect' =>route('admins.index')];
            if($isUpdate){
                return response()->json(['icon' => 'success' , 'title' => 'Update successflly'] ,200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'Update failed'] ,400);

            }
        }
         else{
                return response()->json(['icon' => 'error' ,'title' => $validator->getMessageBag()->first(),400]);
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
        $admins = Admin::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'deleted successflly'] ,$admins? 200 :400);

    }
}
