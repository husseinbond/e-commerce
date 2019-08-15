@extends('layouts.interface');
@section('title', $title)

@section('content')


@if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif



@if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif


      <div id="top">
        <div class="container">
          <div class="row">
           
            <div class="col-lg-6 text-center text-lg-right">
              <ul class="menu list-inline mb-0">
                <li class="list-inline-item"><a href="/login" >Login</a></li>
                <li class="list-inline-item"><a href="/register">Register</a></li>
                
                <li class="list-inline-item"><a href="#">Recently viewed</a></li>
              </ul>
            </div>
          </div>
        </div>
        
        <!-- *** TOP BAR END ***-->
        
        
      </div>
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="index.html" class="navbar-brand home"><img src="/img/logo.png" alt="Obaju logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
          <div class="navbar-buttons">

          </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              
            <li class="nav-item"><a href="/home" class="nav-link active">Home</a></li>
            @foreach($categories as $cat)
            <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">{{$cat->name}}<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                  
                    
                    
                   
                   
                   
                      
                        <h5> 
                          
                        </h5>
                        
                      
                    
                        <ul class="list-unstyled mb-3">
                        <div class="row">
                        @foreach($Branchs as $branch)
                    @if($cat->id == $branch->category_id)
                        <div class="col-sm">
                          <li class="nav-item"><a href="{{route('categoryy',['name'=>$cat->name,'id'=>$branch->id])}}" class="nav-link">{{$branch->Branch}}</a></li>
</div>
                          @endif
                     
                     @endforeach
                        </ul>
                    
                      
  
                        @if(count($errors)>0)
                    <ul class="navbar-nav mr-auto">
                            @foreach ($errors->all() as $error)
                            <li class="nav-item active">
                                     {{$error}}
                                  </li>
                            @endforeach
                            
                          </ul>
                          @endif

                     

                    
                   
                  </li>
                </ul>
              </li>
              
             @endforeach
              
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
              <!-- /.nav-collapse-->
              <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="{{route('cart')}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>3 items in cart</span></a></div>
            </div>
          </div>
        </div>
      </nav>
      <div id="search" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto">
            <div class="input-group">
              <input type="text" placeholder="Search" class="form-control">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">                       
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active"><a href="{{route('shop',['name'=>$name])}}">{{$name}}</a></li>
                  <li aria-current="page" class="breadcrumb-item active">{{$Branchname}}</li>
                </ol>
              </nav>
              <div class="box">
                <h1>{{$name}}</h1>
                <p></p>
              </div>

              <form action="{{ route('cer', $post->id) }}" method="POST">
                    {{ csrf_field() }}
                    
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                   
		                        <input type="hidden" name="post_name" value="{{ $post->title }}">
		                       
		                        
<input type="hidden" name="price" id="price" value="{{ $post->price }}">

            <div class="col-lg-9 order-1 order-lg-2">
              <div id="productMain" class="row">
                <div class="col-md-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                   
                    <div class="item"> <img src="{{ asset('uploads/posts/'.$post->img1) }}" alt="" class="img-fluid"></div>
                    <div class="item"> <img src="" alt="" class="img-fluid"></div>
                    <div class="item"> <img src="" alt="" class="img-fluid"></div>
                  </div>
                 
                  <!-- /.ribbon-->
                 
                  <!-- /.ribbon-->
                </div>
                <div class="col-md-6">
                  <div class="box">
                    <h1 class="text-center">{{$title}}</h1>
                    
                    <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control" name="size" id="category">
                                     
                                 
                                    @foreach ($post->details as $po)
                                     @if($po->quantity>0)
                                     <option value="{{ $post->id }}-{{$po->sizes}}" >{{$po->sizes}}</option><br>
@endif
                                     @endforeach
      

                                     
                                    </select>



                                     
                                 
                                    <select class="form-control" name="quantity" id="category">
                                     
                                 
                                    
                                      <option value="2" >1</option><br>

       
                                      <option value="2" >2</option><br>
                                      
                                      <option value="3" >3</option><br>
                                      <option value="4" >4</option><br>
                                      <option value="5" >5</option><br>

                                     </select>

                                 
       
                                  </div>
                                 
                    <p class="price">{{$post->price}}</p>
                    </form>
                    <button type="submit" class="button button-plain">Add to Cart</button>

                   
              
         
              


    

@endsection
