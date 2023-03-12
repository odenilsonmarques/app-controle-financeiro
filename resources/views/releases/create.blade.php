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
                <img src="{{asset('assets/img/finance.svg')}}" width="300px" height="300px" alt="imagem cadastro lançamento">

            </div>

            <div class="col-sm-7 mt-5">
                <div class="card">
                    <div class="card-header">Cadastro de Lançamento</div>
                    <div class="card-body">
                        <form action="{{route('releases.store')}}" method="POST">
                            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="release_type" class="form-label">Tipo de Lançamento</label>
                                    <select name="release_type" id="release_type" class="form-select" autofocus  required>
                                        <option value="">---- Selecione ----</option>
                                        <option value="Despesa" {{old('release_type') == 'Despesa' ? ' selected':''}}>Despesa</option>
                                        <option value="Receita" {{old('release_type') == 'Receita' ? ' selected': ''}}>Receita</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="person" class="form-label">Pessoa</label>
                                    <input type="text" name="person" id="person" value="{{old('person')}}" class="form-control"  maxlength="30" placeholder="Digite o nome" required> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="amount" class="form-label">Valor</label>
                                    <input type="text" name="amount" id="amount" value="{{old('amount')}}" class="form-control" onkeyup="formatCoin();"  placeholder="R$" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="mes" class="form-label">Mês</label>
                                    <select name="month" id="month" class="form-select" required>
                                        <option value="">---- Selecione ----</option>
                                        <option value="Janeiro"   {{old('month') == 'Janeiro' ? ' selected':''}}>Janeiro</option>
                                        <option value="Fevereiro" {{old('month') == 'Fevereiro' ? ' selected':''}}>Fevereiro</option>
                                        <option value="Março"     {{old('month') == 'Março' ? ' selected':''}}>Março</option>
                                        <option value="Abril"     {{old('month') == 'Abril' ? ' selected':''}}>Abril</option>
                                        <option value="Maio"      {{old('month') == 'Maio' ? ' selected':''}}>Maio</option>
                                        <option value="Junho"     {{old('month') == 'Junho' ? ' selected':''}}>Junho</option>
                                        <option value="Julho"     {{old('month') == 'Julho' ? ' selected':''}}>Julho</option>
                                        <option value="Agosto"    {{old('month') == 'Agosto' ? ' selected':''}}>Agosto</option>
                                        <option value="Setembro"  {{old('month') == 'Setembro' ? ' selected':''}}>Setembro</option>
                                        <option value="Outubro"   {{old('month') == 'Outubro' ? ' selected':''}}>Outubro</option>
                                        <option value="Novembro"  {{old('month') == 'Novembro' ? ' selected':''}}>Novembro</option>
                                        <option value="Dezembro"  {{old('month') == 'Dezembro' ? ' selected':''}}>Dezembro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="description" class="form-label">Descrição</label>
                                    <textarea class="form-control" name="description" placeholder="Digite uma descrição" aria-label="With textarea" required>{{old('description')}}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mt-4">
                                    <button class="btn btn-danger"><a href="#">CANCELAR</a></button>
                                    <button type="submit" class="btn btn-success">CADASTRAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection