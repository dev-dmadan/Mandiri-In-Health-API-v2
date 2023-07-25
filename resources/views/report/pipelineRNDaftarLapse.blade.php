@extends('report.layoutReportPipeline')
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

    /* a:focus {
        background: red;
    } */

    /* testing links*/

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
        z-index: 8;
        left: 300px;
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


</style>
@stop
@section('custom-table')
<h5>Daftar Badan Usaha Renewal - Lapse</h5>
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

<div  class="table-scroll" style="height: 525px; margin-bottom: 5%" >
    <table id="tablePipelineRenewalLapse" class="main-table table table-borderless table-striped table-hover">
        <thead>
            <tr>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4;  z-index:999; width: 50px; min-width: 50px; max-width: 50px;" class="text-center align-middle text-nowrap" >NO</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4;   z-index:999; width: 250px; min-width: 250px; max-width: 250px;" class="text-center align-middle text-nowrap" >KANAL DISTRIBUSI</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4;  z-index:999; width: 400px; min-width: 400px; max-width: 400px;" class="text-center align-middle text-nowrap" >NAMA BADAN USAHA</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >TIPE PROSES (DIRECT/BIDDING)</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >PRODUK MANDIRI INHEALTH</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >PREMI EXISTING (ANP)</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >PENAWARAN PREMI MANDIRI INHEALTH (ANP) </th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >LOSS RASIO </th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >KATEGORI PEMENANG ASURANSI</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >PEMENANG ASURANSI</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >PREMI YANG DITAWARKAN PEMENANG ASURANSI</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >KATEGORI LAPSE 1</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >KATEGORI LAPSE 2</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >ALASAN LAPSE</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >KA. UNIT</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >AGEN ASURANSI</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle text-nowrap" >NAMA BROKER</th>
            </tr>
        </thead>
        <tbody >
        </tbody>
        <tfoot></tfoot>
    </table>
</div>
<div></div>
@endsection

@section('custom-js')
      <script type="module" src="/js/report/pipelineRenewalLapse.js"></script>
@endsection