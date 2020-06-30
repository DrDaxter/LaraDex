 @extends('layouts.app')
 @section('title','Create')
 @section('content')
 <div class="conteiner pt-5">
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                @include('layouts.errors')
                <form action="/trainer" method="POST" class="form-group" enctype="multipart/form-data">
                    @include('layouts.inputs')
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary btn-block">
                    </div>
                </form>
                <div id="viewImage">

                </div>
            </div>
            <div class="col-sm">

            </div>
        </div>
</div>
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/addTrainer.js')}}"></script>
@endsection