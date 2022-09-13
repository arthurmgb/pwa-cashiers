@extends('adminlte::page')

@section('title', 'Minha conta')

@section('content_header')
@stop

@section('content')

    <div class="content-mobile">

        @livewire('conta')
        
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor\adminlte\dist\css\preloader.css')}}">
@stop

@section('js')
    <script src="{{asset('js/newfont.js')}}"></script>
@stop