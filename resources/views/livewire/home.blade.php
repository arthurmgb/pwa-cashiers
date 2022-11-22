<div>

    <div class="mbl-context">
        
        <div class="col-12">

            <div class="d-flex flex-row align-items-center justify-content-between my-3">
                
                <h1 data-toggle="tooltip" data-placement="bottom" title="{{ Auth::user()->name }}" class="mbl-home-title text-truncate ml-3">
                    Olá, {{ Auth::user()->name }}!
                </h1>
                
                <a href="{{route('conta').'#conta-item'}}">
                    <img id="mbl-global-user-img" class="mbl-img-user mr-3" src="https://app.cashiers.com.br{{ Auth::user()->profile_photo_url }}">
                </a>

                <script>

                    window.addEventListener("load", event => {
                    var image = document.querySelector('#mbl-global-user-img');
                    var isLoaded = image.complete && image.naturalHeight !== 0;

                    if(isLoaded == false){
                        image.src = "{{asset('vendor/adminlte/dist/img/global-user.png')}}";
                    }

                    });

                </script>

            </div>

            <div class="d-flex flex-column align-items-start justify-content-start mb-5">

                <img class="mbl-img-bear" src="{{asset('vendor/adminlte/dist/img/no-results-300.png')}}">
                
                <hr class="mbl-hr">
                
            </div>

            <div class="d-flex flex-column align-items-center justify-content-start">

                <div class="mbl-welcome-details">
                
                    <p class="mbl-initial-msg m-0 text-center">
                        Bem-vindo ao 
                        <span class="panel-adm">App da Cashiers</span>!
                    </p>

                    <p class="mbl-initial-msg m-0 text-center">
                        Último login: {{ $last_login }} <br> há {{ $diferenca }} {{ $tempo }}
                    </p>

                </div>

                <hr class="mbl-hr-2">

                <div class="help-div mb-4">
        
                    <h3 class="mbl-home-subtitle mb-2 text-center">
                        Tem alguma dúvida?
                    </h3>
                    <a class="mbl-home-link text-center"
                        href="https://api.whatsapp.com/send?phone=5534998395367&text=Ol%C3%A1!%20Preciso%20de%20ajuda%20com%20a%20Plataforma%20Cashiers!"
                        target="_blank">
                        <i class="fas fa-external-link-alt mr10"></i>
                        Entre em contato com o suporte
                    </a>
                </div>

            </div>

        </div>
               
    </div>

</div>
