@extends('layouts.app')
@section('title','Home')
@section('content')
@include('layouts.successMenss')
<div class="row">
    @foreach ($trainers as $trainer)
        <div class="col-sm-3 pt-5">
            <div class="card text-center mx-auto" style="width: 18rem;">
                <div class="card-body pt-5">
                    <img src="images/{{$trainer->avatar}}" alt="" class="card-img-top rounded-circle" style="background-color: black; width:200px; heigth:200px">
                    <h5 class="card-title">{{$trainer->name}}</h5>
                    <h5 class="card-title">{{$trainer->last_name}}</h5>
                    <p class="card-text">{{$trainer->description}}</p>
                    <a href="/trainer/{{$trainer->slug}}" class="btn btn-primary">Show details</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection