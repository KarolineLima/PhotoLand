<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>


@extends('layout')


@section('title', 'Photo')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><br />
@endif

<!-- 
<div class="card">
  <div><a href="{{ route('photos.create') }}" class="btn btn-primary" role="button">New Photo</a></div>
</div> -->

<div class="container">
  <!-- Content here -->




  <div class="row row-cols-1 row-cols-md-3" style="margin:auto">



    @foreach($photos as $photo)

    <div class="col mb-4">

      <div class="card" style="width: 18rem;">
        <img src="/storage/photos/{{$photo->fileUpload}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$photo->local}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$photo->pictureDate}}</h6>
          <p class="card-text">{{$photo->fotografo}}</p>

          @guest
          @if (Route::has('Login'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @endif
          @else
          <div class="row row-cols-1 row-cols-md-3">

            <div class="col mb-4">
              <div><a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-primary" role="button">Editar</a></div>

            </div>

            <div class="col mb-4">
              <form action="{{ route('photos.destroy', $photo->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Excluir</button>
            </div>

          </div>
          @endguest
          </form>
        </div>
      </div>



    </div>
    @endforeach
  </div>
</div>


@endsection