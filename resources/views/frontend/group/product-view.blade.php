@extends('layouts.frontend.main')

@section('title')
    {{ $product->meta_title}}
@endsection
@section('meta_description')
    {{ $product->meta_description}}
@endsection
@section('meta_keyword')
    {{ $product->meta_keyword}}
@endsection

@section('content')
    <section class="py-5" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="border">
                                        <img src="{{ Storage::url($product->image)}}" class="w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <h5 class="font-weight-bold mt-2 mb-0">{{ $product->name}}</h5>
                                    <div class="py-2">
                                        <small> Rating: <i class="fas fa-star text-warning"></i></small>
                                        <small class="font-italic badge badge-primary ml-3 px-2">{{ $product->sale_tag}}</small>
                                    </div>
                                    <div class="product-price">
                                        <h5 class="font-weight-bold">
                                            <span class="offer-price mr-3" style="font-size: 28px">Rp {{number_format($product->offer_price,0,',','.')}}</span>
                                            <span class="original-price text-black-50"><s>Rp {{number_format($product->original_price,0,',','.')}}</s></span>
                                        </h5>
                                    </div>
                                    <div class="py-3">
                                        <div class="row">
                                            <div class="col-md-2 col-3">
                                                <input type="number" class="form-control" name="quantity" value="1" min="1" max="100">
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <button class="btn btn-danger m-0 py-2 px-3"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2 border-top">
                                        {!! $product->small_description!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="py-2 border-top">
                                <div class="card shadow-sm">
                                    <div class="card-header">
                                        <h6 class="mb-0 font-weight-bold">{{ $product->high_heading}}</h6>
                                    </div>
                                    <div class="card-body">
                                        {!! $product->high_description!!}
                                    </div>
                                </div>
                            </div>
                            <div class="py-2">
                                <div class="card shadow-sm">
                                    <div class="card-header">
                                        <h6 class="mb-0 font-weight-bold">{{ $product->description_heading}}</h6>
                                    </div>
                                    <div class="card-body">
                                        {!! $product->description!!}
                                    </div>
                                </div>
                            </div>
                            <div class="py-2">
                                <div class="card shadow-sm">
                                    <div class="card-header">
                                        <h6 class="mb-0 font-weight-bold">{{ $product->detail_heading}}</h6>
                                    </div>
                                    <div class="card-body">
                                        {!! $product->detail!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection