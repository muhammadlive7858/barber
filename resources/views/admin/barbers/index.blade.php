@extends('layouts.app')

@section('content')

<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand " href="">Barcha Sartaroshlar Ro'yxati</span>
      <div class="d-flex">
        <a href="{{ route('admin.barbers.create') }}" class="btn btn-outline-success" type="submit">Create</a>
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
        <th scope="col">Amallar</th>

      </tr>
    </thead>
    <tbody>
    @forelse($barbers as $barbers)

    <tr>
      <th scope="row">{{$barbers->id}}</th>
      <td>{{$barbers->name}}</td>
      <td>{{$barbers->desc}}</td>
      <td>
        <img src='/{{ $barbers->image }}' alt="" style="height: 100px;width:100px;background-size:cover;">
      </td>
      <td>
        <div class="d-flex">  
        <form method="POST" action="{{ route('admin.barbers.edit',$barbers->id) }}">
          @method('get') @csrf
          <button class="btn btn-success m-2"> Tahrirlash</button>
        </form>
        <form method="POST" action="{{ route('admin.barbers.destroy',$barbers->id) }}">
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

