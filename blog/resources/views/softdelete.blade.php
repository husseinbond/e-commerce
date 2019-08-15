
@extends('layouts.master2');

@section('content')
 class="card text-center">

<div class="card-header">category</div>
  <div class="card-body text-primary">
    <h5 class="card-title">your Categories</h5>
    <p class="card-text">Any decision will affect your site. Be careful</p>
<a href="/admin/setting/category/remove.category" class="btn btn-danger">remove category</a>
<a href="/admin/setting/category/add" class="btn btn-primary">add category</a>
</div>
</div>

@if ($post->count()>0)
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($post as $post)
      <th scope="row">1</th>
    
      <td>{{$post->title}}</td>
      
      
      <td> <a class="" href="{{route('post.edit',['id' =>$post->id ])}}">
      <i class="fas fa-pencil-alt"></i>
      </a></td>
      <td><a class="" href="{{route('post.hdelete',['id' =>$post->id ])}}"><i class="fas fa-trash-alt"></i>
      <td><a class="" href="{{route('post.restore',['id' =>$post->id ])}}"><i class="fas fa-undo-alt"></i>
      </a>
      </a></td>
      <td><img src="{{$post->featrued}}" class="card-img-top" alt="{{$post->featrued}}"></td>
    </tr>
    
    
    
        
 


    @endforeach
  </tbody>

  @else
                                  
                                         
  <p scope="row" class="text-center">No trashed posts</p>
   
@endelse 

@endif
</table>
<div>
@endsection
