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
  <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ URL::asset('BASE/sidebar/Images/logo-website.png'); }}" alt="logo.png">
                </span>
                <div class="text header-text">
                    <span class="name">admin panel</span>
                    <span class="profession">owner</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                    <a href="orders">
                    <i class='bx bxs-inbox icon'></i>
                            <span class="text nav-text">orders</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('getcatalogue') }}">
                            <i class='bx bxs-add-to-queue icon'></i>
                            <span class="text nav-text">add catalogues</span>
                        </a>
                    </li>
					 <li class="nav-link">
                        <a href="{{ route('getshowcatalogue') }}">
                            <i class='bx bxs-bookmarks icon'></i>
                            <span class="text nav-text">catalogues</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('getaddproduct') }}">
                            <i class='bx bxs-cart-add icon'></i>
                            <span class="text nav-text">add products</span>
                        </a>
                    </li>
					  <li class="nav-link">
                        <a href="{{ route('getshowproduct') }}">
                            <i class='bx bxs-cart-alt icon'></i>
                            <span class="text nav-text">products</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('getaddinfoproduct') }}">
                           <i class='bx bxs-file-plus icon'></i>
                            <span class="text nav-text">add info products</span>
                        </a>
                    </li>
                  
                    <li class="nav-link">
                        <a href="{{ route('getshowinfoproduct') }}">
                        <i class='bx bx-bookmark icon'></i>
                      
                            <span class="text nav-text">info products<</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="{{ route('admin') }}">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

            </div>
        </div>
    </nav>
    <section class="home">
        
   


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

<form action="addinfoproduct" method="post"  enctype='multipart/form-data' >       

@csrf
<div class="form-group">
      <label for="id_product" class="text-primary font-weight-bold">ID Product</label>
           
<select class="form-control"  name="id_product" >
@foreach ($data1 as $filiere)
<option value="{{$filiere->id}}"> 
{{$filiere->id}}
{{$filiere->name_product}}
</option>
@endforeach
</select>
<small class="form-text text-muted">select your product </small>
</div>
<div class="form-group">
      <label for="info_product" class="text-primary font-weight-bold">Product Information</label>
      <textarea class="form-control" id="info_product" name="info_product" rows="3"></textarea>
      <small class="form-text text-muted">add all info product in here !</small>
    </div>
<input type="submit" class="btn btn-primary" value="add stock">
</form> 
</div>
  </div>
</div>
</div>
 </section>
  </body>
  <script src="{{ URL::asset('BASE/sidebar/script.js'); }}"></script>
</html>
