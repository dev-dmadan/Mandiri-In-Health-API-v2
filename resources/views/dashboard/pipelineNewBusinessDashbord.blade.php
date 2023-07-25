@extends('dashboard.layoutDashbordPipeline')

@section('custom-chart')
    <!--- Custom List Row 1 -->
    <div class="row">
        <div class="col-md-2 col-lg-2">
            <div class="mb-3 card"
                style="background-color: #4A94DF;background-image:url('/img/Untitled-6-01.png');background-repeat: no-repeat;background-size: auto;">
                <div class="card-body" style="text-align: center;">
                    <div><i class="fa fa-handshake-o" style="font-size:48px;color:white"></i></div>
                    <div id="totalRecordPipelineKomitmen"></div>
                    <div><b><span class="text-white" style="font-size:14px;">KOMITMEN</span></b></div>
                    <div id="totalANPPipelineKomitmen"></div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-lg-2">
            <div class="mb-3 card"
                style="background-color: #7030A0;background-image:url('/img/Untitled-5-01.png');background-repeat: no-repeat;background-size: auto;">
                <div class="card-body" style="text-align: center;">
                    <div><i class="fa fa-usd" style="font-size:48px;color:white"></i></div>
                    <div id="totalRecordPipelineQuotation">
                    </div>
                    <div><b><span class="text-white" style="font-size:14px;">QUOTATION</span></b></div>
                    <div id="totalANPPipelineQuotation"><b><span style="font-size:25px; color:#FFBF00"></span></b>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-lg-2">
            <div class="mb-3 card"
                style="background-color: #00B0F0;background-image:url('/img/Untitled-7-01.png');background-repeat: no-repeat;background-size: auto;">
                <div class="card-body" style="text-align: center;">
                    <div><i class="fa fa-calendar-times-o" style="font-size:48px;color:white"></i></div>
                    <div id="totalRecordPipelineClosing"><b><span class="text-white" style="font-size:45px;"></span></b>
                    </div>
                    <div><b><span class="text-white" style="font-size:14px;">CLOSING</span></b></div>
                    <div id="totalANPPipelineClosing"><b><span style="font-size:25px; color:#FFBF00"></span></b></div>

                </div>
            </div>
        </div>
        <div class="col-md-2 col-lg-2">
            <div class="mb-3 card"
                style="background-color: #FF289E;background-image:url('/img/Untitled-6-01.png');background-repeat: no-repeat;background-size: auto;">
                <div class="card-body" style="text-align: center;">
                    <div><i class="fa-regular fa-hourglass-half" style="font-size:48px;color:white"></i></div>
                    <div id="totalRecordPipelineLoss"><b><span class="text-white" style="font-size:45px;"></span></b>
                    </div>
                    <div><b><span class="text-white" style="font-size:14px;">LOSS</span></b></div>
                    <div id="totalANPPipelineLoss"><b><span style="font-size:25px; color:#FFBF00"></span></b></div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-lg-2">
            <div class="mb-3 card"
                style="background-color: #4472C4;background-image:url('/img/Untitled-5-01.png');background-repeat: no-repeat;background-size: auto;">
                <div class="card-body" style="text-align: center;">
                    <div><i class="fas fa-tasks" style="font-size:48px;color:white"></i></div>
                    <div id="totalRecordPipelineInProgress"><b><span class="text-white" style="font-size:45px;"></span></b>
                    </div>
                    <div><b><span class="text-white" style="font-size:14px;">IN PROGRESS</span></b></div>
                    <div id="totalANPPipelineInProgress"><b><span style="font-size:25px; color:#FFBF00"></span></b></div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-lg-2">
            <div class="mb-3 card"
                style="background-color: #CC3399;background-image:url('/img/Untitled-7-01.png');background-repeat: no-repeat;background-size: auto;">
                <div class="card-body" style="text-align: center;">
                    <div> <i class="fa fa-search" style="font-size:48px;color:white"></i></div>
                    <div id="totalRecordPipelineExpiredQuotation"><b><span class="text-white"
                                style="font-size:45px;"></span></b></div>
                    <div><b><span class="text-white" style="font-size:14px;">EXPIRED QUOTATION</span></b></div>
                    <div id="totalANPPipelineExpiredQuotation"><b><span style="font-size:25px; color:#FFBF00"></span></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--- Custom List Row 1 -->

    <!--- Custom List Row 2 -->
    <div class="row">
        <!--- PIPELINE NEW BUSINESS BY PROGRESS -->
            <div class="col-md-6 col-lg-6">
                <div class="mb-2 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div>
                            <h6><b>PIPELINE KOMITMEN NEW BUSINESS</b></h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                            <div id="chartpipelinekomitmenbykanal"></div>
                                                @section('custom-js')
                                                    <script src="/js/pipelineNewBusinessDashboard.js"></script>
                                                @endsection
                                        </div>
                                    </div>
                                </div>
                                <h6><b>PIPELINE KOMITMEN NEW BUSINESS PER KANAL</b></h6>
                                <div  class="table-scroll" style="height: 400px">
                                    <table id="tableListPipelineKomitmenKanal" class="main-table table table-borderless table-striped table-hover text-nowrap">
                                      <thead>
                                        <tr>
                                          <th scope="col" class="align-middle text-center">NO</th>
                                          <th scope="col" class="align-middle text-center">KANAL DISTRIBUSI</th>
                                          <th scope="col" class="align-middle text-center">JUMLAH BU</th>
                                          <th scope="col" class="align-middle text-center">ANP</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                      <tfoot>
                                      </tfoot>
                                    </table>
                                </div>

                                {{-- <div class="scroll-area-sm">
                                    <div class="container-fluid">
                                        <div class="table-responsive">
                                            <table id="tableListPipelineKomitmenKanal"
                                                class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                <thead>
                                                    <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                        <th style="width:10%;" class="align-middle">NO</th>
                                                        <th style="text-align:center;width:20%;" class="align-middle">KANAL DISTRIBUSI</th>
                                                        <th style="text-align:center;width:20%;" class="align-middle">JUMLAH BU</th>
                                                        <th style="text-align:center;width:20%;" class="align-middle">ANP</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="mb-2 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div>
                            <h6><b>ALL PIPELINE NEW BUSINESS BY PROGRESS</b></h6> 
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tabs-eg-77">
                                    <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                        <div class="widget-chat-wrapper-outer">
                                            <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                                <div id="chartpipelinebyprogress"></div>
                                                    @section('custom-js')
                                                        <script src="/js/pipelineNewBusinessDashboard.js"></script>
                                                    @endsection
                                        </div>
                                    </div>
                                </div>
                                <h6><b>PIPELINE NEW BUSINESS BY PROGRESS</b></h6>
                                <div  class="table-scroll" style="height: 400px">
                                    <table id="tableListPipelineByProgress" class="main-table table table-borderless table-striped table-hover text-nowrap">
                                      <thead>
                                        <tr>
                                          <th scope="col" class="align-middle text-center">NO</th>
                                          <th scope="col" class="align-middle text-center">PROGRESS</th>
                                          <th scope="col" class="align-middle text-center">JUMLAH BU</th>
                                          <th scope="col" class="align-middle text-center">ANP</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                      <tfoot>
                                      </tfoot>
                                    </table>
                                </div>
                                {{-- <div class="scroll-area-sm">
                                    <div class="container-fluid">

                                        <div class="table-responsive">
                                            <table id="tableListPipelineByProgress"
                                                class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                <thead>
                                                    <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                        <th style="width:10%;" class="align-middle">NO</th>
                                                        <th style="text-align:center;width:20%;" class="align-middle">PROGRESS</th>
                                                        <th style="text-align:center;width:20%;" class="align-middle">JUMLAH BU</th>
                                                        <th style="text-align:center;width:20%;" class="align-middle">ANP</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{-- <div class="col-md-4 col-lg-4">
            <div class="mb-2 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                    <h6><b>PIPELINE KOMITMEN BY PROGRESS</b></h6> 
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                <div class="widget-chat-wrapper-outer">
                                    <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                        <div id="chartpipelinekomitmenbyprogress"></div>
                                            @section('custom-js')
                                                <script src="/js/pipelineNewBusinessDashboard.js"></script>
                                            @endsection
                                </div>
                            </div>
                        </div>
                        <h6><b>PIPELINE KOMITMEN BY PROGRESS</b></h6>
                        <div class="scroll-area-sm">
                            <div class="container-fluid">

                                <div class="table-responsive">
                                    <table id="tableListPipelineByProgress"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:10%;" class="align-middle">NO</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PROGRESS</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">JUMLAH BU</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">ANP</th>
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
        </div> --}}

    </div>
    
    <!--- Custom List Row 2 -->

    <!--- Custom List Row 3 -->
    <div class="row" style="padding-top: 20px">              
        <!--- LIST TOP 10 BU PIPELINE KOMITMEN NEW BUSINESS -->
        <div class="col-md-6 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div>
                       <h6><b>TOP 10 PIPELINE KOMITMEN NEW BUSINESS</b></h6> 
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" >
                            {{-- <div class="container-fluid"> --}}
                                <div class="table-responsive">
                                    <table id="tableTopBuKomitmen"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:5%;" class="align-middle text-center">NO</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">BADAN USAHA</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">ANP</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PREMI/TERMIN</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PRODUK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot style="background-color:#16aaff;color:white;font-weight: bold;"></tfoot>
                                    </table>
                            
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--- LIST TOP 10 PIPELINE QUOTATION NEW BUSINESS -->
        <div class="col-md-6 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div>
                      <h6><b>TOP 10 PIPELINE QUOTATION NEW BUSINESS</b></h6> 
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            {{-- <div class="container-fluid"> --}}
                                <div class="table-responsive">
                                    <table id="tableTopBuQuotation"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:5%;" class="align-middle text-center">NO</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">BADAN USAHA</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">ANP</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PREMI/TERMIN</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PRODUK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot style="background-color:#16aaff;color:white;font-weight: bold;"></tfoot>
                                    </table> 
                            
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--- Custom List Row 3 -->

    <!--- Custom List Row 4 -->
    <div class="row" style="padding-top: 20px"> 
        <!--- LIST 10 PIPELINE CLOSING NEW BUSINESS -->
        <div class="col-md-6 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div>
                      <h6><b>TOP 10 BU PIPELINE CLOSING NEW BUSINESS</b></h6> 
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            {{-- <div class="container-fluid"> --}}
                                <div class="table-responsive">
                                    <table id="tableTopBuClosing"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:5%;" class="align-middle text-center">NO</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">BADAN USAHA</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">ANP</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PREMI/TERMIN</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PRODUK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot style="background-color:#16aaff;color:white;font-weight: bold;"></tfoot>
                                    </table>
                            
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--- LIST TOP 10 PIPELINE LOSS NEW BUSINESS -->
        <div class="col-md-6 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div>
                      <h6><b>TOP 10 PIPELINE LOSS NEW BUSINESS</b></h6> 
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            {{-- <div class="container-fluid"> --}}
                                <div class="table-responsive">
                                    <table id="tableTopBuLoss"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:5%;" class="align-middle text-center">NO</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">BADAN USAHA</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">ANP</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PREMI/TERMIN</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PRODUK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot style="background-color:#16aaff;color:white;font-weight: bold;"></tfoot>
                                    </table>
                            
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- Custom List Row 5 -->
    <div class="row" style="padding-top: 20px"> 
                    
        <!--- LIST 10 PIPELINE IN PROGRESS NEW BUSINESS -->
        <div class="col-md-6 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div>
                       <h6><b> TOP 10 PIPELINE IN PROGRESS NEW BUSINESS</b></h6>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            {{-- <div class="container-fluid"> --}}
                                <div class="table-responsive">
                                    <table id="tableTopBuInProgress"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:5%;" class="align-middle text-center">NO</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">BADAN USAHA</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">ANP</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PREMI/TERMIN</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PRODUK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot style="background-color:#16aaff;color:white;font-weight: bold;"></tfoot>
                                    </table>
                            
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--- LIST TOP 10 PIPELINE EXPIRED QUOTATION NEW BUSINESS -->
        <div class="col-md-6 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div>
                      <h6><b>TOP 10 PIPELINE EXPIRED QUOTATION NEW BUSINESS</b></h6> 
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            {{-- <div class="container-fluid"> --}}
                                <div class="table-responsive">
                                    <table id="tableTopBuExpiredQuotation"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:5%;" class="align-middle text-center">NO</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">BADAN USAHA</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">ANP</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PREMI/TERMIN</th>
                                                <th style="text-align:center;width:20%;" class="align-middle">PRODUK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot style="background-color:#16aaff;color:white;font-weight: bold;"></tfoot>
                                    </table>
                            
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!--- Custom List Row 6 -->
    <div class="row">
        <!--- REKAP PIPELINE RENEWAL -->
    <div class="col-md-12 col-lg-12">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <h6><b>REKAP PIPELINE NEW BUSINESS</b></h6> 
                </div>
            </div>
            
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        
                            {{-- <div class="container-fluid"> --}}
                                <div class="table-responsive">
                                    <table id="tableRekapPipelineNewBusiness"
                                        class="align-middle mb-0 table table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="border: 1px solid" rowspan='2' class="text-center align-middle">NO</th>
                                                <th style="border: 1px solid" rowspan='2' class="text-center align-middle">KANAL DISTRIBUSI</th>
                                                <th style="border: 1px solid" class="text-center align-middle" colspan='2'>CLOSING</th>
                                                <th style="border: 1px solid" class="text-center align-middle" colspan='2'>IN-PROGRESS</th>
                                                <th style="border: 1px solid" class="text-center align-middle" colspan='2'>LOSS</th>
                                                <th style="border: 1px solid" class="text-center align-middle" colspan='2'>TOTAL</th>
                                            </tr>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                    <th style="border: 1px solid" class="text-center align-middle">JML BU</th>
                                                    <th style="border: 1px solid" class="text-center align-middle">ANP</th>
                                                    <th style="border: 1px solid" class="text-center align-middle">JML BU</th>
                                                    <th style="border: 1px solid" class="text-center align-middle">ANP</th>
                                                    <th style="border: 1px solid" class="text-center align-middle">JML BU</th>
                                                    <th style="border: 1px solid" class="text-center align-middle">ANP</th>
                                                    <th style="border: 1px solid" class="text-center align-middle">JML BU</th>
                                                    <th style="border: 1px solid" class="text-center align-middle">ANP</th>
                                                </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot style="background-color:#16aaff;color:white;font-weight: bold;"></tfoot>
                                    </table>
                                </div>
                            {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    

@endsection

@section('custom-js')
<script src="/js/pipelineNewBusinessDashboard.js"></script>
@endsection
