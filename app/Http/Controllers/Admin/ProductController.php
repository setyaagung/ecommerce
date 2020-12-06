<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\SubCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.masterdata.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        return view('backend.masterdata.product.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->input('name'));
        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $image_extension = $image_file->getClientOriginalExtension();
            $image_filename = time() . '.' . $image_extension;
            $data['image'] = Storage::putFileAs('public/productimage', $request->file('image'), $image_filename);
        }
        $data['priority'] = $request->input('priority') == true ? 1 : 0;
        $data['new_arrival'] = $request->input('new_arrival') == true ? 1 : 0;
        $data['featured_product'] = $request->input('featured_product') == true ? 1 : 0;
        $data['popular_product'] = $request->input('popular_product') == true ? 1 : 0;
        $data['offer_product'] = $request->input('offer_product') == true ? 1 : 0;
        $data['status'] = $request->input('status') == true ? 1 : 0;
        Product::create($data);
        return redirect()->back()->with('create', 'Data produk berhasil ditambahkan');
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
        $product = Product::findOrFail($id);
        $subcategories = SubCategory::all();
        return view('backend.masterdata.product.edit', compact('product', 'subcategories'));
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
        $product = Product::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->input('name'));
        if ($request->hasFile('image')) {
            Storage::delete($product->image);
            $image_file = $request->file('image');
            $image_extension = $image_file->getClientOriginalExtension();
            $image_filename = time() . '.' . $image_extension;
            $data['image'] = Storage::putFileAs('public/productimage', $request->file('image'), $image_filename);
        }
        $data['priority'] = $request->input('priority') == true ? 1 : 0;
        $data['new_arrival'] = $request->input('new_arrival') == true ? 1 : 0;
        $data['featured_product'] = $request->input('featured_product') == true ? 1 : 0;
        $data['popular_product'] = $request->input('popular_product') == true ? 1 : 0;
        $data['offer_product'] = $request->input('offer_product') == true ? 1 : 0;
        $data['status'] = $request->input('status') == true ? 1 : 0;
        $product->update($data);
        return redirect()->back()->with('update', 'Data produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
