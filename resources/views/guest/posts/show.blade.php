@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$post->title}}</h2>
        <div>
            {{$post->content}}
        </div>
        <p>{{$post->user->name}}</p>
    </div>
@endsection