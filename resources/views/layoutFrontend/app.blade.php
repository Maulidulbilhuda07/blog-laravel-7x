<!-- SECTION -->
@include('layoutFrontend.header')
<div class="section">
        <!-- container -->
        <div class="container">
            <div id="hot-post" class="row hot-post">
            <div class="col-md-8 hot-post-left">
            @yield('isi')
            </div>
            @include('layoutFrontend.widget')
        </div>
    </div>
</div>
    @include('layoutFrontend.footer')
