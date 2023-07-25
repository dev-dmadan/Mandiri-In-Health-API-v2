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
        left: 250px;
    }

    th:nth-child(4) {
        position: -webkit-sticky;
        position: sticky;
        z-index: 8;
        left: 400px;
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
<h5>Rekapitulasi Progress Pipeline New Business - All Pipeline</h5>
<div  class="table-scroll" style="height: 700px; margin-bottom: 5%" >
    <table id="tablePipelineNewBusinessPerBulanAllPipeline" class="main-table table table-borderless table-striped table-hover">
        {{-- <caption>List of users</caption> --}}
        <thead>
            <tr>
                <th scope="col" rowspan="3" style="border: 1px solid black; color:white; background-color: #4474c4; z-index:999; width: 50px; min-width: 50px; max-width: 50px;" class="text-center align-middle" >NO</th>
                <th scope="col" rowspan="3" style="border: 1px solid black; color:white; background-color: #4474c4;  z-index:999; width: 200px; min-width: 200px; max-width: 200px;" class="text-center align-middle" >BULAN</th>
                <th scope="col" rowspan="3" style="border: 1px solid black; color:white; background-color: #4474c4; z-index:999; width: 150px; min-width: 150px; max-width: 150px;" class="text-center align-middle text-wrap" >JML BU ALL PIPELINE</th>
                <th scope="col" rowspan="3" style="border: 1px solid black; color:white; background-color: #4474c4; z-index:999; width: 200px; min-width: 200px; max-width: 200px;" class="text-center align-middle text-wrap" > TOTAL ANP ALL PIPELINE</th>
                <th scope="col" colspan="20" style="border: 1px solid black; color:white; background-color: #4474c4; " class="text-center align-middle">PROGRESS NEW BUSINESS - ALL PIPELINE</th>
            </tr>
            <tr>
                <th scope="col" colspan="2" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0;" class="text-nowrap text-center align-middle">PROSPECT</td>
                <th scope="col" colspan="2" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0;" class="text-nowrap text-center align-middle">FACT FINDING</td>
                <th scope="col" colspan="2" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0;" class="text-nowrap text-center align-middle">PROPOSAL</td>
                <th scope="col" colspan="2" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0;" class="text-nowrap text-center align-middle">PENAWARAN PREMI</td>
                <th scope="col" colspan="2" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0;" class="text-nowrap text-center align-middle">NEGOSIASI</td>
                <th scope="col" colspan="2" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0;" class="text-nowrap text-center align-middle">PENAWARAN REVISI</td>
                <th scope="col" colspan="2" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0;" class="text-nowrap text-center align-middle ">FOLLOW UP PENAWARAN REVISI</td>
                <th scope="col" colspan="2" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0;" class="text-nowrap text-center align-middle">CLOSING</td>
                <th scope="col" colspan="2" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0;" class="text-nowrap text-center align-middle">LOSS</td>
                <th scope="col" colspan="2" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0;" class="text-nowrap text-center align-middle">TOTAL PROGRESS</td>
            </tr>
            <tr>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 100px; min-width: 100px; max-width: 100px;" class="text-nowrap text-center align-middle">JML BU</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 150px; min-width: 150px; max-width: 150px;" class="text-nowrap text-center align-middle"> ANP</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 100px; min-width: 100px; max-width: 100px;" class="text-nowrap text-center align-middle">JML BU</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 150px; min-width: 150px; max-width: 150px;" class="text-nowrap text-center align-middle"> ANP</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 100px; min-width: 100px; max-width: 100px;" class="text-nowrap text-center align-middle">JML BU</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 150px; min-width: 150px; max-width: 150px;" class="text-nowrap text-center align-middle"> ANP</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 100px; min-width: 100px; max-width: 100px;" class="text-nowrap text-center align-middle">JML BU</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 150px; min-width: 150px; max-width: 150px;" class="text-nowrap text-center align-middle"> ANP</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 100px; min-width: 100px; max-width: 100px;" class="text-nowrap text-center align-middle">JML BU</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 150px; min-width: 150px; max-width: 150px;" class="text-nowrap text-center align-middle"> ANP</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 100px; min-width: 100px; max-width: 100px;" class="text-nowrap text-center align-middle">JML BU</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 150px; min-width: 150px; max-width: 150px;" class="text-nowrap text-center align-middle"> ANP</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 100px; min-width: 100px; max-width: 100px;" class="text-nowrap text-center align-middle">JML BU</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 150px; min-width: 150px; max-width: 150px;" class="text-nowrap text-center align-middle"> ANP</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 100px; min-width: 100px; max-width: 100px;" class="text-nowrap text-center align-middle">JML BU</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 150px; min-width: 150px; max-width: 150px;" class="text-nowrap text-center align-middle"> ANP</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 100px; min-width: 100px; max-width: 100px;" class="text-nowrap text-center align-middle">JML BU</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 150px; min-width: 150px; max-width: 150px;" class="text-nowrap text-center align-middle"> ANP</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 100px; min-width: 100px; max-width: 100px;" class="text-nowrap text-center align-middle">JML BU</th>
                <th scope="col" style="border: 1px solid black; color: white; background-color:#4474c4; z-index:0; width: 150px; min-width: 150px; max-width: 150px;" class="text-nowrap text-center align-middle"> ANP</th>
            </tr>
        </thead>
        <tbody ></tbody>
        <tfoot></tfoot>
    </table>
</div>
<div></div>
@endsection

@section('custom-js')
      <script type="module" src="/js/report/pipelineNewBusinessPerBulanAllPipeline.js"></script>
@endsection