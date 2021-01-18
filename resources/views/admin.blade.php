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
  <form action="{{ route('storeProduct') }}" method="POST" accept-charset="utf-8" class="form-group" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Product Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Product name">
  </div>
  <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Product description</label>
      <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea2" class="form-label">price</label>
    <input type="numeric" name="price" class="form-control">
  </div>
  <div class="mb-3">
    <label for="formFileSm" class="form-label">Small file input example</label>
    <input class="form-control form-control-sm" id="formFileSm" name="image" type="file">
  </div>
  <div class="mb-3">
    <select name="category" class="form-select" aria-label="Default select example">
      @foreach($category as $cat)
      <option  value="{!! $cat->id !!}">{!! $cat->category !!}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-primary"> submit </button>
  </form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>