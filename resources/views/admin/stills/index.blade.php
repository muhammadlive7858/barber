@extends('layouts.app')

@section('content')

<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand " href="">Barcha Ishlanmalar </span>
      <div class="d-flex">
        <a href="{{ route('admin.stills.create') }}" class="btn btn-outline-success" type="submit">Create</a>
      </div>
    </div>
  </div>
</nav>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">desc</th>
        <th scope="col">image</th>
        <th scope="col">Narxi</th>
        <th scope="col">Amallar</th>

      </tr>
    </thead>
    <tbody>
    @forelse($still as $still)

    <tr>
      <th scope="row">{{$still->id}}</th>
      <td>{{$still->name}}</td>
      <td>{{$still->desc}}</td>
      <td>{{$still->price}}</td>
      <td>
        <img src='{{$still->image}}' alt="" style="height: 100px;width:100px;background-size:cover;">
      </td>
      <td>
        <div class="d-flex">  
        <form method="POST" action="{{ route('admin.stills.edit',$still->id) }}">
          @method('get') @csrf
          <button class="btn btn-success m-2"> Tahrirlash</button>
        </form>
        <form method="POST" action="{{ route('admin.stills.destroy',$still->id) }}">
          @method('DELETE') @csrf
          <button class="btn btn-danger m-2">O'chirish</button>
        </form>
        </div>
      </td>
    </tr>
    
    
    @empty
    <!-- <h1 class="container d-flex aling-center justify-content-center">Ishlanmalar hozircha mavjud emas</h1> -->
    @endforelse
</tbody>
</table> 
 


@endsection

