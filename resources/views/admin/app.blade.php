<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="'https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <title>@yield('title')</title>

</head>
<body>
    <div class="btn-group">
        <a href="{{Route('books')}}" class="btn btn-primary">Books</a>
        <a href="{{Route('authors')}}" class="btn btn-primary">Authors</a>
        <a href="{{Route('categories')}}" class="btn btn-primary">Genres</a>
        <a href="{{Route('sellers')}}" class="btn btn-primary">Sellers</a>
        <a href="{{Route('publishes')}}" class="btn btn-primary">Publishers</a>
        <a href="{{Route('expenses')}}" class="btn btn-primary">Expenses</a>
      </div>
    <div class="container">
@yield('content')
    </div>

@include('admin.modal')
    
@yield('script')
</body>
</html>