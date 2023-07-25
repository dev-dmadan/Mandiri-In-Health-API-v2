@extends('report.layoutReportDiklatAgen')

@section('custom-table')
<h5>Report Top 10 Broker By GWP</h5>
<div class="table-responsive" style="margin-bottom: 5%">
    <table id="tableTopBroker" class="table table-striped align-middle text-nowrap" >
        {{-- <caption>List of users</caption> --}}
        <thead>
            <tr>
              <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" rowspan="2">NO</th>
              <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" rowspan="2">NAMA BROKER</th>
              <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
              <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="2">RENEWAL</th>
              <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" rowspan="2">TOTAL BU</th>
              <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" rowspan="2">TOTAL GWP</th>
            </tr>
            <tr>
              <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">JUMLAH BU</th>
              <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">GWP</th>
              <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">JUMLAH BU</th>
              <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">GWP</th>
            </tr>

          </thead>
         <tbody></tbody>
    </table>
</div>
<div></div>
@endsection

@section('custom-js')
      <script type="module" src="/js/report/topbroker.js"></script>
@endsection