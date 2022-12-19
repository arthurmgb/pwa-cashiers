@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')

    <?php
        $manutencao = App\Models\Maintence::find(1);
        $estado = $manutencao->estado;
    ?>

    @if($estado === 1 and auth()->user()->is_admin !== 1)

        <div class="maintence">
            <div class="d-flex flex-column align-items-center justify-content-center px-4 py-5">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="211"
                    height="145">
                    <style>
                        <![CDATA[
                        .B {
                            fill: #fff
                        }

                        .C {
                            stroke-linecap: round
                        }

                        .D {
                            stroke-width: 1.395
                        }

                        .E {
                            stroke: #a4afb7
                        }

                        .F {
                            fill-rule: nonzero
                        }

                        .G {
                            stroke-linejoin: round
                        }

                        .H {
                            fill: #d5dadf
                        }

                        ]]>
                    </style>
                    <g fill="none" fill-rule="evenodd">
                        <path
                            d="M53.803 136.846h122.8m3.907 0h5.58m-141.207 0h5.58m138.977 0h1.674m-150.696 0h1.674"
                            class="C D E" />
                        <path d="M121.264 47.475c6.093 1.704 9.14 3.238 9.14 4.603" stroke="#170040"
                            class="C D G" />
                        <path
                            d="M3.093 132.455l-.3-33.292L1 98.633v-12.7l42.558-4.92 42.558 4.92v12.7l-1.783.53-.3 33.292-40.465 9.003z"
                            class="D E H" />
                        <path fill-opacity=".5" fill="#c2cbd2"
                            d="M1 86.62l42.558-4.92v62.122l-40.465-7.31-.3-37.35L1 98.633z" />
                        <g class="D E H">
                            <path d="M3.093 136.513l-.3-37.35 40.775 5.6 40.775-5.6-.3 37.35-40.465 7.607z" />
                            <path d="M1 98.633V86.41l42.558 5.088 42.558-5.088v12.224l-42.558 6.12z" />
                        </g>
                        <path fill-opacity=".5"
                            d="M83.508 113.56v-13.6l-34.92 4.804zm1.9-26.454l-41.18 5.1.1 11.74 41.08-5.85z"
                            fill="#c2cbd2" />
                        <g class="D E">
                            <path d="M43.558 91.497v52.326" />
                            <g class="B F">
                                <path
                                    d="M76.532 65.72c-6.107 5.778-16.427 9.333-18.62 13.24-1.628 2.9-2.144 7.78-1.874 11.144 3.335-.325 4.11-.45 6.436-.838-.273-3.572.4-5.742 1.16-6.798 2.537-3.484 18.037-7.733 18.303-11"
                                    class="C G" />
                                <path
                                    d="M141.144 29.827L89.04 29.01c-3.54-.056-6.93 1.425-9.295 4.06l-2.888 3.216c-.724.806-1.365 1.684-1.912 2.62-1.976 3.378-2.985 5.908-3.04 7.53-.703 20.954-.858 36.17-.467 45.636.178 4.308.765 8.13 1.76 11.47a16.05 16.05 0 0 0 15.38 11.469h59.993a16.05 16.05 0 0 0 16.046-16.046v-49.83c0-6.943-4.466-13.1-11.066-15.254l-12.41-4.05z" />
                            </g>
                        </g>
                        <rect x="70.332" y="28.22" width="81.73" height="81.882" rx="21.767" class="B F" />
                        <g class="D E B F">
                            <rect x="71.03" y="28.917" width="80.334" height="80.487" rx="16.744" />
                            <g class="C G">
                                <use xlink:href="#B" />
                                <use xlink:href="#B" x="-23.441" />
                            </g>
                        </g>
                        <rect fill-opacity=".7" fill="#e6e9ec" x="75.291" y="32.893" width="71.86"
                            height="71.86" rx="11.498" class="F" />
                        <path
                            d="M97.123 72.242c0 1.8-2.25 3.28-5.023 3.28s-5.023-1.47-5.023-3.28 2.25-3.28 5.023-3.28 5.023 1.47 5.023 3.28m23.44 0c0 1.8 2.25 3.28 5.023 3.28s5.023-1.47 5.023-3.28-2.25-3.28-5.023-3.28-5.023 1.47-5.023 3.28"
                            class="H" />
                        <g class="D E">
                            <path
                                d="M94.325 70.656c2.986 0 5.733-2.328 5.733-5.877s-2.328-5.654-5.315-5.654-5.5 2.547-5.5 6.095 2.094 5.436 5.08 5.436z"
                                class="B" />
                            <path d="M94.08 62.234c-.772 1.904-.772 3.548 0 4.932" class="C" />
                            <path
                                d="M123.592 70.656c-2.986 0-5.733-2.328-5.733-5.877s2.328-5.654 5.315-5.654 5.5 2.547 5.5 6.095-2.094 5.436-5.08 5.436z"
                                class="B" />
                            <path d="M123.838 62.234c.772 1.904.772 3.548 0 4.932" class="C" />
                            <g class="B">
                                <path
                                    d="M172.708 136.447h-7.356l-1.266-2.218-6.018-10.082-.083-.154c-.895-1.75-.653-3.892 1.096-4.788.14-.072.285-.133.434-.184a3.23 3.23 0 0 1 3.919 1.606c.044.088.102.226.173.414l2.072 6.425c-.09-.562-.566-4.083-1.427-10.565a4.38 4.38 0 0 1 3.985-4.737 4.34 4.34 0 0 1 .558-.012l.25.01c2.464.103 4.378 2.184 4.275 4.647-.003.084-.01.167-.018.25l-1.914 14.53c.024.8.697-1.637 2.02-7.308a2.66 2.66 0 0 1 3.782-1.39c1.49.83 1.588 2.23.763 3.724l-5.247 9.83z" />
                                <path
                                    d="M161.104 130.992c3.01 0 5.462 2.38 5.577 5.362l.003.218h-11.162c.001-3.01 2.382-5.46 5.362-5.576l.22-.004z" />
                            </g>
                            <ellipse fill="#a4afb7" cx="108.789" cy="83.823" rx="5.233" ry="6.977" />
                            <g class="B">
                                <path
                                    d="M108.8 81.023c2.9 0 4.255-.993 4.06-1.342-.96-1.73-2.422-2.834-4.06-2.834-1.594 0-3.022 1.046-3.982 2.695-.155.267 1.092 1.48 3.982 1.48z" />
                                <path
                                    d="M158.6 79.778c5.473 3.196 11.174 10.04 14.06 9.766 5.987-.57 6.628-9.173 7.166-17.228.674-10.082 6.255 1.37 9.17-5.638 1.505-3.617-5.528-7.05-9.17-5.5s-4.14 4.532-4.494 7.385c-.233 1.87-1.567 13.905-2.98 13.743-2.796-.32-9.738-10.83-13.75-11.65"
                                    class="C F G" />
                            </g>
                            <path
                                d="M194.848 50.46c4.93 2.962 7.9 7.255 8.917 12.88m-.695-12.957c.56.286 4.166 2.128 4.5 6.606"
                                class="C" />
                        </g>
                        <path d="M85.828 39.033c-2.26 1.377-3.86 3.128-4.802 5.253" stroke="#fff"
                            stroke-width="3.349" class="C" />
                        <circle cx="79.408" cy="49.399" r="1.326" class="B" />
                        <g class="D E">
                            <g class="C">
                                <path
                                    d="M96.774 47.475c-6.093 1.704-9.14 3.238-9.14 4.603m34.884-4.603c6.093 1.704 9.14 3.238 9.14 4.603"
                                    class="G" />
                                <path
                                    d="M23.195 55.836c.46 3.045 2.795 1.956 3.087 1.774 1.88-1.173 3.03-1.663 4.342-.56 2.022 1.7-1.555 4.872.66 6.486 2.658 1.937 3.704-3.687 6.936-1.772S36.7 67.4 42.388 67.9M49.52 2.425c2.207.194 4.164 1.2 4.164 3.22 0 2.44-4.174 2.955-3.376 5.577.957 3.146 4.952-.44 5.836 3.482s-7.248 3.923-1.817 7.837" />
                            </g>
                            <g class="B">
                                <path
                                    d="M47.182 41.33l9.2 2.19a.35.35 0 0 1 .166.586l-7 7a.35.35 0 0 1-.586-.166l-2.19-9.2a.35.35 0 0 1 .42-.42z" />
                                <circle cx="28.907" cy="32.893" r="4.884" />
                            </g>
                        </g>
                    </g>
                    <defs>
                        <path id="B"
                            d="M123.276 112.706l.55 18.708h-1.3c-1.432 0-2.593 1.16-2.593 2.593s1.16 2.593 2.593 2.593h4.065a3.49 3.49 0 0 0 3.49-3.49c0-.594-1.432-9.597-1.126-20.405" />
                    </defs>
                </svg>
                <h3 style="font-size: 20px;" class="my-4 no-results text-center">Estamos em manutenção, em breve retornaremos.</h3>
                <div class="d-flex flex-column align-items-center justify-content-center mb-4">
                    <h3 style="font-size: 25px;" class="no-results-create mb-3">Tem dúvidas?</h3>
                    <a href="https://api.whatsapp.com/send?phone=5534998395367&text=Ol%C3%A1!%20Preciso%20de%20ajuda%20com%20a%20Plataforma%20Cashiers!" target="_blank" class="btn btn-nr"><i class="fad fa-user-headset fa-fw fa-lg mr-2"></i>Fale conosco</a>
                    
                    @php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )

                    <a class="btn btn-default btn-logout btn-block my-4"
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
            </div>
        </div>

    @elseif($estado === 0 or auth()->user()->is_admin == 1)

        @if(auth()->user()->is_blocked == 0)

        <div id="preloader">
            <div class="inner">
                <img style="width: 64px; height: 64px; margin-bottom: 20px; margin-left: 10px;" src="{{asset('vendor/adminlte/dist/img/cashier-logo.png')}}">
                <div class="bolas">
                    <div></div>
                    <div></div>
                    <div></div>                    
                </div>
            </div>
        </div>

        <div class="mobile">

            <div class="mbl-top-nav border-bottom">

                <div class="mobile-brand-logo">
    
                    <img style="margin-top: 0px; width: 32px; height: 32px; max-height: 32px;" src="{{asset('vendor/adminlte/dist/img/cashier-logo.png')}}" class="brand-image mr-2">
                    
                    
                    <span style="font-size: 24px !important;" class="brand-text font-weight-light ">
                        <span class="text-uppercase" style="color: #352B73; font-weight: 600; letter-spacing: 1px;">
                            Ca<span style="color: #f472b6;">$</span>hiers
                        </span>
                    </span>
                
                </div>
                
            </div>
            
            @yield('content')

            <div class="mbl-bottom-nav">

                <?php 
                  $route_name = Route::currentRouteName();    
                ?>
                
                <a id="home-item" href="{{route('home').'#home-item'}}" onclick="loadMenu(this)">
                    <div style="margin-left: 10px;" class="mbl-menu-item @if($route_name == 'home') active-route @endif">
                        <i class="far fa-home-alt fa-lg fa-fw"></i>
                    </div>
                </a>

                <a id="geral-item" href="{{route('geral').'#geral-item'}}" onclick="loadMenu(this)">
                    <div class="mbl-menu-item @if($route_name == 'geral') active-route @endif">
                        <i class="far fa-analytics fa-lg fa-fw"></i>
                    </div>
                </a>

                <a id="caixa-item" href="{{route('caixa').'#caixa-item'}}" onclick="loadMenu(this)">
                    <div class="mbl-menu-item @if($route_name == 'caixa') active-route @endif">
                        <i class="far fa-cash-register fa-lg fa-fw"></i>
                    </div>
                </a>

                <a id="retiradas-item" href="{{route('retiradas').'#retiradas-item'}}" onclick="loadMenu(this)">
                    <div class="mbl-menu-item @if($route_name == 'retiradas') active-route @endif">
                        <i class="far fa-wallet fa-lg fa-fw"></i>
                    </div>
                </a>

                <a id="relatorios-item" href="{{route('relatorios').'#relatorios-item'}}" onclick="loadMenu(this)">
                    <div class="mbl-menu-item @if($route_name == 'relatorios') active-route @endif">
                        <i class="far fa-file-alt fa-lg fa-fw"></i>
                    </div>
                </a>

                <a id="categoria-item" href="{{route('categorias').'#categoria-item'}}" onclick="loadMenu(this)">
                    <div class="mbl-menu-item @if($route_name == 'categorias') active-route @endif">
                        <i class="fab fa-buffer fa-lg fa-fw"></i>
                    </div>
                </a>

                <a id="fp-item" href="{{route('formas-pagamento').'#fp-item'}}" onclick="loadMenu(this)">
                    <div class="mbl-menu-item @if($route_name == 'formas-pagamento') active-route @endif">
                        <i class="far fa-credit-card fa-lg fa-fw"></i>
                    </div>
                </a>

                <a id="operator-item" href="{{route('configuracoes').'#operator-item'}}" onclick="loadMenu(this)">
                    <div class="mbl-menu-item @if($route_name == 'configuracoes') active-route @endif">
                        <i class="far fa-cog fa-lg fa-fw"></i>
                    </div>
                </a>

                <a id="conta-item" href="{{route('conta').'#conta-item'}}" onclick="loadMenu(this)">
                    <div style="margin-right: 10px;" class="mbl-menu-item @if($route_name == 'conta' or $route_name == 'meus-planos') active-route @endif">
                        <i class="far fa-user fa-lg fa-fw"></i>
                    </div>
                </a>

            </div>

        </div>

        @else

            <div id="blocked" class="maintence">
                <div class="d-flex flex-column align-items-center justify-content-center px-4 py-5">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="211"
                        height="145">
                        <style>
                            <![CDATA[
                            .B {
                                fill: #fff
                            }

                            .C {
                                stroke-linecap: round
                            }

                            .D {
                                stroke-width: 1.395
                            }

                            .E {
                                stroke: #a4afb7
                            }

                            .F {
                                fill-rule: nonzero
                            }

                            .G {
                                stroke-linejoin: round
                            }

                            .H {
                                fill: #d5dadf
                            }

                            ]]>
                        </style>
                        <g fill="none" fill-rule="evenodd">
                            <path
                                d="M53.803 136.846h122.8m3.907 0h5.58m-141.207 0h5.58m138.977 0h1.674m-150.696 0h1.674"
                                class="C D E" />
                            <path d="M121.264 47.475c6.093 1.704 9.14 3.238 9.14 4.603" stroke="#170040"
                                class="C D G" />
                            <path
                                d="M3.093 132.455l-.3-33.292L1 98.633v-12.7l42.558-4.92 42.558 4.92v12.7l-1.783.53-.3 33.292-40.465 9.003z"
                                class="D E H" />
                            <path fill-opacity=".5" fill="#c2cbd2"
                                d="M1 86.62l42.558-4.92v62.122l-40.465-7.31-.3-37.35L1 98.633z" />
                            <g class="D E H">
                                <path d="M3.093 136.513l-.3-37.35 40.775 5.6 40.775-5.6-.3 37.35-40.465 7.607z" />
                                <path d="M1 98.633V86.41l42.558 5.088 42.558-5.088v12.224l-42.558 6.12z" />
                            </g>
                            <path fill-opacity=".5"
                                d="M83.508 113.56v-13.6l-34.92 4.804zm1.9-26.454l-41.18 5.1.1 11.74 41.08-5.85z"
                                fill="#c2cbd2" />
                            <g class="D E">
                                <path d="M43.558 91.497v52.326" />
                                <g class="B F">
                                    <path
                                        d="M76.532 65.72c-6.107 5.778-16.427 9.333-18.62 13.24-1.628 2.9-2.144 7.78-1.874 11.144 3.335-.325 4.11-.45 6.436-.838-.273-3.572.4-5.742 1.16-6.798 2.537-3.484 18.037-7.733 18.303-11"
                                        class="C G" />
                                    <path
                                        d="M141.144 29.827L89.04 29.01c-3.54-.056-6.93 1.425-9.295 4.06l-2.888 3.216c-.724.806-1.365 1.684-1.912 2.62-1.976 3.378-2.985 5.908-3.04 7.53-.703 20.954-.858 36.17-.467 45.636.178 4.308.765 8.13 1.76 11.47a16.05 16.05 0 0 0 15.38 11.469h59.993a16.05 16.05 0 0 0 16.046-16.046v-49.83c0-6.943-4.466-13.1-11.066-15.254l-12.41-4.05z" />
                                </g>
                            </g>
                            <rect x="70.332" y="28.22" width="81.73" height="81.882" rx="21.767" class="B F" />
                            <g class="D E B F">
                                <rect x="71.03" y="28.917" width="80.334" height="80.487" rx="16.744" />
                                <g class="C G">
                                    <use xlink:href="#B" />
                                    <use xlink:href="#B" x="-23.441" />
                                </g>
                            </g>
                            <rect fill-opacity=".7" fill="#e6e9ec" x="75.291" y="32.893" width="71.86"
                                height="71.86" rx="11.498" class="F" />
                            <path
                                d="M97.123 72.242c0 1.8-2.25 3.28-5.023 3.28s-5.023-1.47-5.023-3.28 2.25-3.28 5.023-3.28 5.023 1.47 5.023 3.28m23.44 0c0 1.8 2.25 3.28 5.023 3.28s5.023-1.47 5.023-3.28-2.25-3.28-5.023-3.28-5.023 1.47-5.023 3.28"
                                class="H" />
                            <g class="D E">
                                <path
                                    d="M94.325 70.656c2.986 0 5.733-2.328 5.733-5.877s-2.328-5.654-5.315-5.654-5.5 2.547-5.5 6.095 2.094 5.436 5.08 5.436z"
                                    class="B" />
                                <path d="M94.08 62.234c-.772 1.904-.772 3.548 0 4.932" class="C" />
                                <path
                                    d="M123.592 70.656c-2.986 0-5.733-2.328-5.733-5.877s2.328-5.654 5.315-5.654 5.5 2.547 5.5 6.095-2.094 5.436-5.08 5.436z"
                                    class="B" />
                                <path d="M123.838 62.234c.772 1.904.772 3.548 0 4.932" class="C" />
                                <g class="B">
                                    <path
                                        d="M172.708 136.447h-7.356l-1.266-2.218-6.018-10.082-.083-.154c-.895-1.75-.653-3.892 1.096-4.788.14-.072.285-.133.434-.184a3.23 3.23 0 0 1 3.919 1.606c.044.088.102.226.173.414l2.072 6.425c-.09-.562-.566-4.083-1.427-10.565a4.38 4.38 0 0 1 3.985-4.737 4.34 4.34 0 0 1 .558-.012l.25.01c2.464.103 4.378 2.184 4.275 4.647-.003.084-.01.167-.018.25l-1.914 14.53c.024.8.697-1.637 2.02-7.308a2.66 2.66 0 0 1 3.782-1.39c1.49.83 1.588 2.23.763 3.724l-5.247 9.83z" />
                                    <path
                                        d="M161.104 130.992c3.01 0 5.462 2.38 5.577 5.362l.003.218h-11.162c.001-3.01 2.382-5.46 5.362-5.576l.22-.004z" />
                                </g>
                                <ellipse fill="#a4afb7" cx="108.789" cy="83.823" rx="5.233" ry="6.977" />
                                <g class="B">
                                    <path
                                        d="M108.8 81.023c2.9 0 4.255-.993 4.06-1.342-.96-1.73-2.422-2.834-4.06-2.834-1.594 0-3.022 1.046-3.982 2.695-.155.267 1.092 1.48 3.982 1.48z" />
                                    <path
                                        d="M158.6 79.778c5.473 3.196 11.174 10.04 14.06 9.766 5.987-.57 6.628-9.173 7.166-17.228.674-10.082 6.255 1.37 9.17-5.638 1.505-3.617-5.528-7.05-9.17-5.5s-4.14 4.532-4.494 7.385c-.233 1.87-1.567 13.905-2.98 13.743-2.796-.32-9.738-10.83-13.75-11.65"
                                        class="C F G" />
                                </g>
                                <path
                                    d="M194.848 50.46c4.93 2.962 7.9 7.255 8.917 12.88m-.695-12.957c.56.286 4.166 2.128 4.5 6.606"
                                    class="C" />
                            </g>
                            <path d="M85.828 39.033c-2.26 1.377-3.86 3.128-4.802 5.253" stroke="#fff"
                                stroke-width="3.349" class="C" />
                            <circle cx="79.408" cy="49.399" r="1.326" class="B" />
                            <g class="D E">
                                <g class="C">
                                    <path
                                        d="M96.774 47.475c-6.093 1.704-9.14 3.238-9.14 4.603m34.884-4.603c6.093 1.704 9.14 3.238 9.14 4.603"
                                        class="G" />
                                    <path
                                        d="M23.195 55.836c.46 3.045 2.795 1.956 3.087 1.774 1.88-1.173 3.03-1.663 4.342-.56 2.022 1.7-1.555 4.872.66 6.486 2.658 1.937 3.704-3.687 6.936-1.772S36.7 67.4 42.388 67.9M49.52 2.425c2.207.194 4.164 1.2 4.164 3.22 0 2.44-4.174 2.955-3.376 5.577.957 3.146 4.952-.44 5.836 3.482s-7.248 3.923-1.817 7.837" />
                                </g>
                                <g class="B">
                                    <path
                                        d="M47.182 41.33l9.2 2.19a.35.35 0 0 1 .166.586l-7 7a.35.35 0 0 1-.586-.166l-2.19-9.2a.35.35 0 0 1 .42-.42z" />
                                    <circle cx="28.907" cy="32.893" r="4.884" />
                                </g>
                            </g>
                        </g>
                        <defs>
                            <path id="B"
                                d="M123.276 112.706l.55 18.708h-1.3c-1.432 0-2.593 1.16-2.593 2.593s1.16 2.593 2.593 2.593h4.065a3.49 3.49 0 0 0 3.49-3.49c0-.594-1.432-9.597-1.126-20.405" />
                        </defs>
                    </svg>

                    <h3 style="font-size: 22px;" class="my-4 no-results text-center">
                        Ops! Parece que sua mensalidade venceu e seu acesso à plataforma expirou :(
                    </h3>

                    <div class="d-flex flex-column align-items-center justify-content-center mb-4">

                        <h3 style="font-size: 22px;" class="no-results-create mb-3 text-center">
                            Entre em contato para regularizar sua situação.
                        </h3>

                        <a href="https://api.whatsapp.com/send?phone=5534998395367&text=Ol%C3%A1!%20Preciso%20de%20ajuda%20com%20a%20Plataforma%20Cashiers!" target="_blank" class="btn btn-nr">
                            <i class="fad fa-user-headset fa-fw fa-lg mr-2"></i>
                            Fale conosco
                        </a>
                        
                        @php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )

                        <a style="width: 200px;" class="btn btn-default btn-logout btn-block my-4"
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
                </div>
            </div>
        
        @endif

    @endif
    
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')

    <script>
        function loadMenu(anchor){

            var iconToLoad = anchor.querySelector("i");
            var divToCheck = anchor.querySelector("div");

            if(!divToCheck.classList.contains('active-route')){
                iconToLoad.className = "";
                iconToLoad.classList.add('fad', 'fa-spinner-third', 'fa-spin', 'fa-lg', 'fa-fw');
            }

        }
    </script>

    <script>
        //<![CDATA[
            $(window).on('load', function () {
            $('#preloader .inner').fadeOut();
            $('#preloader').delay(100).fadeOut(); 
            $('body').delay(100).css({'overflow': 'visible'});
        })
        //]]>
    </script>
    
@stop
