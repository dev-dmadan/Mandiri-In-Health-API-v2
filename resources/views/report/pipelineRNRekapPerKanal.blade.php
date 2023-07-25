@extends('report.layoutReportPipeline')

@section('custom-table')
<h5>Rekapitulasi Progress Pipeline Renewal Per Kanal</h5>
<div class="table-responsive" style="margin-bottom: 5%">
    <table id="tablePipelineRenewalPerKanal" class="table table-striped align-middle text-nowrap" >
       
        <thead>
            
            <tr>
                <th rowspan="3" style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center align-middle">NO</td>
                <th rowspan="3" style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center align-middle">KANAL DISTRIBUSI</td>
                <th colspan="8" style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center align-middle">PROGRESS RENEWAL</td>
                <th rowspan="3" style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center align-middle">JML BU</td>
                <th rowspan="3" style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center align-middle"> TOTAL ANP</td>
            </tr>
            <tr>
                <th colspan="2" style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center">INPROGRESS</td>
                <th colspan="2" style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center">CLOSING</td>
                <th colspan="2" style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center">MOVE</td>
                <th colspan="2" style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center">LAPSE</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center">JML BU</td>
                <th style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center"> ANP</td>
                <th style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center">JML BU</td>
                <th style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center"> ANP</td>
                <th style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center">JML BU</td>
                <th style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center"> ANP</td>
                <th style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center">JML BU</td>
                <th style="border: 1px solid black; color:white; background-color:#4472c4" class="text-center"> ANP</td>
            </tr>
        </thead>
        <tbody >
            
        </tbody>
    </table>
</div>
<div></div>
@endsection

@section('custom-js')
      <script type="module" src="/js/report/pipelineRenewalPerKanal.js"></script>
@endsection