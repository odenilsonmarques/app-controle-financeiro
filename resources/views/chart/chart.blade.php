@extends('layouts.template')



@section('title','grafico')

@section('content')
    <div class="container">

        <div class="row">
            
            {!! $chart -> container () !!} 
            
        </div>
    </div>
@endsection

@push('js')
{!! $chart->script() !!}
@endpush
