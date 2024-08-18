<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>
      create order    

    </title>
</head>
<body>
@foreach ($pro as $filiere)
<div class="col-12 col-md-8">
                        <div class="card mt-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('product_images/'.$filiere->image_product); }}" class="card-img-top p-5" >
                                                                           

                                                                                            
                                </div>
                                
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h3 class="card-title">{{$filiere->name_product}}</h3>
                                        <h6>
                                            <small class="text-muted">stock：{{$stockid}}</small>
                                        </h6>
                                                                                
                                        <div class="buy-form mt-3">
                                            <form action="buynow" method="post">
                                            @csrf    
                                            <div class="form-group row">
                                                    <div class="col-12">
                                                        <h6>price：$ {{$filiere->price_product}}</h6>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <input type="hidden" name="gid" value="2">
                                                        <label for="email" class=" col-form-label">email:</label>
                                                        <input type="email" class="form-control form-control-sm" name="emailorder" id="email" required="" placeholder="email" value="{{ Auth::user()->email }}">
                                                    </div>
                   
                                                                                                    </div>

                                                                                                    <input type="hidden" name="idproduct" value="{{$idproduct}}">
                                                                                                    <input type="hidden" name="stockid" value="{{$stockid}}">
                                                                                                    <input type="hidden" name="name_product" value="{{$filiere->name_product}}">
                                                   
                                                                                                    <div class="col-12 mt-2">
                                                        <button type="submit"  id="submit" class="btn btn-outline-primary"> <i class="ali-icon"></i> BUY</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


@endforeach

</body>
<script>

  if(parseInt({{$stockid}})<1){

    submit.disabled =true
  }
</script>
</html>