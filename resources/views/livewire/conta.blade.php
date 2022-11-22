<div>
    
    <div class="mbl-context">

        <div class="col-12">

            <div class="d-flex flex-row flex-wrap align-items-center justify-content-between">

                <h2 class="mbl-title-h2">Minha conta</h2> 
                  
                @php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )

                <a class="btn btn-default btn-logout px-5"
                href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    Sair
                </a>

                <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                    @if(config('adminlte.logout_method'))
                        {{ method_field(config('adminlte.logout_method')) }}
                    @endif
                    {{ csrf_field() }}
                </form>

            </div>

            <div class="d-flex flex-row align-items-center justify-content-center">
                <a href="{{route('meus-planos')}}" class="mbl-link-to-my-plans">
                    <div class="mbl-card my-2 py-3">
                        <div id="mbl-my-plans">
                            <span class="mbl-my-account-item">
                                <i class="far fa-file-signature fa-lg fa-fw"></i>
                                <span class="ml-1">Meus Planos</span>
                            </span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="d-flex flex-row align-items-center justify-content-center">

                <div class="mbl-card mb-2">

                    <div id="mobile-operations-vg">

                        <div class="mbl-info-about-account">
                            <span>
                                Olá <b>{{auth()->user()->name}}</b>! Esperamos que esteja gostando de usar o aplicativo da <b>Cashiers</b>. Gostaríamos de informar que nem todas as funcionalidades da Plataforma estão disponíveis no aplicativo. Sendo assim, para:
                            </span>
                        </div>

                        <div class="mbl-info-about-account my-3">
                            <ul>
                                <li>
                                    Editar informações de seu perfil;
                                </li>
                                <li>
                                    Imprimir e salvar relatórios;
                                </li>
                                <li>
                                    Visualizar notificações sobre a situação de seus planos e comissões;
                                </li>
                                <li>
                                    Acompanhar comissões à receber e recebidas;
                                </li>
                                <li>
                                    Acessar módulos adicionais, como gerenciadores de tarefas, senhas e links.
                                </li>
                            </ul>
                        </div>

                        <div class="mbl-info-about-account text-center">

                            <span>
                                <i style="color: #666;" class="fad fa-laptop fa-fw mr-2 fa-sm"></i>
                                Acesse a Plataforma pelo computador, em um navegador, através do link: 
                            </span>

                            <div class="mbl-link-div mt-1">
                                <span class="mbl-about-account-link">
                                    app.cashiers.com.br
                                </span>
                            </div>

                        </div>
                        
                    </div>

                </div>

            </div>

            <div style="padding-bottom: 50px;" class="d-flex flex-column align-items-center justify-content-start">
                <div class="help-div mt-3 mb-4 d-flex flex-column align-items-center justify-content-center">
        
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
