@extends('layouts.app')

@push('page_css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
<section>
        <div class="logo">
            <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 100vh; padding: 0;">
                <div class="banner_img d-flex justify-content-center align-items-center" style="width: 100%;">
                    <img src="{{ asset('images/Logo-Sin fondo.png') }}" alt="CUMI" class="img-fluid" style="max-width: 150%; height: auto;">
                </div>
            </div>
        </div>
    </section>
@endsection
