@extends('report.layoutReportPerformance')

@section('custom-table')
<h5>REPORT LIST PKS TTD</h5>
<div class="table-responsive" style="margin-bottom: 5%">
    <table id="tableKinerjaAgen" class="table table-striped align-middle text-nowrap" >
        {{-- <caption>List of users</caption> --}}
        <thead>
          <tr>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">ID MARKIS</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">KODE AGEN</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">JENIS KELAMIN</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TTL</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">PENDIDIKAN</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">KANAL DISTRIBUSI</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TMT</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TMB</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">PDLA</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">GRADE</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TANGGAL KIRIM PKS</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TANGGAL DITERIMA PKS</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TANGGAL KIRIM LAMPIRAN</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TANGGAL DITERIMA LAMPIRAN</th>
            <th style="border: 1px solid black; color: white; background-color:#4472c4" class="text-center align-middle">TANGGAL DITERIMA KODE ETIK</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div></div>
@endsection

@section('custom-js')
      {{-- <script type="module" src="/js/report/kinerjaAgen.js"></script> --}}
@endsection