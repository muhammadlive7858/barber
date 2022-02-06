@extends('layouts.app')

@section('content')

<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand " href="">Barcha Foydalanuvchilar Ro'yxati</span>
      <div class="d-flex">
        <a href="{{ route('admin.users.create') }}" class="btn btn-outline-success" type="submit">Create</a>
      </div>
    </div>
  </div>
</nav>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">email</th>
        <th scope="col">password-Hash</th>
        <th>role</th>
        <th scope="col" class="mx-5">Amallar</th>

      </tr>
    </thead>
    <tbody>
    @forelse($users as $users)

    <tr>
      <th scope="row">{{$users->id}}</th>
      <td>{{$users->name}}</td>
      <td>{{$users->email}}</td>
      <td>{{$users->password}}</td>
      <td>{{$users->role}}</td>
      <td>
        <div class="d-flex">  
        <form method="POST" action="{{ route('admin.users.edit',$users->id) }}">
          @method('get') @csrf
          <button class="btn btn-success m-2"> Tahrirlash</button>
        </form>
        <form method="POST" action="{{ route('admin.users.destroy',$users->id) }}">
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

