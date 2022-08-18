@extends('adminlte::page')

@section('title', 'Formas de pagamento')

@section('content_header')
@stop

@section('content')

    <div class="uk-container">

        @livewire('forma-pagamento')

    </div>

    <div class="content-mbl">
        @livewire('forma-pagamento')
    </div>
    
    @livewire('create-method')

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor\adminlte\dist\css\preloader.css')}}">
@stop

@section('js')
    <script src="{{asset('js/newfont.js')}}"></script>
@stop