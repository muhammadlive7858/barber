
@extends('layouts.app')

@section('content')

<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand " href="">Yangi Sartarosh yaratish </span>
      <div class="d-flex">
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-success" type="submit">Orqaga</a>
      </div>
    </div>
  </div>
</nav>

<form action="{{ route('admin.users.store') }}" class="d-flex flex-direction-column align-center " method="POST" enctype="multipart/form-data">
    @method('post') @csrf   
    <div class="input-group">
        <input class="w-100 m-2 form-control" type="text" class="form-control" placeholder="Nomi" name="name">
        <input class="w-100 m-2 form-control" type="email" class="form-control" placeholder="User Email" name="email">
        <input class="w-100 m-2 form-control" type="password" class="form-control" placeholder="Password" name="password">
        <select name="role" id="" class="form-control w-100 p-2 m-2">
            <option value="">Role tanlang</option>
            <option value="director">Director</option>
            <option value="admin">Admin</option>
        </select>
        <button class="btn btn-outline-primary m-2">Saqlash</button>
    </div>
</form>

@endsection


