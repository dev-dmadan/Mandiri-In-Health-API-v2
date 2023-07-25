@extends('report.layoutReportPerformance')

@section('custom-table')
<h5>Report Kinerja Bisnis Perkanal</h5>
<div class="table-responsive" style="margin-bottom: 5%">

    <table id="tableKinerjaBisnisPerKanal" class="table table-striped align-middle text-nowrap">
        <thead class="bgKprimary">
            <tr>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">NO</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">KANAL DISTRIBUSI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="12">GWP</th>
            </tr>
            <tr>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="4">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="4">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="4">TOTAL ( NB + RN )</th>
            </tr>
            <tr>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">ACTUAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">PLAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">%</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" style="width: 1%"></th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">ACTUAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">PLAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">%</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" style="width: 1%"></th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">ACTUAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">PLAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">%</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" style="width: 1%"></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection

@section('custom-js')
    <script type="module" src="/js/report/kinerjaBisnisPerKanal.js"></script>
@endsection