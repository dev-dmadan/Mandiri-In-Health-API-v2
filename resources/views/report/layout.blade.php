<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- Include Required Prerequisites customer color blue:#7cb5ec-->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" href="/css/styleReport1.css">
    <link rel="stylesheet" href="/css/styleReport2.css">
    <title>REPORT MANAGEMENT</title>
</head>

<body>
    @include('report.navbar')
    <div class="app-main">
        <div class="app-main__inner">

            <!-- Custom Filter -->
            <form >
                <div class="form-group row">
                    <div class="col-2">
                        <label for="inputEmail3" class="col-form-label ms-1">KANAL DISTRIBUSI</label>
                    </div>
                    <div class="col-3">
                        <select id="kanalDistribusi" class="custom-select"></select>
                    </div>
                </div>
                
                <div id="kanitfilter" class="form-group row">
                    <div class="col-2">
                        <label for="inputEmail3" class="col-form-label">KEPALA UNIT</label>
                    </div>
                    <div class="col-3">
                        <select id="kanit" class="custom-select"></select>
                    </div>
                </div>


                <div id="agenfilter" class="form-group row">
                    <div class="col-2">
                        <label for="inputEmail3" class="col-form-label">AGEN ASURANSI</label>
                    </div>
                    <div class="col-3">
                        <select id="agen" class="custom-select"></select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-2">
                        <label for="inputEmail3" class="col-form-label">TAHUN</label>
                    </div>
                    <div class="col-3">
                        <select id="tahun" class="custom-select"></select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-2">
                        <label for="inputEmail3" class="col-form-label">BULAN</label>
                    </div>
                    <div class="col-3">
                        <select id="bulan" class="custom-select"></select>
                    </div>
                </div>

                <!-- <div class="form-group row">
                        <div class="col-2">
                            <label for="inputEmail3" class="col-form-label">PERIODE</label>
                        </div>
                        <div class="col-3">
                            <select id="Periode" class="custom-select" onchange="onChangePeriode()"></select>
                        </div>
                    </div>  -->

                    

                <div id="produkfilter" class="form-group row">
                    <div class="col-2">
                        <label for="inputEmail3" class="col-form-label">PRODUK</label>
                    </div>
                    <div class="col-3">
                        <select id="produk" class="custom-select"></select>
                    </div>
                </div>

                <div id="periodefilter" class="form-group row">
                    <div class="col-2">
                        <label for="inputEmail3" class="col-form-label">PERIODE</label>
                    </div>
                    <div class="col-3">
                        <select id="periode" class="custom-select"></select>
                    </div>
                </div>

                <div id="targetfilter" class="form-group row">
                    <div class="col-2">
                        <label for="inputEmail3" class="col-form-label">TARGET</label>
                    </div>
                    <div class="col-3">
                        <select id="target" class="custom-select" onchange="onChangeTarget()"></select>
                    </div>
                </div>

            </form>
            <!-- Custom Filter -->

            <div class="mb-3">
                <button id="printButton" class="btn btn-outline-primary">Donwload Excel</button>
            </div>

            @yield('custom-table')

        </div>
    </div>

    <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
    </script>
    <!-- <script
        src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js">
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://rawgit.com/highcharts/rounded-corners/master/rounded-corners.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>
    <script>
        const MIN_YEAR = @json(isset($minYear) ? $minYear : 2010, JSON_PRETTY_PRINT);
        const MAX_YEAR = @json(isset($maxYear) ? $maxYear : null, JSON_PRETTY_PRINT);
        const APP_URL = @json(env('APP_URL'), JSON_PRETTY_PRINT);
        const CREATIO_URL = @json(env('CREATIO_URL'), JSON_PRETTY_PRINT);
        const SECRET_KEY = @json(env('SECRET_KEY'), JSON_PRETTY_PRINT);
        const PUSHER_APP_KEY = @json(env('PUSHER_APP_KEY'), JSON_PRETTY_PRINT);
        const APP_ENV = @json(env('APP_ENV'), JSON_PRETTY_PRINT);
    </script>
    <script src="/js/app.js"></script>
    @yield('custom-js')
</body>

</html>
