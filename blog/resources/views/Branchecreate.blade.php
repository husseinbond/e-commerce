@extends('layouts.master2');
@section('title', 'createBranch')


@section('content')







<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Branch</div>

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
                    

                    <form action="{{route('Branchs.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field()}}

   
                            
                        <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control" name="category_id" id="category">
                                     
                                     @foreach ($categories as $category)
                                     <option value="{{$category->id}}" >{{$category->name}}</option>
                                     @endforeach
                                       
                                     
                                    </select>
                                  </div>

       
  





                                  <div class="form-group">
                          <label for="title">Branch</label>
                          <input type="text" class="form-control" name="Branch"  placeholder="Enter Branch">
</div>
                

                                    <button type="submit" class="btn btn-primary">Save</button>
                      </form>   




                       
                         
                         
                    


                </div>
            </div>
        </div>
    </div>
</div>










@endsection
