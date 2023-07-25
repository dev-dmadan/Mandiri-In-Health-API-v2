<!-- PROGRESS LIST REPORT PUSAT -->
@include('report.navbarReportPerformance')

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
        <!-- Kinerja bisnis -->
        <tr class='clickable-row' data-href='/report/view/reportKinerjaBisnis/{{$id}}'>
            <td class="text-center font-weight-bold">1.</td>
            <td class="font-weight-bold">Kinerja Bisnis</td>
            <td>Open</td>
        </tr>
        <!-- Kinerja produk -->
        <tr class='clickable-row' data-href='/report/view/reportKinerjaProduk/{{$id}}'>
            <td class="text-center font-weight-bold">2.</td>
            <td class="font-weight-bold">Kinerja Produk</td>
            <td>Open</td>
        </tr>
        <!-- kinerja bisnis per kanal -->
        <tr class='clickable-row' data-href='/report/view/reportKinerjaBisnisPerKanal/{{$id}}'>
            <td class="text-center font-weight-bold">3.</td>   
            <td class="font-weight-bold">Kinerja Bisnis Per Kanal</td>
            <td>Open</td>
        </tr>
        <!-- kinerja per bulan kanal -->
        <tr class='clickable-row' data-href='/report/view/reportKinerjaPerBulanKanal/{{$id}}'>
            <td class="text-center font-weight-bold">4.</td>   
            <td class="font-weight-bold">Kinerja Per Bulan Kanal</td>
            <td>Open</td>
        </tr>
        <!-- kinerja produk per kanal -->
        <tr class='clickable-row' data-href='/report/view/reportKinerjaProdukPerKanal/{{$id}}'>
            <td class="text-center font-weight-bold">5.</td>   
            <td class="font-weight-bold">Kinerja Produk Per Kanal</td>
            <td>Open</td>
        </tr>
        <!-- actual gwp per badan usaha -->
        <tr class='clickable-row' data-href='/report/view/reportLaporanGWP/{{$id}}'>
            <td class="text-center font-weight-bold">6.</td>
            <td class="font-weight-bold">Rekapitulasi GWP Per Badan Usaha</td>
            <td>Open</td>
        </tr>
        <!-- actual gwp per produk -->
        <tr class='clickable-row' data-href='/report/view/reportActualPerProduk/{{$id}}'>
            <td class="text-center font-weight-bold">7.</td>
            <td class="font-weight-bold">Rekapitulasi GWP Per Produk</td>
            <td>Open</td>
        </tr>
        <!-- actual gwp per kanal -->
        <tr class='clickable-row' data-href='/report/view/reportActualPerKanal/{{$id}}'>
            <td class="text-center font-weight-bold">8.</td>
            <td class="font-weight-bold">Rekapitulasi GWP Per Kanal</td>
            <td>Open</td>
        </tr>
        <!-- rekapulutasi gwp badan usaha nb rn -->
        <tr class='clickable-row' data-href='/report/view/performanceRekapGWPBU/{{$id}}'>
            <td class="text-center font-weight-bold">9.</td>
            <td class="font-weight-bold">Rekapitulasi GWP Badan Usaha NB RN</td>
            <td>Open</td>
        </tr>
        <!-- rekapulutasi gwp badan usaha total -->
        <tr class='clickable-row' data-href='/report/view/performanceRekapGWPBUTotal/{{$id}}'>
            <td class="text-center font-weight-bold">10.</td>
            <td class="font-weight-bold">Rekapitulasi GWP Badan Usaha Total</td>
            <td>Open</td>
        </tr>
        <!-- leading indikator kanal -->
        <tr class='clickable-row' data-href='/report/view/reportLeadingIndicatorKanal/{{$id}}'>
            <td class="text-center font-weight-bold">11.</td>
            <td class="font-weight-bold">Leading Indicator Kanal</td>
            <td>Open</td>
        </tr>
        <!-- Leading Indicator Kanal Per Bulan -->
        <tr class='clickable-row' data-href='/report/view/reportLeadingIndicatorKanalPerBulan/{{$id}}'>
            <td class="text-center font-weight-bold">12.</td>
            <td class="font-weight-bold">Leading Indicator Kanal Per Bulan</td>
            <td>Open</td>
        </tr>
        <!-- Actual Proposal Per Kanal -->
        <tr class='clickable-row' data-href='/report/view/performanceActualProposalPerKanal/{{$id}}'>
            <td class="text-center font-weight-bold">13.</td>
            <td class="font-weight-bold">Actual Proposal Per Kanal</td>
            <td>Open</td>
        </tr>
        <!-- Actual Proposal Per Bulan -->
        <tr class='clickable-row' data-href='/report/view/performanceActualProposalPerBulan/{{$id}}'>
            <td class="text-center font-weight-bold">14.</td>
            <td class="font-weight-bold">Actual Proposal Per Bulan</td>
            <td>Open</td>
        </tr>
        <!-- Actual Polis dan ANP Per Kanal< -->
        <tr class='clickable-row' data-href='/report/view/performanceActualPolisANPKanal/{{$id}}'>
            <td class="text-center font-weight-bold">15.</td>
            <td class="font-weight-bold">Actual Polis dan ANP Per Kanal</td>
            <td>Open</td>
        </tr>
        <!-- Actual Polis dan ANP Per Bulan -->
        <tr class='clickable-row' data-href='/report/view/performanceActualPolisANPBulan/{{$id}}'>
            <td class="text-center font-weight-bold">16.</td>
            <td class="font-weight-bold">Actual Polis dan ANP Per Bulan</td>
            <td>Open</td>
        </tr>
        <!-- Daftar Proposal -->
        <tr class='clickable-row' data-href='/report/view/performanceDaftarProposal/{{$id}}'>
            <td class="text-center font-weight-bold">17.</td>
            <td class="font-weight-bold">Daftar Proposal</td>
            <td>Open</td>
        </tr>
        <!-- Daftar Polis ANP -->
        <tr class='clickable-row' data-href='/report/view/performanceDaftarPolisANP/{{$id}}'>
            <td class="text-center font-weight-bold">18.</td>
            <td class="font-weight-bold">Daftar Polis ANP</td>
            <td>Open</td>
        </tr>
        <!-- Target Kanal -->
        <tr class='clickable-row' data-href='/report/view/performanceTargetKanalImpor/{{$id}}'>
            <td class="text-center font-weight-bold">19.</td>
            <td class="font-weight-bold">Target Kanal</td>
            <td>Open</td>
        </tr>
        <!-- Target Produk -->
        <tr class='clickable-row' data-href='/report/view/performanceTargetProdukImpor/{{$id}}'>
            <td class="text-center font-weight-bold">20.</td>
            <td class="font-weight-bold">Target Produk</td>
            <td>Open</td>
        </tr>
        <!-- Target Leading -->
        <tr class='clickable-row' data-href='/report/view/reportTargetLeading/{{$id}}'>
            <td class="text-center font-weight-bold">21.</td>
            <td class="font-weight-bold">Target Leading</td>
            <td>Open</td>
        </tr>
        <!-- Daftar Bu Inforce -->
        <tr class='clickable-row' data-href='/report/view/reportDaftarBuInforce/{{$id}}'>
            <td class="text-center font-weight-bold">22.</td>
            <td class="font-weight-bold">Daftar Bu Inforce</td>
            <td>Open</td>
        </tr>
        <!-- Actual GWP Per Bulan -->
        <tr class='clickable-row' data-href='/report/view/performanceDaftarActualGWPPerBulan/{{$id}}'>
            <td class="text-center font-weight-bold">23.</td>
            <td class="font-weight-bold">Actual GWP Per Bulan</td>
            <td>Open</td>
        </tr>
    </tbody>
</table>