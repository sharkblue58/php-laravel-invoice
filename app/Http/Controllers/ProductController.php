<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allSections = Section::all();
        $allProducts = Product::all();
        return view('products.products', compact('allSections', 'allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        Product::create($request->all());
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        #  here we store request except data we don't want to update
        $data = $request->except('section_name');
        # we get here section_id from section_name came from request
        $section_id = Section::where('section_name', $request->section_name)->value('id');
        #  here we added section_id to the stored request for update
        $data['$section_id'] = $section_id;
        #  here we find product using its id ,which came from request
        $product = Product::find($request->id);
        $product->update($data);
        session()->flash('edit', 'تم التعديل المنتج بنجاج');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        $product->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاج');
        return redirect('/products');
    }
}
