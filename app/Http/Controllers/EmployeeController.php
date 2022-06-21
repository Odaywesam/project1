<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id' , 'desc')->paginate(5);
        return response()->view('master.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return response()->view('master.employee.create' , compact('cities'));
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
            $employees = new Employee();
            $employees->first_name = $request->get('first_name');
            $employees->last_name = $request->get('last_name');
            $employees->mobile = $request->get('mobile');
            $employees->age = $request->get('age');
            $employees->email = $request->get('email');
            $employees->city_id=$request->get('city_id');
            $employees->password = Hash::make($request->get('password'));


            if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/images/employee', $imageName);

            $employees->image = $imageName;

            }

            if (request()->hasFile('cv')) {

            $cv = $request->file('cv');

            $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();

            $cv->move('storage/files/employee', $fileName);

            $employees->cv = $fileName;
            }

            $isSaved = $employees->save();

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
        $employees = Employee::findOrFail($id);
        $cities = City::all();
        return response()->view('master.employee.show' , compact('employees' , 'cities'));
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
        $employees = Employee::findOrFail($id);
        return response()->view('master.employee.edite' , compact('employees' , 'cities'));
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
            $employees = Employee::findOrFail($id);
            // $roles = Role::findOrFail($request->get('role_id'));
            // //الدالة جاية من  has roles in model for admin
            // $admins->assignRole($roles->name);
            $employees->email=$request->get('email');
            $employees->password= Hash::make($request->get('password'));
            $employees->city_id=$request->get('city_id');
            $employees->first_name = $request->get('first_name');
            $employees->last_name = $request->get('last_name');
            $employees->mobile = $request->get('mobile');
            $employees->city_id=$request->get('city_id');
            $employees->age = $request->get('age');


            $isUpdate = $employees->save();
            if($isUpdate){
            return response()->json(['icon' => 'success' , 'title' => 'created successflly'] , 200);

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
        $employees = Employee::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'deleted successflly'] ,$employees? 200 : 400);

    }
}
