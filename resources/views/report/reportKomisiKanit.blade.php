@extends('report.layoutReportPerformance')

@section('custom-table')
<h5>REPORT KOMISI KANIT</h5>
<div class="table-responsive" style="margin-bottom: 5%">
    <table id="tableKinerjaAgen" class="table table-striped align-middle text-nowrap" >
        {{-- <caption>List of users</caption> --}}
        <thead>
          <tr>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">NO.</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">KPM</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">KOMISI NOVEMBER 2022</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle" colspan="2">TOTAL</td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
          </tr>
        </tbody>
    </table>
</div>
<div></div>
@endsection

@section('custom-js')
      {{-- <script type="module" src="/js/report/kinerjaAgen.js"></script> --}}
@endsection