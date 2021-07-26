<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marketplace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom:40px;">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Marketplace</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link @if(request()->is('admin/stores')) active @endif" aria-current="page" href="{{route('admin.stores.index')}}">Loja</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if(request()->is('admin/products')) active @endif"" href="{{route('admin.products.index')}}">Produtos</a>
            </li>
          </ul>
          <div class="my-2 my-lg-0">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="event.preventDefault(); 
                                                      document.querySelector('form.logout').submit(); "> Sair </a>

                  <form action="{{route('logout')}}" class="logout" method="post" style="display:none;">
                    @csrf
                  </form>
              </li>
            </ul>
          </div>
        @endauth
      </div>
    </div>
  </nav>
  <div class="container">
    @include('flash::message')
    @yield('content')
  </div>
</body>
</html>