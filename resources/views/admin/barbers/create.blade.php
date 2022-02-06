
@extends('layouts.app')

@section('content')

<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand " href="">Yangi Sartarosh yaratish </span>
      <div class="d-flex">
        <a href="{{ route('admin.barbers.index') }}" class="btn btn-outline-success" type="submit">Orqaga</a>
      </div>
    </div>
  </div>
</nav>

<form action="{{ route('admin.barbers.store') }}" class="d-flex flex-direction-column align-center " method="POST" enctype="multipart/form-data">
    @method('post') @csrf   
    <div class="input-group">
        <input class="w-100 m-2 form-control" type="text" class="form-control" placeholder="Nomi" name="name">
        <input class="w-100 m-2 form-control" type="text" class="form-control" placeholder="Barber haqida" name="desc">
        <input class="w-100 m-2 form-control" type="file" class="form-control" placeholder="Rasmi" name="image">
        <button class="btn btn-outline-primary m-2">Saqlash</button>
    </div>
</form>

@endsection


