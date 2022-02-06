
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

@forelse($barbers as $barbers)
@empty
@endforelse
<form action="{{ route('admin.barbers.update',$barbers->id) }}" class="d-flex flex-direction-column align-center " method="POST" enctype="multipart/form-data">
    @method('PATCH') @csrf   
    <div class="input-group">
        <input class="w-100 m-2 form-control" type="text" class="form-control" value="{{$barbers->name}}" placeholder="Nomi" name="name">
        <input class="w-100 m-2 form-control" type="text" class="form-control" value="{{$barbers->desc}}" placeholder="Sartarosh haqida" name="desc">
        <input class="w-100 m-2 form-control" type="file" class="form-control" value="{{$barbers->image}}" placeholder="Rasmi" name="image">
        <button class="btn btn-outline-primary m-2">Saqlash</button>
    </div>
</form>

@endsection