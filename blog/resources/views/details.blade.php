@extends('layouts.master2');
@section('content')







<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Post</div>

                <div class="card-body">



                @if(count($errors)>0)
                    <ul class="navbar-nav mr-auto">
                            @foreach ($errors->all() as $error)
                            <li class="nav-item active">
                                     {{$error}}
                                  </li>
                            @endforeach
                            
                          </ul>
@endif
                    

<form action="{{route('ATT',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
{{ csrf_field()}}
              
<div class="control-group">
                        

   
                         
                                 
<div class="container">
  <div class="row">
   
    <div class="col-sm">
   
    <label for="exampleFormControlSelect1">qty</label>
    <input type="text" name="quantity" id="qty" placeholder="qty" style="width:120px;">

    </div>

    <div class="col-sm">
   
   <label for="exampleFormControlSelect1">size</label>
   <input  type="text" name="sizes" placeholder="size" style="width:120px;">
   </form>     
   
</div>


 

  </div>
</div>
 
                                    
                                    
                         
                                     
                                

                       
                         
                        <button type="submit" class="btn btn-primary">Save</button>
                    
                    












                </div>
            </div>
        </div>
    </div>
</div>


@endsection
