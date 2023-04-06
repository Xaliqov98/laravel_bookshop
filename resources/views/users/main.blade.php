@extends('users.app')
@section('main')
<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            @foreach ($book as $b)
           <li style="background-image: url({{$b->image}});">
               <div class="overlay-gradient"></div>
               <div class="container">
                   <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                       <div class="slider-text-inner">
                           <div class="desc">
                               <span class="price">{{$b->price}} AZN</span>
                               <h2>{{$b->book}}</h2>
                               <p>{{$b->about}}</p>
                               <p><a href="{{route('single',$b->id)}}" class="btn btn-primary btn-outline btn-lg">Sifariş et</a></p>
                           </div>
                       </div>
                   </div>
               </div>
           </li>
           @endforeach
          </ul>
      </div>
</aside><br>
<div class="container">
    @foreach ($book as $b)
    <div class="row">
        <div class="col-md-3 text-center animate-box">
            <div class="product">
                <div class="product-grid" style="background-image:url({{$b->image}});">
                    <div class="inner">
                        <p>
                            <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                            <a href="{{route('single',$b->id)}}" class="icon"><i class="icon-eye"></i></a>
                        </p>
                    </div>
                </div>
            <div class="desc">
                <h3><a href="single.html">{{$b->book}}</a></h3>
                <span class="price">{{$b->price}} AZN</span>
            </div>
        </div>
    </div>
    @endforeach

</div>
    
</div>
@endsection