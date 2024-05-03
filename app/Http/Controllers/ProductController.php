<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\MasterProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products'] = MasterProduct::all();
        return view('pages.product.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['form'] = 'create';
        return view('pages.product.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        $product = new MasterProduct();
        $product->ProductName = $request->product_name;
        $product->ProductCategory = $request->product_category;
        $product->SellingPrice = $request->selling_price;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['product'] = MasterProduct::where('ProductId',$id)->first();
        return view('pages.product.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['form'] = 'edit';
        $data['product'] = MasterProduct::where('ProductId',$id)->first();
        return view('pages.product.create')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateProductRequest $request, string $id)
    {
        $product = MasterProduct::where('ProductId',$id)->first();
        $product->ProductName = $request->product_name;
        $product->ProductCategory = $request->product_category;
        $product->SellingPrice = $request->selling_price;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = MasterProduct::find($id);
        $product->delete();

        return redirect()->route('product.index');
    }
}
