@extends('layouts.master2');
@section('title', 'createBranch')

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
                    

                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field()}}

                        <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control" name="branchs_id" id="category">
                                     
                                 
                                    @foreach ($Branchs as $Branch)
                                     
                                     <option value="{{$Branch->id}}" >{{$Branch->Branch}}-{{$Branch->category->name}}</option><br>

                                     @endforeach
                                     
                                    </select>
                                  </div>



                                    
  
  
                            





<div class="form-group"><br>
<div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" name="title"  placeholder="Enter Title">
</div>

<label for="title">price</label>
<input type="text" class="form-control" name="price">
                         <div class="form-group">
                            <label for="content">Description</label>
                            <textarea class="form-control" name="content" id="content" rows="8" cols="8"></textarea>
                          </div>
                          <div class="col-sm">
   
   <label for="exampleFormControlSelect1">img</label>
   <input type="file" class="form-control-file" name="img1" multiple>

   </div>

   <div class="col-sm">
   
   <label for="exampleFormControlSelect1">img2</label>
   <input type="file" class="form-control-file" name="img2"multiple>

   </div>
   <div class="col-sm">
   
   <label for="exampleFormControlSelect1">imge3</label>
   <input type="file" class="form-control-file" name="img3"multiple>

   </div>

   </div>
   <div class="col-sm">
   
   <label for="exampleFormControlSelect1">img4</label>
   <input type="file" class="form-control-file" name="img4"multiple>

   </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
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
</div>





                </div>
            </div>
        </div>
    </div>
</div>


@endsection
