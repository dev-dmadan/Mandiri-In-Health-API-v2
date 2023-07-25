@extends('report.layoutReportPerformance')

@section('custom-table')
<h5>Report Kinerja Bisnis</h5>
<div class="table-responsive" style="margin-bottom: 5%">
    <table id="tableKinerjaBisnis" class="table table-striped align-middle text-nowrap">
        <thead class="bgKprimary">
            <tr>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">GWP</th>
            </tr> 
            <tr>
                <th style="border: 1px solid black; color: white; background-color: #4472C4" class="text-center">ACTUAL</th>
                <th style="border: 1px solid black; color: white; background-color: #4472C4" class="text-center">TARGET</th>
                <th style="border: 1px solid black; color: white; background-color: #4472C4" class="text-center align-middle">ACH. TO TARGET (%)</th>
                <th style="border: 1px solid black; color: white; background-color: #4472C4" class="text-center align-middle"></th>
                <th style="border: 1px solid black; color: white; background-color: #4472C4" class="text-center align-middle">GAP</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection

@section('custom-js')
    <script type="module" src="/js/report/kinerjaBisnis.js"></script>
@endsection