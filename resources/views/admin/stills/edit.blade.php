
@extends('layouts.app')

@section('content')

<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand " href=""> Ishlanmani tahrirlash </span>
      <div class="d-flex">
        <a href="{{ route('admin.stills.index') }}" class="btn btn-outline-success" type="submit">Orqaga</a>
      </div>
    </div>
  </div>
</nav>

@forelse($still as $still)
@empty
@endforelse
<form action="{{ route('admin.stills.update',$still->id) }}" class="d-flex flex-direction-column align-center " method="POST" enctype="multipart/form-data">
    @method('PATCH') @csrf   
    <div class="input-group">
        <input class="w-100 m-2 form-control" type="text" class="form-control" value="{{$still->name}}" placeholder="Nomi" name="name">
        <input class="w-100 m-2 form-control" type="text" class="form-control" value="{{$still->desc}}" placeholder="Ish haqida" name="desc">
        <input class="w-100 m-2 form-control" type="text" class="form-control" value="{{$still->price}}" placeholder="Ish haqida" name="price">
        <input class="w-100 m-2 form-control" type="file" class="form-control" value="{{$still->image}}" placeholder="Rasmi" name="image">
        <button class="btn btn-outline-primary m-2">Saqlash</button>
    </div>
</form>

@endsection