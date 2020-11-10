@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="btn btn-info">
            <a href="{{route('admin.posts.index')}}" class="badge badge-info">Indietro</a>
        </div>
        <h2>{{$post->title}}</h2>
        <div>
            <img src="{{asset('storage/'.$post->image)}}" alt="IMG">
        </div>
        <div>{{$post->content}}</div>
        <small>{{$post->user->name}}</small>
    </div>
@endsection