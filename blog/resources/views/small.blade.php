@extends('layouts.interface');
@section('title', $Branchname)

@section('content')

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
                    
                      
  
                     

                    
                   
                  </li>
                </ul>
              </li>
              
             @endforeach
              
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
              <!-- /.nav-collapse-->

              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="{{route('cart')}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>{{$user}}</span></a></div>
            </div>
          </div>
        </div>
      </nav>
    
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

             
             
            
              <div class="row products">
              @foreach($posts as $post)
              @if($post->branchs_id == $ids)
                <div class="col-lg-4 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                      <img src="{{ asset('uploads/posts/'.$post->img1) }}" href="{{route('post.show',['name'=>$cat->name,'id'=>$branch->id,'slug'=>$post->slug])}}" class="img-fluid" alt="Responsive image">
                        
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="img/product1.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="{{route('post.show',['name'=>$name,'id'=>$ids,'slug'=>$post->slug])}}">{{$post->title}}</a></h3>
                      <p class="price"> 
                        <del></del>${{$post->price}}
                      </p>
                      <p class="buttons"><a href="detail.html" class="btn btn-outline-secondary">View detail</a><a href="" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  
                </div>
               
               
                    
                    
                @endif
                @endforeach
                    </div>
                 
                    
                  

            
                    @endsection