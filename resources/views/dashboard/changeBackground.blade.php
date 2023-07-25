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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!-- Include Required Prerequisites customer color blue:#7cb5ec-->
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <!-- Include Date Range Picker -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <link rel="stylesheet" href="/css/style.css">
        <title>Dashboard Markis</title>
    </head>

    <style>
        body {
          background-image: url('/img/dashboardBackground.jpeg');
        }
        body {
        font-family: sans-serif;
        background-color: #eeeeee;
        }

        .file-upload {
        background-color: #ffffff;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
        }

        .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
        }

        .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
        }

        .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
        }

        .file-upload-content {
        display: none;
        text-align: center;
        }

        .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
        }

        .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #1FB264;
        position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
        background-color: #1FB264;
        border: 4px dashed #ffffff;
        }

        .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
        }

        .drag-text {
        text-align: center;
        }

        .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
        }

        .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
        }

        .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
        }

        .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
        }

        .remove-image:active {
        border: 0;
        transition: all .2s ease;
        }
    </style>
    
    <body>
        <div class="app-main">
            <div class="app-main__inner">
                
                <div class="file-upload">
                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                  
                    <div class="image-upload-wrap">
                      <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                      <div class="drag-text">
                        <h3>Drag and drop a file or select add Image</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                      </div>
                    </div>
                  </div>

                @yield('custom-chart')
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"> </script>
        <!-- <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
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
        <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <!-- <script src="/js/loadingScript.js"></script> -->
        <script>
            function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

            } else {
                removeUpload();
            }
            }

            function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
            }
            $('.image-upload-wrap').bind('dragover', function () {
                    $('.image-upload-wrap').addClass('image-dropping');
                });
                $('.image-upload-wrap').bind('dragleave', function () {
                    $('.image-upload-wrap').removeClass('image-dropping');
            });

        </script>
        @yield('custom-js')
    </body>
</html>


