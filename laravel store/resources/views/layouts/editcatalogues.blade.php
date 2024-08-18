
<!DOCTYPE html>
<html lang="en">
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Meta -->
<meta name="description" content="">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

<!-- Template CSS -->
<link rel="stylesheet" href="{{ URL::asset('BASE/sidebar/style.css'); }}">

<title>admin pannel</title>
<style>


</style>
</head>
  <body >



<div class="container" >
  <div class="row justify-content-center">
    <div class="col-md-8">

<form  method="post" action="updatecataloguet">

@csrf
<div class="form-group">
    <label for="id" class="text-primary font-weight-bold ">id catalogue</label>
    <input type="text" class="form-control" name="id" disabled id="id"  value="{{$id}}">
  </div>
<div class="form-group">
    <label for="name_catalogue" class="text-primary font-weight-bold">name catalogue</label>
    <br>
    <input type="text" class="form-control" id="name_catalogue" value="{{$data->name }}" name="name_catalogue" placeholder="Enter catalogue name">
  </div>
  <input type="hidden" class="form-control" name="id"  id="id"  value="{{$id}}">

 <br>
 
  <button type="submit" class="btn btn-primary">update</button>
</form>
</div>
  </div>
</div>
</div>


  </body>
  <script src="{{ URL::asset('BASE/sidebar/script.js'); }}"></script>
</html>


