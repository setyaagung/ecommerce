@extends('layouts.backend.main')

@section('title','Master Data | Edit Kategori')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold">Edit Kategori</h5>
            
        </div>
        <div class="card-body">
            @if ($message = Session::get('update'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Perbarui!</strong> {{ $message }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">Group</label>
                    <select name="group_id" class="form-control">
                        <option value="">-- Pilih Group --</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id}}" {{ $category->group_id == $group->id ? 'selected' : ''}}>{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name}}">
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ $category->description}}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="image" class="form-control p-1">
                            <img src="{{ Storage::url($category->image)}}" class="img-fluid mt-2" width="150px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Icon</label>
                            <input type="file" name="icon" class="form-control p-1">
                            <img src="{{ Storage::url($category->icon)}}" class="img-fluid mt-2" width="150px">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" name="status" class="form-check-input" {{ $category->status == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleCheck1">Show / Hide</label>
                    </div>
                </div>
                <div class="float-right">
                    <a href="{{ route('category.index')}}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection