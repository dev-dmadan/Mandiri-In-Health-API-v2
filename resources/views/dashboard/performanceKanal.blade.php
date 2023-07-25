@extends('dashboard.layout')

@section('custom-chart')
<!--- Custom List Row 1 -->
<div class="row">
    <!---Pencapaian Target -->
    <div class="col-md-6 col-xl-4">
        <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card">
            <div class="widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left pr-2 fsize-1">
                            <div id="progressBarDisplay" class="widget-numbers mt-0 fsize-3 text-warning">0%</div>
                        </div>
                        <div class="widget-content-right w-100">
                            <div class="progress-bar-xs progress">
                                <div id="progressBarValue" class="progress-bar bg-info" role="progressbar" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 0%;background: linear-gradient(to bottom, #6126e4 -3%, #7c4eee 45%);"></div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-left fsize-1">
                        <div class="text-muted opacity-6">PENCAPAIAN TARGET</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--- Pencapaian Target -->
    
    <!---Total GWP -->
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content" style="padding-bottom:35px;background: linear-gradient(to bottom, #6126e4 -3%, #7c4eee 45%);">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">TOTAL GWP</div>
                        <div class="widget-subheading">GWP TAHUN INI</div>
                    </div>
                    <div class="widget-content-right">
                        <!-- Assign Total GWP -->
                        <div id="totalGWP" class="widget-numbers text-warning"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---Total GWP -->
    
    <!---Total ANP -->
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content" style="padding-bottom:35px;background: linear-gradient(to bottom, #6126e4 -3%, #7c4eee 45%);">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">TOTAL ANP</div>
                        <div class="widget-subheading">ANP TAHUN INI</div>
                    </div>
                    <div class="widget-content-right">
                        <!-- Assign Total ANP -->
                        <div id="totalANP" class="widget-numbers text-warning"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---Total ANP -->
    
</div>
<!--- Custom List Row 1 -->

<!--- Custom List Row 2 -->
<div class="row">
    
    <!--- PERFORMANCE GWP  -->
    <div class="col-md-12 col-lg-4">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                        Performance GWP
                        <span style="margin-left:20px;"></span>
                        <span style="background-color: #5f32d3;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;ACTUAL
                        <span style="background-color: #ff8c00;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;PLAN
                </div>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceKanal.js"></script>
                                    @endsection
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">
                            Achievement Berdasarkan Sumber Bisnis</h6>
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container">
                                <div class="table-responsive">
                                    <table id="tableDetailAchievementBySumberBisnis" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:5%;">NO</th>
                                                <th style="text-align:center;width:35;">SUMBER</th>
                                                <th style="text-align:center;width:20%;">ACTUAL</th>
                                                <th style="text-align:center;width:20%;">PLAN</th>
                                                <th colspan=2 style="text-align:center;width:20%;">%</th>
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
    </div>
    <!--- PERFORMANCE GWP  -->

    <!--- PERFORMANCE PER KANAL -->
    <div class="col-md-12 col-lg-4">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    PERFORMANCE KANAL
                    <span style="background-color: #5f32d3;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;ACTUAL
                    <span style="background-color: #ff8c00;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;PLAN
                </div>
                <!-- <div class="btn-actions-pane-right">
                    <select id="cars" class="custom-select">
                        <option value="volvo">TOTAL</option>
                        <option value="saab">NEW BUSINESS</option>
                        <option value="opel">RENEWAL</option>
                    </select>
                </div> -->
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container2"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceKanal.js"></script>
                                    @endsection
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">
                            Achievement Berdasarkan Kanal Distribusi</h6>
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container">

                                <div class="table-responsive">
                                    <table id="tableDetailAchievementByKanalDistribusi"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:10%;">NO</th>
                                                <th style="text-align:center;width:20%;">KANAL</th>
                                                <th style="text-align:center;width:20%;">ACTUAL</th>
                                                <th style="text-align:center;width:20%;">PLAN</th>
                                                <th colspan=2 style="text-align:center;width:20%;">%</th>
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
    </div>
    <!--- PERFORMANCE PER KANAL -->

    <!--- PERFORMANCE PER PRODUCT -->
    <div class="col-md-12 col-lg-4">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    PERFORMANCE BY PRODUK
                    <span style="background-color: #5f32d3;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;ACTUAL
                    <span style="background-color: #ff8c00;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;PLAN
                </div>
                <!-- <div class="btn-actions-pane-right">
                    <select id="cars" class="custom-select">
                        <option value="volvo">TOTAL</option>
                        <option value="saab">NEW BUSINESS</option>
                        <option value="opel">RENEWAL</option>
                    </select>
                </div> -->
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container3"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceKanal.js"></script>
                                    @endsection
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">
                            Achievement Berdasarkan Produk</h6>
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container">

                                <div class="table-responsive">
                                    <table id="tableDetailAchievementByProduk" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:10%;">NO</th>
                                                <th style="text-align:center;width:20%;">PRODUK</th>
                                                <th style="text-align:center;width:20%;">ACTUAL</th>
                                                <th style="text-align:center;width:20%;">PLAN</th>
                                                <th colspan=2 style="text-align:center;width:20%;">%</th>
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
    </div>
    <!--- PERFORMANCE PER PRODUCT -->
    
</div>
<!--- Custom List Row 2 -->
@endsection