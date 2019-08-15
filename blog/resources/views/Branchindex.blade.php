
@extends('layouts.master2');
@section('title', 'Branch')
@section('content')



 



<div class="card-header">category</div>
  <div class="card-body text-primary">
    <h5 class="card-title">your Categories</h5>

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
  @foreach ($Branchs as $Branch)
      <th scope="row">1</th>
    
      
      
      <td>{{$Branch->Branch}}</td>
      <td> <a class="" href="{{route('branch.edit',['id' =>$Branch->id])}}">
      <i class="fas fa-pencil-alt"></i>
      </a></td>
      <form action = "{{route('dele',['id' =>$Branch->id])}}" method="POST">
      <td><a class="" href=""><i class="fas fa-trash-alt"></i>
      </a>
      </td>
      </form>
      
      
      <td>{{$Branch->category->name}}
      </td>
      
      </a></td>

    </tr>
    @endforeach

    
  </tbody>
</table>
<div>


@endsection
