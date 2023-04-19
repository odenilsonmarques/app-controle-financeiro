@extends('layouts.template')
@section('title','Cadastro')

@section('content')
    <div class="container">
        <div class="row">
            @include('includes.validations-form-create')
            <div class="col-sm-7 cad-release">
                <div class="card">
                    <div class="card-header">Cadastro de Lançamento</div>
                    <div class="card-body">
                        <form action="{{route('releases.store')}}" method="POST">
                            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                            @include('parts.form-create')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection