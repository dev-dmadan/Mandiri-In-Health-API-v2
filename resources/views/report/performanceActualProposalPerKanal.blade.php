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
<h5>Actual Proposal Per Kanal</h5>
<div  class="table-scroll" style="height: 560px; margin-bottom: 5%" >
    <table id="tableActualProposalPerKanal" class="main-table table table-borderless table-striped table-hover text-nowrap">
        <thead>
            <tr>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; z-index:999; width: 50px; min-width: 50px; max-width: 50px;" class="text-center">NO</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4;  z-index:999; width: 300px; min-width: 300px; max-width: 300px;" class="text-center">KANAL DISTRIBUSI</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">JANUARI</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">FEBRUARI</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">MARET</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">APRIL</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">MEI</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">JUNI</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">JULI</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">AGUSTUS</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">SEPTEMBER</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">OKTOBER</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">NOVEMBER</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 120px;" class="text-center">DESEMBER</td>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4472c4; width: 120px; min-width: 120px; max-width: 150px;" class="text-center">TOTAL</td>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot></tfoot>
    </table>
</div>
<div></div>
@endsection

@section('custom-js')
      <script type="module" src="/js/report/actualProposalPerKanal.js"></script>
@endsection