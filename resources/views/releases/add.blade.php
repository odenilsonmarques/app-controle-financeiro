@extends('layouts.template')
@section('title','cadastro de lançamento')

@section('content')

    <div class="container">
        <div class="row release-financial">
            <div class="col-sm-5 mt-5">
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
                                        <option value="DESPESA">DESPESA</option>
                                        <option value="RECEITA">RECEITA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="person" class="form-label">Pessoa</label>
                                    <input type="text" name="person" value="{{old('person')}}" class="form-control"  maxlength="30" placeholder="Digite o nome" required> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="amount" class="form-label">Valor</label>
                                    <input type="text" name="amount" id="amount" value="{{old('amount')}}" class="form-control" onkeyup="formatCoin();" placeholder="R$" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="mes" class="form-label">Mês</label>
                                    <select name="month" id="month" class="form-select" required>
                                        <option value="">---- Selecione ----</option>
                                        <option value="Janeiro">Janeiro</option>
                                        <option value="Fevereiro">Fevereiro</option>
                                        <option value="Março">Março</option>
                                        <option value="Abril">Abril</option>
                                        <option value="Maio">Maio</option>
                                        <option value="Junho">Junho</option>
                                        <option value="Julho">Julho</option>
                                        <option value="Agosto">Agosto</option>
                                        <option value="Setembro">Setembro</option>
                                        <option value="Outubro">Outubro</option>
                                        <option value="Novembro">Novembro</option>
                                        <option value="Dezembro">Dezembro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="description" class="form-label">Descrição</label>
                                    {{-- <input type="text" name="description" value="{{old('description')}}" class="form-control"  maxlegth="30" placeholder="Digite a descrição"> --}}
                                    <textarea class="form-control" name="description"  placeholder="Digite uma descrição" aria-label="With textarea" required></textarea>
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