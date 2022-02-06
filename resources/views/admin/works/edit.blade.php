
@extends('layouts.app')

@section('content')

<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand " href=""> Ishlanmani tahrirlash </span>
      <div class="d-flex">
        <a href="{{ route('admin.works.index') }}" class="btn btn-outline-success" type="submit">Orqaga</a>
      </div>
    </div>
  </div>
</nav>

@forelse($work as $works)
@empty
@endforelse
<form action="{{ route('admin.works.update',$works->id) }}" class="d-flex flex-direction-column align-center " method="POST" enctype="multipart/form-data">
    @method('PATCH') @csrf   
    <div class="input-group">
        <input class="w-100 m-2 form-control" type="text" class="form-control" value="{{$works->name}}" placeholder="Nomi" name="name">
        <input class="w-100 m-2 form-control" type="text" class="form-control" value="{{$works->desc}}" placeholder="Ish haqida" name="desc">
        <input class="w-100 m-2 form-control" type="text" class="form-control" value="{{$works->barber}}" placeholder="Sartaroshning nomi" name="barber">
        <input class="w-100 m-2 form-control" type="file" class="form-control" value="{{$works->image}}" placeholder="Rasmi" name="image">
        <button class="btn btn-outline-primary m-2">Saqlash</button>
    </div>
</form>

@endsection