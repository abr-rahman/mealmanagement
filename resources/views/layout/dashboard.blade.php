<!DOCTYPE html>
<html lang="en">
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    @extends('layout._header')

    <!-- page Navigation -->
    {{-- <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ 'dashboard' }}/assets/imgs/logo.svg" alt="">
            </a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Our Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="components.html" class="ml-4 nav-link btn btn-primary btn-sm rounded">Components</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}

    <!-- Portfolio Section -->
    <section id="portfolio" class="section portfolio-section">
        <div class="container">


            @yield('content')

        </div>
        </div>
    </section>
    @extends('layout._footer')
    @yield('footer_script')
</body>
</html>
