@include('includes.Admin.header')
<div id="main">
    <div id="trai">
        @include('includes.Admin.sidebar')
    </div>
    <div id="phai">
        @yield('content')
    </div>
</div>
@include('includes.Admin.footer')
