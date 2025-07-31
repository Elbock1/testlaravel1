<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <header>
    <nav>
      <a href="/">Home</a>
      <a href="/about">About</a>
      <a href="/contact">Contact</a>
      <a href="/help">Help me</a>
    </nav>
  </header>
  <main>
   @yield('content')
  </main>
</body>
</html>