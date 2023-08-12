<!DOCTYPE html>
<html class="no-js" lang="en">

@include('layouts.head')
<body>
@include('layouts.header')

@include('flash-message')
@yield('content')

@include('layouts.footer')
<!-- Vendor JS-->
@include('layouts.foot')
</body>
</html>
