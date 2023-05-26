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
                

                 {!! Form::open(array('url' => array('admin/slider/add_edit_slider'),'class'=>'form-horizontal','name'=>'slider_form','id'=>'slider_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($slider_info->id) ? $slider_info->id : null }}">
  
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.slider_title')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="slider_title" value="{{ isset($slider_info->slider_title) ? stripslashes($slider_info->slider_title) : null }}" class="form-control">
                    </div>
                  </div>

                    
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.slider_image')}}*</label>                    
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="text" name="slider_image" id="slider_image" value="{{ isset($slider_info->slider_image) ? $slider_info->slider_image : null }}" class="form-control" readonly>
                        <div class="input-group-append">                           
                            <button type="button" class="btn btn-dark waves-effect waves-light popup_selector" data-input="slider_image" data-preview="holder_thumb" data-inputid="slider_image">Select</button>                        
                        </div>
                      </div>
                      <small id="emailHelp" class="form-text text-muted">({{trans('words.recommended_resolution')}} : 1100x450)</small>
                      <div id="image_holder" style="margin-top:5px;max-height:100px;"></div>                     
                    </div>
                  </div>

                  @if(isset($slider_info->slider_image)) 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">                                                                         
                      <img src="{{URL::to('/'.$slider_info->slider_image)}}" alt="video image" class="img-thumbnail" width="400">                                               
                    </div>
                  </div>
                  @endif

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.post_type')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="slider_type" id="slider_type">    
                                <option value=""> {{trans('words.select_type')}} </option>                            
                                @if(getcong('menu_movies'))
                                <option value="Movies" @if(isset($slider_info->id) && $slider_info->slider_type=="Movies") selected @endif>{{trans('words.movies_text')}}</option>
                                @endif

                                @if(getcong('menu_shows'))
                                <option value="Shows" @if(isset($slider_info->id) && $slider_info->slider_type=="Shows") selected @endif>{{trans('words.tv_shows_text')}}</option>
                                @endif

                                @if(getcong('menu_sports'))
                                <option value="Sports" @if(isset($slider_info->id) && $slider_info->slider_type=="Sports") selected @endif>{{trans('words.sports_text')}}</option>
                                @endif

                                @if(getcong('menu_livetv'))
                                <option value="LiveTV" @if(isset($slider_info->id) && $slider_info->slider_type=="LiveTV") selected @endif>{{trans('words.live_tv')}}</option>
                                @endif                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="movie_list_id" @if(isset($slider_info->id) && $slider_info->slider_type!="Movies") style="display: none;" @endif @if(!isset($slider_info->id)) style="display: none;" @endif>
                    <label class="col-sm-3 col-form-label">{{trans('words.movies_text')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="movie_id" id="movie_id">    
                                <option value=""> {{trans('words.select_movie')}} </option>                            
                                @foreach($movies_list as $movies_data)
                                <option value="{{$movies_data->id}}" @if(isset($slider_info->id) && $slider_info->slider_type=="Movies" && $slider_info->slider_post_id==$movies_data->id) selected @endif>{{$movies_data->video_title}}</option>
                                @endforeach                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="show_list_id" @if(isset($slider_info->id) && $slider_info->slider_type!="Shows") style="display: none;" @endif @if(!isset($slider_info->id)) style="display: none;" @endif>
                    <label class="col-sm-3 col-form-label">{{trans('words.tv_shows_text')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="series_id" id="series_id">    
                                <option value=""> {{trans('words.select_show')}} </option>                            
                                @foreach($series_list as $series_data)
                                <option value="{{$series_data->id}}" @if(isset($slider_info->id) && $slider_info->slider_type=="Shows" && $slider_info->slider_post_id==$series_data->id) selected @endif>{{$series_data->series_name}}</option>
                                @endforeach                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="sports_list_id" @if(isset($slider_info->id) && $slider_info->slider_type!="Sports") style="display: none;" @endif @if(!isset($slider_info->id)) style="display: none;" @endif>
                    <label class="col-sm-3 col-form-label">{{trans('words.sports_text')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="sport_id" id="sport_id">    
                                <option value=""> {{trans('words.select_sport')}} </option>                            
                                @foreach($sports_list as $sports_data)
                                <option value="{{$sports_data->id}}" @if(isset($slider_info->id) && $slider_info->slider_type=="Sports" && $slider_info->slider_post_id==$sports_data->id) selected @endif>{{$sports_data->video_title}}</option>
                                @endforeach                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="live_tv_list_id" @if(isset($slider_info->id) && $slider_info->slider_type!="LiveTV") style="display: none;" @endif @if(!isset($slider_info->id)) style="display: none;" @endif>
                    <label class="col-sm-3 col-form-label">{{trans('words.live_tv')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="live_tv_id" id="live_tv_id">    
                                <option value=""> {{trans('words.select_tv')}} </option>                            
                                @foreach($live_tv_list as $live_tv_data)
                                <option value="{{$live_tv_data->id}}" @if(isset($slider_info->id) && $slider_info->slider_type=="LiveTV" && $slider_info->slider_post_id==$live_tv_data->id) selected @endif>{{$live_tv_data->channel_name}}</option>
                                @endforeach                            
                            </select>
                      </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.display_on')}}</label>
                      <div class="col-sm-8">
                            <?php 
                            if(isset($slider_info->slider_display_on))
                            {
                              $slider_display = array_map('trim', explode(",", $slider_info->slider_display_on));
                            }
                            else
                            {
                              $slider_display = array();
                            }

                          ?>
                          <label style="font-weight: 400;padding-top: 8px;"><input type="checkbox" name="slider_display_on[]" value="Home" id="type_of_b1" @if(in_array('Home', $slider_display)) checked="checked" @endif> {{trans('words.home')}}</label>&nbsp;
                          
                          @if(getcong('menu_movies'))
                          <label style="font-weight: 400;padding-top: 8px;"><input type="checkbox" name="slider_display_on[]" value="Movies" id="type_of_b2" @if(in_array('Movies', $slider_display)) checked="checked" @endif> {{trans('words.movies_text')}}</label>&nbsp;
                          @endif
                          
                          @if(getcong('menu_shows'))
                          <label style="font-weight: 400;padding-top: 8px;"><input type="checkbox" name="slider_display_on[]" value="Shows" id="type_of_b3" @if(in_array('Shows', $slider_display)) checked="checked" @endif> {{trans('words.shows_text')}}</label>&nbsp;
                          @endif
                          
                          @if(getcong('menu_sports'))
                          <label style="font-weight: 400;padding-top: 8px;"><input type="checkbox" name="slider_display_on[]" value="Sports" id="type_of_b4" @if(in_array('Sports', $slider_display)) checked="checked" @endif> {{trans('words.sports_text')}}</label>&nbsp;
                          @endif
                          
                          @if(getcong('menu_livetv'))
                          <label style="font-weight: 400;padding-top: 8px;"><input type="checkbox" name="slider_display_on[]" value="LiveTV" id="type_of_b5" @if(in_array('LiveTV', $slider_display)) checked="checked" @endif> {{trans('words.live_tv')}}</label>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.status')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" @if(isset($slider_info->status) AND $slider_info->status==1) selected @endif>{{trans('words.active')}}</option>
                                <option value="0" @if(isset($slider_info->status) AND $slider_info->status==0) selected @endif>{{trans('words.inactive')}}</option>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9 pl-1">
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

    if(requestingField=="slider_image")
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