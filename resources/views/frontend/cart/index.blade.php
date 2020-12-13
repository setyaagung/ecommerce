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
                            <div class="row">
                                @foreach ($cart_data as $data)
                                    <div class="col-md-12 mb-3">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6">
                                                        <div>
                                                            <img src="{{ Storage::url($data['item_image'])}}" class="img-fluid w-25" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 col-sm-10">
                                                        <h5 class="mb-1 font-weight-bold">{{ $data['item_name']}}</h5>
                                                        <input type="number" class="form-control form-control-sm" value="{{ $data['item_quantity']}}" style="width: 80px">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <table>
                                                            <tr>
                                                                <td>Harga</td>
                                                                <td>&nbsp;:&nbsp;</td>
                                                                <td>Rp {{ number_format($data['item_price'],0,',','.')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total </td>
                                                                <td>&nbsp;:&nbsp;</td>
                                                                <td>Rp {{ number_format($data['item_price'] * $data['item_quantity'],0,',','.')}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2">
                                                        <button class="btn btn-danger btn-sm" style="float: right"><i class="fas fa-times"></i></button>
                                                    </div>
                                                    @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">

                                <div class="col-md-8 col-sm-12 estimate-ship-tax mb-3">    
                                </div><!-- /.estimate-ship-tax -->

                                <div class="col-md-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="cart-subtotal-name">Subtotal</h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="cart-subtotal-price">
                                                        Rp
                                                        <span class="cart-grand-price-viewajax">{{ number_format($total, 0,',','.') }}</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="cart-grand-name">Grand Total</h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="cart-grand-price">
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
                                                            <a href="{{ url('checkout') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
                                                        @else
                                                            <a href="{{ url('login') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
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