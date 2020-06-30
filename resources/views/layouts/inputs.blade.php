@csrf
<div class="form-group">
    <input type="text" placeholder="Name" class="form-control" name="name" value="@isset($trainer->name){{$trainer->name}}@endisset">
</div>
<div class="form-group">
    <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="@isset($trainer->last_name){{$trainer->last_name}}@endisset">
</div>
<div class="form-group">
    <input type="text" placeholder="Description" class="form-control" name="description" value="@isset($trainer->description){{$trainer->description}}@endisset">
</div>
<div class="form-group">
    <label for="">Upload avatar</label>
    <input type="file" name="avatar" id="avatar" onchange="ImageView();">
</div>
<div class="ml-5">
    <div class="card text-center" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('images/addPhoto.png')}}" alt="Card image cap" id="card">
        <div class="card-body">
          <h5 class="card-title">Photo</h5>
        </div>
    </div>
</div>
<script src="{{asset('js/addTrainer.js')}}"></script>
