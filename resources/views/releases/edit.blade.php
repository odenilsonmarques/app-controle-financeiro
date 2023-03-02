@extends('layouts.template')
@section('title','Cadastro de lançamento')

@section('content')
    <div class="container">
        <div class="row release-financial">
            <div class="col-sm-5 mt-5">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <img src="{{asset('assets/img/financeEdit.svg')}}" width="300px" height="300px" alt="imagem cadastro lançamento">
            </div>

            <div class="col-sm-7 mt-5">
                <div class="card">
                    <div class="card-header">Atualiazação de Lançamento</div>
                    <div class="card-body">
                        <form action="{{route('releases.update', $releases->id)}}" method="POST"> 
                            {{-- na rota esse verbo é clarado como put, porem aqui no form passa-se como post, pois não existe no form rota do tipo put, porém por trás está rodando uma rota put, na diretiva abaixo se resposabiliza por essa tarefa --}}
                            @method('PUT')
                            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="release_type" class="form-label">Tipo de Lançamento</label>
                                    <select name="release_type" id="release_type" class="form-select" autofocus  required>
                                        
                                        @foreach($selectedReleases as $selectedRelease)
                                            <option value="{{$selectedRelease}}" @if( isset($releases) && $releases -> release_type == $selectedRelease) selected @endif>{{$selectedRelease}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="person" class="form-label">Pessoa</label>
                                    <input type="text" name="person" value="{{$releases->person}}" class="form-control"  maxlength="30" placeholder="Digite o nome" required> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="amount" class="form-label">Valor</label>
                                    <input type="text" name="amount" id="amount" value="{{$releases->amount}}" class="form-control" onkeyup="formatCoin();" placeholder="R$" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="month" class="form-label">Mês</label>
                                    <select name="month" id="month" class="form-select" required>
                                        @foreach($selectedMonths as $selectedMonth)
                                            <option value="{{$selectedMonth}}" @if( isset($releases) && $releases -> month == $selectedMonth) selected @endif>{{$selectedMonth}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="description" class="form-label">Descrição</label>
                                    <textarea class="form-control" name="description" placeholder="Digite uma descrição" aria-label="With textarea" required>{{$releases->description}}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mt-4">
                                    <button class="btn btn-danger"><a href="#">CANCELAR</a></button>
                                    <button type="submit" class="btn btn-success">SALVAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection