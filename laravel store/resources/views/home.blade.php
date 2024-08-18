@extends('layouts.app')
@section('content')
<style>
    .orders{
        display:none;
    }
    .noconfirmed{
        display:none;
    }
</style>
<div class="container">
<span class="btn  btn-primary" id='orders' > orders </span> 
<span class="btn  btn-warning" id='store' > store</span>

<!-- mystore -->
<div id="mystore">
<br>
<br>

<span class="btn btn-outline-secondary btn-sm" id='all' > all </span>

@foreach ($data as $filiere)

        <span class="btn btn-outline-secondary btn-sm" id='mycatalogue{{$filiere->id_catalogue}}' > {{$filiere->name}} </span>

@endforeach








<br>
<div class="container my-5">

<div id='myproducts' class='row row-cols-2 row-cols-md-5 g-4'>

</div>

</div>
</div>
<!-- end mystore -->

<div class="orders" id="myorders">
    <br>
    <br>
<span class="btn btn-outline-success btn-sm" id='btnconfirmed' >  confirmed </span>
<span class="btn btn-outline-danger btn-sm" id='btnnoconfirmed' > no confirmed </span>

<div class="container my-5 noconfirmed" id='noconfirmed'>

<table class="table table-striped table-hover">
    <thead class="thead-light">
      <tr>
        <th>id</th>
        <th>product</th>
        <th>info</th>
        <th>date order</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($noconfirmed as $filiere)
    @if($filiere->emailorder ==Auth::user()->email)
       <tr>
        <td>{{$filiere->id}}</td>
        <td> {{$filiere->name_product}}</td>
        <td><textarea> MUST ADMIN CONFIRMED IT </textarea></td>
        <td>{{$filiere->data_order}}</td>
        <td>
        {{$filiere->order_status}}
        </td>

      </tr>
      @endif
      @endforeach
    </tbody>
  </table>


</div>

<div class="container my-5" id='confirmed'>

<table class="table table-striped table-hover">
    <thead class="thead-light">
      <tr>
        <th>id</th>
        <th>product</th>
        <th>info</th>
        <th>date order</th>
        <th>status</th>
        <th> action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($confirmed as $filiere)
    @if($filiere->emailorder ==Auth::user()->email)
       <tr>
        <td>{{$filiere->id}}</td>
        <td> {{$filiere->name_product}}</td>
        <td><textarea> {{$filiere->product_info}} </textarea></td>
        <td>{{$filiere->data_order}}</td>
        <td>
        {{$filiere->order_status}}
        </td>
        
<td> <a href="deleteordersfromuser/{{$filiere->id}}" class="btn btn-danger btn-sm">delete</a>
<a href="{{config('app.flaskapi')}}/genpdf/?jwt=nouredine_kaoine_project_2023_api_flask&email={{Auth::user()->email}}&pdname={{$filiere->name_product}}&infopd={{$filiere->product_info}}&date={{$filiere->data_order}}" class="btn btn-success btn-sm">download pdf</a>

</td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>


</div>
</div>
</div>

<script src="{{url('js/jquery.js')}}"></script>









<!-- javascript code -->

<script>

let all= document.getElementById('all');

all.addEventListener('click' , ()=>{

    myproducts.innerHTML=`

@foreach ($data1 as $filiere)
<div class="col">
<div class="card position-relative">
<img alt="img" width="90 " class="card-img-top" height="90"src="{{ URL::asset('product_images/'.$filiere->image_product); }}" >
<div class="card-body">
<h6 class="card-title text-truncate"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
{{$filiere->name_product}}
                                                    </font></font></h6>

<button type="button" class="btn btn-sm btn-outline-success">{{$filiere->price_product}}</button > 


</div>



<a href="createorder/{{$filiere->id}}" class="btn btn-primary fr">
Order
 </a>
 </div>
</div>
@endforeach

`
})






@foreach ($data as $filiere)

mycatalogue{{$filiere->id_catalogue}}.addEventListener('click' , (e)=>{

    
myproducts.innerHTML='';
$.ajax({
    url: `{{config('app.flaskapi')}}/apiv1getproduct/?jwt=nouredine_kaoine_project_2023_api_flask&id=`+{{$filiere->id_catalogue}},
    type: 'GET',
    dataType: 'json',
    success: function(response) {
        // Handle the response from the Flask API
        let i=0;
        for  (i ; i<response.length+1;i++){
       
        let pathimg='product_images/'+response[i][2]
        let centent=`
<div class="col">
<div class="card position-relative">
<img alt="img" width="90 " class="card-img-top" height="90"src="{{ URL::asset('`+pathimg+`'); }}" >
<div class="card-body">
<h6 class="card-title text-truncate"><font style="vertical-align: inherit;">`+response[i][1]+`<font style="vertical-align: inherit;">

                                                    
</font></font></h6>

<button type="button" class="btn btn-sm btn-outline-success">`+response[i][3]+`</button > 


</div>



<a href="createorder/`+response[i][0]+`" class="btn btn-primary fr">
Order
 </a>
 </div>
</div>
`
myproducts.innerHTML=myproducts.innerHTML+centent;}
    },
    error: function(xhr, status, error) {
        // Handle the error
        console.log(error);
    }
});
})
@endforeach

orders.addEventListener('click' , ()=>{
mystore.style.display = 'none';
myorders.style.display = 'inline';

}
)

store.addEventListener('click' , ()=>{
mystore.style.display ='inline' ;
myorders.style.display = 'none';

})
btnconfirmed.addEventListener('click' , ()=>{
confirmed.style.display ='inline' ;
noconfirmed.style.display = 'none';

}
)

btnnoconfirmed.addEventListener('click' , ()=>{
noconfirmed.style.display ='inline' ;
confirmed.style.display = 'none';

}
)


</script>
@endsection
