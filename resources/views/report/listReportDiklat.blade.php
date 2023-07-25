
@include('report.navbarReportDiklatAgen')
<table class="table table-head-custom table-vertical-center table-striped" id="account-table">
    <input type="hidden" name="id" value="123456789">
    <thead>
        <tr>
            <th style="width: 6%" class="text-center">NO</th>
            <th>JENIS REPORT</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <tr class='clickable-row' data-href='/report/view/reportKinerjaPerBulanKanit/{{$id}}'>
            <td class="text-center font-weight-bold">1.</td>
            <td class="font-weight-bold">Kinerja Per Bulan Ka. Unit</td>
            <td>Open</td>
        </tr>
        <tr class='clickable-row' data-href='/report/view/reportKinerjaPerBulanAgen/{{$id}}'>
            <td class="text-center font-weight-bold">2.</td>
            <td class="font-weight-bold">Kinerja Per Bulan Agen</td>
            <td>Open</td>
        </tr>
        <tr class='clickable-row' data-href='/report/view/reportKinerjaKaUnitPerProduk/{{$id}}'>
            <td class="text-center font-weight-bold">3.</td>
            <td class="font-weight-bold">Kinerja Ka. Unit Per Produk</td>
            <td>Open</td>
        </tr>
        <tr class='clickable-row' data-href='/report/view/reportKinerjaAgenPerProduk/{{$id}}'>
            <td class="text-center font-weight-bold">4.</td>
            <td class="font-weight-bold">Kinerja Agen Per Produk</td>
            <td>Open</td>
        </tr>
        {{-- <tr class='clickable-row' data-href='/report/view/reportKinerjaProduk'>
            <td class="font-weight-bold">Kinerja Produk</td>
            <td>Open</td>
        </tr> --}}
        {{-- <tr class='clickable-row' data-href='/report/view/reportKinerjaKaUnit'>
            <td class="font-weight-bold">Kinerja KA. Unit Per</td>
            <td>Open</td>
        </tr>
        <tr class='clickable-row' data-href='/report/view/reportKinerjaAgen'>
            <td class="font-weight-bold">Kinerja Agen</td>
            <td>Open</td>
        </tr> --}}
        <tr class='clickable-row' data-href='/report/view/reportLeadingIndicatorAgen/{{$id}}'>
            <td class="text-center font-weight-bold">5.</td>
            <td class="font-weight-bold">Leading Indicator Agent</td>
            <td>Open</td>
        </tr>
        <tr class='clickable-row' data-href='/report/view/leadingIndicatorKAUnit/{{$id}}'>
            <td class="text-center font-weight-bold">6.</td>
            <td class="font-weight-bold">Leading Indicator KA. Unit</td>
            <td>Open</td>
        </tr>
        <tr class='clickable-row' data-href='/report/view/performanceAgen/{{$id}}'>
            <td class="text-center font-weight-bold">7.</td>
            <td class="font-weight-bold">Performance Kinerja Agen</td>
            <td>Open</td>
        </tr>
        {{-- <tr class='clickable-row' data-href='/report/view/performanceAgen'>
             <td class="text-center font-weight-bold">8.</td>
            <td class="font-weight-bold">Report Training</td>
            <td>Open</td>
        </tr>
        <tr class='clickable-row' data-href='/report/view/performanceAgen'>
             <td class="text-center font-weight-bold">9.</td>
            <td class="font-weight-bold">Report Komisi</td>
            <td>Open</td>
        </tr> --}}
        <tr class='clickable-row' data-href='/report/view/reportTopTenGWPBroker/{{$id}}'>
            <td class="text-center font-weight-bold">8.</td>
            <td class="font-weight-bold">Report Top 10 GWP Broker</td>
            <td>Open</td>
        </tr>
    </tbody>
</table>