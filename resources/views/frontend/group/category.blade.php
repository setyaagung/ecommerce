@extends('layouts.frontend.main')

@section('title', 'Kategori')

@section('content')
    <div class="card mb-5 card py-3 shadow-sm" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <label class="mb-0">Kategori / {{ $group->name}}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="{{ Storage::url($category->image)}}" class="img-fluid" alt="">
                                <div class="card-body bg-light">
                                    <a href="{{ route('collection.categoryview',[$category->group->slug,$category->slug])}}" class="text-center">
                                        <h6 class="mb-0">{{ $category->name}}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection