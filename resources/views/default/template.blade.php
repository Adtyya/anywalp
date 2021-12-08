<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website yang menyajikan berbagai wallpaper untuk berbagai macam devices. Mulai dari Handphone dan Desktop">
    <meta name="keywords" content="Any walp">

    @stack('before-style')
    @include('includes.style')
    @stack('after-style')    
    
    <title>AnyWalps | Free Wallpaper for you</title>

  </head>
  <body>
    @include('nav.navbar')
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
