@extends('report.layoutReportPipeline')

@section('custom-table')
<h5>Rekapitulasi Pipeline New Business Per Kanal</h5>
<div class="table-responsive" style="margin-bottom: 5%">
    <table id="tablePipelinenNewBusinessPerKanal" class="table table-striped align-middle text-nowrap" >
        {{-- <caption>List of users</caption> --}}
        <thead>
            <tr>
                <th rowspan="2" style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">NO</th>
                <th rowspan="2" style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">KANAL DISTRIBUSI</th>
                <th colspan="2" style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">ALL PIPELINE</th>
                <th colspan="2" style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">PIPELINE KOMITMEN</th>
                <th colspan="2" style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">QUOTATION</th>
                <th colspan="2" style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">CLOSING</th>
                <th colspan="2" style="border: 1px solid black; color:white; background-color:#4472C4" class="text-center align-middle">LOSS</th>
            </tr>
            <tr>
                <th style="border: 1px solid black; color: white; background-color:#4472c4">JML BU</th>
                <th style="border: 1px solid black; color: white; background-color:#4472c4"> TOTAL ANP</th>
                <th style="border: 1px solid black; color: white; background-color:#4472c4">JML BU</th>
                <th style="border: 1px solid black; color: white; background-color:#4472c4"> TOTAL ANP</th>
                <th style="border: 1px solid black; color: white; background-color:#4472c4">JML BU</th>
                <th style="border: 1px solid black; color: white; background-color:#4472c4"> TOTAL ANP</th>
                <th style="border: 1px solid black; color: white; background-color:#4472c4">JML BU</th>
                <th style="border: 1px solid black; color: white; background-color:#4472c4"> TOTAL ANP</th>
                <th style="border: 1px solid black; color: white; background-color:#4472c4">JML BU</td>
                <th style="border: 1px solid black; color: white; background-color:#4472c4"> TOTAL ANP</th>
            </tr>
        </thead>
        <tbody >
            
        </tbody>
    </table>
</div>
<div></div>
@endsection

@section('custom-js')
      <script type="module" src="/js/report/pipelineNewBusinessPerKanal.js"></script>
@endsection