@extends('layouts.app')

@section('content')
<!-- barber -->
<div class="row">
    <div class="row">
        <div class="col-12">
            <h1 class="d-flex justify-content-center">
                Sartaroshlar
            </h1>
        </div>
    </div>
    @foreach($barbers as $barber)
    <div class="col-4">
      <img src="{{ $barber->image }}" class="mb-3" alt="..." style="width:300px">
      <div class="carousel-caption d-none d-md-block">
        
      </div>
      </div>
      @endforeach
</div>
<hr>
<!-- Stillar -->
<div class="row">
    <div class="row">
        <div class="col-12">
            <h1 class="d-flex justify-content-center">
                Still turlari
            </h1>
        </div>
    </div>
    @foreach($stills as $still)
    <div class="col-4">
      <img src="{{ $still->image }}" class="mb-3" alt="..." style="width:300px">
      <div class="carousel-caption d-none d-md-block">
      </div>
      </div>
      @endforeach
</div>
<hr>
<!-- ishlanmalar -->
<div class="row">
    <div class="row">
        <div class="col-12">
            <h1 class="d-flex justify-content-center">
                Ishlanmalar turlari
            </h1>
        </div>
    </div>
    @foreach($works as $works)
    <div class="col-4">
      <img src="{{ $works->image }}" class="mb-3" alt="..." style="width:300px ">
      <div class="carousel-caption d-none d-md-block">
      </div>
      </div>
      @endforeach
</div>
@endsection
