
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

<form enctype="multipart/form-data" method="post" action="updateproduct">

@csrf



<div class="form-group">
    <label for="id" class="text-primary font-weight-bold ">id product</label>
    <input type="text" class="form-control" name="id" disabled id="id"  value="{{$id}}">
    <input type="hidden" class="form-control" name="id"  id="id"  value="{{$id}}">
 
</div>
<div class="form-group">
    <label for="name_product" class="text-primary font-weight-bold">Product Name</label>
    <input type="text" class="form-control" id="name_product" value="{{$data1->name_product}}" name="name_product" placeholder="Enter product name">
  </div>
  <div class="form-group">
    <label for="price_product" class="text-primary font-weight-bold">Price</label>
    <input type="number" class="form-control" value="{{$data1->price_product}}" id="price_product" name="price_product" placeholder="Enter price">
  </div>
<div class="form-group">
    <label for="id_catalogue" class="text-primary font-weight-bold">Catalogue</label>
<select class="form-control"  name="id_catalogue" >
@foreach ($data as $filiere)
<option value="{{$filiere->id_catalogue}}"> 
{{$filiere->id_catalogue}}
{{$filiere->name}}
</option>
@endforeach
</select>
</div>


  <div class="form-group">
    <label for="product_description" class="text-primary font-weight-bold">Product Description</label>
    <textarea class="form-control" id="product_description" name="product_description" rows="3">{{$data1->product_description}}</textarea>
  </div>

  <div class="form-group">
    <label for="product_image" class="text-primary font-weight-bold">Product Image</label>
    <div class="custom-file">
<input type="file" name="image_product" >
</div>
<small id="product_image_help" class="form-text text-muted">This supports only image files.</small>
  </div>
<button type="submit" class="btn btn-primary">UPDATE</button>
</form>
</div>
  </div>
</div>
</div>
</section>
  </body>
  <script src="{{ URL::asset('BASE/sidebar/script.js'); }}"></script>
</html>


