@extends('layouts.template')
@section('title','Lançamentos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if(session('messageCreate'))
                    <div class="alert alert-success alert-dismissible msg fade show text-center" role="alert">
                        <strong>{{session('messageCreate')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('messageEdit'))
                    <div class="alert alert-success alert-dismissible msg fade show text-center" role="alert">
                        <strong>{{session('messageEdit')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('messageDestroy'))
                    <div class="alert alert-success alert-dismissible msg fade show text-center" role="alert">
                        <strong>{{session('messageDestroy')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row list-releases">
                    <div class="col-lg-8 mt-2">
                        <div class="input-group">
                            <form action="{{route('releases.filter')}}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="input-group mb-4">
                                    <select name="release_type" id="release_type" class="form-select  inputSearch">
                                        <option value="">-- Busca por lançamento --</option>
                                        <option value="Despesa">Despesa</option>
                                        <option value="Receita">Receita</option>
                                    </select>

                                    <select name="month" id="month" class="form-select inputSearch">
                                        @php
                                            $selectedMonths = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
                                        @endphp
                                        <option value="">---- Selecione ----</option>
                                        @foreach($selectedMonths as $month)
                                            <option value="{{$month}}" {{old('month') == $month ? ' selected':''}}>{{$month}}</option>
                                        @endforeach
                                    </select>

                                    <input type="text" name="person" id="person" class="form-control inputSearch" placeholder="Busca por pessoa">

                                    <div class="input-group-append ml-3">
                                        <button type="submit" class="btn btn-outline-secondary" style="background-color:#6c63ff;color:#fff;margin-right:5px;" >Buscar</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="col-lg-4 mt-2">
                     
                            <a href="{{route('releases.report')}}" target="_blank" class="btn btn-outline-secondary float-end">Gerar lançamentos
                                
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                </svg>
                            
                            </a>
                    </div>
                </div>
                {{-- this code display the value total of month select --}}
                @if(isset($_POST['month']))
                    @php
                        $selectedMonth = $_POST['month'];
                    @endphp
                    @if(isset($datas[$selectedMonth]))
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            Valor total do mês de {{ $selectedMonth }}: R$ <strong>{{ number_format($datas[$selectedMonth], 2, ',', '.') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
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
                                @if($release->release_type == 'Receita')
                                    <tr>
                                        <td>{{$release->id}}</td>
                                        <td>
                                            {{$release->release_type}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-up-circle mb-1" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                                            </svg>
                                        </td>
                                        <td>{{$release->person}}</td>
                                        <td>R$ {{number_format($release->amount, 2, ',', '.')}}</td>
                                        <td>{{$release->month}}</td>
                                        <td>{{$release->description}}</td>
                                        <td>
                                            <a href="{{route('releases.edit',[$release->id])}}" class="btn btn-dark btn-sm">Editar</a>
                                            <a href="{{route('releases.destroy', [$release->id])}}" class="btn btn-danger btn-sm">Excluir</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr style="color:#B22222">
                                        <td>{{$release->id}}</td>
                                        <td>
                                            {{$release->release_type}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-down-circle mb-1" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                                            </svg>
                                        </td>
                                        <td>{{$release->person}}</td>
                                        <td>R$ {{number_format($release->amount, 2, ',', '.')}}</td>
                                        <td>{{$release->month}}</td>
                                        <td>{{$release->description}}</td>
                                        <td>
                                            <a href="{{route('releases.edit',[$release->id])}}" class="btn btn-dark btn-sm">Editar</a>
                                            <a href="{{route('releases.destroy', [$release->id])}}" class="btn btn-danger btn-sm">Excluir</a>
                                        </td>
                                    </tr>
                                @endif
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