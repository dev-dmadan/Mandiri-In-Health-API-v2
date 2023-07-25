@extends('report.layoutReportPerformance')

@section('custom-table')
<h5>Actual Proposal Per Bulan</h5>
<div class="table-responsive" style="margin-bottom: 5%">
    <table id="tableActualProposalPerBulan" class="table table-striped align-middle text-nowrap" >
        {{-- <caption>List of users</caption> --}}
        <thead>
            <tr>
              <th width="5%" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">NO</th>
              <th width="25%" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">BULAN</th>
              <th width="20%" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">QUOTATION</th>
              {{-- <th width="20%" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">POLIS</th>
              <th width="25%" style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center">ANP</th> --}}
            </tr>
          </thead>
          <tbody>
          </tbody>
    </table>
</div>
<div></div>
@endsection

@section('custom-js')
      <script type="module" src="/js/report/actualProposalPerBulan.js"></script>
@endsection