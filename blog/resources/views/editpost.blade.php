@extends('layouts.master2');
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post {{$posts->title}}</div>

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

                    

                    <form action="{{route('post.update' , ['id' => $posts->id ])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field()}}

   
                               <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control" name="Branch_id" id="category">
                                   
                                     @foreach ($Branchs as $Branche)
                                     @if ($Branch->id == $posts->Branch_id)
                                     <option value="{{$Branch->id }}" selected>{{$category->name}}</option>

                                     @else
                                     <option value="{{$Branch->id}}" >{{$Branch->name}}</option>
                                     @endif
                                     
                                     @endforeach

                                     
                                    </select>
                                  </div>
                           
                                       
                                        
                                      </div>

                                        
</div>
                            



<div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" name="title"  value="{{$posts->title}}"><br>
                         </div>
                         <div class="form-group">
                            <label for="content">Description</label>
                            <textarea class="form-control" name="content" id="content" rows="8" cols="8">
                                    {!! $posts->content !!} 
                            </textarea>
                          </div>
                          <div class="form-group">
                            <label for="featured">Photo</label>
                            <input type="file" class="form-control-file" name="featured">
                          </div>
                       





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
