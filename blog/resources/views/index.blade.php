
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
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($categoreis as $category)
      <th scope="row">1</th>
      <td>{{$category->name}}</td>
      
      
      <td> <a class="" href="{{route('category.edit',['id' =>$category->id ])}}">
      <i class="fas fa-pencil-alt"></i>
      </a></td>
      <td><a class="" href="{{route('category.delete',['id' =>$category->id ])}}"><i class="fas fa-trash-alt"></i>


      </a></td>
       <td><a class="" href="{{route('category.delete',['id' =>$category->id ])}}"><i class="fas fa-trash-alt"></i>

      
      </a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
@endsection



