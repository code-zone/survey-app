<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>404 Page not found</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('styles/app.css')}}" type="text/css" />

</head>
<body>
<div class="app">
  <div class="teal-200 bg-big">
    <div class="text-center">
      <h1 class="text-shadow no-margin text-white text-4x p-v-lg">
        <span class="text-2x font-bold m-t-lg block">404</span>
      </h1>
      <h2 class="h1 m-v-lg text-black">OOPS!</h2>
      <p class="h4 m-v-lg text-u-c font-bold text-black">Sorry! the page you are looking for doesn't exist.</p>
      <div class="p-v-lg">
        <a href="{{url('home')}}" md-ink-ripple class="md-btn indigo md-raised p-h-lg">
          <span class="text-white">Go to the home page</span>
        </a>
      </div>
    </div>
  </div>
</div>
</body>
</html>
