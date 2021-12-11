<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategories::latest()->paginate(5);

        return view('category.index',compact('categories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'title' => 'required',
        ]);

        $category = ProductCategories::create(['title' => $request->title]);

        return redirect()->route('category.index')
        ->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  ProductCategories  $category
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategories $category)
    {
        return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProductCategories  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategories $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ProductCategories  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategories $category)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $category->title = $request->input('title');
        $category->save();

        return redirect()->route('category.index')
        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductCategories  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategories $category)
    {
        $category->delete();
        return redirect()->route('category.index')
        ->with('success','Category deleted successfully');
    }
}
