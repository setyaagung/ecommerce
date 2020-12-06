@extends('layouts.backend.main')

@section('title','Master Data | Sub Kategori')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold">Sub Kategori</h5>
            <div class="float-right">
                <a href="{{ route('subcategory.create')}}" class="btn btn-sm btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if ($message = Session::get('cant-delete'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ $message }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($message = Session::get('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Dihapus!</strong> {{ $message }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Show/Hide</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $subcategory->name}}</td>
                                <td>{{ $subcategory->category->name}}</td>
                                <td>
                                    <img src="{{ Storage::url($subcategory->image)}}" class="img-fluid" width="100px">
                                </td>
                                <td>
                                    <input type="checkbox" {{ $subcategory->status == 1 ? 'checked' : ''}}>
                                </td>
                                <td>
                                    <a href="{{ route('subcategory.edit',$subcategory->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('subcategory.destroy', $subcategory->id)}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini ?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection