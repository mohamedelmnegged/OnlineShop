<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCheck;
use App\Models\Product as ModelsProduct;
use App\Http\Traits\adminTrait;
use App\Models\Models\Product as ModelsModelsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class product extends Controller
{
    use adminTrait;

    public function index(){
        $products = ModelsProduct::paginate(5);

        return view('admin.products_show', compact('products'));
    }
    public function show($id){
        $product = ModelsProduct::whereId($id)->first();

        return view('admin.products_details', compact('product'));
    }
    public function create(){

        return view('admin.products_add');
    }

    public function store(ProductCheck $request){
        //after check that user inter valid product then upload image to the folder
        $image   = $this->savePhotos('productImages', $request->image);
        $product = new ModelsProduct();
        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->description = $request->description;
        $product->quantity    = $request->quantity;
        $product->image = $image;
        $product->save();

        return back()->withSucess('Product Added Successfuly ');
    }
    public function edit($id){
        //first check if the product is already exist
        $product = ModelsProduct::whereId($id)->first();
        if(!$product){
            return redirect()->route('admin.products.index')->withMsg('the Product did not found' );
        }
        //after found the product return to view it in edit page
        return view('admin.products_edit', compact('product'));
    }
    public function update(ProductCheck $request){
        // after validation then check if use old image or add new
        $image = "";
        if($request->image):
            //save new photo then delete the old
            $image = $this->savePhotos('productImages', $request->image);
            Storage::disk('productImages')->delete($request->oldImage);
        else:
            $image =  $request->oldImage;
        endif;
        // after add new image and delete old or still with old update the data
        $product = ModelsProduct::whereId($request->id);
        $product->update([
        'name'       => $request->name,
        'price'       => $request->price,
        'description' => $request->description,
        'quantity'    => $request->quantity,
        'image'       => $image,
        ]);

        return back()->withSucess("You Update the product Successfuly");
    }
    public function destroy( $id, Request $request){
        //get the product then delete the image form storage then delete it
        $product = ModelsProduct::whereId($id)->first();
        Storage::disk('productImages')->delete($product->image['name']);
        $product->delete();
        if($product):
            return back()->withSucess('The Product deleted Successfuly');
        endif;

        return redirect()->route('admin.products_show')->withMsg("The deleted did not happened");
    }
}
