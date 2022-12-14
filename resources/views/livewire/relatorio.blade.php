<div>
    
    <div class="mbl-context">
        
        <div class="col-12">

            <div class="d-flex flex-row align-items-center justify-content-start">
                <h2 class="mbl-title-h2">Relatórios</h2>
            </div>

            <div id="mbl-inputs-of-relatorios" class="d-flex flex-row flex-wrap align-items-center justify-content-start">

                <div class="mbl-relatorios-input flex-fill">

                    <span class="span-relatorio">Período de</span>
                    <input wire:model.defer="data.inicial" id="from" type="date" class="search-relatorio" min="2000-01-01" max="2100-01-01" autocomplete="off">

                </div>

                <div class="mbl-relatorios-input flex-fill">

                    <span class="span-relatorio">até</span>
                    <input wire:model.defer="data.final" id="to" type="date" class="search-relatorio" min="2000-01-01" max="2100-01-01" autocomplete="off">

                </div>

                <div class="mbl-relatorios-input flex-fill">

                    <span class="span-relatorio">Categoria</span>
                    <select wire:model="categoria" style="padding-left: 15px; width: 100%; font-weight: 500; font-size: 14px;" class="form-control modal-input-cat yampay-scroll" onfocus='this.size=4;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                        <option value="">Todas</option>
                        @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->descricao}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mbl-relatorios-input flex-fill">

                    <span class="span-relatorio">Operador</span>
                    @if($operators_filter->count())
                        <select wire:model="operador_filter" style="padding-left: 15px; width: 100%; font-weight: 500; font-size: 14px;" class="form-control modal-input-cat yampay-scroll" onfocus='this.size=4;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option value="">Todos</option>
                            @foreach ($operators_filter as $single_operator)
                                <option value="{{$single_operator->id}}">{{$single_operator->nome}}</option>
                            @endforeach
                        </select>
                    @else
                        <a href="{{route('configuracoes')}}" class="btn btn-new">
                            + Novo operador
                        </a>
                    @endif

                </div>

                <div class="mbl-relatorios-input flex-fill">

                    <span class="span-relatorio">Formas de pagamento</span>
                    <select wire:model="forma_pag" style="padding-left: 15px; width: 100%; font-weight: 500; font-size: 14px;" class="form-control modal-input-cat yampay-scroll" onfocus='this.size=4;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                        <option value="">Todas</option>
                        @foreach ($methods as $method)
                            <option value="{{$method->id}}">{{$method->descricao}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mbl-relatorios-input flex-fill">

                    <button wire:click.prevent="render()" wire:loading.attr="disabled" wire:loading.class="desativado" class="btn btn-new mb-1">
                        <span class="far fa-search fa-fw fa-lg mr-1"></span>
                        Buscar
                    </button>

                </div>

                <div class="mbl-relatorios-input flex-fill">

                    <button wire:click.prevent="caixaHoje()" wire:loading.attr="disabled" wire:loading.class="desativado" class="btn btn-new" type="button">
                        <i class="fal fa-cash-register fa-fw mr-1 fa-lg"></i>
                        Buscar caixa de hoje
                    </button>

                </div>

                @if (isset($operations))
                    
                    <div class="mbl-relatorios-input flex-fill">
                        <button wire:click.prevent="resetRelatorio()" wire:loading.attr="disabled" wire:loading.class="desativado" class="button-relatorio mt-1" style="margin: 0;">
                            <span class="fad fa-broom fa-fw fa-lg mr-1"></span>
                            Limpar busca
                        </button>
                    </div>

                @endif

            </div>

            <div class="d-flex flex-row align-items-center justify-content-center">

                <div class="mbl-card my-2">

                    <div style="margin-top: 50px; margin-bottom: 50px;" wire:loading wire:loading.class="d-flex flex-row align-items-center justify-content-center">
                        <i style="color: #725BC2; opacity: 90%;" class="fad fa-spinner-third fa-fw fa-3x fa-spin"></i>
                    </div>

                    {{-- OPERAÇÕES --}}

                    <div id="mobile-operations-vg" wire:loading.remove>

                    @if (isset($operations) and $operations->count())

                        @php
                            $data_inicial = \Carbon\Carbon::parse($data['inicial'])->format('d/m/Y');
                            $data_final = \Carbon\Carbon::parse($data['final'])->format('d/m/Y');
                        @endphp

                        {{-- RECEITA ALERT --}}
                        
                        <div class="mbl-receita-alert">

                            <div class="d-flex flex-row flex-wrap align-items-center justify-content-start mb-2">

                                <span class="mbl-rc-alert-font flex-fill">

                                    @if ($data_inicial == $data_final)

                                    Período selecionado: 
                                    <br>
                                    <b>
                                    <span style="color: #444;">
                                        {{$data_inicial}}
                                    </span>
                                    </b>

                                    @else

                                    Período selecionado:
                                    <br>
                                    <b>
                                    <span style="color: #444;">
                                        {{$data_inicial}} &nbsp;até&nbsp; {{$data_final}}
                                    </span>
                                    </b>

                                    @endif
                                    
                                </span>

                                <span class="mbl-rc-alert-font flex-fill">

                                    @if (is_null($categoria) or empty($categoria))

                                    Categoria selecionada:
                                    <br>
                                    <b>
                                    <span style="color: #444;">
                                        Todas
                                    </span>
                                    </b>

                                    @else

                                    Categoria selecionada: 
                                    <br>
                                    <b>
                                    <span style="color: #444;">
                                        {{$nome_categoria}}
                                    </span>
                                    </b>

                                    @endif

                                </span>

                                <span class="mbl-rc-alert-font flex-fill">

                                    @if (is_null($operador_filter) or empty($operador_filter))

                                    Operador selecionado:
                                    <br>
                                    <b>
                                    <span style="color: #444;">
                                        Todos
                                    </span>
                                    </b>

                                    @else

                                    Operador selecionado:
                                    <br>
                                    <b>
                                    <span style="color: #444;">
                                        {{$nome_operador}}
                                    </span>
                                    </b>

                                    @endif

                                </span>

                                <span class="mbl-rc-alert-font flex-fill">

                                    @if (is_null($forma_pag) or empty($forma_pag))

                                    Forma de pagamento selecionada:
                                    <br>
                                    <b>
                                    <span style="color: #444;">
                                        Todas
                                    </span>
                                    </b>

                                    @else

                                    Forma de pagamento selecionada:
                                    <br>
                                    <b>
                                    <span style="color: #444;">
                                        {{$nome_fp}}
                                    </span>
                                    </b>

                                    @endif

                                </span>

                            </div>

                            <div class="d-flex flex-row flex-wrap align-items-center justify-content-start div-block-infos mb-2 p-2">

                                <div class="mbl-dbi-item flex-fill">
                                    <span class="rc-alert-font-2 text-uppercase ">
                                        Entradas no período
                                    </span>
                                </div>
                                
                                <div class="mbl-dbi-item flex-fill">
                                    <span style="color: green; font-size: 20px;">
                                        <b>R$ {{ $receita_entrada }}</b>
                                    </span>
                                </div>

                                <div class="mbl-dbi-item flex-fill">
                                    <hr style="width: 100%;" class="my-2">
                                </div>

                                <div class="mbl-dbi-item flex-fill">
                                    <span class="rc-alert-font-2 text-uppercase ">
                                        Saídas no período 
                                    </span>
                                </div>

                                <div class="mbl-dbi-item flex-fill">
                                    <span style="color: red; font-size: 20px;">
                                        <b>- R$ {{ $rec_only_saida }}</b>
                                    </span>
                                </div>

                                <div class="mbl-dbi-item flex-fill">
                                    <hr style="width: 100%;" class="my-2">
                                </div>

                                <div class="mbl-dbi-item flex-fill">
                                    <span class="rc-alert-font-2 text-uppercase ">
                                        Retiradas no período
                                    </span>
                                </div>

                                <div class="mbl-dbi-item flex-fill">
                                    <span style="color: red; font-size: 20px;">
                                        <b>- R$ {{ $receita_ret }}</b>
                                    </span>
                                </div>

                                <div class="mbl-dbi-item flex-fill">
                                    <hr style="width: 100%;" class="my-2">
                                </div>
                                
                                <div class="mbl-dbi-item flex-fill">
                                    <span class="rc-alert-font-2 text-uppercase ">
                                        Saldo no período 
                                    </span>
                                </div>

                                <div class="mbl-dbi-item flex-fill">
                                    <span style="color: green; font-size: 22px;">
                                        <b>R$ {{ $receita_valor }}</b>
                                    </span>
                                </div>

                                @if ($data_inicial == $data_final)

                                @php
                                    $todays_date = date('d/m/Y');                                      
                                @endphp

                                <div class="mbl-dbi-item flex-fill">
                                    <hr style="width: 100%;" class="my-2">
                                </div>

                                @if ($data_inicial == $todays_date)

                                <div class="mbl-dbi-item flex-fill">
                                    <span class="rc-alert-font-2 text-uppercase">
                                        Caixa de 
                                        <span style="color: #444;">
                                            {{$data_inicial}}
                                        </span> 
                                        fechará às 
                                        <span style="color: #444;">
                                            00:00
                                        </span>
                                            em: 
                                    </span>
                                </div>

                                @else

                                <div class="mbl-dbi-item flex-fill">
                                    <span class="rc-alert-font-2 text-uppercase">
                                        Caixa de 
                                        <span style="color: #444;">
                                            {{$data_inicial}}
                                        </span>
                                            fechado em: 
                                    </span>
                                </div>

                                @endif

                                <div class="mbl-dbi-item flex-fill">
                                    <span style="color: #725BC2; font-size: 22px;">
                                        <b>R$ {{ $caixa_fechado_no_dia }}</b>
                                    </span>
                                </div>

                                @elseif($data_inicial != $data_final)

                                <div class="mbl-dbi-item flex-fill">
                                    <hr style="width: 100%;" class="my-2">
                                </div>

                                <div class="mbl-dbi-item flex-fill">
                                    <span class="rc-alert-font-2 text-uppercase">
                                        Do dia                                     
                                        <span style="color: #444;">
                                            {{$data_inicial}}
                                        </span> 
                                        até o dia
                                        <span style="color: #444;">
                                            {{$data_final}}
                                        </span> 
                                        você teve em caixa:
                                    </span>
                                </div>

                                <div class="mbl-dbi-item flex-fill">
                                    <span style="color: #725BC2; font-size: 22px;">
                                        <b>R$ {{ $caixa_fechado_no_dia }}</b>
                                    </span>
                                </div>

                                @endif

                                <div class="mbl-dbi-item flex-fill">
                                    <hr style="width: 100%;" class="my-2">
                                </div>
                                
                                <div class="mbl-dbi-item flex-fill">
                                    <span class="rc-alert-font">
                                        <span style="color: #8369DF;">
                                            <b>{{ $operations_count }}</b>
                                        </span> 
                                        operações realizadas 
                                    </span>                                    
                                </div>

                            </div>

                            <div class="d-flex flex-row flex-wrap align-items-center justify-content-start mb-2">

                                <span style="color: #725bc2;" class="mbl-rc-alert-font">
                                    Detalhes do período
                                </span>

                            </div>

                            <div style="user-select: none;" class="div-coins mb-0">
                                
                                <div class="mbl-dc-detalhes-item">

                                    <div class="div-coin-box cb-modal">

                                        <span class="emoji-coin ec-rel">
                                            <i style="color: #01984E;" class="fad fa-money-bill-alt"></i>
                                            <span class="ml-1">
                                                Dinheiro
                                            </span>
                                        </span>

                                        <span class="coin-valor">
                                            R$ {{$coin_dinheiro_rel}}
                                        </span>

                                    </div>

                                    <span class="d-block small-detail">
                                        Entrou: 
                                        <span style="color: green;">
                                            R$ {{$coin_dinheiro_entrada_rel}}
                                        </span>
                                    </span>

                                    <span class="d-block small-detail small-detail-bottom">
                                        Saiu: 
                                        <span style="color: red;">
                                            R$ {{$coin_dinheiro_saida_rel}}
                                        </span>
                                    </span>

                                </div> 
                                
                                <div class="mbl-dc-detalhes-item mt-2">

                                    <div class="div-coin-box cb-modal">

                                        <span class="emoji-coin ec-rel">
                                            <i style="color: #458DE3;" class="fad fa-money-check-edit-alt"></i>
                                            <span class="ml-1">
                                                Cheques
                                            </span>
                                        </span>

                                        <span class="coin-valor">
                                            R$ {{$coin_cheque_rel}}
                                        </span>

                                    </div>

                                    <span class="d-block small-detail">
                                        Entrou: 
                                        <span style="color: green;">
                                            R$ {{$coin_cheque_entrada_rel}}
                                        </span>
                                    </span>

                                    <span class="d-block small-detail small-detail-bottom">
                                        Saiu: 
                                        <span style="color: red;">
                                            R$ {{$coin_cheque_saida_rel}}
                                        </span>
                                    </span>

                                </div>

                                <div class="mbl-dc-detalhes-item mt-2">

                                    <div class="div-coin-box cb-modal">

                                        <span class="emoji-coin ec-rel">
                                            <i style="color: #e6c300;" class="fad fa-coins"></i>
                                            <span class="ml-1">
                                                Moedas
                                            </span>
                                        </span>

                                        <span class="coin-valor">
                                            R$ {{$coin_moeda_rel}}
                                        </span>

                                    </div>

                                    <span class="d-block small-detail">
                                        Entrou: 
                                        <span style="color: green;">
                                            R$ {{$coin_moeda_entrada_rel}}
                                        </span>
                                    </span>

                                    <span class="d-block small-detail small-detail-bottom">
                                        Saiu: 
                                        <span style="color: red;">
                                            R$ {{$coin_moeda_saida_rel}}
                                        </span>
                                    </span>

                                </div>

                                <div class="mbl-dc-detalhes-item mt-2">

                                    <div class="div-coin-box cb-modal">

                                        <span class="emoji-coin ec-rel">
                                            <i style="color: #10B981;" class="fas fa-cash-register"></i>
                                            <span class="ml-1">
                                                Outros
                                            </span>
                                        </span>

                                        <span class="coin-valor">
                                            R$ {{$coin_outros_rel}}
                                        </span>

                                    </div>

                                    <span class="d-block small-detail">
                                        Entrou: 
                                        <span style="color: green;">
                                            R$ {{$coin_outros_entrada_rel}}
                                        </span>
                                    </span>

                                    <span class="d-block small-detail small-detail-bottom">
                                        Saiu: 
                                        <span style="color: red;">
                                            R$ {{$coin_outros_saida_rel}}
                                        </span>
                                    </span>

                                </div>

                                <div class="mbl-dc-detalhes-item mt-2">

                                    <div class="div-coin-box cb-modal" style="border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;">

                                        <span class="emoji-coin ec-rel">
                                            <i style="color: #E6274C;" class="fad fa-wallet"></i>
                                            <span class="ml-1">
                                                Retiradas
                                            </span>
                                        </span>

                                        <span style="color: #E6274C;" class="coin-valor">
                                            - R$ {{$receita_ret}}
                                        </span>

                                    </div>

                                </div>       
                                
                            </div>

                        </div>

                        {{-- END RECEITA ALERT --}}
                    
                        <div class="accordion" id="accordionOperations">

                            @php
                                $dia_atual = Carbon\Carbon::now();
                            @endphp

                            @foreach ($operations as $operation)

                            @php
                                                        
                                $total_operacao = number_format($operation->total, 2, ',', '.');
                                $data_operacao = $operation->created_at->format('d/m/Y H:i');
                                
                                $date1 = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dia_atual);
                                $date2 = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $operation->created_at);
                                
                                $diferenca = $date2->diffInDays($date1);
                                $tempo = 'dias';
                                
                                if ($diferenca === 1) {
                                    $diferenca = 'um';
                                    $tempo = 'dia';
                                }
                                
                                if ($diferenca === 0) {
                                    $diferenca = $date2->diffInHours($date1);
                                    $tempo = 'horas';
                                
                                    if ($diferenca === 1) {
                                        $diferenca = 'uma';
                                        $tempo = 'hora';
                                    }
                                
                                    if ($diferenca === 0) {
                                        $diferenca = $date2->diffInMinutes($date1);
                                        $tempo = 'minutos';
                                
                                        if ($diferenca === 1) {
                                            $diferenca = 'um';
                                            $tempo = 'minuto';
                                        }
                                
                                        if ($diferenca === 0) {
                                            $diferenca = 'poucos';
                                            $tempo = 'segundos';
                                        }
                                    }
                                }
                                
                                if (is_null($operation->category)) {
                                    $categoria_op = 'Retirada';
                                } else {
                                    $categoria_op = $operation->category->descricao;
                                }

                                if ($operation->especie === 1 ) {
                                    $especie_op = 'Dinheiro';
                                }elseif($operation->especie === 2){
                                    $especie_op = 'Cheque';
                                }elseif($operation->especie === 3) {
                                    $especie_op = 'Moedas';                                             
                                }elseif($operation->especie === 4) {
                                    $especie_op = 'Outros';
                                }
                            
                            @endphp

                            <div class="card mbl-op-item">

                                <div class="card-header mbl-op-item-header" id="heading{{$operation->id}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left mbl-op-item-btn" type="button" data-toggle="collapse" data-target="#collapse{{$operation->id}}" aria-expanded="false" aria-controls="collapse{{$operation->id}}">
                                    <i class="fad fa-chevron-right fa-fw mr-2"></i>
                                    {{$operation->descricao}}
                                    </button>
                                </h2>
                                </div>
                            
                                <div wire:ignore.self id="collapse{{$operation->id}}" class="collapse" aria-labelledby="heading{{$operation->id}}" data-parent="#accordionOperations">
                                <div class="card-body d-flex flex-column align-items-start justify-content-start mbl-details-op">
                                    <span class="mbl-span-item">
                                        @if($operation->tipo == 1)
                                            <div class="mb-2">
                                                <span style="background: #00a3a3;" class="mbl-operacao-label">
                                                    Movimento de entrada
                                                </span>
                                            </div>
                                        @elseif($operation->tipo == 3)
                                            <div class="mb-2">
                                                <span style="background: #0696BD;" class="mbl-operacao-label">
                                                    Retirada de caixa
                                                </span>
                                            </div>
                                        @else
                                            <div class="mb-2">
                                                <span style="background: #E6274C;" class="mbl-operacao-label">
                                                    Movimento de saída
                                                </span>
                                            </div>
                                        @endif
                                    </span>

                                    <span class="mbl-span-item">
                                        Código: 
                                        <span class="mbl-variable-op-item">
                                            {{$operation->id}}
                                        </span> 
                                    </span>

                                    <span class="mbl-span-item">
                                        Total: 
                                        <span class="mbl-variable-op-item mbl-total-format">
                                        R$ {{$total_operacao}}
                                        </span>
                                    </span>

                                    <span class="mbl-span-item">
                                        Data: 
                                        <span class="mbl-variable-op-item ">
                                        {{$data_operacao}}
                                        </span>
                                    </span>

                                    <span class="mbl-span-item">
                                        Categoria: 
                                        <span class="mbl-variable-op-item-purple">
                                        {{$categoria_op}}
                                        </span>
                                    </span>

                                    <span class="mbl-span-item">
                                        Espécie: 
                                        <span class="mbl-variable-op-item-purple">
                                        {{$especie_op}}
                                        </span>
                                    </span>

                                    <span class="mbl-span-item">

                                        @if (is_null($operation->method_id))
                                            @if ($operation->especie == 4)
                                            Forma de pagamento: 
                                            <span class="mbl-variable-op-item">
                                            Não especificada
                                            </span>
                                            @else
                                            Forma de pagamento: 
                                            <span class="mbl-variable-op-item-purple">
                                            {{$especie_op}}
                                            </span>
                                            @endif
                                        @else
                                            Forma de pagamento: 
                                            <span class="mbl-variable-op-item-purple">
                                            {{ $operation->method->descricao }}
                                            </span>
                                        @endif
                                        
                                    </span>

                                    <span class="mbl-span-item">
                                        Operador: 
                                        <span class="mbl-variable-op-item-purple">
                                        {{ $operation->operator->nome ?? auth()->user()->name}}
                                        </span>
                                    </span>

                                </div>
                                </div>
    
                            </div>

                            @endforeach

                        </div>

                    @else

                        <div class="d-flex flex-column align-items-center justify-content-center mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="211" height="145">
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
                                        <path
                                            d="M3.093 136.513l-.3-37.35 40.775 5.6 40.775-5.6-.3 37.35-40.465 7.607z" />
                                        <path
                                            d="M1 98.633V86.41l42.558 5.088 42.558-5.088v12.224l-42.558 6.12z" />
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
                                    <rect x="70.332" y="28.22" width="81.73" height="81.882" rx="21.767"
                                        class="B F" />
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
                                        <ellipse fill="#a4afb7" cx="108.789" cy="83.823" rx="5.233"
                                            ry="6.977" />
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
                            <h3 class="mt-4 mbl-no-results text-center">
                                Não há operações para estes filtros.
                            </h3>
                        </div>

                    @endif

                    </div>

                    {{-- END OPERAÇÕES --}}

                </div>

            </div>

            {{-- PAGINATION --}}

            <div style="user-select: none; padding-bottom: 100px;" class="d-flex flex-column align-items-center justify-content-center">

                <div class="resultados d-flex flex-row align-items-center my-2">
                    <select wire:model="qtd" class="form-control modal-input-cat rpp">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="ml-3 ipp">Itens por página</span>
                </div>

                @if (isset($operations))
                    
                    @if ($operations->hasPages())
                    
                    <div class="paginacao my-2">
                        {{ $operations->links() }}
                    </div>
                    
                    @endif
                
                @endif

            </div>

            {{-- END PAGINATION --}}

        </div>

    </div>

</div>
