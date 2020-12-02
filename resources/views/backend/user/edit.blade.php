@extends('layouts.backend.main')

@section('title','User')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold">Edit User</h5>
            
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $user->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role_id" class="form-control">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id}}" {{ $role->id == $user->role_id ? 'selected' : ''}}>{{ $role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="">Aktif?</label>
                    <select name="is_active" class="form-control">
                        <option value="0" {{ $user->is_active == 0 ? 'selected' : ''}}>Aktif</option>
                        <option value="1" {{ $user->is_active == 1 ? 'selected' : ''}}>Diblokir</option>
                    </select>
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection