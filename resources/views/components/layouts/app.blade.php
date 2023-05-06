<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @livewireStyles
    
  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg bg-primary mb-3">
        <div class="container">
          <a class="navbar-brand text-warning fs-3 fw-bold" href="#">Customer Management</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link text-light" aria-current="page" href="/">Customer</a>
              <a class="nav-link text-light" href="/category">Category Transaction</a>
              <a class="nav-link text-light" href="/transaction">Transaction</a>
              <a class="nav-link text-light" href="#">Report</a>
              
            </div>
          </div>
        </div>
      </nav>
    {{ $slot }}

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
  </body>
</html>