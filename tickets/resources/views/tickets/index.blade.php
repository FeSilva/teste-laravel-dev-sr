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
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Problema de infra - teste 1</td>
                                            <td><span class="badge bg-primary">Tecnologia da Informação</span></td>
                                            <td>Estou tendo problemas ao realizar uma alteração na bios da maquina</td>
                                            <td><span class="badge bg-success">Aberto</span></td>
                                            <td>
                                                <button class="btn btn-primary btn-sm">Ver</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Problema de infra - teste 2</td>
                                            <td><span class="badge bg-primary">IMPRESSORA</span></td>
                                            <td>Estou tendo problemas ao realizar uma alteração na bios da maquina</td>
                                            <td><span class="badge bg-danger">FECHADO</span></td>
                                            <td>
                                                <button class="btn btn-primary btn-sm">Ver</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 
        </div> 
    </div> 

    <!-- Modal para Criar Chamado -->
    <div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTicketModalLabel">Criar Novo Chamado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tickets.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="titulo">Título</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="categoria">Categoria</label>
                            <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Digite a categoria" required>
                            <input type="hidden" id="category_id" name="category_id"> <!-- Campo oculto para armazenar o ID da categoria -->
                            <button type="button" id="nova_categoria_btn" class="btn bg-primary btn-link mt-2" style="display: none; color:white">
                                Inserir
                            </button>
                            <div id="categoria-list" class="list-group mt-2" style="display: none;"></div>
                        </div>

                        <button type="submit" class="btn btn-success">Criar Chamado</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
     $(document).ready(function() {
        // Quando o usuário digitar no campo
            $('#categoria').on('input', function() {
                var query = $(this).val();

                if (query.length > 2) {
                    // Envia a requisição AJAX para buscar as categorias no banco
                    $.ajax({
                        url: '/api/categories/search',
                        method: 'GET',
                        data: { nome: query },
                        success: function(response) {
                            // Exibe as categorias encontradas
                            if (response.length > 0) {
                                var html = '';
                                response.forEach(function(categoria) {
                                    html += '<a href="javascript:void(0)" class="list-group-item list-group-item-action" data-id="' + categoria.id + '" data-name="' + categoria.name + '">' + categoria.name + '</a>';
                                });
                                $('#categoria-list').html(html).show();
                                $('#nova_categoria_btn').hide();
                            } else {
                                // Se não encontrar, exibe a opção para cadastrar nova categoria
                                $('#categoria-list').hide();
                                $('#nova_categoria_btn').show();
                            }
                        }
                    });
                } else {
                    $('#categoria-list').hide();
                    $('#nova_categoria_btn').hide();
                }
            });

            // Quando o usuário clicar em uma categoria da lista
            $('#categoria-list').on('click', '.list-group-item', function() {
                var categoriaId = $(this).data('id');
                var categoriaNome = $(this).data('name');
                $('#categoria').val(categoriaNome); // Preenche o campo com o nome da categoria
                $('#category_id').val(categoriaId); // Armazena o ID no campo oculto
                $('#categoria-list').hide();
                $('#nova_categoria_btn').hide();
            });

            // Quando o usuário clicar para adicionar uma nova categoria
            $('#nova_categoria_btn').on('click', function() {
                var novaCategoria = $('#categoria').val();
                if (novaCategoria) {
                    $.ajax({
                        url: '/api/categories/add',
                        method: 'POST',
                        data: { nome: novaCategoria },
                        success: function(response) {
                            // Quando a categoria for salva com sucesso
                            $('#categoria').val(response.nome); // Preenche o campo com o nome da nova categoria
                            $('#category_id').val(response.id); // Armazena o ID da nova categoria
                            $('#categoria-list').hide();
                            $('#nova_categoria_btn').hide();
                        },
                        error: function() {
                            alert('Erro ao criar categoria');
                        }
                    });
                }
            });
        });

    </script>
@endsection
