{{-- Head --}}
@include('fixed.admin.top')

{{-- Top Header --}}
@include('fixed.admin.header')

{{-- Left Navigation --}}
@include('fixed.admin.navigation')

{{-- Inside Page Content / Changeable --}}
@yield('content')

{{-- Page Footer --}}
@include('fixed.admin.footer')

{{-- Page Bottom Scripts --}}
@include('fixed.admin.bottom')
