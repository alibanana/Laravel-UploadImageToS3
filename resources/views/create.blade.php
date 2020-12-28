@extends('layouts.app')

@section('head-content')
{{-- Progress Bar --}}
<script src="http://malsup.github.com/jquery.form.js"></script> 
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}

            <div class="pb-4">
              <h2>Create New Folder</h2>
            </div>
            <div>
              <form id="myForm" enctype="multipart/form-data" method="POST" action="{{ route('store') }}">
                @csrf
                <div class="form-group">
                  <h5>Folder's Name</h5>
                  <input type="text" class="form-control" id="name" name="name" aria-describedby="folderHelp" placeholder="Enter folder's name">
                  <small id="folderHelp" class="form-text text-muted">Type your folder's name here.</small>
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert" style="display: block !important;">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group pt-2">
                  <h5>Description</h5>
                  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                @error('description')
                <span class="invalid-feedback" role="alert" style="display: block !important;">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                
                {{-- INPUT FOR IMAGES --}}
                <div class="form-group pt-2">
                  <h5>Gallery</h5>
                  <input type="file" id="images" name="images[]" accept=".jpg,.jpeg,.png" multiple hidden/>
                  <label id="uploadButton" for="images" style="background-color: #145CA8; color: white; padding: 8px 15px; border-radius: 0.3rem; cursor: pointer;">Choose Images</label>
                  <label for="" >*Max 12 images*</label>
                </div>
                @error('images')
                <span class="invalid-feedback" role="alert" style="display: block !important;">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                @error('imagenames')
                <span class="invalid-feedback" role="alert" style="display: block !important;">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="progress">
                  <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                  0%
                  </div>
                </div>
                <br />
                <div id="success" class="row">
                </div>

                <!-- START OF IMAGES PREVIEW -->
                <div class="row m-0 pb-4" id="gallery_preview">
                </div>
                <!-- END OF IMAGES PREVIEW -->
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  // START OF PROGRESS BAR
  $(document).ready(function(){
    $('form').ajaxForm({
      beforeSend:function(){
        $('#success').empty();
        $('.progress-bar').text('0%');
        $('.progress-bar').css('width', '0%');
      },
      uploadProgress:function(event, position, total, percentComplete){
        $('.progress-bar').text(percentComplete + '0%');
        $('.progress-bar').css('width', percentComplete + '0%');
      },
      success:function(data)
      {
        if(data.success)
        {
          $('#success').html('<div class="text-success text-center"><b>'+data.success+'</b></div><br /><br />');
          $('#success').append(data.image);
          $('.progress-bar').text('Uploaded');
          $('.progress-bar').css('width', '100%');
        }
      }
    });
  });
  // END OF PROGRESS BAR
</script>

<script>
// START OF IMAGE PREVIEW AND DELETE
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    // Script for Gallery Preview
    $("#images").on("change", function(e) {
      var fileName = document.getElementById("images").value;
      var idxDot = fileName.lastIndexOf(".") + 1;
      var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
      if (extFile=="jpg" || extFile=="jpeg" || extFile=="png") {
        document.getElementById("gallery_preview").innerHTML = "";
        var files = e.target.files;
        if (files.length > 12) {
          alert("Only 12 Images are allowed!");
        } else {
          for (var i = 0; i < files.length; i++ ) {
            var file = files[i];
            var fileReader = new FileReader();

            fileReader.onload= (function(f) {
              return function(e) {
                $("#gallery_preview").append("<div class=\"col-md-3 mt-4 pip\"  style=\"text-align: center;\">"+
                  "<img src=\"" + e.target.result + "\" class=\"img-fluid\" style=\"object-fit: cover;width:300px;max-height:400px\" />" + 
                  "<i style=\"color:#145CA8;font-size:20px\" class=\"fas fa-minus-circle mt-2 remove\"></i>" + 
                  "<input name=\"imagenames[]\" value=\"" + f.name + "\" hidden/>" + "</div>");
                $(".remove").click(function(){
                  $(this).parent(".pip").remove();
                });
              };
            })(file);

            fileReader.readAsDataURL(file);
          }
        }
      } else {
          alert("Only jpg/jpeg and png files are allowed!");
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
// END OF IMAGE PREVIEW AND DELETE
</script>
@endsection
