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
                                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Dashboard 2</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard 2</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <!-- Example of a card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Chamados Ativos & Fechados</h4>

                            <div id="cardCollpase1" class="collapse show">
                                <div class="text-center pt-3">
                                    <div id="lifetime-sales" data-colors="#00acc1,#f1556c"></div>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                            <h4><i class="fe-arrow-down text-danger me-1"></i>$7.8k</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                            <h4><i class="fe-arrow-up text-success me-1"></i>$1.4k</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                            <h4><i class="fe-arrow-down text-danger me-1"></i>$9.8k</h4>
                                        </div>
                                    </div> <!-- end row -->
                                    
                                </div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>

                <divider></divider>
                <div class="row">
                    <div class="card">

                    </div>
                </div>
            </div> 
        </div> 
    </div> 
@endsection



