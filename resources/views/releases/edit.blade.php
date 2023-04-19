@extends('layouts.template')
@section('title','Cadastro de lançamento')

@section('content')
    <div class="container">
        <div class="row">
            @include('includes.validations-form-edit')
            <div class="col-sm-7 cad-release">
                <div class="card">
                    <div class="card-header">Atualiazação de Lançamento</div>
                    <div class="card-body">
                        <form action="{{route('releases.update', $releases->id)}}" method="POST"> 
                            {{-- na rota esse verbo é clarado como put, porem aqui no form passa-se como post, pois não existe no form rota do tipo put, porém por trás está rodando uma rota put, na diretiva abaixo se resposabiliza por essa tarefa --}}
                            @method('PUT')
                            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                            @include('parts.form-edit')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection