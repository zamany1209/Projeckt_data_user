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
                <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('new_user') }}">New User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('add') }}">Add</a>
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
        <div class="container col-6 mt-4">
            <form action="" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="floatingInput_name" placeholder="Name">
                    <label for="floatingInput_name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="family" id="floatingInput_family" placeholder="Family">
                    <label for="floatingInput_family">Family</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="code_mely" id="floatingInput" placeholder="092000000">
                    <label for="floatingInput">Code Mely</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="age" id="floatingInput_age" placeholder="1400">
                    <label for="floatingInput_age">Age</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="hoghogh" id="floatingInput_hoghogh" placeholder="1,200">
                    <label for="floatingInput_hoghogh">Hoghogh , Toman</label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
