<!DOCTYPE html>
<html>

<head>
    <title>Milos Survey |
        @hasSection('page_title')
            @yield('page_title')
        @else

        @endif
    </title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../css/vendors/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

</head>

<body>
<div id="app">
@include('layouts.header.index')
<div class="main-content-wrapper">
    @include('layouts.header.category-nav')
    @yield('content-wrapper')
</div>
@include('layouts.footer.index')
</div>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<!-- END jquery -->

<!-- flexslider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"
        integrity="sha512-BmoWLYENsSaAfQfHszJM7cLiy9Ml4I0n1YtBQKfx8PaYpZ3SoTXfj3YiDNn0GAdveOCNbK8WqQQYaSb0CMjTHQ=="
        crossorigin="anonymous"></script>
<!-- END flexslider -->

<!-- Bootstrap js -->
<script src="{{asset('js/vendors/bootstrap.bundle.min.js')}}"></script>
<!-- End Bootstrap js -->
<!-- custom js scripts -->
<script src="{{ asset('js/main.js') }}"></script>
<!-- custom js scripts -->
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>

@stack('scripts')

</body>

</html>