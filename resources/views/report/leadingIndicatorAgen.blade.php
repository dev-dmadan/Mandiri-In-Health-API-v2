@extends('report.layout')

@section('custom-table')
<h5>Report Leading Indicator Agen</h5>
    <table id="tableLeadingIndicatorAgen" class="display table table-bordered" style="width:100%">
        <thead class="bgKprimary text-light">
            <tr>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NO</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NAMA AGEN ASURANSI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="2">QUOTATION</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2" rowspan="2">% ACH.</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="2">POLIS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2" rowspan="2" >% ACH.</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="2">TICKET SIZE</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2" rowspan="2" >% ACH.</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center" colspan="2">ANP</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2" rowspan="2">% ACH.</th>
            </tr>
            <tr>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">ACTUAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">TARGET</th>
              
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">ACTUAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">TARGET</th>
              
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">ACTUAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">TARGET</th>
              
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">ACTUAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center">TARGET</th>
             
            </tr>
        </thead>
       <tbody></tbody>
        
    </table>

@endsection

@section('custom-js')
    <script type="module" src="/js/report/leadingIndicatorAgen.js"></script>
@endsection