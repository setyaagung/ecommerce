@extends('layouts.backend.main')

@section('title','User')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold">Tambah User</h5>
            
        </div>
        <div class="card-body">
            <form action="{{ route('user.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role_id" class="form-control">
                        <option value="">-- Pilih Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id}}">{{ $role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection