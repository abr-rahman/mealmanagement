<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Devcrud">
    <title>Meal Management</title>
    <link rel="stylesheet" href="{{ 'dashboard' }}/assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" />
    <link rel="stylesheet" href="{{ 'dashboard' }}/assets/css/leadmark.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ 'dashboard' }}/assets/css/style.css">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
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
    <section id="portfolio" class="section portfolio-section">
        <div class="container">
            @yield('content')
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ 'dashboard' }}/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="{{ 'dashboard' }}/assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <script src="{{ 'dashboard' }}/assets/vendors/bootstrap/bootstrap.affix.js"></script>
    <script src="{{ 'dashboard' }}/assets/vendors/isotope/isotope.pkgd.js"></script>
    <script src="{{ 'dashboard' }}/assets/js/leadmark.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="sweetalert2.min.js"></script>


    <script>

        $(function() {
            var table = $('.meals_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                pageLength: 4,
                ajax: "{{ route('meal.meals_datatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'breakfast',
                        name: 'breakfast'
                    },
                    {
                        data: 'lunch',
                        name: 'lunch'
                    },
                    {
                        data: 'dinner',
                        name: 'dinner'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
        $(function() {
            var table = $('.market_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                pageLength: 4,
                ajax: "{{ route('market.datatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'formDate',
                        name: 'formDate'
                    },
                    {
                        data: 'toDate',
                        name: 'toDate'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
    @yield('footer_script')
</body>

</html>
