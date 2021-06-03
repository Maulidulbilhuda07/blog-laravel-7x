@include('layoutBackend/navbar')
@include('layoutBackend/sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>@yield('sub-judul')</h1>
    </section>
    @yield('content')
</div>
@include('layoutBackend/footer')
