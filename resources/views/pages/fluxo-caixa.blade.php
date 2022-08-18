@extends('adminlte::page')

@section('title', 'Fluxo de caixa')

@section('content_header')
@stop

@section('content')

    <div @if(auth()->user()->table_scroll == 1) style="overflow-x: hidden;" @endif class="uk-container">

        @livewire('fluxo-caixa')

    </div>

    <div class="content-mbl">

        @livewire('fluxo-caixa')
        
    </div>

    @livewire('create-op')

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor\adminlte\dist\css\preloader.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/newfont.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
    
            Livewire.hook('message.processed', (message, component) => {
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            })
        });
    </script>
@stop
