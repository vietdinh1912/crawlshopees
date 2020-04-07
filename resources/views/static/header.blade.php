<!DOCTYPE HTML>
<html>
<head>
    <title>Shopee,Tiki,Lazada sale all</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- start slider -->
    <link href="{{ asset('assets/css/slider.css') }}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{ asset('assets/js/modernizr.custom.28468.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.cslider.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('#da-slider').cslider();
        });
    </script>
    <!-- Owl Carousel Assets --><link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />

    <!-- Owl Carousel Assets -->
    <!-- Prettify -->
    <script type="text/javascript" src="{{ asset('assets/js/owl.carousel.js') }}"></script>

    <script>
        $(document).ready(function() {

            $("#owl-demo").owlCarousel({
                items : 4,
                lazyLoad : true,
                autoPlay : true,
                navigation : true,
                navigationText : ["",""],
                rewindNav : false,
                scrollPerPage : false,
                pagination : false,
                paginationNumbers: false,
            });

        });
    </script>
    <!-- //Owl Carousel Assets -->
    <!-- start top_js_button -->
    <script type="text/javascript" src="{{ asset('assets/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/easing.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <!-- Add Style -->
    @stack('styles')
</head>






