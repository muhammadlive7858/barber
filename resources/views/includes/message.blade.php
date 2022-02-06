<main class="py-4 col-md-12">
    <div class="container">
        <div class="right col-md-12">
@forelse(\Illuminate\Support\Facades\Session::get('errors') as $errors)
@foreach($errors as $message)
            <div class="alert alert-danger alert-dismissable fade show">
                <strong>{{$message}}</strong>
                <div class="close" data-dismis="alert" ara-label="close">
                    <span area-hidden="true">&times</span>
                </div>
            </div>
@endforeach
@endforelse
        </div> 
    </div>
</main>

<main class="py-4 col-md-12">
    <div class="container">
        <div class="right col-md-12">
@if($message = Session:get('msg'))
            <div class="alert alert-danger alert-dismissable fade show">
                <strong>{{$message}}</strong>
                <div class="close" data-dismis="alert" ara-label="close">
                    <span area-hidden="true">&times</span>
                </div>
            </div>
@endif
        </div> 
    </div>
</main>

<main class="py-4 col-md-12">
    <div class="container">
        <div class="right col-md-12">
@if($message = Session:get('success'))
            <div class="alert alert-danger alert-dismissable fade show">
                <strong>{{$message}}</strong>
                <div class="close" data-dismis="alert" ara-label="close">
                    <span area-hidden="true">&times</span>
                </div>
            </div>
@endif
        </div> 
    </div>
</main>