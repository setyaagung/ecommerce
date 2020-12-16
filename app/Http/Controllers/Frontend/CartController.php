<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index()
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        //return $cart_data;
        return view('frontend.cart.index', compact('cart_data'));
    }
    public function addtocart(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }
        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $product_id;
        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $product_id) {
                    $cart_data[$keys]["item_quantity"] = $quantity;
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status' => '"' . $cart_data[$keys]["item_name"] . '" Sudah Ditambahkan ke Keranjang']);
                }
            }
        } else {
            $product = Product::findOrFail($product_id);
            $product_name = $product->name;
            $product_image = $product->image;
            $priceori = $product->original_price;
            $priceval = $product->offer_price;

            if ($product) {
                $item_array = array(
                    'item_id' => $product_id,
                    'item_name' => $product_name,
                    'item_image' => $product_image,
                    'item_oriprice' => $priceori,
                    'item_price' => $priceval,
                    'item_quantity' => $quantity
                );
                $cart_data[] = $item_array;
                $item_data = json_encode($cart_data);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status' => '"' . $product_name . '" Ditambahkan ke Keranjang']);
            }
        }
    }
    public function cartloadbyajax()
    {
        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(array('totalcart' => $totalcart));
            die;
            return;
        } else {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart));
            die;
            return;
        }
    }

    public function updatetocart(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $product_id;

            if (in_array($prod_id_is_there, $item_id_list)) {
                foreach ($cart_data as $keys => $values) {
                    if ($cart_data[$keys]["item_id"] == $product_id) {
                        $cart_data[$keys]["item_quantity"] = $quantity;
                        $totalprice = ($cart_data[$keys]["item_price"] * $quantity);
                        $grandtotalprice = 'Rp ' . number_format($totalprice, 0, ',', '.');
                        $item_data = json_encode($cart_data);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json([
                            'status' => '"' . $cart_data[$keys]["item_name"] . '" Quantity Updated',
                            'grandtotal' => '' . $grandtotalprice . ''
                        ]);
                    }
                }
            }
        }
    }
    public function deletefromcart(Request $request)
    {
        $product_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $product_id;

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $product_id) {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json([
                        'status' => 'Item Dihapus dari Keranjang'
                    ]);
                }
            }
        }
    }

    public function clearcart()
    {
        Cookie::queue(Cookie::forget('shopping_cart'));
        return response()->json([
            'status' => 'Keranjang Belanjamu Kosong'
        ]);
    }
}
