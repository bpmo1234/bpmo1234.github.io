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
                @if(Session::has('flash_error_message'))
                      <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          {{ Session::get('flash_error_message') }}
                      </div>
                @endif
                

                 {!! Form::open(array('url' => array('admin/android_notification'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                   
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.title')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="notification_title" value="" class="form-control">
                    </div>
                  </div>
  
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.android_notification_message')}}*</label>
                    <div class="col-sm-8">
                       
                      <textarea id="notification_msg" name="notification_msg" class="form-control"></textarea>
                     
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.image')}} <small id="emailHelp" class="form-text text-muted">({{trans('words.optional')}})</small></label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="text" name="notification_image" id="notification_image" value="" class="form-control" readonly>                         
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light popup_selector" data-input="notification_image" data-preview="holder_thumb" data-inputid="notification_image">Select</button>                        
                        </div>
                      </div>
                      <small id="emailHelp" class="form-text text-muted">( {{trans('words.recommended_resolution')}}: 600x293 or 650x317 or 700x342 or 750x366)</small>
                      <div id="image_holder" style="margin-top:15px;max-height:100px;"></div>                     
                    </div>
                  </div>                 

                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 18px;">{{trans('words.or')}}</h4>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.post_type')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="notification_type" id="notification_type">    
                                <option value=""> {{trans('words.select_type')}} </option>                            
                                <option value="Movies" selected>{{trans('words.movies_text')}}</option>
                                <option value="Shows">{{trans('words.tv_shows_text')}}</option>
                                <option value="Sports">{{trans('words.sports_text')}}</option>
                                <option value="LiveTV">{{trans('words.live_tv')}}</option>
                                                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="movie_list_id">
                    <label class="col-sm-3 col-form-label">{{trans('words.movies_text')}} <small id="emailHelp" class="form-text text-muted">({{trans('words.optional')}})</small></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="movie_id" id="movie_id">    
                                <option value=""> {{trans('words.select_movie')}} </option>                            
                                @foreach($movies_list as $movies_data)
                                <option value="{{$movies_data->id}}">{{$movies_data->video_title}}</option>
                                @endforeach                            
                            </select>
                            <small id="emailHelp" class="form-text text-muted">({{trans('words.notification_movie_msg')}})</small>
                      </div>
                  </div>
                  <div class="form-group row" id="show_list_id" style="display: none;">
                    <label class="col-sm-3 col-form-label">{{trans('words.tv_shows_text')}} <small id="emailHelp" class="form-text text-muted">({{trans('words.optional')}})({{trans('words.notification_show_msg')}})</small></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="series_id" id="series_id">    
                                <option value=""> {{trans('words.select_show')}} </option>                            
                                @foreach($series_list as $series_data)
                                <option value="{{$series_data->id}}">{{$series_data->series_name}}</option>
                                @endforeach                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="sports_list_id" style="display: none;">
                    <label class="col-sm-3 col-form-label">{{trans('words.sports_text')}} <small id="emailHelp" class="form-text text-muted">({{trans('words.optional')}})({{trans('words.notification_sport_msg')}})</small></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="sport_id" id="sport_id">    
                                <option value=""> {{trans('words.select_sport')}} </option>                            
                                @foreach($sports_list as $sports_data)
                                <option value="{{$sports_data->id}}">{{$sports_data->video_title}}</option>
                                @endforeach                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="live_tv_list_id" style="display: none;">
                    <label class="col-sm-3 col-form-label">{{trans('words.live_tv')}} <small id="emailHelp" class="form-text text-muted">({{trans('words.optional')}})({{trans('words.notification_tv_msg')}})</small></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="live_tv_id" id="live_tv_id">    
                                <option value=""> {{trans('words.select_tv')}} </option>                            
                                @foreach($live_tv_list as $live_tv_data)
                                <option value="{{$live_tv_data->id}}">{{$live_tv_data->channel_name}}</option>
                                @endforeach                            
                            </select>
                      </div>
                  </div>  

                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 18px;">{{trans('words.or')}}</h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.android_external_link')}} <small id="emailHelp" class="form-text text-muted">({{trans('words.optional')}})</small></label>
                    <div class="col-sm-8">
                      <input type="text" name="external_link" value="" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9 pl-1">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> {{trans('words.send')}} </button>                      
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

    if(requestingField=="notification_image")
    {
      var target_preview = $('#image_holder');
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