<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Favicon -->
<link rel="shortcut icon" href="{{ route('imagecache', ['template' => 'original', 'filename' => $websiteParameter->favicon()]) }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ route('imagecache', ['template' => 'original', 'filename' => $websiteParameter->favicon()]) }}">
<link rel="icon" href="{{ route('imagecache', ['template' => 'original', 'filename' => $websiteParameter->favicon()]) }}" type="image/x-icon">

<title>
   Bisesoggo
</title>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- Nucleo Icons -->
<link href="{{asset('frontend/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
<link href="{{asset('frontend/assets/css/nucleo-svg.css')}}" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="{{ asset('https://kit.fontawesome.com/42d5adcbca.js') }}" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- CSS Files -->



<link id="pagestyle" href="{{asset('frontend/assets/css/material-kit.css?v=3.0.4')}}" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('https://www.w3schools.com/w3css/4/w3.css') }}">



@stack('css')

</head>

<body class="index-page bg-gray-200">



@include('frontend.layouts.navber')

@include('frontend.layouts.header')

<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
 @yield('content')
</div>

@include('frontend.layouts.footer')


{{-- <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script> --}}

<!--   Core JS Files   -->
<script src="{{asset('frontend/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>


<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="{{asset('frontend/assets/js/plugins/countup.min.js')}}"></script>


<script src="{{asset('frontend/assets/js/plugins/choices.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/plugins/prism.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/highlight.min.js')}}"></script>


<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="{{asset('frontend/assets/js/plugins/rellax.min.js')}}"></script>
<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="{{asset('frontend/assets/js/plugins/tilt.min.js')}}"></script>
<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="{{asset('frontend/assets/js/plugins/choices.min.js')}}"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="{{asset('frontend/assets/js/plugins/parallax.min.js')}}"></script>

<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="{{asset('frontend/assets/js/material-kit.min.js?v=3.0.4')}}" type="text/javascript"></script>




<script type="text/javascript">

  if (document.getElementById('state1')) {
    const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
    if (!countUp.error) {
      countUp.start();
    } else {
      console.error(countUp.error);
    }
  }
  if (document.getElementById('state2')) {
    const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
    if (!countUp1.error) {
      countUp1.start();
    } else {
      console.error(countUp1.error);
    }
  }
  if (document.getElementById('state3')) {
    const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
    if (!countUp2.error) {
      countUp2.start();
    } else {
      console.error(countUp2.error);
    };
  }
</script>

@stack('scripts')
</body>

</html>
