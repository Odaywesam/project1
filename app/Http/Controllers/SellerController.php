<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::orderBy('id' , 'desc')->paginate(5);
        return response()->view('master.seller.index' , compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return response()->view('master.seller.create' , compact('cities'));
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
            $sellers = new Seller();
            $sellers->first_name = $request->get('first_name');
            $sellers->last_name = $request->get('last_name');
            $sellers->email = $request->get('email');
            $sellers->mobile = $request->get('mobile');
            $sellers->age = $request->get('age');
            $sellers->city_id=$request->get('city_id');
            $sellers->password = Hash::make($request->get('password'));


            if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/images/seller', $imageName);

            $sellers->image = $imageName;

            }

            if (request()->hasFile('cv')) {

            $cv = $request->file('cv');

            $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();

            $cv->move('storage/files/seller', $fileName);

            $sellers->cv = $fileName;
            }

            $isSaved = $sellers->save();

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
        $sellers = Seller::findOrFail($id);
        return response()->view('master.seller.edite' , compact('sellers' , 'cities'));
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
            $sellers = Seller::findOrFail($id);
            $sellers->first_name = $request->get('first_name');
            $sellers->last_name = $request->get('last_name');
            $sellers->mobile = $request->get('mobile');
            $sellers->age = $request->get('age');
            $sellers->email = $request->get('email');
            $sellers->city_id=$request->get('city_id');
            $sellers->password = Hash::make($request->get('password'));


            if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/images/Seller', $imageName);

            $sellers->image = $imageName;

            }

            if (request()->hasFile('cv')) {

            $cv = $request->file('cv');

            $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();

            $cv->move('storage/files/Seller', $fileName);

            $sellers->cv = $fileName;
            }

            $isSaved = $sellers->save();

            if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'Update successfully'] , 200);

        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'Update failed'] , 400);
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
        $sellers = Seller::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'deleted successflly'] ,$sellers? 200 : 400);

    }
}
