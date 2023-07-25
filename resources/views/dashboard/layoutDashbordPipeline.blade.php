<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Dashboard Markis</title>
    <meta name="viewport"content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/563b01ccb8.css" crossorigin="anonymous">
    <!-- Include Required Prerequisites customer color blue:#7cb5ec-->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>


    <!-- Include Date Range Picker -->
    {{-- <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" /> --}}
    {{-- <link rel="stylesheet" href="style2.css"> --}}

</head>
<style>
       body {
          background-image: url('/img/dashboardBackground.jpeg');
        }
        /* this demo is for the table-layout:auto algorithm. If you are using the table-layout:fixed algorithm then there are other methods to fix the header without js.*/
        html {
        box-sizing: border-box;
        }
        *,
        *:before,
        *:after {
        box-sizing: inherit;
        }
        .intro {
        max-width: 1280px;
        margin: 1em auto;
        }
        .table-scroll {
        position: relative;
        /* width:100%; */
        z-index: 1;
        margin: auto;
        overflow: auto;
        /* height: 350px; */
        }
        .table-scroll table {
        /* width: 100%; */
        /* min-width: 1280px; */
        margin: auto;
        border-collapse: separate;
        border-spacing: 0;
        }
        .table-wrap {
        position: relative;
        }
        .table-scroll th,
        .table-scroll td {
        padding: 5px 10px;
        /* border: 1px solid #000; */
        background: #fff;
        vertical-align: top;
        height: 40px;
        }
        .table-scroll thead th {
        background:  #16aaff;
        color: #fff;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        }
        /* safari and ios need the tfoot itself to be position:sticky also */
        .table-scroll tfoot,
        .table-scroll tfoot th,
        .table-scroll tfoot td {
        position: -webkit-sticky;
        position: sticky;
        bottom: 0;
        background: #16aaff;
        color: #fff;
        z-index:4;
        font-weight: bold;
        }

        /* a:focus {
        background: red;
        } testing links */

        /* th:first-child {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 2;
        background: #ccc;
        } */
        thead th:first-child,
        tfoot th:first-child {
        z-index: 5;
        }
</style>

<body>
    <div class="app-main">
        <div class="app-main__inner">
            <!-- Custom Search -->
            <div class="d-flex flex-row-reverse" style="margin-bottom:15px; align:left">
                <table>
                    <th style="padding: 5px;">
                        <select id="periode" class="custom-select" aria-placeholder="select" onchange="onChangeTahun()"></select>
                    </th>
                    <th style="padding: 5px;">
                        <div id="kanalfilter">
                            <div class="btn-actions-pane-right">
                                <select id="kanalDistribusi" class="custom-select"
                                    onchange="onChangeKanalDistribusi()"></select>
                            </div>
                        </div>
                    </th>
                    <th style="padding: 5px;">
                        <select id="tahun" class="custom-select" aria-placeholder="select" onchange="onChangeTahun()"></select>
                    </th>
                    <th style="padding: 5px;">
                        <div class="btn-actions-pane-right">
                            <select id="bulan" class="custom-select" onchange="onChangeBulan()"></select>
                        </div>
                    </th>
                    <th style="padding: 5px;">
                        <div class="btn-actions-pane-right">
                            <select id="produk" class="custom-select" onchange="onChangeProduk()"></select>
                        </div>
                    </th>
                    <th>

                    </th>
                </table>
            </div>
            <!-- Custom Search -->

            @yield('custom-chart')

        </div>
    </div>
    <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
    </script>
    <!-- <script
        src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js">
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script> --}}
    <script src="https://kit.fontawesome.com/563b01ccb8.js" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://rawgit.com/highcharts/rounded-corners/master/rounded-corners.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script>
        const MIN_YEAR = @json(isset($minYear) ? $minYear : 2010, JSON_PRETTY_PRINT);
        const MAX_YEAR = @json(isset($maxYear) ? $maxYear : null, JSON_PRETTY_PRINT);
        const APP_URL = @json(env('APP_URL'), JSON_PRETTY_PRINT);
        const CREATIO_URL = @json(env('CREATIO_URL'), JSON_PRETTY_PRINT);
        const SECRET_KEY = @json(env('SECRET_KEY'), JSON_PRETTY_PRINT);
        const PUSHER_APP_KEY = @json(env('PUSHER_APP_KEY'), JSON_PRETTY_PRINT);
        const APP_ENV = @json(env('APP_ENV'), JSON_PRETTY_PRINT);
    </script>
    <script src="/js/library/customDate.js"></script>
    <script src="/js/app.js"></script>
    <!-- <script src="/js/loadingScript.js"></script> -->
    @yield('custom-js')
</body>

</html>
