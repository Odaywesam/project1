<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = Merchant::orderBy('id' , 'desc')->paginate(5);
        return response()->view('master.Merchant.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return response()->view('master.Merchant.create' , compact('cities'));

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
            $merchants = new Merchant();
            $merchants->first_name = $request->get('first_name');
            $merchants->last_name = $request->get('last_name');
            $merchants->mobile = $request->get('mobile');
            $merchants->age = $request->get('age');
            $merchants->email = $request->get('email');
            $merchants->city_id=$request->get('city_id');
            $merchants->password = Hash::make($request->get('password'));


            if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/images/Merchant', $imageName);

            $merchants->image = $imageName;

            }

            if (request()->hasFile('cv')) {

            $cv = $request->file('cv');

            $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();

            $cv->move('storage/files/Merchant', $fileName);

            $merchants->cv = $fileName;
            }

            $isSaved = $merchants->save();

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
        $merchants = Merchant::findOrFail($id);
        $cities = City::all();
        return response()->view('master.merchant.show' , compact('merchants' , 'cities'));
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
        $merchants = Merchant::findOrFail($id);
        return response()->view('master.Merchant.edite' , compact('merchants' , 'cities'));
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
            $merchants = Merchant::findOrFail($id);
            $merchants->email=$request->get('email');
            $merchants->password= Hash::make($request->get('password'));
            $merchants->city_id=$request->get('city_id');
            $merchants->first_name = $request->get('first_name');
            $merchants->last_name = $request->get('last_name');
            $merchants->mobile = $request->get('mobile');
            $merchants->city_id=$request->get('city_id');
            $merchants->age = $request->get('age');


            $isUpdate = $merchants->save();
            if($isUpdate){
            return response()->json(['icon' => 'success' , 'title' => 'updated successflly'] , 200);

            }
             else{
                    return response()->json(['icon' => 'error' ,'title' => $validator->getMessageBag()->first(),400]);
                }
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
        $merchants = Merchant::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'deleted successflly'] ,$merchants? 200 : 400);

    }
}
