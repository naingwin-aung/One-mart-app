<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliverer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
</head>
    <style>
        .side-menu {
            background-color: #202c45;
            min-height: 100vh;
        }
        .admin-nav{
            background: white;
            box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.20);
        }
    </style>
<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <nav class="col-2 px-1 side-menu">
                <h1 class="h5 py-3 text-center text-white">
                    <a href="{{route('home')}}"><img src="{{url('/images/one-logo.jpg')}}" alt="" height="50" class="rounded"></a>
                    <span class="d-none d-md-inline">
                        ONE MART
                    </span>
                </h1>
                <div class="list-group text-center text-lg-start">
                    <a href="{{route('delivery')}}" class="list-group-item list-group-item-action rounded-0 border-0 {{Request::segment(2) == 'order' ? 'active' : ''}}">
                        <i class="fas fa-home"></i>
                        <span class="d-none d-lg-inline">Ordered items</span>

                        @if (Request::segment(2) == 'order')
                            <span class="d-none d-lg-inline badge bg-danger rounded-pill float-end">{{count($orders)}}</span>
                        @endif
                    </a>

                    <a href="{{route('delivering.items')}}" class="list-group-item list-group-item-action rounded-0 border-0 {{Request::segment(2) == 'delivering' ? 'active' : ''}}">
                        <i class="fas fa-truck"></i>
                        <span class="d-none d-lg-inline">Delivering items</span>
                    </a>
                </div>
            </nav>

            <main class="col-10 p-0">
                <nav class="navbar navbar-expand-lg navbar-light admin-nav justify-content-end">
                    <div class="navbar nav pe-5" id="navbarNav">
                        <li class="nav-item dropdown pe-5">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                @if (Auth::user())
                                    {{Auth::user()->name}}
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-start">
                                <li><a href="{{route('logout')}}" class="dropdown-item">Logout</a></li>
                            </ul>
                        </li>
                    </div>
                </nav>
                <div class="p-3">
                    @yield('content')
                </div>
            </main>
        </div>
        <footer class="text-center py-4 text-muted">
            &copy; Copyright 2020
        </footer>
    </div>    

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            'info' : false,
            'searching' : false,
            'ordering' : false,
        });
    } );
</script>
</body>
</html>