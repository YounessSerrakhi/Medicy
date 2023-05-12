<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    @yield('style')
    <title>Medicines Manager</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
        <div class="container-fluid">
          <a class="navbar-brand" href="/lsapp/public">Medicy</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" hrefp="/lsapp/public/">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Medicine</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/lsapp/public/stock">Stock</a></li>
                  <li><a class="dropdown-item" href="/lsapp/public/medicine">List of Medicine</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/lsapp/public/demande">In demande</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('providers') }}">Providers</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      @yield('content');
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


