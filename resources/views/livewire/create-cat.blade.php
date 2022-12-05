<div>
    <!-- Modal Operação-->
    <div class="modal fade" id="operacao" tabindex="-1" aria-labelledby="operacaoLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content modal-custom">
                <div class="modal-header">
                    <h5 class="modal-title px-3 py-3" id="operacaoLabel">Nova categoria</h5>
                    <button type="button" class="close px-4" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times"></i>
                    </button>
                </div>
                <div class="modal-body py-4 px-4">

                    <form wire:submit.prevent="confirmation()">
                        <div class="form-group mb-1 d-flex flex-row flex-wrap align-items-center justify-content-center">
                            <label class="modal-label mr-auto">Tipo de categoria <span class="red">*</span></label>
                            <br>
                            <input wire:model.defer="state.tipo" value="1" class="radio" type="radio" name="tipo-cat"
                                id="cat-entrada">
                            <label class="label-op label-green flex-fill" for="cat-entrada"><i class="fad fa-arrow-to-top fa-fw fa-lg mr-1"></i>Entrada</label>

                            <input wire:model.defer="state.tipo" value="0" class="radio" type="radio" name="tipo-cat"
                                id="cat-saida">
                            <label class="label-op label-red flex-fill" for="cat-saida">Saída<i class="fad fa-arrow-from-top fa-fw fa-lg ml-1"></i></label>
                            @error('state.tipo')
                                <span class="wire-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-1 d-flex flex-row flex-wrap align-items-center justify-content-center">
                            <label class="modal-label mr-auto">Status da categoria <span class="red">*</span></label>
                            <br>
                            <input wire:model.defer="state.status" value="1" class="radio" type="radio" name="status-cat"
                                id="status-ativa">
                            <label class="label-op label-green flex-fill" for="status-ativa"><i class="fad fa-chevron-circle-up fa-fw fa-lg mr-1"></i>Ativa</label>

                            <input wire:model.defer="state.status" value="0" class="radio" type="radio" name="status-cat"
                                id="status-inativa">
                            <label class="label-op label-red flex-fill" for="status-inativa">Inativa<i class="far fa-chevron-circle-down fa-fw fa-lg ml-1"></i></label>
                            @error('state.status')
                                <span class="wire-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label class="modal-label" for="desc-op">Descrição <span class="red">*</span></label>
                            <input wire:model.defer="state.descricao" type="text" class="form-control modal-input"
                                id="desc-op" autocomplete="off"> 
                            @error('state.descricao')
                                <span class="wire-error">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer py-2 d-flex flex-row flex-wrap align-items-center justify-content-center">

                    <button wire:loading.attr="disabled" type="button" class="btn btn-cancel flex-fill order-2" wire:click.prevent="resetNewOperation()">
                        Cancelar
                    </button>

                    <button wire:loading.attr="disabled" type="submit" class="btn btn-send flex-fill order-1">
                        Cadastrar
                    </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Confirmação-->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="confirm-operation" tabindex="-1"
        aria-labelledby="confirm-operationLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content modal-custom">
                <div class="modal-header">
                    <h5 class="modal-title px-3 py-3" id="confirm-operationLabel">Confirmação de cadastro</h5>
                    <button wire:loading.attr="disabled" type="button" class="close px-4" data-dismiss="modal"
                        aria-label="Close" wire:click.prevent="alternate()">
                        <i class="far fa-arrow-left"></i>
                    </button>
                </div>
                <div class="modal-body py-4 px-2">

                    <h5 class="modal-confirmation-msg m-0 text-center px-4 my-3">Deseja realmente cadastrar esta
                        categoria?</h5>

                    <div class="confirmation-msg text-center mb-3">
                        <p class="m-0 mb-3 px-4">
                            Ao clicar em <span class="msg-bold">Confirmar</span>, uma nova categoria de operação será cadastrada no sistema.
                        </p>
                        <button type="button" wire:loading.attr="disabled" wire:click.prevent="alternate()"
                            data-dismiss="modal" class="px-4 verify-font">Verificar dados da categoria</button>
                    </div>

                </div>
                <div class="modal-footer py-2 d-flex flex-row flex-wrap align-items-center justify-content-center">

                    <button wire:loading.attr="disabled" wire:click.prevent="resetOperation()" type="button" class="btn btn-cancel flex-fill order-2" data-dismiss="modal">
                        Cancelar
                    </button>

                    <button wire:loading.attr="disabled" wire:click.prevent="save()" type="button" class="btn btn-send flex-fill order-1">
                        Confirmar
                    </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
