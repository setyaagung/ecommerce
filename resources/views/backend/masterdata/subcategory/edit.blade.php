@extends('layouts.backend.main')

@section('title','Master Data | Tambah Kategori')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold">Tambah Sub Kategori</h5>
            
        </div>
        <div class="card-body">
            @if ($message = Session::get('update'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Sukses!</strong> {{ $message }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('subcategory.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="category_id" class="form-control">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id}}" {{$subcategory->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $subcategory->name}}">
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ $subcategory->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" name="image" class="form-control p-1">
                    <img src="{{ Storage::url($subcategory->image)}}" class="img-fluid mt-2" width="150px">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" name="priority" class="form-check-input" {{ $subcategory->priority == 1 ? 'checked': ''}}>
                        <label class="form-check-label" for="exampleCheck1">Priority</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" name="status" class="form-check-input" {{ $subcategory->status == 1 ? 'checked': ''}}>
                        <label class="form-check-label" for="exampleCheck1">Show / Hide</label>
                    </div>
                </div>
                <div class="float-right">
                    <a href="{{ route('subcategory.index')}}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection