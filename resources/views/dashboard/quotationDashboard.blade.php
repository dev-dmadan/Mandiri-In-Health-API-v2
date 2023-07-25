@extends('dashboard.layout')

@section('custom-chart')
<!--- Custom List Row 1 -->
<div class="row">
    
    <!-- Total GWP -->
    <div class="col-md-6 col-xl-4">
        <div class="card text-bg-royalblue mb-3" style="background-image:url('/img/Untitled-7-01.png');background-repeat: no-repeat;background-size: auto;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">TOTAL QUOTATION ON-PROGRESS</h5>
                        <p id="totalRecordQuotationOnProgress"></p>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <h4 id="totalGWPQuotationOnProgress" class="total"></h4>
                        <p class="card-text">BASED ON NO.PROPOSAL</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Total GWP -->

    <!-- Total Quotation Won -->
    <div class="col-md-6 col-xl-4">
        <div class="card text-bg-orange mb-3" style="background-image:url('/img/Untitled-6-01.png');background-repeat: no-repeat;background-size: auto;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">TOTAL QUOTATION CLOSED WON</h5>
                        <p id="totalRecordQuotationClosedWon"></p>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <h4 id="totalGWPQuotationClosedWon" class="total"></h4>
                        <p class="card-text">BASED ON NO.PROPOSAL</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Total Quotation Won -->
    
    <!-- Total Quotation Loss -->
    <div class="col-md-6 col-xl-4">
        <div class="card text-bg-royalblue mb-3" style="background-image:url('/img/Untitled-7-01.png');background-repeat: no-repeat;background-size: auto;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">TOTAL QUOTATION CLOSED LOSS/LAPSED</h5>
                        <p id="totalRecordQuotationLoss"></p>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <h4 id="totalGWPQuotationLoss" class="total"></h4>
                        <p class="card-text">BASED ON NO.PROPOSAL</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Total Quotation Loss -->

    <!---Total GWP -->
    {{-- <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content" style="padding-bottom:35px;background: linear-gradient(to bottom, #6126e4 -3%, #7c4eee 45%);">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">TOTAL QUOTATION ON-PROGRESS</div>
                        <div id="totalRecordQuotationOnProgress" class="widget-subheading"></div>
                    </div>
                    <div class="widget-content-right">
                        <div id="totalGWPQuotationOnProgress" class="widget-numbers text-warning"></div>
                        <div class="widget-subheading" style="color:white;opacity: 0.5;">BASED ON NO.PROPOSAL</div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!---Total GWP -->
    
    <!---Total GWP -->
    {{-- <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content" style="padding-bottom:35px;background: linear-gradient(to bottom, #6126e4 -3%, #7c4eee 45%);">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">TOTAL QUOTATION CLOSED WON</div>
                        <div id="totalRecordQuotationClosedWon" class="widget-subheading"></div>
                    </div>
                    <div class="widget-content-right">
                        <div id="totalGWPQuotationClosedWon" class="widget-numbers text-warning"></div>
                        <div class="widget-subheading" style="color:white;opacity: 0.5;">BASED ON NO.PROPOSAL</div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!---Total GWP -->
    
    <!---Total ANP -->
    {{-- <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content" style="padding-bottom:35px;background: linear-gradient(to bottom, #6126e4 -3%, #7c4eee 45%);">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">TOTAL QUOTATION CLOSED LOSS/LAPSED</div>
                        <div id="totalRecordQuotationLoss" class="widget-subheading">TOTAL NUMBER QUOTATION: 5</div>
                    </div>
                    <div class="widget-content-right">
                        <div id="totalGWPQuotationLoss" class="widget-numbers text-warning"></div>
                        <div class="widget-subheading" style="color:white;opacity: 0.5;">BASED ON NO.PROPOSAL</div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!---Total ANP -->
    
</div>
<!--- Custom List Row 1 -->

<!--- Custom List Row 2 -->
<div class="row">
    
    <!--- PERFORMANCE GWP  -->
    <div class="col-md-10 col-lg-4">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                        NUMBER OF QUOTATION
                </div>
            </div>
            <div class="card-body">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                            <span style="background-color: #5f32d3;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;NEW BUSINESS
                            <span style="background-color: #ff8c00;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;RENEWAL
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container1"></div>
                                    @section('custom-js')
                                        <script src="/js/quotationDashboard.js"></script>
                                    @endsection
                                </div>
                            </div>
                        </div>
                        <h6 class="text-uppercase font-size-md"><strong>QUOTATION BASED ON NO.PROPOSAL</strong></h6>
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container">
                                <div class="table-responsive">
                                    <table id="tableDetailQuotationByPolis" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:10%; text-align:center">NO</th>
                                                <th style="text-align:center;width:30%;">STATUS</th>
                                                <th style="text-align:center;width:20%;">ON-PROGRESS</th>
                                                <th style="text-align:center;width:20%;">WIN</th>
                                                <th style="text-align:center;width:20%;">LOSS/LAPSED</th>
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
    <div class="col-md-10 col-lg-4">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    QUOTATION ON-PROGRESS
                    
                </div>
                
            </div>
            <div class="card-body">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                            <span style="background-color: #5f32d3;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;NEW BUSINESS
                            <span style="background-color: #ff8c00;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;RENEWAL
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container2"></div>
                                    @section('custom-js')
                                        <script src="/js/quotationDashboard.js"></script>
                                    @endsection
                                </div>
                            </div>
                        </div>
                        <h6 class="text-uppercase font-size-md"><strong>QUOTATION BASED ON NO.PROPOSAL</strong></h6>
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container">
                                <div class="table-responsive">
                                    <table id="tableDetailQuotationByType" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:10%; text-align:center">NO</th>
                                                <th style="text-align:center;width:30%;">STATUS</th>
                                                <th style="text-align:center;width:20%;">KANAL</th>
                                                <th style="text-align:center;width:20%;">SS</th>
                                                <th style="text-align:center;width:20%;">UW</th>
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
                    
                    SLA
                    
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
                                        <script src="/js/quotationDashboard.js"></script>
                                    @endsection
                                </div>
                            </div>
                        </div>
                        <h6 class="text-uppercase font-size-md"><strong>QUOTATION BASED ON NO.PROPOSAL</strong></h6>
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container">

                                <div class="table-responsive-lg">
                                    <table id="tableDetailQuotationBySLA" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:10%; text-align:center">NO</th>
                                                <th style="width:50%;">TIER</th>
                                                <th style="text-align:center;width:25%;">PROPOSAL</th>
                                                <th style="text-align:center;width:25%;">AMOUNT</th>
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

<!--- Custom List Row 3 -->

<div class="row">
    <!--- PERFORMANCE PER PRODUCT -->
    <div class="col-md-12 col-lg-12">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    STATUS PER MONTH
                </div>
                {{-- <div class="btn-actions-pane-right">
                    <select id="cars" class="custom-select">
                        <option value="volvo">TOTAL</option>
                        <option value="saab">NEW BUSINESS</option>
                        <option value="opel">RENEWAL</option>
                    </select>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container4"></div>
                                    @section('custom-js')
                                        <script src="/js/quotationDashboard.js"></script>
                                    @endsection
                                </div>
                            </div>
                        </div>
                        <h6 class="text-uppercase font-size-md font-weight-bold">
                            QUOTATION BASED ON NO.PROPOSAL</h6>
                                <div class="table-responsive">
                                    <table id="tableDetailQuotationByMonth" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th class="text-center">NO</th>
                                                <th class="text-center">STATUS</th>
                                                <th class="text-center">JANUARI</th>
                                                <th class="text-center">FEBUARI</th>
                                                <th class="text-center">MARET</th>
                                                <th class="text-center">APRIL</th>
                                                <th class="text-center">MEI</th>
                                                <th class="text-center">JUNI</th>
                                                <th class="text-center">JULI</th>
                                                <th class="text-center">AGUSTUS</th>
                                                <th class="text-center">SEPTEMBER</th>
                                                <th class="text-center">OKTOBER</th>
                                                <th class="text-center">NOVEMBER</th>
                                                <th class="text-center">DESEMBER</th>
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
    <!--- PERFORMANCE PER PRODUCT -->
    
</div>
@endsection