
@include('report.navbarReportPipeline')

<style>
table .collapse.in {
	display:table-row;
}
</style>

<table class="" id="striped">
    <input type="hidden" name="id" value="123456789">
    <thead>
        <tr>
            <th style="width: 7%"class="text-center">#</th>
            <th style="width: 70%">JENIS REPORT</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2" class="font-weight-bold h5" style="padding-left: 2%">  Pipeline New Business</td>
            <td></td>
        </tr>
        {{-- <tr id="collapseme" class="collapse out"> --}}
        <tr id="show1" class="clickable-row" data-href='/report/view/pipelineNBDaftarAllPipeline/{{$id}}'>
            <td class="text-right font-weight-bold">1.</td>
            <td class="font-weight-bold">Daftar Pipeline New Business - All Pipeline</td>
            <td>Open</td>
        </tr>
        <tr id="show2" class="clickable-row" data-href='/report/view/pipelineNBDaftarPipelineKomitment/{{$id}}'>
            <td class="text-right font-weight-bold">2.</td>
            <td class="font-weight-bold">Daftar Pipeline New Business - Pipeline Komitmen</td>
            <td>Open</td>
        </tr>
        <tr id="show3" class="clickable-row" data-href='/report/view/pipelineNBDaftarPipelineQuotation/{{$id}}'>
            <td class="text-right font-weight-bold">3.</td>
            <td class="font-weight-bold">Daftar Pipeline New Business - Quotation</td>
            <td>Open</td>
        </tr>
        <tr  class="clickable-row" data-href='/report/view/pipelineNBDaftarWin/{{$id}}'>
            <td class="text-right font-weight-bold"><span id="nomor4"></span></td>
            <td class="font-weight-bold">Daftar Badan Usaha New Business - Closing</td>
            <td>Open</td>
        </tr>
        <tr class="clickable-row" data-href='/report/view/pipelineNBDaftarLoss/{{$id}}'>
            <td class="text-right font-weight-bold"><span id="nomor5"></span></td>
            <td class="font-weight-bold">Daftar Badan Usaha New Business - Loss</td>
            <td>Open</td>
        </tr>
        <tr id="show4" class="clickable-row" data-href='/report/view/pipelineNBRekapPerBulan/{{$id}}'>
            <td class="text-right font-weight-bold">6.</td>
            <td class="font-weight-bold">Rekapitulasi Pipeline New Business Per Bulan</td>
            <td>Open</td>
        </tr>
        <tr id="show5" class="clickable-row" data-href='/report/view/pipelineNBRekapPerKanal/{{$id}}'>
            <td class="text-right font-weight-bold">7.</td>
            <td class="font-weight-bold">Rekapitulasi Pipeline New Business Per Kanal</td>
            <td>Open</td>
        </tr>
        <tr id="show6" class="clickable-row" data-href='/report/view/pipelineNBRekapProgressAllPipeline/{{$id}}'>
            <td class="text-right font-weight-bold">8.</td>
            <td class="font-weight-bold">Rekapitulasi Progress Pipeline New Business - All Pipeline</td>
            <td>Open</td>
        </tr>
        <tr id="show7" class="clickable-row" data-href='/report/view/pipelineNBRekapProgressPipelineKomitment/{{$id}}'>
            <td class="text-right font-weight-bold">9.</td>
            <td class="font-weight-bold">Rekapitulasi Progress Pipeline New Business - Pipeline Komitmen</td>
            <td>Open</td>
        </tr>
        <tr id="show8" class="clickable-row" data-href='/report/view/pipelineNBRekapProgressPipelineQuotation/{{$id}}'>
            <td class="text-right font-weight-bold">10.</td>
            <td class="font-weight-bold">Rekapitulasi Progress Pipeline New Business - Quotation</td>
            <td>Open</td>
        </tr>
        {{-- </tr> --}}

        <tr>
            <td colspan="2" class="font-weight-bold h5" style="padding-left: 2%">Pipeline Renewal</td>
            <td></td>
        </tr>
        <tr id="show9" class="clickable-row" data-href='/report/view/pipelineRNDaftarPerBU/{{$id}}'>
            <td class="text-right font-weight-bold">1.</td>
            <td class="font-weight-bold">Daftar Pipeline Renewal Per Badan Usaha</td>
            <td>Open</td>
        </tr>
        <tr class="clickable-row" data-href='/report/view/pipelineRNDaftarLapse/{{$id}}'>
            <td class="text-right font-weight-bold"><span id="nomor2"></span></td>
            <td class="font-weight-bold">Daftar Badan Usaha Renewal - Lapse</td>
            <td>Open</td>
        </tr>
        <tr id="show10" class="clickable-row" data-href='/report/view/pipelineRNRekapPerBulan/{{$id}}'>
            <td class="text-right font-weight-bold">3.</td>
            <td class="font-weight-bold">Rekapitulasi Progress Pipeline Renewal Per Bulan</td>
            <td>Open</td>
        </tr>
        <tr id="show11" class="clickable-row" data-href='/report/view/pipelineRNRekapPerKanal/{{$id}}'>
            <td class="text-right font-weight-bold">4.</td>
            <td class="font-weight-bold">Rekapitulasi Progress Pipeline Renewal Per Kanal</td>
            <td>Open</td>
        </tr>
    </tbody>
  
</table>

<script>
  
    var url = window.location.pathname.split('/');
    var guid = url[4];
    var div = document.getElementById("show2");
    console.log("data id", url);
   

    if (guid != "00000000-0000-0000-0000-000000000000") {
        document.getElementById("show1").style.display = "none";
        document.getElementById("show2").style.display = "none";
        document.getElementById("show3").style.display = "none";
        document.getElementById("show4").style.display = "none";
        document.getElementById("show5").style.display = "none";
        document.getElementById("show6").style.display = "none";
        document.getElementById("show7").style.display = "none";
        document.getElementById("show8").style.display = "none";
        document.getElementById("show9").style.display = "none";
        document.getElementById("show10").style.display = "none";
        document.getElementById("show11").style.display = "none";
        document.getElementById("striped").className  = "table table-head-custom table-vertical-center";
        document.getElementById("nomor4").innerHTML = "1.";
        document.getElementById("nomor5").innerHTML = "2.";
        document.getElementById("nomor2").innerHTML = "1.";
       
    } else {
        document.getElementById("show1").style.display = "blok";
        document.getElementById("show2").style.display = "blok";
        document.getElementById("show3").style.display = "blok";
        document.getElementById("show4").style.display = "blok";
        document.getElementById("show5").style.display = "blok";
        document.getElementById("show6").style.display = "blok";
        document.getElementById("show7").style.display = "blok";
        document.getElementById("show8").style.display = "blok";
        document.getElementById("show9").style.display = "blok";
        document.getElementById("show10").style.display = "blok";
        document.getElementById("show11").style.display = "blok";
        document.getElementById("striped").className  = "table table-head-custom table-vertical-center table-striped";
        document.getElementById("nomor4").innerHTML = "4.";
        document.getElementById("nomor5").innerHTML = "5.";
        document.getElementById("nomor2").innerHTML = "2.";
    }

    // var div = document.getElementById("show");
    // if (div.style.display !== "none") {
    //     div.style.display = "none";
    // }
    // else {
    //     div.style.display = "block";
    // }
    

</script>
{{-- 
<script>
    $("#btn").click(function() {
        if($("#collapseme").hasClass("out")) {
            $("#collapseme").addClass("in");
            $("#collapseme").removeClass("out");
        } else {
            $("#collapseme").addClass("out");
            $("#collapseme").removeClass("in");
        }

        if($("#collapseme2").hasClass("out")) {
            $("#collapseme2").addClass("in");
            $("#collapseme2").removeClass("out");
        } else {
            $("#collapseme2").addClass("out");
            $("#collapseme2").removeClass("in");
        }

        if($("#collapseme3").hasClass("out")) {
            $("#collapseme3").addClass("in");
            $("#collapseme3").removeClass("out");
        } else {
            $("#collapseme3").addClass("out");
            $("#collapseme3").removeClass("in");
        }

        if($("#collapseme4").hasClass("out")) {
            $("#collapseme4").addClass("in");
            $("#collapseme4").removeClass("out");
        } else {
            $("#collapseme4").addClass("out");
            $("#collapseme4").removeClass("in");
        }

        if($("#collapseme5").hasClass("out")) {
            $("#collapseme5").addClass("in");
            $("#collapseme5").removeClass("out");
        } else {
            $("#collapseme5").addClass("out");
            $("#collapseme5").removeClass("in");
        }

        if($("#collapseme6").hasClass("out")) {
            $("#collapseme6").addClass("in");
            $("#collapseme6").removeClass("out");
        } else {
            $("#collapseme6").addClass("out");
            $("#collapseme6").removeClass("in");
        }

        if($("#collapseme7").hasClass("out")) {
            $("#collapseme7").addClass("in");
            $("#collapseme7").removeClass("out");
        } else {
            $("#collapseme7").addClass("out");
            $("#collapseme7").removeClass("in");
        }

        if($("#collapseme8").hasClass("out")) {
            $("#collapseme8").addClass("in");
            $("#collapseme8").removeClass("out");
        } else {
            $("#collapseme8").addClass("out");
            $("#collapseme8").removeClass("in");
        }

        if($("#collapseme9").hasClass("out")) {
            $("#collapseme9").addClass("in");
            $("#collapseme9").removeClass("out");
        } else {
            $("#collapseme9").addClass("out");
            $("#collapseme9").removeClass("in");
        }
        if($("#collapseme10").hasClass("out")) {
            $("#collapseme10").addClass("in");
            $("#collapseme10").removeClass("out");
        } else {
            $("#collapseme10").addClass("out");
            $("#collapseme10").removeClass("in");
        }
    });

    $("#btn2").click(function() {
        if($("#collapseme11").hasClass("out")) {
            $("#collapseme11").addClass("in");
            $("#collapseme11").removeClass("out");
        } else {
            $("#collapseme11").addClass("out");
            $("#collapseme11").removeClass("in");
        }

        if($("#collapseme12").hasClass("out")) {
            $("#collapseme12").addClass("in");
            $("#collapseme12").removeClass("out");
        } else {
            $("#collapseme12").addClass("out");
            $("#collapseme12").removeClass("in");
        }

        if($("#collapseme13").hasClass("out")) {
            $("#collapseme13").addClass("in");
            $("#collapseme13").removeClass("out");
        } else {
            $("#collapseme13").addClass("out");
            $("#collapseme13").removeClass("in");
        }

        if($("#collapseme14").hasClass("out")) {
            $("#collapseme14").addClass("in");
            $("#collapseme14").removeClass("out");
        } else {
            $("#collapseme14").addClass("out");
            $("#collapseme14").removeClass("in");
        }
    });
</script> --}}
