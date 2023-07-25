@extends('report.layoutReportPerformance')
@section('styles')
<style>
    html {
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    .intro {
        max-width: 1280px;
        margin: 1em auto;
    }

    .table-scroll {
        position: relative;
        /* width:100%; */
        z-index: 1;
        margin: auto;
        overflow: auto;
        /* height: 350px; */
    }

    .table-scroll table {
        /* width: 100%; */
        /* min-width: 1280px; */
        margin: auto;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-wrap {
        position: relative;
    }

    .table-scroll th,
    .table-scroll td {
        padding: 5px 10px;
        /* border: 1px solid #000; */
        background: #EEEEEE;
        vertical-align: top;
        height: 40px;
    }

    .table-scroll thead tr:nth-child(1) th {
        background: #16aaff;
        color: #fff;
        position: -webkit-sticky;
        position: sticky;
        top: 0;

    }

    .table-scroll thead tr:nth-child(2) th {
        background: #333;
        color: #fff;
        position: -webkit-sticky;
        position: sticky;
        top: 42px;

    }

    /* safari and ios need the tfoot itself to be position:sticky also */
    .table-scroll tfoot,
    .table-scroll tfoot th,
    .table-scroll tfoot td {
        position: -webkit-sticky;
        position: sticky;
        bottom: 0;
        background: #16aaff;
        color: #fff;
        z-index: 1000;
        /* font-weight: bold; */
    }

    thead th:first-child,
    tfoot th:first-child {
        z-index: 5;
    }

    th:first-child {
        position: -webkit-sticky;
        position: sticky;
        z-index: 2;
        left: 0px;
    }

    th:nth-child(2) {
        position: -webkit-sticky;
        position: sticky;
        z-index: 4;
        left: 50px;
    }

    th:nth-child(3) {
        position: -webkit-sticky;
        position: sticky;
        /* /* left: 100;  */
        z-index: 8;
        /* background: #ccc;
        width: 150px;
        min-width: 150px;
        max-width: 150px; */
        left: 280px;
    }

    th:nth-child(4) {
        position: -webkit-sticky;
        position: sticky;
        /* /* left: 100;  */
        z-index: 8;
        /* background: #ccc;
        width: 500px;
        min-width: 500px;
        max-width: 500px; */
        left: 430px;
    }


    thead th:first-child,
    tfoot th:first-child {
        z-index: 5;
    }

    thead th:nth-child(2),
    tfoot th:nth-child(2) {
        z-index: 10;
    }

    thead th:nth-child(3),
    tfoot th:nth-child(3) {
        z-index: 15;
    }

    thead th:nth-child(4),
    tfoot th:nth-child(4) {
        z-index: 20;
    }



</style>
@stop
@section('custom-table')
<h5>Daftar Actual GWP Per Bulan</h5>
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
    <td width="15%">
        <div>
            <h6  class="align-middle" style="padding-top: 8px; font-weight:bold"> TOTAL DATA: <span id="totaldata"></span></h6>
        </div>
    </td>

    <td width="50%"></td>

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
<div  class="table-scroll" style="height: 520px;; margin-bottom: 5%" >
    <table id="tableDaftarActualGwpPerBulan" class="main-table table table-borderless table-striped table-hover">
        <thead>
            <tr>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; z-index:999; width: 50px; min-width: 50px; max-width: 50px;" class="text-center">NO</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; z-index:999; width: 230px; min-width: 230px; max-width: 230px;" class="text-center">KANAL DISTRIBUSI</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; z-index:999; width: 150px; min-width: 150px; max-width: 150px;" class="text-center">KODE BU</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; z-index:999; width: 350px; min-width: 350px; max-width: 350px;" class="text-center tex-wrap">NAMA BU</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 250px; min-width: 250px; max-width: 250px;" class="text-center">PRODUK</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 200px; min-width: 200px; max-width: 200px;" class="text-center">POLIS STATUS</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 200px; min-width: 200px; max-width: 200px;" class="text-center">TERMIN</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 200px; min-width: 200px; max-width: 200px;" class="text-center">PREMI</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 150px; min-width: 150px; max-width: 150px;" class="text-center">TMT</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 150px; min-width: 150px; max-width: 150px;" class="text-center">TMB</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 300px; min-width: 300px; max-width: 300px;" class="text-center">AGEN</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 300px; min-width: 300px; max-width: 300px;" class="text-center">KA. UNIT</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 200px; min-width: 200px; max-width: 200px;" class="text-center">KEPEMILIKAN</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 150px; min-width: 150px; max-width: 150px;" class="text-center">TAHUN</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 200px; min-width: 200px; max-width: 200px;" class="text-center">BULAN</td>
                <th  scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 150px; min-width: 150px; max-width: 150px;" class="text-center">TIPE</td>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot></tfoot>
    </table>
</div>

@endsection

@section('custom-js')
      <script type="module" src="/js/report/daftarActualGwpPerBulan.js"></script>
@endsection