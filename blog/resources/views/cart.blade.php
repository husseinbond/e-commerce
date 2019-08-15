
@extends('layouts.interface');
@section('title', 'cart')


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
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="{{route('cart')}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>{{$user}} items in cart</span></a></div>
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
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Shopping cart</li>
                </ol>
              </nav>
            </div>
            <div id="basket" class="col-lg-9">
              <div class="box">
                
                  <h1>Shopping cart</h1>
                  <p class="text-muted">You currently have {{$user}} item(s) in your cart.</p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">Product</th>
                          <th>Quantity</th>
                          <th>Unit price</th>
                          <th>size</th>
                          <th>Tax</th>
                          <th>SubTotal</th>
                          <th colspan="2">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                     @foreach($userCart as $cart)

                      <tr>
                      <td><a href="#"><img src="{{ asset('uploads/posts/'.$cart->img1) }}" alt=""></a></td>
                          <td><a href="#"></a></td>
                          <td>
                          <td class="cart_quantity">
									<div class="cart_quantity_button">
                  <form action="{{route('updateqty',['id'=>$cart->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field()}}
										<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2">
									
                    <button type="submit" class="btn btn-primary">Save</button>
									</form>
                
									</div>
                          </td>
                          <td>{{$cart->price}}</td>
                          <td>{{$cart->size}}</td>
                          <td>{{$cart->quantity*$cart->price*$Tax}}</td>

                          <td>{{$cart->quantity*$cart->price}}</td>
                          

                          <td>{{$sss = $cart->quantity*$cart->price * ($Tax + 1)}}</td>
                          
                     
                         
                          
                          <td>
                          
                        
</td>

@endforeach
                        </tr>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                        <th colspan="5">TOTAL:{{$total}}</th>
                          
                          <th colspan="2"></th>
                          
                          
                        </tr>
                      </tfoot>
                        

                    </table>
                  </div>
                  <!-- /.table-responsive-->
            
               
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            
            </div>
            <!-- /.col-lg-9-->
           
           
              @if (session()->has('coupon'))
              <div class="box">
                <div class="box-header">
                  <h4 class="mb-0">
                  Code: ({{ session()->get('coupon')['name'] }})
                  </h4>
                </div>
             
                  <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td class="text-right"><strong>Sub-Total:</strong></td>
                    <td class="text-right">{{$newSubtotal}}</td>
                  </tr>
                  <tr>
                    <td class="text-right"><strong>Eco Tax (%13):</strong></td>
                    <td class="text-right">{{$newTax}}</td>
                  </tr>
                 
                  <tr>
                    <td class="text-right"><strong>Total:</strong></td>
                    <td class="text-right">{{$newtotal}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
                </form>

              </div>
            </div>
            @endif
     
</div>
@if (! session()->has('coupon'))
<div class="box">
<div class="have-code-container">
                    <form action="{{ route('coupon') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="coupon_code" id="coupon_code">
                        <button type="submit" class="button button-plain">Apply</button>
                    </form>

                    
						<a class="btn btn-default check_out" href="{{ url('/checkout') }}">Check Out</a>

@endif
@endsection