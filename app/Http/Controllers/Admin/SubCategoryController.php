<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('backend.masterdata.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.masterdata.subcategory.create', compact('categories'));
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
            $data['image'] = Storage::putFileAs('public/subcategoryimage', $request->file('image'), $image_filename);
        }
        $data['status'] = $request->input('status') == true ? 1 : 0;
        $data['priority'] = $request->input('priority') == true ? 1 : 0;
        SubCategory::create($data);
        return redirect()->back()->with('create', 'Data sub kategori berhasil ditambahkan');
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
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('backend.masterdata.subcategory.edit', compact('subcategory', 'categories'));
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
        $subcategory = SubCategory::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->input('name'));
        if ($request->hasFile('image')) {
            Storage::delete($subcategory->image);
            $image_file = $request->file('image');
            $image_extension = $image_file->getClientOriginalExtension();
            $image_filename = time() . '.' . $image_extension;
            $data['image'] = Storage::putFileAs('public/subcategoryimage', $request->file('image'), $image_filename);
        }
        $data['status'] = $request->input('status') == true ? 1 : 0;
        $data['priority'] = $request->input('priority') == true ? 1 : 0;
        $subcategory->update($data);
        return redirect()->back()->with('update', 'Data sub kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        if ($subcategory->products()->count()) {
            return redirect()->back()->with('cant-delete', 'Data sub kategori tidak bisa dihapus karena sudah terhubung dengan data produk');
        }
        Storage::delete($subcategory->image);
        $subcategory->delete();
        return redirect()->back()->with('delete', 'Data sub kategori berhasil dihapus');
    }
}
