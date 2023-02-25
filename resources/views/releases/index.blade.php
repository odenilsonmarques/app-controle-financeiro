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

                @if(session('Error'))
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <strong>{{session('Error')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
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
                                    <td>{{$release->amount}}</td>
                                    <td>{{$release->month}}</td>
                                    <td>{{$release->description}}</td>
                                    <td>
                                        <a href="{{route('releases.edit',[$release->id])}}" class="btn btn-dark btn-sm">Editar</a>
                                        <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection