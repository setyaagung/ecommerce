<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Group;
use App\Model\Product;
use App\Model\SubCategory;

class CollectionController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('frontend.group.index', compact('groups'));
    }

    public function groupview($group_slug)
    {
        $group = Group::where('slug', $group_slug)->first();

        $categories = Category::where('group_id', $group->id)->where('status', 1)->orderBy('name', 'ASC')->get();
        return view('frontend.group.category', compact('group', 'categories'));
    }

    public function categoryview($group_slug, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        $subcategories = SubCategory::where('category_id', $category->id)->where('status', 1)->orderBy('name', 'ASC')->get();
        return view('frontend.group.subcategory', compact('category', 'subcategories'));
    }

    public function subcategoryview(Request $request, $group_slug, $category_slug, $subcategory_slug)
    {
        $subcategory = SubCategory::where('slug', $subcategory_slug)->first();

        if ($request->get('sort') == 'price_asc') {
            $products = Product::where('sub_category_id', $subcategory->id)->where('status', 1)->orderBy('offer_price', 'ASC')->get();
        } elseif ($request->get('sort') == 'price_desc') {
            $products = Product::where('sub_category_id', $subcategory->id)->where('status', 1)->orderBy('offer_price', 'DESC')->get();
        } elseif ($request->get('sort') == 'newest') {
            $products = Product::where('sub_category_id', $subcategory->id)->where('status', 1)->orderBy('created_at', 'DESC')->get();
        } elseif ($request->get('sort') == 'popolarity') {
            $products = Product::where('sub_category_id', $subcategory->id)->where('status', 1)->where('popular_product', 1)->get();
        } else {
            $products = Product::where('sub_category_id', $subcategory->id)->where('status', 1)->orderBy('name', 'ASC')->get();
        }

        return view('frontend.group.product', compact('subcategory', 'products'));
    }
}
