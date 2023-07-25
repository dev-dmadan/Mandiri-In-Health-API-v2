@extends('report.layoutReportPerformance')

@section('custom-table')
<h5>REPORT KOMISI KANAL</h5>
<div class="table-responsive" style="margin-bottom: 5%">
    <table id="tableKinerjaAgen" class="table table-striped align-middle text-nowrap" >
        {{-- <caption>List of users</caption> --}}
        <thead>
          <tr>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">KANAL</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">KODE AGEN</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">NAMA AGEN ASURANSI</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">KOMISI NOVEMBER</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">ADJUST KOMISI OKT</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TOTAL KOMISI NOVEMBER<br></th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">KOMISI NOV BAYAR (DPP 1,1%)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>IB I</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TOTAL IB I</td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
          </tr>
          <tr>
            <td>IB II</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TOTAL IB II</td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
            <td style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle"></td>
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