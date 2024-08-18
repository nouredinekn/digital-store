<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>admin login</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-6 col-md-4">
      <form action="admin_pannel" method="post" media="screen">
      @csrf
      <div class="form-group">
          <label for="user_admin">Username:</label>
          <input type="text" class="form-control" id="user_admin" name="user_admin" required>
        </div>
        <div class="form-group">
          <label for="password_admin">Password:</label>
          <input type="password" class="form-control" id="password_admin" name="password_admin" required>
        </div>
        <button type="submit"  class="btn btn-primary" value="Login"  style="margin-top: 10px;">Login</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>