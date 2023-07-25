@extends('report.layout')

@section('custom-table')

    <table id="tableLaporanGWPDiklat" class="display table table-bordered" style="width:100%">
        <thead class="bgKprimary">
            <tr>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">NO</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">NAMA AGEN ASURANSI</th>
                <!-- <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">NAMA KEPALA UNIT</th> -->
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">KANAL DISTRIBUSI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="12">GWP 2022</th>
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

@endsection

@section('custom-js')
    <script type="module" src="/js/report/laporanGWPDiklat.js"></script>
@endsection