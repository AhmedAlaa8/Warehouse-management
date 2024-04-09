@include('admin.layouts.head')
@include('admin.layouts.nav')
@include('admin.layouts.aside')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            @yield('bread')

        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @yield('content')

        </div>
    </section>


    @include('admin.layouts.footer')
