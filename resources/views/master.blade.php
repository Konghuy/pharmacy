<!-- header -->
@include('layouts.header')

<div class="wrapper">
    <div class="sidebar" data-background-color="brown" data-active-color="info">
    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->
    <!-- navbar -->
    @include('layouts.nav')

    <div class="main-panel">
        <!-- panel -->
        @include('layouts.panel')
        
        @yield('content')

        @include('layouts.footer')
        <!-- footer -->
    </div>
</div>
<!-- footerlink -->
@include('layouts.footerlink')
@yield('script')