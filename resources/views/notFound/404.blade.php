@extends('layouts.template')
@section('title','404')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                </span> página não encontrada!</h1><br>
                <img src="{{asset('assets/img/notFound.svg')}}" alt="status 404" width="300" height="300">
            </div>
        </div>
    </div>
@endsection