<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('id','desc')->Paginate(5);
        return response()->view('master.City.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('master.city.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valedator =Validator($request->all(),[
            'name'=>'required|string',
            'street'=>'required|string',
        ]
        ,[
            'name.requierd'=>'city name is requierd'
        ]
    );
        if(!$valedator->fails()){

        $cities =new City();
        $cities->name = $request->get('name');
        $cities->street = $request->get('street');

        $isSaved = $cities->save();
        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'created successflly'] ,200);
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'created failed'] ,400);

        }
    }
    else{
        return response()->json(['icon' => 'error' ,'title' => $validator->getMessageBag()->first(),400]);
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
        $cities = City::findOrFail($id);
        return response()->view('master.City.edit', compact('cities'));
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
        $valedator =Validator($request->all(),[
            'name'=>'required|string',
            'street'=>'required|string',
        ]
        ,[
            'name.requierd'=>'city name is requierd'
        ]
    );
        if(!$valedator->fails()){

        $cities =City::findOrFail($id);
        $cities->name = $request->get('name');
        $cities->street = $request->get('street');

        $isUpdate = $cities->save();
        return ['redirect' =>route('cities.index')];
        if($isUpdate){
            return response()->json(['icon' => 'success' , 'title' => 'updated successflly'] ,200);
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'updated failed'] ,400);

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
        $cities = City::destroy($id);
        return response()->json(['icon'=>'success' , 'title' => 'delete successfully'] , $cities ? 200 : 400);

    }
}
