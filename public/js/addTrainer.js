function ImageView(){
    var file = document.getElementById('avatar');
    if (file.files && file.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#card').attr('src', e.target.result);
        }
        reader.readAsDataURL(file.files[0]);
    }
}