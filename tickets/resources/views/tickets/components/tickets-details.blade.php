<div class="modal fade" id="viewTicketModal" tabindex="-1" aria-labelledby="viewTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do Chamado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form id="form-ver-chamado">
                    @csrf
                    <input type="hidden" id="ticket_id" name="ticket_id">

                    <div class="form-group mb-3">
                        <label for="titulo_ver">Título</label>
                        <input type="text" class="form-control" id="titulo_ver" name="titulo">
                    </div>

                    <div class="form-group mb-3">
                        <label for="descricao_ver">Descrição</label>
                        <textarea class="form-control" id="descricao_ver" name="descricao" rows="3"></textarea>
                    </div>

                    @component('tickets.components.inputs.input-category-select') @endcomponent


                    <div class="form-group mb-3">
                        <label for="responsavel_ver">Responsável</label>
                        <select id="responsavel_ver" class="form-control select2" name="owner_id" style="width: 100%;">
                        </select>
                    </div>

                    <div class="form-group mb-3 d-none" id="resolucao_group">
                        <label for="resolucao_ver">Resolução do Chamado</label>
                        <textarea class="form-control" id="resolucao_ver" name="resolution" rows="5"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status_ver">Status</label>
                        <input type="text" class="form-control" id="status_ver" name="status">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success btnSalvarTicket">Salvar</button>
            </div>
        </div>
    </div>
</div>
