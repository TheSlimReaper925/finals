<!DOCTYPE html>
<html>
<head>
    <title>finals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown me-2">
          <a class="nav-link dropdown-toggle me-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
      </ul>
    </div>
  </div>
</nav>


<div class="card" style="width: 18rem;">
  <img src="{{ asset('images')."/".$product->image }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{!! $product->name !!}</h5>
    <p class="card-text">{!! $product->price !!}</p>
    <p class="card-text">{{$product->description}}</p>
    <p class="card-text">likes: {{$likes}}</p>

    @guest
    <a href="{{ route('login') }}" class="alert-danger">Register/Login to like and comment!</a>
    @else
    <form action="{{ route('addlike') }}" method="Post" accept-charset="utf-8">
      @csrf
      <input type="hidden" name="id" value="{{$product->id}}">
      <button class="btn btn-danger">like</button>
    </form>
    <form action="{{ route('addcomment') }}" method="Post" accept-charset="utf-8">
      @csrf
      <input type="hidden" name="id" value="{{$product->id}}">
      <input type="text" name="comment">
      <button class="btn btn-default">add comment</button>
    </form>
    @endguest

    @foreach($comments as $comment)
    <div class="card">
      <h5 class="card title"> {!! $comment->comment !!}</h5>
    </div>
    @endforeach
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>