<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\Categore;
use Illuminate\Http\Request;

class CategoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categore::orderBy('id','desc')->Paginate(5);
        return response()->view('master.Categore.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                //عرض صفحة الادخال
       return response()->view('master.Categore.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //تخزين البيانات
         $validator = Validator($request->all(),[
            'name'=>'required|string',
            // 'image'=>'required|string',
        ]);

        if(!$validator->fails()){
            $categories = new Categore();

            $categories->name=$request->get('name');
            //دالة تخزين الصور والملفات
            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/admin', $imageName);

                $categories->image = $imageName;

                }



            $isSaved = $categories->save();
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
        $categories = Categore::findOrFail($id);
        return response()->view('master.Categore.edit', compact('categories'));
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
            // 'name'=>'required|string',
          //  'image'=>'required|string',
        ]);

        if(!$validator->fails()){
            $categories = Categore::findOrFail($id);

            $categories->name = $request->get('name');


            $isUpdate = $categories->save();
            return['redirect' =>route('categories.index')];
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
        $categories = Categore::destroy($id);
        return response()->json(['icon'=>'success' , 'title' => 'delete successfully'] , $categories ? 200 : 400);
    }
}
