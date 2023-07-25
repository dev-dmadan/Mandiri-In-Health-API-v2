@extends('report.layout')

@section('custom-table')

    <table id="example" class="display" style="width:100%">
        <thead class="bgKprimary text-white">
            <tr>
              <th>No</th>
              <th>Kode BU<br></th>
              <th>Nama BU<br></th>
              <th>Kanal Distribusi</th>
              <th>TMT</th>
              <th>TMB</th>
              <th>Termin</th>
              <th>Kepemilikan</th>
              <th>N/R</th>
              <th>Premi (MTD)</th>
              <th>Produk</th>
              <th>Agen Asuransi</th>
              <th>KA. Unit</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        {{-- <tfoot>
            <tr class="bgKprimary text-white">
                <td class="text-center"><strong>Total</strong></td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>100</td>
            </tr>
            <tr class="bg-light text-dark">
                <td class="text-center">NB</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>100</td>
            </tr>
            <tr class="bg-light text-dark">
                <td class="text-center">R</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>100</td>
            </tr>
        </tfoot> --}}
    </table>

@endsection

@section('custom-js')
    <script type="module" src="/js/report/mtd.js"></script>
@endsection