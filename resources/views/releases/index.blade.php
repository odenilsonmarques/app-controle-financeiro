@extends('layouts.template')
@section('title','Lançamentos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                @if(session('messageCreate'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>{{session('messageCreate')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('messageEdit'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>{{session('messageEdit')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('messageDestroy'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>{{session('messageDestroy')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row list-releases">
                    <div class="col-lg-9 mt-2">
                        <div class="input-group">
                            <form action="{{route('releases.filter')}}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="input-group mb-4">
                                    <select name="release_type" id="release_type" class="form-select  inputSearch">
                                        <option value="">-- Busca por lançamento --</option>
                                        <option value="Despesa">Despesa</option>
                                        <option value="Receita">Receita</option>
                                    </select>

                                    <select name="month" id="month" class="form-select  inputSearch">
                                        <option value="">-- Busca por mês --</option>
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

                                    <input type="text" name="person" id="person" class="form-control inputSearch" placeholder="Busca por pessoa">

                                    <div class="input-group-append ml-3">
                                        <button type="submit" class="btn btn-outline-secondary" style="background-color:#6c63ff;color:#fff" >Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table table-striped table-hover">
                        <thead class="table header-table">
                            <tr>
                                <th>#</th>
                                <th>Lançamento</th>
                                <th>Pessoa</th>
                                <th>Valor</th>
                                <th>Mês</th>
                                <th>Descrição</th>
                                <th>
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($releases as $release)
                                
                                    <tr>
                                        <td>{{$release->id}}</td>
                                        <td>{{$release->release_type}}</td>
                                        <td>{{$release->person}}</td>
                                        <td>R$ {{number_format($release->amount, 2, ',', '.')}}</td>
                                        <td>{{$release->month}}</td>
                                        <td>{{$release->description}}</td>
                                        <td>
                                            <a href="{{route('releases.edit',[$release->id])}}" class="btn btn-dark btn-sm">Editar</a>
                                            <a href="{{route('releases.destroy', [$release->id])}}" class="btn btn-danger btn-sm">Excluir</a>
                                        </td>
                                    </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    <div class="py-4">
                        {{-- {{$releases->links('pagination::bootstrap-4')}} --}}
                        @if (isset($dataForm))
                            {!! $releases->appends($dataForm)->links('pagination::bootstrap-4') !!}
                        @else
                            {!! $releases->links('pagination::bootstrap-4') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection