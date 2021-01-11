@extends('layouts.admin_dashboard')

@section('content')

    <div class="container-fluid my-5">

        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Deliverer has already <strong>{{session('message')}}</strong> Successful!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="row">
            <div class="col-12">
                <a href="{{url('/admin/deliverer/create')}}" class="btn btn-success mb-4">New Deliverer</a>
                <div class="card p-3">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Deliverer Name</th>
                                <th>Deliverer Email</th>
                                <th>Deliverer Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        <a href="{{url("/admin/deliverer/$user->id/edit")}}" class="btn btn-outline-warning">Edit</a>
                                        <form action="{{url("/admin/deliverer/$user->id")}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this category')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection