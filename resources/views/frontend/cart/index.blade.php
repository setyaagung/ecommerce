@extends('layouts.frontend.main')

@section('title','Keranjang')

@section('content')
    <section class="bg-success" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-2 py-2">
                    <h5><a href="/" class="text-dark">Home</a> › Cart</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (isset($cart_data))
                        @if(Cookie::get('shopping_cart'))
                            @php
                                $total = 0;
                            @endphp
                            <div class="row mb-3">
                                <div class="col-md-8 col-sm-12"></div>
                                <div class="col-md-4 col-sm-8">
                                    <a href="javascript:void(0)" class="clear-cart btn btn-sm btn-danger float-right">Hapus Semua</a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Gambar</th>
                                                    <th>Item</th>
                                                    <th>Harga</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart_data as $data)
                                                    <tr class="cartpage">
                                                        <td>
                                                            <img src="{{ Storage::url($data['item_image'])}}" class="img-fluid" width="50">
                                                        </td>
                                                        <td>
                                                            <h6 class="text-dark font-weight-bold">{{ $data['item_name']}}</h6>
                                                        </td>
                                                        <td>Rp {{ number_format($data['item_price'],0,',','.') }}</td>
                                                        <td>
                                                            <div class="product-quantity">
                                                                <input type="hidden" class="product_id" value="{{ $data['item_id']}}">
                                                                <div class="input-group input-group-sm quantity" style="width: 100px">
                                                                    <div class="input-group-prepend decrease-btn changeQuantity" style="cursor: pointer">
                                                                        <span class="input-group-text">-</span>
                                                                    </div>
                                                                    <input type="text" class="qty-input form-control form-control-sm text-center" maxlength="2" max="10" value="{{ $data['item_quantity']}}">
                                                                    <div class="input-group-append increase-btn changeQuantity" style="cursor: pointer">
                                                                        <span class="input-group-text">+</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="cart-total-price">Rp {{ number_format($data['item_price'] * $data['item_quantity'],0,',','.')}}</td>
                                                        <td><button type="button" class="btn btn-danger btn-sm delete-cart-data" style="float: right"><i class="fas fa-times"></i></button></td>
                                                        @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">

                                <div class="col-md-8 col-sm-12 estimate-ship-tax mb-3">    
                                    <a href="/" class="btn btn-dark pr-3 pl-3">CONTINUE SHOPPING</a>
                                </div><!-- /.estimate-ship-tax -->

                                <div class="col-md-4 col-sm-12">
                                    <div class="card card-body">
                                        <div id="totalajaxcall">
                                            <div class="totalpricingload">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6 class="cart-subtotal-name font-weight-bold text-dark">Subtotal</h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="cart-subtotal-price font-weight-bold text-dark">
                                                            Rp
                                                            <span class="cart-grand-price-viewajax">{{ number_format($total, 0,',','.') }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6 class="cart-subtotal-name font-weight-bold text-dark">PPN</h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="cart-subtotal-price font-weight-bold text-dark">
                                                            Rp
                                                            <span class="cart-grand-price-viewajax">0</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6 class="cart-grand-name font-weight-bold text-dark">Grand Total</h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="cart-grand-price font-weight-bold text-dark">
                                                            Rp
                                                            <span class="cart-grand-price-viewajax">{{ number_format($total, 0,',','.') }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="cart-checkout-btn text-center">
                                                            @if (Auth::user())
                                                                <a href="{{ route('checkout') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
                                                            @else
                                                                <a href="#" data-toggle="modal" data-target="#loginModal" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
                                                                {{-- you add a pop modal for making a login --}}
                                                            @endif
                                                            <h6 class="mt-3">Checkout with Fabcart</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="row">
                            <div class="col-md-12 mycard py-5 text-center">
                                <div class="mycards">
                                    <h4>Wah, keranjang belanjamu masih kosong</h4>
                                    <a href="{{ route('home') }}" class="btn btn-upper btn-outline-dark mt-4">Belanja Sekarang</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection