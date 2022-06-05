@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('new_user') }}">New User</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown link
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
</nav>
 
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Code Mely</th>
            <th scope="col">Name</th>
            <th scope="col">Family</th>
            <th scope="col">Average</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Data as $Data_user)
            <tr>
                <th scope="row">{{ $Data_user->id }}</th>
                <td>{{ $Data_user->code_mely }}</td>
                <td>{{ $Data_user->name }}</td>
                <td>{{ $Data_user->family }}</td>
                <td>{{ $Data_user->average }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container col-5">
        <div class="Row">
        </div>
    </div>
</div>
@endsection
