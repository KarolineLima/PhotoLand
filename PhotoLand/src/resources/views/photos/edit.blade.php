@extends('layout')

@section('title', 'Edit Photos')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Photos
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="{{ route('photos.update', $photo) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="local">Local:</label>
                <input type="text" class="form-control" id="local" name="local" value="{{ $photo->local }}" />
            </div>
            <div class="form-group">
                <label for="pictureDate">Data da Foto:</label>
                <input type="text" class="form-control" id="pictureDate" name="pictureDate" value="{{ $photo->pictureDate }}" />
            </div>

            <div class="row row-cols-2 row-cols-md-1" style="margin:auto">

                <div class="col mb-4">
                    <p class="card-title">Imagem Atual:</p>
                    <img src="/storage/photos/{{$photo->fileUpload}}" class="card-img-top" style="width: 18rem;">


                </div>
            </div>

            <div class="form-group">
                <label for="fileUpload">Foto para Update </label>
                <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
            </div>
            <button type="submit" class="btn btn-primary">Update Photos</button>
        </form>
    </div>
</div>
@endsection