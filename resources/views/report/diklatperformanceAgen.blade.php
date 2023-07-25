@extends('report.layoutReportDiklatAgen')

@section('custom-table')
<h5>Report Perfromance Agen</h5>
<table height="60px">
    <td width="">
        <div class="col-md-5">
            <label for="inputEmail3" class="col-form-label text-nowrap" style="font-weight:bold">PAGE NUMBER</label>
        </div>
    </td>
    <td width="10%">
        <div>
            <select id="pageNumber" class="custom-select text-nowrap" style="font-weight:bold"></select>
        </div>
    </td>
    <td width="10%" class="text-center align-middle">
        <div>
            <h6  class="align-middle" style="padding-top: 8px; font-weight:bold"> PAGE: <span id="page"></span></h6>
        </div>
    </td>

    <td width="70%"></td>

    <td width="">
        <div class="col-md-5">
            <label for="inputEmail3" class="col-form-label text-nowrap" style="font-weight:bold"">SHOW</label>
        </div>
    </td>
    <td width="10%">
        <div>
            <select id="pageSize" class="custom-select text-nowrap" style="font-weight:bold"></select>
        </div>
    </td>
    <td width="10%" class="text-center align-middle">
        <div>
            <h6  class="align-middle" style="padding-top: 8px; font-weight:bold"> ENTRIES</h6>
        </div>
    </td>
</table>
<div class="table-responsive" style="margin-bottom: 5%">
    <table id="tablePerformanceAgen" class="display table table-bordered text-nowrap" style="width:100%">
        <thead class="bgKprimary" >
            <tr height ="60px">
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">NO</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">KODE AGEN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">NAMA AGEN ASURANSI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">JANUARI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER JANUARI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">FEBRUARI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER FEBRUARI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">MARET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER MARET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">APRIL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER APRIL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">MEI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER MEI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">JUNI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER JUNI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">JULI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER JULI</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">AGUSTUS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER AGUSTUS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">SEPTEMBER</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER SEPTEMBER</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">OKTOBER</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER OKTOBER</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">NOVEMBER</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER NOVEMBER</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">DESEMBER</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">PENCAPAIAN PER DESEMBER</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">Q1 (JANUARI - MARET)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">Q1</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">EVALUASI NILAI Q1</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3" >HASIL EVALUASI Q1</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">Q2 (JANUARI - JUNI)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">Q2</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">EVALUASI NILAI Q2</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">HASIL EVALUASI Q2</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">Q3 (JANUARI - SEPTEMBER)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">Q3 - 2022</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">EVALUASI NILAI Q3</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">HASIL EVALUASI Q3</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">Q4 (JANUARI - DESEMBER)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="3">Q4</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">EVALUASI NILAI Q4</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="3">HASIL EVALUASI Q4</th>

            </tr>
            <tr height ="50px">
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">SESUAI BOBOT</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">SESUAI BOBOT</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">SESUAI BOBOT</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">NEW BUSINESS</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="2">RENEWAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">NB</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">RN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" rowspan="2">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle" colspan="4">SESUAI BOBOT</th>
            </tr>
           
            <tr height ="50px">
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                {{-- q1 januari --}}
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">NB (70%)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">RN (30%)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle"></th>

                {{-- q2 april --}}
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">NB (70%)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">RN (30%)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle"></th>

                {{-- q3 juli --}}
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">NB (70%)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">RN (30%)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle"></th>

                {{-- q3 oktober --}}
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TARGET</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">PENCAPAIAN</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">NB (70%)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">RN (30%)</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle">TOTAL</th>
                <th style="border: 1px solid black; color:white; background-color: #4472C4" class="text-center align-middle"></th>


            </tr>

            
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection

@section('custom-js')
   <script type="module" src="/js/report/performanceAgen.js"></script>
@endsection