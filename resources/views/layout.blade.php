<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
<nav style="border: .5px grey solid; padding: 10px 0px 10px 5px;">
<a href="/genres">Genres</a>
<a href="/tracks">Tracks</a>
</nav>
<br>
@yield('main')
</body>
</html>