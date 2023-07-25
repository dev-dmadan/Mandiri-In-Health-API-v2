@extends('report.layoutReportPipeline')

@section('custom-table')
<h5>Daftar Pipeline Renewal Per Badan Usaha</h5>
<table height="60px">
    <td width="">
        <div class="col-md-5">
            <label for="inputEmail3" class="col-form-label text-nowrap" style="font-weight:bold">PAGE NUMBER</label>
        </div>
    </td>
    <td width="10%">
        <div>
            <select id="pageNumber" class="custom-select text-nowrap" style="font-weight:bold"></select>
        </div>
    </td>
    <td width="10%" class="text-center align-middle">
        <div>
            <h6  class="align-middle" style="padding-top: 8px; font-weight:bold"> PAGE: <span id="page"></span></h6>
        </div>
    </td>

    <td width="70%"></td>

    <td width="">
        <div class="col-md-5">
            <label for="inputEmail3" class="col-form-label text-nowrap" style="font-weight:bold"">SHOW</label>
        </div>
    </td>
    <td width="10%">
        <div>
            <select id="pageSize" class="custom-select text-nowrap" style="font-weight:bold"></select>
        </div>
    </td>
    <td width="10%" class="text-center align-middle">
        <div>
            <h6  class="align-middle" style="padding-top: 8px; font-weight:bold"> ENTRIES</h6>
        </div>
    </td>
</table>
<div class="table-responsive" style="margin-bottom: 5%">
    <table id="tablePipelineRenewalPerBadanUsaha" class="table table-striped align-middle text-nowrap" >
        <thead height="70px">
            <tr>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">NO</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">KANAL DISTRIBUSI</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">KODE BU</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">NAMA BADAN USAHA</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">PRODUK</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">TERMIN BAYAR</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">PREMI DISETAHUNKAN (ANP)</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">PREMI/TERMIN</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">PREMI/BULAN</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">TMT</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">TMB</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">STATUS</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">UPDATE AKTIVITAS</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">KETERANGAN PROGRESS</th>
                <th style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">DATE UPDATE</th>
            </tr>
        </thead>
        <tbody >
            
        </tbody>
    </table>
</div>
<div></div>
@endsection

@section('custom-js')
      <script type="module" src="/js/report/pipelineRenewalPerBadanUsaha.js"></script>
@endsection