@extends('layouts.master2');
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Branche {{$Branches->Branch}}</div>

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

                    

                    <form action="{{route('branch.update' , ['id' => $Branches->id ])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field()}}



                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" name="title"  value="{{$Branches->Branch}}">{{$Branches->Branch}}<br>
                         </div>
                            

</div>

   
                               <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control" name="category_id" id="category">
                                   
                                     @foreach ($categories as $category)
                                     @if ($category->id == $Branches->category_id)
                                     <option value="{{$category->id}}" selected>{{$category->name}}</option>

                                     @else
                                     <option value="{{$category->id}}" >{{$category->name}}</option>
                                     @endif
                                     
                                     @endforeach



                                     
                                    </select>
                                  </div>
                                 
                                       
                                        
                                   
                                        

  





  



                         
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>      
                    







                </div>
            </div>
        </div>
    </div>
</div>



                </div>
            </div>
        </div>
    </div>
</div>


@endsection
