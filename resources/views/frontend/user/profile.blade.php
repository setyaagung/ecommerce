@extends('layouts.frontend.main')

@section('title', 'My Profile')
@section('content')
    <section style="padding-top: 120px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">My Profile</div>
                        <div class="card-body">
                            @if ($message = Session::get('update'))
                                <div class="alert alert-info alert-dismissible fade show" user="alert">
                                    <strong>Perbarui!</strong> {{ $message }}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('my-profile-update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <img src="{{ Storage::url(Auth::user()->image)}}" class="img-fluid w-50" alt="Profile">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Foto Profil</label>
                                                    <input type="file" name="image" class="form-control p-1">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nama</label>
                                                    <input type="text" class="form-control" value="{{ Auth::user()->name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" class="form-control" value="{{ Auth::user()->email}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Alamat 1</label>
                                            <textarea name="address1" class="form-control" rows="3">{{ Auth::user()->address1}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Alamat 2</label>
                                            <textarea name="address2" class="form-control" rows="3">{{ Auth::user()->address2}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nomor Telepon 1</label>
                                            <input type="number" name="phone1" class="form-control" value="{{ Auth::user()->phone1}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nomor Telepon 2</label>
                                            <input type="number" name="phone2" class="form-control" value="{{ Auth::user()->phone2}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md float-right">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
