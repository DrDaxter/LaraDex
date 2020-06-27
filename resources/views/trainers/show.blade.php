@extends('layouts.app')
@section('title','Details')
@section('content')
<div class="text-center pt-5">
    <img src="/images/{{$trainer->avatar}}" alt="img" class="card-img-top rounded-circle d-blok" style="background-color: black; height: 200px; width: 200px;">
</div>
    <div class="text-center">
        <h5 class="card-title">{{$trainer->name}}</h5>
        <p>{{$trainer->description}}</p>
        <a href="/trainer/{{$trainer->slug}}/edit" class="btn btn-primary">Edit information</a>
        <form action="/trainer/{{$trainer->slug}}" method="POST" class="form-group pt-2">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
@endsection