@extends('report.layoutReportDiklatAgen')
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

    .table-scroll thead tr:nth-child(3) th {
        background: #333;
        color: #fff;
        position: -webkit-sticky;
        position: sticky;
        top: 83px;

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

    th:nth-child(3) {
        position: -webkit-sticky;
        position: sticky;
        /* /* left: 100;  */
        z-index: 8;
        /* background: #ccc;
        width: 150px;
        min-width: 150px;
        max-width: 150px; */
        left: 300px;
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
        left: 450px;
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
<h5>Report Kinerja Agen Per Produk</h5>
<div  class="table-scroll" style="height: 605px; margin-bottom: 5%" >
    <table id="tableKinerjaAgenPerProduk" class="main-table table table-borderless table-striped table-hover">
        <thead class="bgKprimary">
            <tr>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; z-index:999; width: 50px; min-width: 50px; max-width: 50px;" class="text-center align-middle" rowspan="3">NO</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; z-index:999; width: 250px; min-width: 250px; max-width: 250px;" class="text-center align-middle" rowspan="3">KANAL DISTRIBUSI</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; z-index:999; width: 250px; min-width: 250px; max-width: 250px;" class="text-center align-middle" rowspan="3">AGEN ASURANSI</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="12">GWP</th>
            </tr>
            <tr>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="4">NEW BUSINESS</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="4">RENEWAL</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="4">TOTAL ( NB + RN )</th>
            </tr>
            <tr>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 150px;  min-width: 150px; max-width: 150px;" class="text-center">ACTUAL</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 150px;  min-width: 150px; max-width: 150px;" class="text-center">PLAN</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 150px;  min-width: 150px; max-width: 150px;" class="text-center">%</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 30px;  min-width: 30px; max-width: 30px;" class="text-center"></th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 150px;  min-width: 150px; max-width: 150px;" class="text-center">ACTUAL</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 150px;  min-width: 150px; max-width: 150px;" class="text-center">PLAN</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 150px;  min-width: 150px; max-width: 150px;" class="text-center">%</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 30px;  min-width: 30px; max-width: 30px;" class="text-center"></th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 150px;  min-width: 150px; max-width: 150px;" class="text-center">ACTUAL</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 150px;  min-width: 150px; max-width: 150px;" class="text-center">PLAN</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 150px;  min-width: 150px; max-width: 150px;" class="text-center">%</th>
                <th scope="col" style="border: 1px solid black; color:white; background-color: #4472C4; width: 30px;  min-width: 30px; max-width: 30px;" class="text-center"></th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot></tfoot>
    </table>
</div>


@endsection

@section('custom-js')
    <script type="module" src="/js/report/kinerjaAgenPerProduk.js"></script>
@endsection