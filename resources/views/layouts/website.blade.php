<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - LaraRecipes</title>
    <link rel="shortcut icon" href="/img/logo.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:ital,wght@0,200;0,400;0,700;1,400;1,700;1,900&display=swap"
          rel="stylesheet">
    <!-- End of Google Fonts -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="fontawesome/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
@include('partials.header')
<div class="mc-main-full">
    @yield('full-width-content')
</div>

<div class="container-fluid">
    <main class="mc-main">

       @yield('content')
    </main>
   @include('partials.footer')
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"
        async></script>

<script src="js/scripts.js"></script>
</body>
</html>
