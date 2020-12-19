@extends('layouts.frontend.main')

@section('title', 'Checkout')
    
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
        <form action="">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-lg-7">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                <h4 class="font-weight-bold">Billing Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama <i class="text-danger">*</i></label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Nomor Telepon 1 <i class="text-danger">*</i></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Nomor Telepon 2</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Alamat 1 <i class="text-danger">*</i></label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Alamat 2</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Provinsi <i class="text-danger">*</i></label>
                                    <select class="form-control" name="province">
                                        <option value="">-- Pilih Provinsi --</option>
                                        @foreach ($provinces->rajaongkir->results as $province)
                                            <option value="{{ $province->province_id}}">{{ $province->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Kota <i class="text-danger">*</i></label>
                                    <select class="form-control" name="city"></select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Kode POS <i class="text-danger">*</i></label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Pesan</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5">
                        @if (isset($cart_data))
                            @if (Cookie::get('shopping_cart'))
                                @php
                                    $total = 0;
                                @endphp
                                <div class="card">
                                    <div class="card-header bg-dark text-white">
                                        <h4 class="font-weight-bold">Your Order</h4>
                                    </div>
                                    <div class="card-body" style="background: #f5f5f5">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>PRODUK</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart_data as $item)
                                                    <tr>
                                                        <td>
                                                            {{ $item['item_name']}}<br>
                                                            x{{ $item['item_quantity']}}
                                                        </td>
                                                        <td>Rp {{ number_format($item['item_price'] * $item['item_quantity'],0,',','.')}}</td>
                                                        @php $total = $total + ($item["item_quantity"] * $item["item_price"]) @endphp
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td>Subtotal</td>
                                                    <td>Rp {{ number_format($total, 0,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ongkos Kirim</td>
                                                    <td>Rp 0</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Order Total</td>
                                                    <td class="font-weight-bolder" style="font-size: 18px">Rp {{ number_format($total + 15000, 0,',','.') }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="#" class="btn btn-dark btn-block">PLACE ORDER</a>
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
        </form>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('select[name="province"]').on('change', function () {
                var provinceId = $(this).val();

                if(provinceId){
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: "/checkout/city/"+provinceId,
                        success: function(data){
                            //console.log(data);
                            $('select[name="city"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="city"]').append('<option value="'+ value.city_id +'">' + value.type + ' ' + value.city_name + '</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="city"]').empty();
                }
            });
        });
    </script>
@endpush