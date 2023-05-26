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
                          <a href="{{ URL::to('admin/home_sections') }}"><h4 class="header-title m-t-0 m-b-30 text-primary pull-left" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> {{trans('words.back')}}</h4></a>
                     </div>
                      
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

                 {!! Form::open(array('url' => array('admin/home_sections/add_edit'),'class'=>'form-horizontal','name'=>'form_name','id'=>'form_id','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($data_obj->id) ? $data_obj->id : null }}">

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.home_section_title')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="section_name" value="{{ isset($data_obj->section_name) ? stripslashes($data_obj->section_name) : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.type')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="post_type" id="home_post_type">
                                <option value="">{{trans('words.select')}}</option>
                               
                                @if(getcong('menu_movies'))<option value="Movie" @if(isset($data_obj->post_type) AND $data_obj->post_type=='Movie') selected @endif>Movie</option> @endif

                                @if(getcong('menu_shows'))<option value="Shows" @if(isset($data_obj->post_type) AND $data_obj->post_type=='Shows') selected @endif>Shows</option> @endif
                                
                                @if(getcong('menu_sports'))<option value="Sports" @if(isset($data_obj->post_type) AND $data_obj->post_type=='Sports') selected @endif>Sports</option> @endif
                                
                                @if(getcong('menu_livetv'))<option value="LiveTV" @if(isset($data_obj->post_type) AND $data_obj->post_type=='LiveTV') selected @endif>Live TV</option>  @endif                          
                            </select>
                      </div>
                  </div>  

                  <div class="form-group row" id="movie_list_sec" @if(isset($data_obj->post_type) AND $data_obj->post_type!="Movie") style="display:none;" @endif @if(!isset($data_obj->id)) style="display:none;" @endif>
                    <label class="col-sm-3 col-form-label">{{trans('words.movies_text')}}</label>
                    <div class="col-sm-8">
                      <select name="selected_movie[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select Movies...">
                                 @foreach($movies_list as $movies_data)
                                    
                                    @if(isset($data_obj->movie_ids))
                                      <option value="{{$movies_data->id}}" @if(in_array($movies_data->id, explode(",",$data_obj->movie_ids))) selected @endif>{{$movies_data->video_title}}</option>
                                    @else

                                    <option value="{{$movies_data->id}}">{{stripslashes($movies_data->video_title)}}</option>

                                    @endif
                                 @endforeach
                            </select>
                    </div>
                  </div>

                  <div class="form-group row" id="shows_list_sec" @if(isset($data_obj->post_type) AND $data_obj->post_type!="Shows") style="display:none;" @endif @if(!isset($data_obj->id)) style="display:none;" @endif>
                    <label class="col-sm-3 col-form-label">{{trans('words.shows_text')}}</label>
                    <div class="col-sm-8">
                      <select name="selected_shows[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select Shows...">
                                 @foreach($series_list as $series_data)
                                    
                                    @if(isset($data_obj->show_ids))
                                      <option value="{{$series_data->id}}" @if(in_array($series_data->id, explode(",",$data_obj->show_ids))) selected @endif>{{$series_data->series_name}}</option>
                                    @else

                                    <option value="{{$series_data->id}}">{{stripslashes($series_data->series_name)}}</option>

                                    @endif
                                 @endforeach
                            </select>
                    </div>
                  </div>

                  <div class="form-group row" id="sport_list_sec" @if(isset($data_obj->post_type) AND $data_obj->post_type!="Sports") style="display:none;" @endif @if(!isset($data_obj->id)) style="display:none;" @endif>
                    <label class="col-sm-3 col-form-label">{{trans('words.sports_text')}}</label>
                    <div class="col-sm-8">
                      <select name="selected_sport[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select Sports...">
                                 @foreach($sports_list as $sports_data)
                                    
                                    @if(isset($data_obj->sport_ids))
                                      <option value="{{$sports_data->id}}" @if(in_array($sports_data->id, explode(",",$data_obj->sport_ids))) selected @endif>{{$sports_data->video_title}}</option>
                                    @else

                                    <option value="{{$sports_data->id}}">{{stripslashes($sports_data->video_title)}}</option>

                                    @endif
                                 @endforeach
                            </select>
                    </div>
                  </div>

                  <div class="form-group row" id="livetv_list_sec" @if(isset($data_obj->post_type) AND $data_obj->post_type!="LiveTV") style="display:none;" @endif @if(!isset($data_obj->id)) style="display:none;" @endif>
                    <label class="col-sm-3 col-form-label">{{trans('words.live_tv')}}</label>
                    <div class="col-sm-8">
                      <select name="selected_livetv[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select Live TV...">
                                 @foreach($livetv_list as $livetv_data)
                                    
                                    @if(isset($data_obj->tv_ids))
                                      <option value="{{$livetv_data->id}}" @if(in_array($livetv_data->id, explode(",",$data_obj->tv_ids))) selected @endif>{{$livetv_data->channel_name}}</option>
                                    @else

                                    <option value="{{$livetv_data->id}}">{{stripslashes($livetv_data->channel_name)}}</option>

                                    @endif
                                 @endforeach
                            </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.status')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" @if(isset($data_obj->status) AND $data_obj->status==1) selected @endif>{{trans('words.active')}}</option>
                                <option value="0" @if(isset($data_obj->status) AND $data_obj->status==0) selected @endif>{{trans('words.inactive')}}</option>                            
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
 
@endsection