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
                
                <div class="row">
                 <div class="col-sm-6">
                      <a href="{{ URL::to('admin/series') }}"><h4 class="header-title m-t-0 m-b-30 text-primary pull-left" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> {{trans('words.back')}}</h4></a>
                 </div>
                 @if(isset($series_info->id))
                 <div class="col-sm-6">
                    <a href="{{ URL::to('series/'.$series_info->series_slug.'/'.$series_info->id) }}" target="_blank"><h4 class="header-title m-t-0 m-b-30 text-primary pull-right" style="font-size: 20px;">{{trans('words.preview')}} <i class="fa fa-eye"></i></h4> </a>
                 </div>
                 @endif
               </div> 
                 
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

                @if(!getcong('omdb_api_key'))
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          Please set OMDb API key <a href="{{ URL::to('admin/general_settings') }}#omdbapi_id" target="_blank">here</a>
                  </div>
                @endif
                
                @if(!isset($series_info->id))
                <div id="result" class="m-t-15"></div>
                
                 <input type="hidden" id="from" name="from" value="series">

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.import_from_imdb')}}</label>
                    <div class="col-sm-6">
                      <input type="text" name="imdb_id_title" id="imdb_id_title" value="" class="form-control" placeholder="Enter IMDb ID (e.g. tt1856010) or Title (e.g. House of Cards)" @if(!getcong('omdb_api_key')) disabled @endif>
                      <small id="emailHelp" class="form-text text-muted">({{trans('words.imdb_search_recommended')}})</small>
                    </div>
                     <div class="col-sm-2">
                      <button type="submit" id="import_show_btn" class="btn btn-primary waves-effect waves-light mt-1" @if(!getcong('omdb_api_key')) disabled @endif> {{trans('words.fetch')}} </button>                      
                    </div>
                    
                  </div>
                  
                 
                <hr/>
                @endif  

                 {!! Form::open(array('url' => array('admin/series/add_edit_series'),'class'=>'form-horizontal','name'=>'series_form','id'=>'series_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($series_info->id) ? $series_info->id : null }}">

                  <input type="hidden" name="imdb_id" id="imdb_id" value="">
                  <input type="hidden" name="imdb_votes" id="imdb_votes" value="">
                  
                  <div class="row">

                    <div class="col-md-6"> 
                      <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;">{{trans('words.show_info')}}</h4>

                      <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.show_name')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="series_name" id="show_name" value="{{ isset($series_info->series_name) ? stripslashes($series_info->series_name) : old('series_name') }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.show_sort_info')}}</label>
                    <div class="col-sm-8">
                       <textarea name="series_info" id="show_info" class="form-control">{{ isset($series_info->series_info) ? stripslashes($series_info->series_info) : old('series_info') }}</textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.upcoming')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="upcoming">                               
                                <option value="0" @if(isset($series_info->upcoming) AND $series_info->upcoming==0) selected @endif>{{trans('words.upcoming_no')}}</option>
                                <option value="1" @if(isset($series_info->upcoming) AND $series_info->upcoming==1) selected @endif>{{trans('words.upcoming_yes')}}</option>                            
                            </select>
                      </div>

                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.series_access')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="series_access">                               
                                <option value="Paid" @if(isset($series_info->series_access) AND $series_info->series_access=='Paid') selected @endif>{{trans('words.paid')}}</option>
                                <option value="Free" @if(isset($series_info->series_access) AND $series_info->series_access=='Free') selected @endif>{{trans('words.free')}}</option>                            
                            </select>
                      </div>

                  </div>     
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.language_text')}}*</label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="language" id="show_language">
                                <option value="">{{trans('words.select_lang')}}</option>
                                @foreach($language_list as $language_data)
                                  <option value="{{$language_data->id}}" @if(isset($series_info->id) && $language_data->id==$series_info->series_lang_id) selected @endif>{{$language_data->language_name}}</option>
                                @endforeach
                            </select>
                      </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.genres_text')}}*</label> 
                      <div class="col-sm-8">
                            <select name="series_genres[]" class="select2 select2-multiple" multiple="multiple" multiple id="show_genre_id" data-placeholder="{{trans('words.select_genres')}}">
                                 @foreach($genre_list as $genre_data)
                                  <option value="{{$genre_data->id}}" @if(isset($series_info->id) && in_array($genre_data->id, explode(",",$series_info->series_genres))) selected @endif>{{$genre_data->genre_name}}</option>
                                @endforeach
                            </select>
                      </div>
                  </div>                   

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.actors')}}</label> 
                      <div class="col-sm-8">
                            <select name="actors_id[]" class="select2 select2-multiple" multiple="multiple" multiple id="actors_id" data-placeholder="Select Actors...">
                                 @foreach($actor_list as $actor_data)
                                  <option value="{{$actor_data->id}}" @if(isset($series_info->id) && in_array($actor_data->id, explode(",",$series_info->actor_id))) selected @endif>{{$actor_data->ad_name}}</option>
                                @endforeach
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.directors')}}</label>
                      <div class="col-sm-8">
                            <select class="select2 select2-multiple" name="director_id[]" id="director_id" multiple="multiple" multiple data-placeholder="Select Directors...">                                
                                @foreach($director_list as $director_data)
                                  
                                  <option value="{{$director_data->id}}" @if(isset($series_info->id) && in_array($director_data->id, explode(",",$series_info->director_id))) selected @endif>{{$director_data->ad_name}}</option>
                                   
                                @endforeach
                            </select>
                      </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="control-label col-sm-3">{{trans('words.imdb_rating')}}</label>
                    <div class="col-sm-8">
                      <div class="input-group"> 
                        <input type="text" id="imdb_rating" name="imdb_rating" value="{{ isset($series_info->imdb_rating) ? $series_info->imdb_rating : old('imdb_rating') }}" class="form-control" placeholder="">
                         
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-sm-3">{{trans('words.content_rating')}}</label>
                    <div class="col-sm-8">
                      <div class="input-group"> 
                        <input type="text" id="content_rating" name="content_rating" value="{{ isset($series_info->content_rating) ? $series_info->content_rating : old('content_rating') }}" class="form-control" placeholder="16+">
                         
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.show_poster')}}*</label>
                    <div class="col-sm-8">
                       
                      <div class="input-group">

                        <input type="text" name="series_poster" id="series_poster" value="{{ isset($series_info->series_poster) ? $series_info->series_poster : null }}" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light popup_selector" data-input="series_poster" data-preview="holder_thumb" data-inputid="series_poster">Select</button>
                      
                        </div>
                      </div>
                      <small id="emailHelp" class="form-text text-muted">({{trans('words.recommended_resolution')}} : 800x450)</small>
                      <div id="image_holder" style="margin-top:5px;max-height:100px;"></div>                     
                    </div>
                  </div>

                  @if(isset($series_info->series_poster)) 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">                                                                         
                      <img src="{{URL::to('/'.$series_info->series_poster)}}" alt="video image" class="img-thumbnail" width="200">                                               
                    </div>
                  </div>
                  @endif
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.status')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" @if(isset($series_info->status) AND $series_info->status==1) selected @endif>{{trans('words.active')}}</option>
                                <option value="0" @if(isset($series_info->status) AND $series_info->status==0) selected @endif>{{trans('words.inactive')}}</option>                            
                            </select>
                      </div>
                  </div>

                  </div>
                  <div class="col-md-6"> 
                    <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;">{{trans('words.seo')}}</h4>

                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.seo_title')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="seo_title" id="seo_title" value="{{ isset($series_info->seo_title) ? stripslashes($series_info->seo_title) : old('seo_title') }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.seo_desc')}}</label>
                    <div class="col-sm-8">                       
                      <textarea name="seo_description" id="seo_description" class="form-control">{{ isset($series_info->seo_description) ? stripslashes($series_info->seo_description) : old('seo_description') }}</textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.seo_keyword')}}</label>
                    <div class="col-sm-8">                      
                      <textarea name="seo_keyword" id="seo_keyword" class="form-control">{{ isset($series_info->seo_keyword) ? stripslashes($series_info->seo_keyword) : old('seo_keyword') }}</textarea>
                      <small id="emailHelp" class="form-text text-muted">{{trans('words.seo_keyword_note')}}</small>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="offset-sm-9 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> {{trans('words.save')}} </button>                      
                    </div>
                  </div>

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

    if(requestingField=="series_poster")
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