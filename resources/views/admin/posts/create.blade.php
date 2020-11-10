@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crea Post</h2>
        <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" placeholder="Inserisci titolo">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" aria-describedby="emailHelp" name="slug" placeholder="Inserisci slug">
              </div>
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea name="content" class="form-control" id="content" name="content" cols="30" rows="10"></textarea>
            </div>
            {{-- <div class="form-group">
                <label for="image">Immagine</label>
                <input type="file" id="image" aria-describedby="emailHelp" name="image" accept="image/*">
            </div> --}}
            <button type="submit" class="btn btn-primary">Invia!</button>
          </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                       <li>{{$error}}</li> 
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection