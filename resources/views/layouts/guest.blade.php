<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script type="module">
            import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
            const el = document.createElement('pwa-update');
            // document.body.appendChild(el);
         </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $titulo }} · Cashiers</title>

        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('vendor/adminlte/dist/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendor/adminlte/dist/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendor/adminlte/dist/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('vendor/adminlte/dist/favicon/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ asset('vendor/adminlte/dist/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css">
        <link rel="stylesheet" href="{{asset('vendor/adminlte/dist/css/tooltip.css')}}">
        <style>
            /* TOGGLE PASS VISIBILITY */

            .btn-toggle-pass-visib i{
                cursor: pointer;
                color: #725BC2;
            }

        </style>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body style="user-select: none;">
        <div class="font-sans text-gray-900 antialiased fix-100-main">
            {{ $slot }}
        </div>
        <script>

            const cashiers_login_form = document.querySelector("#cashiers-login-form");

            const cashiers_btn_acessar = document.querySelector("#cashiers-btn-acessar");

            cashiers_login_form.onsubmit = () => {

                cashiers_btn_acessar.disabled = true;
            
            }

        </script>
        <script>
                    
            var passToggler = document.querySelector('.btn-toggle-pass-visib');
            var iconToggler = document.querySelector('#toggler-pass');
            var password = document.querySelector('#password');
                       
            passToggler.addEventListener('click', ()=>{

                if (iconToggler.classList.contains('fa-eye')) {
                    password.type = 'text';
                    iconToggler.classList.remove("fa-eye");
                    iconToggler.classList.add("fa-eye-slash");
                    passToggler.setAttribute("data-tooltip", "Ocultar");

                }else{
                    password.type = 'password';
                    iconToggler.classList.remove("fa-eye-slash");
                    iconToggler.classList.add("fa-eye");
                    passToggler.setAttribute("data-tooltip", "Exibir");
                }
               
            });

        </script>
    </body>
</html>
