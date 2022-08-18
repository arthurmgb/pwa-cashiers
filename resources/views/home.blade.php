@extends('adminlte::page')

@section('title', 'Página inicial')

@section('content_header')
@stop

@section('content')

    <div class="content-inicial">

        @livewire('home')

    </div>

    <div class="content-mbl">

        @livewire('home')
        
    </div>

@stop

@section('footer')
    
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor\adminlte\dist\css\preloader.css') }}">
    <style>
        body {
            overflow: hidden;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('js/newfont.js') }}"></script>
    @if(auth()->user()->modal_start === 1)
        <script>
            $(document).ready(function(){
                $("#modalHome").modal('show');
            });
        </script>
    @endif
    <script>
        function changePix(){
            var btn = document.getElementById("btn-pix");
            btn.innerHTML = 'Copiado!';
            setTimeout(() => {
                btn.innerHTML = 'Copiar código do QR Code <i class="fa-fw fas fa-clone ml-1"></i>';
            }, 1000);
        }
    </script>
@stop
