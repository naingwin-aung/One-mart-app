<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

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
                    <a href="{{route('admin')}}"><img src="{{url('/images/one-logo.jpg')}}" alt="" height="50" class="rounded"></a>
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

                    <a href="{{url('/admin/deliverer')}}" class="list-group-item list-group-item-action {{Request::segment(2) == 'deliverer' ? 'active' : ''}}">
                        <span class="d-none d-lg-inline">Deliverers</span>
                    </a>

                    <span class="list-group-item disabled d-none d-lg-block border-0">
                        <small>Orders items</small>
                    </span>

                    <a href="{{url('/admin/order')}}" class="list-group-item list-group-item-action {{Request::segment(2) == 'order' && Request::segment(3) == '' ? 'active' : ''}}">
                        <span class="d-none d-lg-inline">Orders</span>

                    @if (Request::segment(2) == 'order' && Request::segment(3) == '')
                        <span class="d-none d-lg-inline badge bg-danger rounded-pill float-end">{{count($orders)}}</span>
                    @endif
                    </a>

                    <a href="{{url('/admin/order/cancel')}}" class="list-group-item list-group-item-action {{Request::segment(3) == 'cancel' ? 'active' : ''}}">
                        <span class="d-none d-lg-inline">Cancel Orders</span>
                    </a>

                    <a href="{{url('/admin/order/delivering')}}" class="list-group-item list-group-item-action {{Request::segment(3) == 'delivering' ? 'active' : ''}}">
                        <span class="d-none d-lg-inline">Delivering Orders</span>
                    </a>

                    <a href="{{url('/admin/order/done')}}" class="list-group-item list-group-item-action {{Request::segment(3) == 'done' ? 'active' : ''}}">
                        <span class="d-none d-lg-inline">Finish Orders</span>
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
        });
    } );
</script>
</body>
</html>