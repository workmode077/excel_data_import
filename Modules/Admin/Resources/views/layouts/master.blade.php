<!DOCTYPE html>
<html lang="en" dir="">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Machine test</title>
  
    <link rel="icon" type="image/x-icon" href="">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="{{ asset('admin/css/themes/lite-purple.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/plugins/perfect-scrollbar.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/css/plugins/dropzone.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="https://www.codehim.com/demo/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.css">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('admin/css/datatables.min.css') }}">
    <link rel="stylesheet" href={{ asset('admin/css/plugins/toastr.css') }} />
    <link rel="stylesheet" href="{{ asset('admin/css/sweetalert2.min.css') }}">
    <link href="{{ asset('admin/css/sweetalert2.min.css') }}" rel="stylesheet" />
  
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
        var storage_url = base_url + '/storage';
    </script>
    
</head>
    <body>
         @yield('content')


        {{-- footer start --}}
            @include('admin::layouts.footer')
        {{-- footer end --}}
    </body>
    <script src="{{ asset('admin/js/plugins/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts/script.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts/sidebar.large.script.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts/echart.options.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts/dashboard.v1.script.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts/datatables.script.js') }}"></script>
    <script src="{{ asset('admin/js/scripts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts/sweetalert.script.js') }}"></script>
   
    
    @yield('datatable-js')
    <script>
        function displayDivDemo(id, elementValue) {
            document.getElementById(id).style.display = elementValue.value == 1 ? 'flex' : 'none';
        }
          //   fadeout alert
          $(document).ready (function(){
          $(".toast-top-right").delay(4000).fadeOut();
        });
    </script>
     
</body>
</html>
</html>
