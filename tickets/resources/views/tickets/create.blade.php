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
                                    <li class="breadcrumb-item active">Cadastrar Chamado</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Cadastrar Chamado</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Novo Chamado</h4>

                                <form action="{{ route('tickets.store') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <textarea name="descricao" id="descricao" class="form-control" rows="4" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="categoria">Categoria</label>
                                        <select name="categoria_id" id="categoria" class="form-control" style="width: 100%" required>
                                            <option value="">Selecione uma categoria</option>
                                            <!-- As categorias podem ser populadas dinamicamente -->
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                            @endforeach
                                        </select>
                                        <!-- Botão para cadastrar nova categoria -->
                                        <button type="button" class="btn btn-link mt-2" id="nova-categoria-btn" style="display: none;">
                                            Cadastrar nova categoria
                                        </button>
                                    </div>

                                    <button type="submit" class="btn btn-success">Criar Chamado</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 
        </div> 
    </div>
@endsection

@section('scripts')
    <!-- Importando o Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializando o Select2 no campo de categoria
            $('#categoria').select2({
                placeholder: 'Selecione ou digite a categoria...',
                allowClear: true
            });

            // Verificar se a categoria digitada não existe
            $('#categoria').on('change', function() {
                var categoriaSelecionada = $(this).val();
                var categoriaTexto = $("#categoria option:selected").text();
                
                if (!categoriaSelecionada || categoriaTexto === 'Selecione uma categoria') {
                    $('#nova-categoria-btn').show();
                } else {
                    $('#nova-categoria-btn').hide();
                }
            });

            // Exibir o botão para cadastro de nova categoria
            $('#nova-categoria-btn').click(function() {
                alert('Abrir um modal ou redirecionar para cadastrar nova categoria.');
                // Redirecionar ou abrir modal para cadastrar nova categoria
            });
        });
    </script>
@endsection
