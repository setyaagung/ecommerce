<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Group;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.masterdata.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('backend.masterdata.category.create', compact('groups'));
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
        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $image_extension = $image_file->getClientOriginalExtension();
            $image_filename = time() . '.' . $image_extension;
            $data['image'] = Storage::putFileAs('public/categoryimage', $request->file('image'), $image_filename);
        }

        if ($request->hasFile('icon')) {
            $icon_file = $request->file('icon');
            $icon_extension = $icon_file->getClientOriginalExtension();
            $icon_filename = time() . '.' . $icon_extension;
            $data['icon'] = Storage::putFileAs('public/categoryicon', $request->file('icon'), $icon_filename);
        }
        $data['status'] = $request->input('status') == true ? 1 : 0;
        Category::create($data);
        return redirect()->back()->with('create', 'Data kategori berhasil ditambahkan');
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
        $category = Category::findOrFail($id);
        $groups = Group::all();
        return view('backend.masterdata.category.edit', compact('category', 'groups'));
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
        $category = Category::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            Storage::delete($category->image);
            $image_file = $request->file('image');
            $image_extension = $image_file->getClientOriginalExtension();
            $image_filename = time() . '.' . $image_extension;
            $data['image'] = Storage::putFileAs('public/categoryimage', $request->file('image'), $image_filename);
        }

        if ($request->hasFile('icon')) {
            Storage::delete($category->icon);
            $icon_file = $request->file('icon');
            $icon_extension = $icon_file->getClientOriginalExtension();
            $icon_filename = time() . '.' . $icon_extension;
            $data['icon'] = Storage::putFileAs('public/categoryicon', $request->file('icon'), $icon_filename);
        }
        $data['status'] = $request->input('status') == true ? 1 : 0;
        $category->update($data);
        return redirect()->back()->with('update', 'Data kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Storage::delete([$category->image, $category->icon]);
        $category->delete();
        return redirect()->back()->with('delete', 'Data kategori berhasil dihapus');
    }
}
