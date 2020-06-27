@extends('layouts.app')
@section('title','Edit')
@section('content')
<div class="conteiner pt-5">
       <div class="row">
           <div class="col-sm">

           </div>
           <div class="col-sm">
               <form action="/trainer/{{$trainer->slug}}" method="POST" class="form-group" enctype="multipart/form-data">
                    @method('PUT')
                   @include('layouts.inputs')
                   <div class="form-group">
                       <input type="submit" value="Update" class="btn btn-primary btn-block">
                   </div>
               </form>
           </div>
           <div class="col-sm">

           </div>
       </div>
</div>
@endsection