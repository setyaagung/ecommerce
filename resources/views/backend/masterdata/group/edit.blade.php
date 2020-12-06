@extends('layouts.backend.main')

@section('title','Master Data | Edit Group')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold">Edit Group</h5>
            
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
            <form action="{{ route('group.update',$group->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $group->name}}">
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ $group->description }}</textarea>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" name="status" class="form-check-input" <input type="checkbox" {{ $group->status == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleCheck1">Show / Hide</label>
                    </div>
                </div>
                <div class="float-right">
                    <a href="{{ route('group.index')}}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection