@extends('dashboard.layout')

@section('custom-chart')
<!--- Custom List Row 1 -->
<div class="row">

    <!---PENCAPAIAN TOTAL GWP -->
    <div class="col-md-6 col-xl-4">
        <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card" style="background-color: #7030A0;background-image:url('/img/Untitled-7-01.png');background-repeat: no-repeat;background-size: auto;">
            <div class="widget-content" style="height:146px;">
                <div class="widget-content-outer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget-content-left fsize-1">
                                <div><b><span class="text-white" style="font-size:20px;">PENCAPAIAN TOTAL GWP</span></b></div>
                                <p></p>
                                <div></div> 
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <h3 class="total" id="totalGWP"></h3>
                        </div>
                    </div>
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
                </div>
            </div>
        </div>
    </div>
    <!--- PENCAPAIAN TOTAL GWP -->
    
    <!-- PENCAPAIAN NEW BUSINESS -->
    <div class="col-md-6 col-xl-4">
        <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card text-bg-royalblue" style="background-image:url('/img/Untitled-6-01.png');background-repeat: no-repeat;background-size: auto;">
            <div class="widget-content" style="height:146px;">
                <div class="widget-content-outer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget-content-left fsize-1">
                                <div><b><span class="text-white" style="font-size:20px;">PENCAPAIAN NEW BUSINESS</span></b></div>
                                <p></p>
                                <div></div> 
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <h3 id="totalGWPNewBusiness" class="total"></h3>
                        </div>
                    </div>
                    
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left pr-2 fsize-1">
                            <div id="progressBarDisplayGwpNewBusiness" class="widget-numbers mt-0 fsize-3 text-warning">0%</div>
                        </div>
                        <div class="widget-content-right w-100">
                            <div class="progress-bar-xs progress">
                                <div id="progressBarValueGwpNewBusiness" class="progress-bar bg-info" role="progressbar" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 0%;background: linear-gradient(to bottom, #6126e4 -3%, #7c4eee 45%);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--- PENCAPAIAN NEW BUSINESS -->

    <!-- PENCAPAIAN RENEWAL -->
    <div class="col-md-6 col-xl-4">
        <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card text-bg-orange" style="background-image:url('/img/Untitled-7-01.png');background-repeat: no-repeat;background-size: auto;">
            <div class="widget-content" style="height:146px;">
                <div class="widget-content-outer">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="widget-content-left fsize-1">
                                <div><b><span class="text-white" style="font-size:20px;">PENCAPAIAN RENEWAL</span></b></div>
                                <p></p>
                                <div></div> 
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <h3 id="totalGWPRenewal" class="total"></h3>
                        </div>
                    </div>
                    
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left pr-2 fsize-1">
                            <div id="progressBarDisplayGwpRenewal" class="widget-numbers mt-0 fsize-3 text-warning">0%</div>
                        </div>
                        <div class="widget-content-right w-100">
                            <div class="progress-bar-xs progress">
                                <div id="progressBarValueGwpRenewal" class="progress-bar bg-info" role="progressbar" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 0%;background: linear-gradient(to bottom, #6126e4 -3%, #7c4eee 45%);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PENCAPAIAN RENEWAL -->
    
</div>
<!--- Custom List Row 1 -->

<!--- ROW 2 -->
<div class="row">
    <!--- PERFORMANCE PER KANAL -->
    <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    PERFORMANCE KANAL
                </div>
            </div>
            <div class="card-header-tab card-header-tab-animation card-header">
                <span style="background-color: #5f32d3;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;ACTUAL
                <span style="background-color: #ff8c00;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;PLAN
                <div class="btn-actions-pane-right">
                    <select id="polisStatusData" class="custom-select">
                        {{-- <option value="volvo">TOTAL</option>
                        <option value="saab">NEW BUSINESS</option>
                        <option value="opel">RENEWAL</option> --}}
                    </select>
                </div> 
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container2"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceNasional.js"></script>
                                    @endsection
                                </div>
                            </div>
                        </div>
                        <div>
                            <h6><b>ACHIEVEMENT BERDASARKAN KANAL DISTRIBUSI</b></h6> 
                         </div>
                        <div  class="table-scroll" style="height: 400px">
                            <table id="tableDetailAchievementByKanalDistribusi" class="main-table table table-borderless table-striped table-hover text-nowrap">
                              <thead>
                                <tr>
                                  <th scope="col" class="align-middle text-center">NO</th>
                                  <th scope="col" class="align-middle text-center">KANAL DISTRIBUSI</th>
                                  <th scope="col" class="align-middle text-center">ACTUAL</th>
                                  <th scope="col" class="align-middle text-center">PLAN</th>
                                  <th scope="col" class="align-middle text-center" colspan="2">%</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                              </tfoot>
                            </table>
                        </div>
                        {{-- <div class="scroll-area-lg">
                            <div class="container-fluid">

                                <div class="table-responsive">
                                    <table id="tableDetailAchievementByKanalDistribusi"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover text-nowrap">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:10%;" class="text-center">NO</th>
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
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--- PERFORMANCE PER PRODUCT -->
    <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    PERFORMANCE BY PRODUK
                </div>
            </div>
            <div class="card-header-tab card-header-tab-animation card-header">
                <span style="background-color: #5f32d3;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;ACTUAL
                <span style="background-color: #ff8c00;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;PLAN
                <div class="btn-actions-pane-right">
                    <select id="polisStatus" class="custom-select">
                        {{-- <option value="volvo">TOTAL</option>
                        <option value="saab">NEW BUSINESS</option>
                        <option value="opel">RENEWAL</option> --}}
                    </select>
                </div> 
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container3"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceNasional.js"></script>
                                    @endsection
                                </div>
                            </div>
                        </div>
                        <div>
                            <h6><b>ACHIEVEMENT BERDASARKAN PRODUK</b></h6> 
                         </div>

                         <div  class="table-scroll" style="height: 400px">
                            <table id="tableDetailAchievementByProduk" class="main-table table table-borderless table-striped table-hover text-nowrap">
                              <thead>
                                <tr>
                                  <th scope="col" class="align-middle text-center">NO</th>
                                  <th scope="col" class="align-middle text-center">PRODUK</th>
                                  <th scope="col" class="align-middle text-center">ACTUAL</th>
                                  <th scope="col" class="align-middle text-center">PLAN</th>
                                  <th scope="col" class="align-middle text-center" colspan="2">%</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                              </tfoot>
                            </table>
                          </div>

                         {{-- <div class="scroll-area-lg">
                            <div class="container-fluid">

                                <div class="table-responsive">
                                    <table id="tableDetailAchievementByProduk" id="table-wrap" class="table-wrap"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover text-nowrap">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th scope="col" style="width:10%;" class="text-center">NO</th>
                                                <th scope="col" style="text-align:center;width:20%;">PRODUK</th>
                                                <th scope="col" style="text-align:center;width:20%;">ACTUAL</th>
                                                <th scope="col" style="text-align:center;width:20%;">PLAN</th>
                                                <th scope="col" colspan="2" style="text-align:center;width:20%;">%</th>
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
</div>

<!--- ROW 3 -->
<div class="row" style="padding-top: 20px">     
    <!--- PERFORMANCE NASIONAL  -->
  <div class="col-md-6 col-lg-6">
      <div class="mb-3 card">
          <div class="card-header-tab card-header-tab-animation card-header">
              <div class="card-header-title">
                  PERFORMANCE NASIONAL
              </div>
          </div>
          <div class="card-header-tab card-header-tab-animation card-header">
              <span style="background-color: #5f32d3;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;ACTUAL
              <span style="background-color: #ff8c00;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;PLAN
          </div>

          <div class="card-body">
              <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-eg-77">
                      <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                          <div class="widget-chat-wrapper-outer">
                              <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                  <div id="container"></div>
                                  @section('custom-js')
                                      <script src="/js/performaceNasional.js"></script>
                                  @endsection
                              </div>
                          </div>
                      </div>
                      <div>
                          <h6><b>ACHIEVEMENT BERDASARKAN SUMBER BISNIS</b></h6> 
                       </div>
                       <div class="scroll-area" style="height: 250px">
                          <div class="scrollbar-container">
                              <div class="table-responsive">
                                  <table id="tableDetailAchievementBySumberBisnis" class="align-middle mb-0 table table-borderless table-striped table-hover text-nowrap">
                                      <thead>
                                          <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                              <th style="width:10%;" class="text-center">NO</th>
                                              <th class="text-center">SUMBER BISNIS</th>
                                              <th class="text-center">ACTUAL</th>
                                              <th class="text-center">PLAN</th>
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
       
   <!--- GWP PER KEPEMILIKAN -->
    <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div>
                <h6><b>GWP PER KEPEMILIKAN</b></h6> 
                </div>
            </div>
            <div class="card-header-tab card-header-tab-animation card-header">
                <span ></span>&nbsp;
                <span></span>&nbsp;
            </div>
            
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container7"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceNasional.js"></script>
                                    @endsection
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <h6><b>GWP PER KEPEMILIKAN</b></h6> 
                        </div>
                        
                        <div class="scroll-area" style="height: 250px">
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table id="tableListGwpPerKepemilikan"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover text-nowrap">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:5%; text-align:center">NO</th>
                                                <th style="text-align:center;width:20%;">KEPEMILIKAN BU</th>
                                                <th style="text-align:center;width:20%;">GWP</th>
                                                <th style="text-align:center;width:20%;">%</th>
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
</div>

<!--- ROW 3 -->
<div class="row" style="padding-top: 20px">     
   
    <!--- PRODUK SHARE BY GWP -->
    <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div>
                  <h6><b>PRODUK SHARE BY GWP</b></h6> 
                </div>
            </div>
            <div class="card-header-tab card-header-tab-animation card-header">
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container8"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceNasional.js"></script>
                                    @endsection
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <h6><b>PRODUK SHARE BY GWP</b></h6> 
                         </div>
                        <div  class="table-scroll" style="height: 400px">
                            <table id="tableListShareProduk" class="main-table table table-borderless table-striped table-hover text-nowrap">
                              <thead>
                                <tr>
                                  <th scope="col" class="align-middle text-center">NO</th>
                                  <th scope="col" class="align-middle text-center">PRODUK</th>
                                  <th scope="col" class="align-middle text-center">GWP</th>
                                  <th scope="col" class="align-middle text-center">%</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                              </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- ANP PERKEPEMILIKAN -->
    <!-- <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div>
                  <h6><b>ANP PER KEPEMILIKAN BU</b></h6> 
                </div>
            </div>
            
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container9"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceNasional.js"></script>
                                    @endsection
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <h6><b>LIST ANP PER KEPEMILIKAN BU</b></h6> 
                         </div>
                         
                         <div  class="table-scroll" style="height: 250px">
                            <table id="tableListAnpPerKepemilikan" class="main-table table table-borderless table-striped table-hover text-nowrap">
                              <thead>
                                <tr>
                                  <th scope="col" class="align-middle text-center">NO</th>
                                  <th scope="col" class="align-middle text-center">KEPEMILIKAN BU</th>
                                  <th scope="col" class="align-middle text-center">ANP</th>
                                  <th scope="col" class="align-middle text-center">JUMLAH BU</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                              </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!--- LEADING INDICATOR PROPOSAL -->
    <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div>
                  <h6><b>LEADING INDICATOR PROPOSAL</b></h6> 
                </div>
            </div>
            <div class="card-header-tab card-header-tab-animation card-header">
                <span style="background-color: #5f32d3;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;ACTUAL
                <span style="background-color: #ff8c00;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;TARGET
                <span style="background-color: #DDDF00;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;%ACH
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container16"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceNasional.js"></script>
                                    @endsection
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <h6><b>LEADING INDICATOR PROPOSAL</b></h6> 
                         </div>
                         
                         <div  class="table-scroll" style="height: 400px">
                            <table id="tableListLeadingIndicatorProposal" class="main-table table table-borderless table-striped table-hover text-nowrap">
                              <thead>
                                <tr>
                                  <th scope="col" class="align-middle text-center">NO</th>
                                  <th scope="col" class="align-middle text-center">KANAL DISTRIBUSI</th>
                                  <th scope="col" class="align-middle text-center">ACTUAL</th>
                                  <th scope="col" class="align-middle text-center">TARGET</th>
                                  <th scope="col" class="align-middle text-center" colspan="2">ACH %</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot class="align-middle">
                              </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
   
</div>

<!--- ROW 3 -->
<div class="row" style="padding-top: 20px"> 
    <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div>
                  <h6><b>LEADING INDICATOR POLIS</b></h6> 
                </div>
            </div>
            <div class="card-header-tab card-header-tab-animation card-header">
                <span style="background-color: #16AAFF;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;ACTUAL
                <span style="background-color: #5F32D3;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;TARGET
                <span style="background-color: #e5cb24;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;%ACH
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container17"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceNasional.js"></script>
                                    @endsection
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <h6><b>LEADING INDICATOR POLIS</b></h6> 
                         </div>
                         
                         <div  class="table-scroll" style="height: 400px">
                            <table id="tableListLeadingIndicatorPolis" class="main-table table table-borderless table-striped table-hover text-nowrap">
                              <thead>
                                <tr>
                                  <th scope="col" class="align-middle text-center">NO</th>
                                  <th scope="col" class="align-middle text-center">KANAL DISTRIBUSI</th>
                                  <th scope="col" class="align-middle text-center">ACTUAL</th>
                                  <th scope="col" class="align-middle text-center">TARGET</th>
                                  <th scope="col" class="align-middle text-center" colspan="2">ACH %</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                              </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div>
                  <h6><b>LEADING INDICATOR ANP</b></h6> 
                </div>
            </div>
            <div class="card-header-tab card-header-tab-animation card-header">
                <span style="background-color: #ff8c00;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;ACTUAL
                <span style="background-color: #5f32d3;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;TARGET
                <span style="background-color: #16AAFF;border-radius:50%;width:15px;height:15px;margin-left:10px;"></span>&nbsp;%ACH
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container18"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceNasional.js"></script>
                                    @endsection
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <h6><b>LEADING INDICATOR ANP</b></h6> 
                         </div>
                         
                         <div  class="table-scroll" style="height: 400px">
                            <table id="tableListLeadingIndicatorAnp" class="main-table table table-borderless table-striped table-hover text-nowrap">
                              <thead>
                                <tr>
                                  <th scope="col" class="align-middle text-center">NO</th>
                                  <th scope="col" class="align-middle text-center">KANAL DISTRIBUSI</th>
                                  <th scope="col" class="align-middle text-center">ACTUAL</th>
                                  <th scope="col" class="align-middle text-center">TARGET</th>
                                  <th scope="col" class="align-middle text-center" colspan="2">ACH %</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                              </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<!--- ROW 3
<div class="row" style="padding-top: 20px">     
   
    <!--- TOP ANP PER SEKTOR INDUSTRI
    <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div>
                  <h6><b>TOP 10 ANP PER SEKTOR INDUSTRI</b></h6> 
                </div>
            </div>
            
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container11"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceNasional.js"></script>
                                    @endsection
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <h6><b>TOP 10 ANP PER SEKTOR INDUSTRI</b></h6> 
                         </div>
                        
                        <div  class="table-scroll" style="height: 320px">
                            <table id="tableListAnpPerSektorIndustri" class="main-table table table-borderless table-striped table-hover text-nowrap">
                              <thead>
                                <tr>
                                  <th scope="col" class="align-middle text-center">NO</th>
                                  <th scope="col" class="align-middle text-center">SEKTOR INDUSTRI</th>
                                  <th scope="col" class="align-middle text-center">ANP</th>
                                  <th scope="col" class="align-middle text-center">JUMLAH BU</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                              </tfoot>
                            </table>
                        </div>
                        {{-- <div class="scroll-area-md">
                            <div class="container-fluid">

                                <div class="table-responsive">
                                    <table id="tableListAnpPerSektorIndustri"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:5%; text-align:center;">NO</th>
                                                <th style="text-align:center;width:20%;">SEKTOR INDUSTRI</th>
                                                <th style="text-align:center;width:20%;">ANP</th>
                                                <th style="text-align:center;width:20%;">JUMLAH BU</th>
                                            </tr>
                                        </thead>
                                      <tbody></tbody>
                                    </table>
                                </div>

                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    ANP PER SINERGI BANK MANDIRI 
    <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div>
                  <h6><b>ANP PER SINERGI BANK MANDIRI</b></h6> 
                </div>
            </div>
            
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container10"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceNasional.js"></script>
                                    @endsection
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <h6><b>LIST ANP PER SINERGI BANK MANDIRI</b></h6> 
                         </div>
                        <div  class="table-scroll" style="height: 320px">
                            <table id="tableListAnpPerSinergiBankMandiri" class="main-table table table-borderless table-striped table-hover text-nowrap">
                              <thead>
                                <tr>
                                  <th scope="col" class="align-middle text-center">NO</th>
                                  <th scope="col" class="align-middle text-center">SINERGI BANK MANDIRI</th>
                                  <th scope="col" class="align-middle text-center">ANP</th>
                                  <th scope="col" class="align-middle text-center">JUMLAH BU</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                              </tfoot>
                            </table>
                        </div>

                        {{-- <div class="scroll-area-md">
                            <div class="container-fluid">

                                <div class="table-responsive">
                                    <table id="tableListAnpPerSinergiBankMandiri"
                                        class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:5%; text-align:center;">NO</th>
                                                <th style="text-align:center;width:20%;">SINERGI BANK MANDIRI</th>
                                                <th style="text-align:center;width:20%;">ANP</th>
                                                <th style="text-align:center;width:20%;">JUMLAH BU</th>
                                            </tr>
                                        </thead>
                                      <tbody></tbody>
                                    </table>
                                </div>

                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>
-->

<!-- ROW 4 
<div class="row" style="padding-top: 20px">     
   TOP 10 BU INFORCE 
    <div class="col-md-12 col-lg-12">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div>
                    <h6><b>TOP 10 BU INFORCE</b></h6> 
                </div>
            </div>
            
            <div class="card-body" >
                <div class="tab-content" >
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="scrollbar-container">
                            <div class="scrollbar-container">
                                <div class="table-responsive">
                                    <table id="tableListTopBuInforce" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr style="background-color:#16aaff;color:white;font-weight: bold;">
                                                <th style="width:5%; text-align:center">NO</th>
                                                <th style="text-align:center;width:20%;">BADAN USAHA</th>
                                                <th style="text-align:center;width:20%;">ANP</th>
                                                <th style="text-align:center;width:20%;">PREMI/TERMIN</th>
                                                <th style="text-align:center;width:20%;">PRODUK</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->

<!-- ROW 5 -->
<!-- <div class="row" style="padding-top: 20px">   
    <!--- LEADING INDICATOR 
    <div class="col-md-12 col-lg-12">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div>
                    <h6><b>LEADING INDICATOR</b></h6> 
                </div>
            </div>
            
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="scrollbar-container">
                            <div class="table-responsive">
                                <table id="tableListLeadingIndicator"
                                    class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center align-middle" rowspan="2">NO</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center align-middle" rowspan="2">KANAL DISTRIBUSI</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center" colspan="2">QUOTATION</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center align-middle" colspan="2" rowspan="2">% ACH.</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center" colspan="2">POLIS</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center align-middle" colspan="2" rowspan="2" >% ACH.</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center" colspan="2">TICKET SIZE</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center align-middle" colspan="2" rowspan="2" >% ACH.</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center" colspan="2">ANP</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center align-middle" colspan="2" rowspan="2">% ACH.</th>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center">ACTUAL</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center">TARGET</th>
                                        
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center">ACTUAL</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center">TARGET</th>
                                        
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center">ACTUAL</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center">TARGET</th>
                                        
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center">ACTUAL</th>
                                            <th style="border: 1px solid; color:white; background-color: #16aaff" class="text-center">TARGET</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!--- ROW 6 -->
<div class="row" style="padding-top: 20px">              
    <!--- LIST TOP 10 PIPELINE QUOTATION NEW BUSINESS -->
    <div class="col-md-12 col-lg-12">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div>
                  <h6><b>TREND GWP PER BULAN</b></h6> 
                </div>
            </div>
            
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="container6"></div>
                                    @section('custom-js')
                                        <script src="/js/performaceNasional.js"></script>
                                    @endsection
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection