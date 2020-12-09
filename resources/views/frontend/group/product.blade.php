@extends('layouts.frontend.main')

@section('title', 'Koleksi - Produk | ')

@section('content')
    <div class="card mb-5 card py-3 shadow-sm" style="margin-top: 105px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <label class="mb-0">Koleksi / {{ $subcategory->category->group->name}} / {{ $subcategory->category->name}} / {{ $subcategory->name}}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <span class="font-weight-bold sort-font">Sort By :</span>
                <a href="{{ URL::current()}}" class="sort-font">Semua</a>
                <a href="{{ URL::current()."?sort=price_asc"}}" class="sort-font">Termurah</a>
                <a href="{{ URL::current()."?sort=price_desc"}}" class="sort-font">Termahal</a>
                <a href="{{ URL::current()."?sort=newest"}}" class="sort-font">Terbaru</a>
                <a href="{{ URL::current()."?sort=popularity"}}" class="sort-font">Terpopuler</a>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="">
                                                <img src="{{ Storage::url($product->image)}}" class="w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-7 border-right border-left">
                                            <a href="{{ route('collection.subcategoryview',[$product->subcategory->category->group->slug,$product->subcategory->category->slug,$product->subcategory->slug,$product->slug])}}">
                                                <h5 class="mb-3">{{ $product->name}}</h5>
                                            </a>
                                            <div class="">
                                                <h6 class="text-dark mb-0">{!! $product->high_description !!}</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-right">
                                                <h6 class="font-italic text-dark badge badge-warning px-3 py-1">{{ $product->sale_tag}}</h6>
                                                <h6 class="font-italic"><s>Rp {{ number_format($product->original_price,0, ',' , '.')}}</s></h6>
                                                <h5 class="font-italic font-weight-bold">Rp {{ number_format($product->offer_price,0, ',' , '.')}}</h5>
                                            </div>
                                            <div class="text-right">
                                                <a href="{{ route('collection.subcategoryview',[$product->subcategory->category->group->slug,$product->subcategory->category->slug,$product->subcategory->slug,$product->slug])}}"
                                                    class="btn btn-outline-primary py-1 px-2">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection