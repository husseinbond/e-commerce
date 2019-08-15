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
                    

                    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field()}}

   
                               <div class="form-group">
                                    
                                    



                                     <div class="form-check">
                                       
                                        
                                     <label class="form-check-label"> 
                                     <input class="form-check-input" type="checkbox" name="permission[]" value="create_users">
                                        
                                     create users
                                              </label><br>
                                              <label class="form-check-label"> 
                                     <input class="form-check-input" type="checkbox" name="permission[]" value="read_users">
                                        
                                     read users
                                    
                                              </label><br>


                                              <label class="form-check-label"> 
                                     <input class="form-check-input" type="checkbox" name="permission[]" value="update_users">
                                        
                                     update users
                                    
                                              </label>
                                              <br>

                                              <label class="form-check-label"> 
                                     <input class="form-check-input" type="checkbox" name="permission[]" value="delete_users">
                                        
                                     delete users
                                    
                                              </label><br>

</div>


<div class="form-group"><br>
                          <label for="title">name</label>
                          <input type="text" class="form-control" name="name"  placeholder="Enter name">
                         </div>
                         <div class="form-group">
                            <label for="content">user name</label>
                            <input type="text" class="form-control" name="username"  placeholder="Enter username">
                            <label for="content">email</label>
                            <input type="email" class="form-control" name="email"  placeholder="Enter email">
                            <label for="content">password</label>
                            <input type="password" class="form-control" name="password"  placeholder="Enter pass">
                            <label for="content">Confirm Password</label>
                            <input type="password" class="form-control" name="Confirm Password"  placeholder="Confirm Password">
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


@endsection
