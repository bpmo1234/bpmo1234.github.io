@extends("admin.admin_app")

@section("content")

<style type="text/css">
  .iframe-container {
  overflow: hidden;
  padding-top: 56.25% !important;
  position: relative;
}
 
.iframe-container iframe {
   border: 0;
   height: 100%;
   left: 0;
   position: absolute;
   top: 0;
   width: 100%;
}
</style>

  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">

                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                 @if(Session::has('flash_message'))
                                                <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                    {{ Session::get('flash_message') }}
                                                </div>
                                @endif

                 {!! Form::open(array('url' => array('admin/director/add_edit'),'class'=>'form-horizontal','name'=>'category_form','id'=>'actor_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($post_info->id) ? $post_info->id : null }}">

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.director_name')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="director_name" value="{{ isset($post_info->ad_name) ? stripslashes($post_info->ad_name) : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-2 col-form-label">{{trans('words.image')}}</label>
                    <div class="col-sm-8">                       
                      <div class="input-group">
                          <input type="text" name="director_image" id="director_image" value="{{ isset($post_info->ad_image) ? $post_info->ad_image : null }}" class="form-control" readonly>
                          <div class="input-group-append">                           
                            <button type="button" class="btn btn-dark waves-effect waves-light popup_selector" data-input="director_image" data-preview="holder_thumb" data-inputid="director_image">Select</button>                        
                          </div>
                      </div>
                      <small id="emailHelp" class="form-text text-muted mb-3">({{trans('words.recommended_resolution')}} : 180x140)</small>
                      <div id="thumb_image_holder" style="margin-top:5px; margin-bottom:10px;max-height:100px;"></div>                     
                    </div>
                  </div>

                  @if(isset($post_info->ad_image)) 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">                                                                         
                      <img src="{{URL::to('/'.$post_info->ad_image)}}" alt="video image" class="img-thumbnail" width="180">                                               
                    </div>
                  </div>
                  @endif
                   
                  <div class="form-group">
                    <div class="offset-sm-2 col-sm-9 pl-1">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> {{trans('words.save')}} </button>                      
                    </div>
                  </div>
                {!! Form::close() !!} 
              </div>
            </div>            
          </div>              
        </div>
      </div>
      @include("admin.copyright") 
    </div>

<script type="text/javascript">
     
     
// function to update the file selected by elfinder
function processSelectedFile(filePath, requestingField) {

    //alert(requestingField);

    var elfinderUrl = "{{ URL::to('/') }}/";

    if(requestingField=="director_image")
    {
      var target_preview = $('#thumb_image_holder');
      target_preview.html('');
      target_preview.append(
              $('<img>').css('height', '5rem').attr('src', elfinderUrl + filePath.replace(/\\/g,"/"))
            );
      target_preview.trigger('change');
    }
 
    //$('#' + requestingField).val(filePath.split('\\').pop()).trigger('change'); //For only filename
    $('#' + requestingField).val(filePath.replace(/\\/g,"/")).trigger('change');
 
}
 
 </script>          

@endsection