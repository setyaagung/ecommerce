@extends('layouts.backend.main')

@section('title','User')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold">User</h5>
            <div class="float-right">
                <a href="{{ route('user.create')}}" class="btn btn-sm btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if ($message = Session::get('create'))
                <div class="alert alert-success alert-dismissible fade show" user="alert">
                    <strong>Sukses!</strong> {{ $message }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($message = Session::get('update'))
                <div class="alert alert-info alert-dismissible fade show" user="alert">
                    <strong>Perbarui!</strong> {{ $message }}.
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
                            <th>Role</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aktif/Nonaktif</th>
                            <th>Online/Offline</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $user->role->name}}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email}}</td>
                                <td>
                                    @if ($user->is_active == 0)
                                        <label class="py-2 px-3 badge badge-primary">Aktif</label>
                                    @else
                                        <label class="py-2 px-3 badge badge-danger">Diblokir</label>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->isOnline())
                                        <label class="py-2 px-3 badge badge-success">Online</label>
                                    @else
                                        <label class="py-2 px-3 badge badge-secondary">Offline</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.edit',$user->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('user.destroy',$user->id)}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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