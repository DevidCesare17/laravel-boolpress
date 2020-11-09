@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Contenuto</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->content}}</td>
                        <td>
                            <a href="{{route('admin.posts.show', $post->slug)}}">Vedi</a>
                            <a href="">Modifica</a>
                            <a href="">Elimina</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection