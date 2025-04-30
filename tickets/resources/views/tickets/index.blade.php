@extends('layouts.common')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Chamados</a></li>
                                    <li class="breadcrumb-item active">List</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Chamados</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <h4 class="header-title">Lista de Chamados</h4>
                                <!-- Botão de Cadastrar Novo Chamado -->
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTicketModal">
                                    + Novo Chamado
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table id="chamados-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Título</th>
                                            <th>Categoria</th>
                                            <th>Descrição</th>
                                            <th>Solicitante</th>
                                            <th>Responsavel</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 
        </div> 
    </div> 

   @component('tickets.components.tickets-create')@endcomponent

    <!-- Modal de Visualização/Edição de Chamado -->
    @component('tickets.components.tickets-details')@endcomponent
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '#btnCreateTicket', function () {
            const ticketId = $('#ticket_id').val();
            const title = $('#titulo').val();
            const description = $('#descricao').val();
            const category_id= $('.categoria-id').val();
            const category_name = $('.categoria-input').val();

            if (!title || !description || !category_name || !category_id) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Campos obrigatórios',
                    text: 'Por favor, preencha todos os campos antes de salvar.'
                });
                return;
            }

            Swal.fire({
                title: 'Confirmar alteração?',
                text: "Você está preste a criar um chamado para equipe de suporte, deseja prosseguir ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sim, salvar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Envio AJAX
                    $.ajax({
                        url: `/tickets/store/`,
                        type: 'POST',
                        data: {
                            _token: $('input[name="_token"]').val(),
                            title: title,
                            description: description,
                            category_id: category_id,
                            category_name: category_name
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Salvo!',
                                text: 'As alterações foram salvas com sucesso.',
                                timer: 2000,
                                showConfirmButton: false
                            });

                            $('#viewTicketModal').modal('hide');
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro!',
                                text: 'Não foi possível salvar as alterações.'
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).on('click', '.btnSalvarTicket', function () {
            const ticketId = $('#ticket_id').val();
            const ownerId = $('#responsavel_ver').val();
            const status = $('#status_ver').val();
            const resolution = $('#resolucao_ver').val();
            const title = $('#titulo_ver').val();
            const description = $('#descricao_ver').val();
            const category_id= $('.categoria-id').val();

  
            const category_name = $('.categoria-input').val();

            if (!ownerId) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Atenção',
                    text: 'Por favor, selecione um responsável antes de salvar.'
                });
                return;
            }

            Swal.fire({
                title: 'Confirmar alteração?',
                text: "Você deseja realmente salvar as alterações?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sim, salvar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/tickets/update/${ticketId}`,
                        type: 'POST',
                        data: {
                            _token: $('input[name="_token"]').val(),
                            title: title,
                            description: description,
                            category_id: category_id,
                            owner_id: ownerId,
                            status: status,
                            resolution: resolution
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Salvo!',
                                text: 'As alterações foram salvas com sucesso.',
                                timer: 2000,
                                showConfirmButton: false
                            });

                            $('#viewTicketModal').modal('hide');
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro!',
                                text: 'Não foi possível salvar as alterações.'
                            });
                        }
                    });
                }
            });
        });
    </script>


    <script>
        $(document).on('click', '.btn-ver-chamado', function () {
            const id = $(this).data('id');
            const url = `/tickets/find/ticket/${id}`;
            const loggedUserId = $('meta[name="user-id"]').attr('content'); 

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: $('input[name="_token"]').val()
                },
                success: function (data) {
                    const ticket = data.tickets;
                    const isOwner = parseInt(ticket.created_by.id) === parseInt(loggedUserId);
                    // Preenche campos
                    $('#ticket_id').val(ticket.id);
                    $('#titulo_ver').val(ticket.title);
                    $('#status_ver').val(ticket.status);

                    $('#descricao_ver').val(ticket.description);
                    $("#resolucao_ver").val(ticket.resolution);

                    const $categoriaWrapper = $('#viewTicketModal .categoria-wrapper');
                    $categoriaWrapper.find('.categoria-input').val(ticket.category?.name || '');
                    $categoriaWrapper.find('.categoria-id').val(ticket.category_id || '');

                    $categoriaWrapper.find('.categoria-input').prop('disabled', !isOwner);
                    $('#titulo_ver').prop('disabled', !isOwner);
                    $('#descricao_ver').prop('disabled', !isOwner);
                    $('#responsavel_ver').prop('disabled', !isOwner);
                    $('#status_ver').prop('disabled', true);
                    $('#resolucao_ver').prop('disabled', !isOwner);

                    // Select de responsáveis
                    const $select = $('#responsavel_ver');
                    $select.empty();
                    $select.append('<option value="" disabled selected>Selecione um responsável</option>');
                    if (Array.isArray(data.suporteOwner)) {
                        data.suporteOwner.forEach(user => {
                            const name = user.name.split(' ').slice(0, 2).join(' ');
                            const selected = (ticket.owner_id && ticket.owner_id == user.id) ? 'selected' : '';
                            $select.append(`<option value="${user.id}" ${selected}>${name}</option>`);
                        });
                    }

                    $('#resolucao_group').addClass('d-none');
                    if (['IN_PROGRESS', 'RESOLVIDO'].includes((ticket.status || '').toUpperCase())) {
                        $('#ticket_in_progress_id').val(ticket.id);
                        $('#resolucao_group').removeClass('d-none');
                        $('#resolucao_ver').val(ticket.resolution || '');
                    }

                    $('#viewTicketModal').modal('show');
                },
                error: function () {
                    alert('Erro ao carregar chamado');
                }
            });
        });


    </script>


    <script>
        $(document).ready(function () {
            $('#chamados-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tickets.datatable') }}",
                order: [[0, 'desc']], 
                columns: [
                    { data: 'id', name: 'id' },
                    { 
                        data: 'title', 
                        name: 'titulo',
                        render: function(data) {
                            return `<strong>${data ?? ''}</strong>`;
                        }
                    },
                    { 
                        data: 'category.name', 
                        name: 'categoria',
                        render: function(data) {
                            return `<span class="badge bg-primary">${data ?? ''}</span>`;
                        }
                    },
                    { data: 'description', name: 'descricao' },
                    { 
                        data: 'created_by.name', 
                        name: 'Solicitante',
                        render: function(data) {
                            if (!data) return '';
                            const partes = data.trim().split(/\s+/);
                            return partes.slice(0, 2).join(' ');
                        }
                    },
                    { 
                        data: 'owner_by.name', 
                        name: 'Responsável',
                        render: function(data) {
                            if (!data) return '';
                            const partes = data.trim().split(/\s+/);
                            return partes.slice(0, 2).join(' ');
                        }
                    },
                    { 
                        data: 'status', 
                        name: 'status',
                        render: function(data) {
                            if (!data) return '';
                            let badgeClass = 'bg-secondary';
                            const status = data.toLowerCase();

                            if (status === 'aberto') {
                                badgeClass = 'bg-primary';
                            } else if (status === 'in_progress') {
                                badgeClass = 'bg-success';
                            } else if (status === 'resolvido') {
                                badgeClass = 'bg-secondary';
                            }

                            return `<span class="badge ${badgeClass}">${status.toUpperCase()}</span>`;
                        }
                    },
                    {
                        data: 'id',
                        name: 'ações',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            if (row.status.toLowerCase() === 'in_progress') {
                                return `<button class="btn btn-sm btn-warning btn-ver-chamado" data-id="${data}">Resolver</button>`;
                            } else if (row.status.toLowerCase() === 'aberto'){
                                return `<button class="btn btn-sm btn-primary btn-ver-chamado" data-id="${data}">Ver</button>`;
                            } else {
                                return '';
                            }
                        }
                    }
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json'
                }
            });
        });
    </script>

<script>
$(document).ready(function () {
    $('.categoria-wrapper').each(function () {
        const $wrapper = $(this);
        const $input = $wrapper.find('.categoria-input');
        const $list = $wrapper.find('.categoria-list');
        const $hiddenInput = $wrapper.find('.categoria-id');
        const $addButton = $wrapper.find('.nova-categoria-btn').hide();
        $input.on('input', function () {
            const query = $(this).val();

            if (query.length > 2) {
                $.ajax({
                    url: '/api/categorias/get',
                    method: 'GET',
                    data: { nome: query },
                    success: function (response) {
                        console.log('Resposta da API:', response); // Para diagnosticar

                        // Garantir que estamos lidando com um array de categorias
                        const categorias = Array.isArray(response) ? response : response.data || [];
                        if (categorias.length > 0) {
                            let html = '';
                            categorias.forEach(function (categoria) {
                                html += `<a href="javascript:void(0)" class="list-group-item list-group-item-action" data-id="${categoria.id}" data-name="${categoria.name}">${categoria.name}</a>`;
                            });
                            $list.html(html).show();
                            $addButton.hide();
                        } else {
                            $list.hide();
                            $addButton.show();
                        }
                    },
                    error: function () {
                        alert('Erro ao buscar categorias');
                    }
                });
            } else {
                $list.hide();
                $addButton.hide();
            }
        });

        // Clique em uma categoria da lista
        $list.on('click', '.list-group-item', function () {
            const categoriaId = $(this).data('id');
            const categoriaNome = $(this).data('name');
            $input.val(categoriaNome);
            $hiddenInput.val(categoriaId);
            $list.hide();
            $addButton.hide();
        });

        // Inserção de nova categoria
        $addButton.on('click', function () {
            const novaCategoria = $input.val();
            if (novaCategoria) {
                $.ajax({
                    url: '/api/categorias/add',
                    method: 'POST',
                    data: { nome: novaCategoria },
                    success: function (response) {
                        $input.val(response.nome);
                        $hiddenInput.val(response.id);
                        $list.hide();
                        $addButton.hide();
                    },
                    error: function () {
                        alert('Erro ao criar categoria');
                    }
                });
            }
        });
    });
});
</script>

@endsection
