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

    /* a:focus {
        background: red;
    } */

    /* testing links*/

    th:first-child {
        position: -webkit-sticky;
        position: sticky;
        /* /* left: 0;  */
        z-index: 2;
        /* background: #ccc; */
        /* width: 50px;
        min-width: 50px;
        max-width: 50px; */
        left: 0px;
    }

    th:nth-child(2) {
        position: -webkit-sticky;
        position: sticky;
        /* /* left: 100;  */
        z-index: 4;
        /* background: #ccc;
        width: 250px;
        min-width: 250px;
        max-width: 250px; */
        left: 50px;
    }

    thead th:first-child,
    tfoot th:first-child {
        z-index: 5;
    }

    thead th:nth-child(2),
    tfoot th:nth-child(2) {
        z-index: 10;
    }
</style>
@stop
@section('custom-table')
<h5>Target Leading Indicator Kanal</h5>
<div  class="table-scroll" style="height: 562px; margin-bottom: 5%" >
    <table id="tableTargetPerKanal" class="main-table table table-striped align-middle text-nowrap" >
        {{-- <caption>List of users</caption> --}}
        <thead>
            <tr>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; z-index:999; width: 50px; min-width: 50px; max-width: 50px;" class="text-center align-middle" rowspan="2">NO</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; z-index:999; width: 250px; min-width: 250px; max-width: 250px;" class="text-center align-middle" rowspan="2">KANAL DISTRIBUSI</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">JANUARI</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">FEBRUARI</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">MARET</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">APRIL</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">MEI</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">JUNI</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">JULI</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">AGUSTUS/th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">SEPTEMBER</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">OKTOBER</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">NOVEMBER</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">DESEMBER</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="4">TOTAL</th>
            </tr>
            <tr>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">QUOTATION</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">POLIS</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">TICKET SIZE</th>
              <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 140px;  min-width: 140px; max-width: 140px;" class="text-center align-middle">ANP</th>
              <!-- <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TOTAL</th> -->
            </tr>
          </thead>
          <tbody></tbody>
          <tfoot></tfoot>
    </table>
</div>
<div></div>
@endsection

@section('custom-js')
      <script type="module" src="/js/report/targetLeadingKanal.js"></script>
@endsection