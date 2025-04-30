 <!-- Modal para Criar Chamado -->
 <div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTicketModalLabel">Criar Novo Chamado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-chamado">
                    @csrf
                    <meta name="user-id" content="{{ auth()->id() }}">

                    <div class="form-group mb-3">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control" rows="4" required></textarea>
                    </div>

                    @component('tickets.components.inputs.input-category-select') @endcomponent
                    <button type="button" class="btn btn-success" id='btnCreateTicket'>Criar Chamado</button>
                </form>
            </div>
        </div>
    </div>
</div>