<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MarketPlace L6</title>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> --}}
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px">
    <a class="navbar-brand" href="{{route('home')}}">MarketPlace L6</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
@auth
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
        <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item @if(request()->is('admin/products*')) active @endif">
        <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
        </li>
         </li>
        <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
        <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
        </li>
      </ul>
        <div class="my-2 my-sm-0">
          <ul  class="navbar-nav mr-auto">
              <li class="nav-item">
              <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit(); ">Sair</a>
              <form action="{{route('logout')}}" class="logout" method="POST" style="display: none">
                @csrf
              </form>
              </li>
              <li class="nav-item">
              <span class="nav-link">{{auth()->user()->name}}</span>
              </li>
          </ul>
        </div>
        @endauth
  </nav>
  <div class="container">
  @include('flash::message')
  {{-- diretivas Aqui vai o corpo da pagina --}}
  @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>