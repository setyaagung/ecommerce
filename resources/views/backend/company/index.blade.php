@extends('layouts.backend.main')

@section('title','Profil Perusahaan')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold">Edit Profil Perusahaan</h5>
            
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
            <form action="{{ route('company.update',$company->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $company->name}}">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="address" class="form-control" rows="3">{{ $company->address}}</textarea>
                </div>
                <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control" name="province">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach ($provinces->rajaongkir->results as $province)
                            <option value="{{ $province->province_id}}" {{ $company->province == $province->province_id ? 'selected' : ''}}>{{ $province->province }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kota</label>
                    <select class="form-control" name="city" disabled></select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $company->email}}">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ $company->phone}}">
                </div>
                <div class="form-group">
                    <label>Owner</label>
                    <input type="text" class="form-control" name="owner" value="{{ $company->owner}}">
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('select[name="province"]').on('change', function () {
                $('select[name="city"]').empty().prop('disabled',true);
                var provinceId = $(this).val();

                if(provinceId){
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: "/company/city/"+provinceId,
                        success: function(data){
                            //console.log(data);
                            $.each(data, function(key, value){
                                $('select[name="city"]').append('<option value="'+ value.city_id +'">' + value.type + ' ' + value.city_name + '</option>').prop('disabled',false);
                            });
                        }
                    });
                }else{
                    $('select[name="city"]').empty().prop('disabled',true);
                }
            });
        });
    </script>
@endpush