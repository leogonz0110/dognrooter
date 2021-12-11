<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\CategoryPerProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('product.index',compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create', ['categories' => ProductCategories::orderBy('id')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'product_category' => 'required|integer',
            'content' => 'required',
        ]);

        $input = $request->only(['name', 'content']);
        $input['image'] = time()."_".$request->image->getClientOriginalName();
        
        $product = Product::create($input);
        $category = $this->setProductCategory($product->id, $request->only(['product_category']));

        $this->uploadProductImage($request->image, $input['image']); 

        return redirect()->route('product.index')
        ->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        
        $categories = ProductCategories::orderBy('id')->get();
        return view('product.edit',compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->only(['name', 'content']);

        if($request->filled('image')) {
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $input['image'] = time()."_".$request->image->getClientOriginalName();
            $this->uploadProductImage($request->image, $input['image']); 
        }

        if($request->filled('product_category')) {
            $this->validate($request, [
                'product_category' => 'integer',
            ]);
            $category = $this->updateProductCategory($product->id, $request->input('product_category'));
        }

        
        $product->update($input);

        return redirect()->route('product.index')
        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')
        ->with('success','Category deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FileUpload  $file
     * @param  str  $filename
     * @return \Illuminate\Http\Response
     */
    private function uploadProductImage($file, $filename) {
        $file->move(public_path('images/products/'), $filename);

        if(!$file->isValid()) {
            return back()->with("failed", "Alert! image not uploaded");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product_id
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    private function setProductCategory($product_id, $category_id) {
        return CategoryPerProduct::create(['product_id' => (int)$product_id, 'category_id' => (int)$category_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product_id
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    private function updateProductCategory($product_id, $category_id) {
        
        $productCategory = CategoryPerProduct::find($product_id)->get()->first();
        $productCategory->category_id = $category_id;
        return $productCategory->save();
    }

    
}
