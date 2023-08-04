<!DOCTYPE html>
<html class="no-js" lang="en">

@include('layouts.head')
<body>
@include('layouts.header')

@yield('content')
{{$slot}}

@include('layouts.footer')
<!-- Vendor JS-->
@include('layouts.foot')
</body>
</html>
