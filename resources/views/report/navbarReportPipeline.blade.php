<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/css/navbar.css">
        <title>REPORT MANAGEMENT</title>
    </head>
    
    <body>
            <nav class="navbar navbar-expand-lg navbar-red navbar-dark">
                <div class="wrapper">
                </div>
                @php
             
                $url = URL::full();
                $segment = explode('/', $url);
            
                if (count($segment) == 7) {
                    $href = "/report/view/pipeline/".$segment[6];
                
                } else {
                    $href = "/report/view/pipeline/";
                }
            @endphp
                <div class="container-fluid all-show">
                    <a class="navbar-brand" href="{{$href}}">REPORT MANAGEMENT</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                            
                        </ul>
                    </div>
                </div>
            </nav>

       {{-- /// <div class="container-fluid all-show"> --}}
            @yield('custom-list')

        {{-- </div> --}}
  
        <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="/js/report/list.js"></script>
    </body>
</html>