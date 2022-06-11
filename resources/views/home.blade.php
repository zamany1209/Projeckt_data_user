@extends('layouts.app')

@section('content')
<script>
  var url_hash = "";
</script>
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
 
<div class="col-12 container">
  <div class="p-2">
    <a class="btn btn-info" href="{{ route('desc') }}">&#x21c8;</a>
    <a class="btn btn-info" href="{{ route('asc') }}">&#x21cA;</a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Show Max 3 Hoghogh
          </button>
  </div>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Code Mely</th>
            <th scope="col">Name</th>
            <th scope="col">Family</th>
            <th scope="col">Age</th>
            <th scope="col">Hoghogh</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Data as $Data_user)
            <tr>
                <th scope="row">{{ $Data_user->id }}</th>
                <td>{{ $Data_user->code_mely }}</td>
                <td>{{ $Data_user->name }}</td>
                <td>{{ $Data_user->family }}</td>
                <td>{{ $Data_user->age }}</td>
                <td>{{ $Data_user->hoghogh }}</td>
                <td><a type="button" onclick="url_hash = '{{ Crypt::encryptString($Data_user->id) }}'" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_delete">
                  Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container col-5">
        <div class="Row">
            {{ $Data->links() }}
        </div>
    </div>





          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <div class="justify-content-md-right">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                </div>
                <div class="modal-body">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                          <th scope="col">#</th>
                          <th scope="col">Code Mely</th>
                          <th scope="col">Name</th>
                          <th scope="col">Family</th>
                          <th scope="col">Age</th>
                          <th scope="col">Hoghogh</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if (isset($Data_Max_1))
                          <tr>
                              <th scope="row">{{ $Data_Max_1->id }}</th>
                              <td>{{ $Data_Max_1->code_mely }}</td>
                              <td>{{ $Data_Max_1->name }}</td>
                              <td>{{ $Data_Max_1->family }}</td>
                              <td>{{ $Data_Max_1->age }}</td>
                              <td>{{ $Data_Max_1->hoghogh }}</td>
                          </tr>                         
                        @endif
                        @if (isset($Data_Max_2))
                            <tr>
                                <th scope="row">{{ $Data_Max_2->id }}</th>
                                <td>{{ $Data_Max_2->code_mely }}</td>
                                <td>{{ $Data_Max_2->name }}</td>
                                <td>{{ $Data_Max_2->family }}</td>
                                <td>{{ $Data_Max_2->age }}</td>
                                <td>{{ $Data_Max_2->hoghogh }}</td>
                            </tr>
                          @endif
                          @if (isset($Data_Max_3))
                            <tr>
                                <th scope="row">{{ $Data_Max_3->id }}</th>
                                <td>{{ $Data_Max_3->code_mely }}</td>
                                <td>{{ $Data_Max_3->name }}</td>
                                <td>{{ $Data_Max_3->family }}</td>
                                <td>{{ $Data_Max_3->age }}</td>
                                <td>{{ $Data_Max_3->hoghogh }}</td>
                            </tr>
                          @endif

                      </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>


          <div class="modal fade" id="exampleModal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <div class="justify-content-md-right">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                </div>
                <div class="modal-body">
                  <h3>Are You Redy ?</h3>
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="location.href = '{{ URL::to('/') }}/delete/' + url_hash " class="btn btn-danger">Delete</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
</div>
@endsection
