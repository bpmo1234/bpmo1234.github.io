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
                      <a href="{{ URL::to('admin/season') }}"><h4 class="header-title m-t-0 m-b-30 text-primary pull-left" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> {{trans('words.back')}}</h4></a>
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
                

                 {!! Form::open(array('url' => array('admin/season/add_edit_season'),'class'=>'form-horizontal','name'=>'season_form','id'=>'season_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($season_info->id) ? $season_info->id : null }}">
                  <div class="row">

                  <div class="col-md-6"> 
                    <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;">{{trans('words.season_info')}}</h4>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.shows_text')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="series">
                                <option value="">{{trans('words.select_show')}}</option>
                                @foreach($series_list as $series_data)
                                  <option value="{{$series_data->id}}" @if(isset($season_info->id) && $series_data->id==$season_info->series_id) selected @endif>{{$series_data->series_name}}</option>
                                @endforeach
                            </select>
                      </div>
                  </div> 
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.season_title')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="season_name" value="{{ isset($season_info->season_name) ? stripslashes($season_info->season_name) : null }}" class="form-control">
                    </div>
                  </div>
           
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.season_poster')}}</label>
                    <div class="col-sm-8">                       
                      <div class="input-group">
                        <input type="text" name="season_poster" id="season_poster" value="{{ isset($season_info->season_poster) ? $season_info->season_poster : null }}" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light popup_selector" data-input="season_poster" data-preview="holder_thumb" data-inputid="season_poster">Select</button>                      
                        </div>
                      </div>
                      <small id="emailHelp" class="form-text text-muted">({{trans('words.recommended_resolution')}} : 800x450)</small>
                      <div id="image_holder" style="margin-top:5px;max-height:100px;"></div>                                          
                    </div>
                  </div>

                  @if(isset($season_info->season_poster)) 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                      <img src="{{URL::to('/'.$season_info->season_poster)}}" alt="video image" class="img-thumbnail" width="200"> 
                    </div>
                  </div>
                  @endif

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.trailer_url')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="trailer_url" id="trailer_url" value="{{ isset($season_info->trailer_url) ? stripslashes($season_info->trailer_url) : old('trailer_url') }}" class="form-control">
                      <small id="emailHelp" class="form-text text-muted">(Supported : MP4)</small>
                    </div>                    
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.status')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" @if(isset($season_info->status) AND $season_info->status==1) selected @endif>{{trans('words.active')}}</option>
                                <option value="0" @if(isset($season_info->status) AND $season_info->status==0) selected @endif>{{trans('words.inactive')}}</option>                            
                            </select>
                      </div>
                  </div>
                </div>
                <div class="col-md-6"> 
                   <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;">{{trans('words.seo')}}</h4>

                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.seo_title')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="seo_title" id="seo_title" value="{{ isset($season_info->seo_title) ? stripslashes($season_info->seo_title) : old('seo_title') }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.seo_desc')}}</label>
                    <div class="col-sm-8">                       
                      <textarea name="seo_description" id="seo_description" class="form-control">{{ isset($season_info->seo_description) ? stripslashes($season_info->seo_description) : old('seo_description') }}</textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.seo_keyword')}}</label>
                    <div class="col-sm-8">                      
                      <textarea name="seo_keyword" id="seo_keyword" class="form-control">{{ isset($season_info->seo_keyword) ? stripslashes($season_info->seo_keyword) : old('seo_keyword') }}</textarea>
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

    if(requestingField=="season_poster")
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