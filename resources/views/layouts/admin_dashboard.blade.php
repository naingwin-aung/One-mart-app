<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
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
    <div class="container-fluid">
        <div class="row g-0">
            <nav class="col-2 px-1 side-menu">
                <h1 class="h5 py-3 text-center text-white">
                    <img src="{{url('/images/one-logo.jpg')}}" alt="" height="50" class="rounded">
                    <span class="d-none d-md-inline">
                        ONE MART
                    </span>
                </h1>
                <div class="list-group text-center text-lg-start">
                    <span class="list-group-item disabled d-none d-lg-block border-0">
                        <small>CONTROLS</small>
                    </span>
                    <a href="{{route('admin')}}" class="list-group-item list-group-item-action rounded-0 border-0 {{Request::segment(2) == 'categories' ? 'active' : ''}}">
                        <i class="fas fa-home"></i>
                        <span class="d-none d-lg-inline">Category</span>
                        @if (Request::segment(2) == 'categories' && Request::segment(3) == '')
                            <span class="d-none d-lg-inline badge bg-danger rounded-pill float-end">{{count($categories)}}</span>
                        @endif
                    </a>

                    <a href="{{url('/admin/product')}}" class="list-group-item list-group-item-action {{Request::segment(2) == 'product' ? 'active' : ''}}">
                        <span class="d-none d-lg-inline">Product</span>
                        @if (Request::segment(2) == 'product' && Request::segment(3) == '')
                            <span class="d-none d-lg-inline badge bg-danger rounded-pill float-end">{{count($products)}}</span>
                        @endif
                    </a>
                </div>


                <div class="list-group text-center text-lg-start">
                    <span class="list-group-item disabled d-none d-lg-block">
                        <small>ACTIONS</small>
                    </span>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-user"></i>
                        <span class="d-none d-lg-inline">New User</span>
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

                @yield('content')
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
        });
    } );
</script>
</body>
</html>