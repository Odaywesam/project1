<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Product;
use App\Models\Categore;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id' , 'desc')->paginate(5);
        return response()->view('master.product.index', compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categores = Categore::all();
        $sellers = Seller::all();
        return response()->view('master.product.create' , compact('categores' , 'sellers'));
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
`            // 'image'=>"image|max:2048|mimes:png,jpg,jpeg,pdf",
`
        ]);

        if(! $validator->fails()){
            $products = new Product();
            $products->name = $request->get('name');
            $products->type = $request->get('type');
            $products->mobile = $request->get('mobile');
            $products->price = $request->get('price');
            $products->categore_id=$request->get('categore_id');
            $products->seller_id=$request->get('seller_id');
            $products->discription = $request->get('discription');


            if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/images/product', $imageName);

            $products->image = $imageName;

            }

            $isSaved = $products->save();

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
        $categores = categore::all();
        $sellers = seller::all();
        $products = Product::findOrFail($id);
        return response()->view('master.product.edite' , compact('categores' , 'sellers'));
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
            $products = Product::findOrFail($id);
            $products->name = $request->get('name');
            $products->type = $request->get('type');
            $products->mobile = $request->get('mobile');
            $products->price = $request->get('price');
            $products->categore_id=$request->get('categore_id');
            $products->seller_id=$request->get('seller_id');
            $products->discription = $request->get('discription');
            


            $isUpdate = $products->save();
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
        $products = Product::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'deleted successflly'] ,$products? 200 :400);
    }
}
