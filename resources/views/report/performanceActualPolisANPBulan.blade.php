@extends('report.layoutReportPerformance')

@section('custom-table')
<h5>Actual Polis dan ANP Per Bulan</h5>
<div class="table-responsive" style="margin-bottom: 5%">
  <table id="tableActualAnpPerBulan" class="table table-striped align-middle text-nowrap" >
      {{-- <caption>List of users</caption> --}}
      <thead>
          <tr>
            <th width="5%" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">NO</th>
            <th width="30%" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">BULAN</th>
            {{-- <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">QUOTATION</th> --}}
            <th width="30%"style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">POLIS</th>
            <th  width="30%" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">ANP</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
  </table>
</div>
@endsection

@section('custom-js')
      <script type="module" src="/js/report/actualAnpPerBulan.js"></script>
@endsection