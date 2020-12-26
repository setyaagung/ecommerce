@extends('layouts.backend.main')

@section('title','Master Data | Tambah Produk')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold">Tambah Produk</h5>
            
        </div>
        <div class="card-body">
            @if ($message = Session::get('create'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sukses!</strong> {{ $message }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="product-tab" data-toggle="tab" href="#product" role="tab">Produk</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab">Deskripsi</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab">SEO</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab">Status</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Produk</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kategori (Sub Kategori)</label>
                                    <select name="sub_category_id" class="form-control">
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id}}">{{ $subcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Singkat</label>
                            <textarea name="small_description" id="sumnote_small" class="form-control" rows="3">{{ old('small_description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="image" class="form-control p-1">
                        </div>
                        <div class="form-group">
                            <label for="">Sale Tag</label>
                            <input type="text" class="form-control" name="sale_tag" value="{{ old('sale_tag')}}">
                        </div>
                        <div class="form-group">
                            <label for="">Berat (gram)</label>
                            <input type="number" class="form-control" name="weight" value="{{ old('weight')}}">
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Harga Original</th>
                                        <th>Harga Jual</th>
                                        <th>Quantity</th>
                                        <th>Priority</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="number" class="form-control" name="original_price" value="{{old('original_price')}}">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="offer_price" value="{{old('offer_price')}}">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="quantity" value="{{old('quantity')}}">
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-control" name="priority">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <div class="form-group">
                            <label for="">High Light</label>
                            <input type="text" name="high_heading" class="form-control" value="{{ old('high_heading')}}">
                            <textarea name="high_description" id="sumnote_high" class="form-control mt-1" rows="3">{{ old('high_description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Produk</label>
                            <input type="text" name="description_heading" class="form-control" value="{{ old('description_heading')}}">
                            <textarea name="description" id="sumnote_desc" class="form-control mt-1" rows="3">{{ old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Spesifikasi Produk</label>
                            <input type="text" name="detail_heading" class="form-control" value="{{old('detail_heading')}}">
                            <textarea name="detail" id="sumnote_detail" class="form-control mt-1" rows="3">{{old('detail')}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                        <div class="form-group">
                            <label for="">Meta Title</label>
                            <textarea name="meta_title" class="form-control" rows="3">{{ old('meta_title')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{ old('meta_keyword')}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">New Arrivals</label>
                                    <input type="checkbox" class="form-control" name="new_arrival">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Featured Products</label>
                                    <input type="checkbox" class="form-control" name="featured_product">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Popular Products</label>
                                    <input type="checkbox" class="form-control" name="popular_product">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Offer Products</label>
                                    <input type="checkbox" class="form-control" name="offer_product">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Show / Hide</label>
                                    <input type="checkbox" class="form-control" name="status">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <a href="{{ route('product.index')}}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $('#sumnote_small').summernote({
        tabsize: 2,
        height: 100
    });
    $('#sumnote_high').summernote({
        tabsize: 2,
        height: 100
    });
    $('#sumnote_desc').summernote({
        tabsize: 2,
        height: 100
    });
    $('#sumnote_detail').summernote({
        tabsize: 2,
        height: 100
    });
</script>
@endpush