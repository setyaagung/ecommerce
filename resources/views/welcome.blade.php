@extends('layouts.frontend.main')

@section('title', 'Aminous Indonesia')
@section('content')
    @include('frontend.banner.banner')
    <section class="pt-5">
        <div class="container">
            <div class="row wow fadeIn">
                @for($i = 0; $i < 6; $i++)
                <div class="col-md-3 col-6 mb-3">
                    <div class="card">
                        <div class="view overlay">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg" class="card-img-top" alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Shirt</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="" class="dark-grey-text">Denim shirt
                                        <span class="badge badge-pill danger-color">NEW</span>
                                    </a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>120$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>
@endsection