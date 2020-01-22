@extends('app')

@section('title', 'New Photo')

@section('content')
<div style="width: 45%;margin: auto;"> 


    <div class="card">
        <div class="card-header">
            Photo
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
            <form method="post" action="{{ route('photos.store') }}">
                @csrf

                <div class="form-group">
                    <label for="local">Local:</label>
                    <input type="text" class="form-control" id="local" name="local" />
                </div>
                <div class="form-group">
                    <label for="pictureDate">Data da Foto:</label>
                    <input type="text" class="form-control" id="pictureDate" name="pictureDate" />
                </div>

                <form>
                    <div class="form-group">
                        <label for="fileUpload">Selecione a Foto</label>
                        <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
                    </div>
                </form>
                <button type="submit" class="btn btn-primary">Add Photo</button>
            </form>
        </div>
    </div>
</div>
@endsection