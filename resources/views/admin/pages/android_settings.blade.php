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
                

                 {!! Form::open(array('url' => array('admin/android_settings'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($settings->id) ? $settings->id : null }}">  
                
                <div class="row">

                 <div class="col-md-6"> 

                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;">{{trans('words.android_app_settings')}}</h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.android_app_name')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="app_name" value="{{ isset($settings->app_name) ? stripslashes($settings->app_name) : null }}" class="form-control">
                    </div>
                  </div>
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.android_app_logo')}}*</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="text" name="app_logo" id="app_logo" value="{{ isset($settings->app_logo) ? $settings->app_logo : null }}" class="form-control" readonly>
                        <div class="input-group-append">                           
                            <button type="button" class="btn btn-dark waves-effect waves-light popup_selector" data-input="app_logo" data-preview="holder_thumb" data-inputid="app_logo">Select</button>                        
                        </div>
                      </div>
                      <small id="emailHelp" class="form-text text-muted">({{trans('words.recommended_resolution')}} : 180x50)</small>
                      <div id="app_logo_holder" style="margin-top:5px;max-height:100px;"></div>                     
                    </div>
                  </div>                 

                  @if(isset($settings->app_logo)) 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">                                                                         
                      <img src="{{URL::to('/'.$settings->app_logo)}}" alt="video image" class="img-thumbnail" width="160">                                               
                    </div>
                  </div>
                  @endif
 
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.android_app_email')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="app_email" value="{{ isset($settings->app_email) ? $settings->app_email : null }}" class="form-control">
                    </div>
                  </div>                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.android_app_company')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="app_company" value="{{ isset($settings->app_company) ? $settings->app_company : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.android_app_website')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="app_website" value="{{ isset($settings->app_website) ? $settings->app_website : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.android_app_contact')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="app_contact" value="{{ isset($settings->app_contact) ? $settings->app_contact : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.android_app_version')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="app_version" value="{{ isset($settings->app_version) ? $settings->app_version : null }}" class="form-control">
                    </div>
                  </div>

                  <hr>                  
                  <div class="form-group row mb-0">
                    <label class="col-sm-12 col-form-label">{{trans('words.about_us')}}</label>
                    <div class="col-sm-12">
                      <div class="card-box pl-0 description_box">
                      <textarea id="elm1" name="app_about">{{ isset($settings->app_about) ? stripslashes($settings->app_about) : null }}</textarea>
                    </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-12 col-form-label">{{trans('words.privacy_policy')}}</label>
                    <div class="col-sm-12">
                      <div class="card-box pl-0 description_box">
                      <textarea id="elm1_privacy" name="app_privacy" class="elm1_editor">{{ isset($settings->app_privacy) ? stripslashes($settings->app_privacy) : null }}</textarea>
                    </div>
                    </div>
                  </div>
                 

                </div>
                <div class="col-md-6">

                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;">{{trans('words.android_oneSignal_settings')}}</h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.android_oneSignal_app_id')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="onesignal_app_id" value="{{ isset($settings->onesignal_app_id) ? $settings->onesignal_app_id : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.android_oneSignal_rest_key')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="onesignal_rest_key" value="{{ isset($settings->onesignal_rest_key) ? $settings->onesignal_rest_key : null }}" class="form-control">
                    </div>
                  </div>
                  <hr/>
               
                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;">{{trans('words.app_update')}}</h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.app_update_popup')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="app_update_hide_show">                               
                                <option value="true" @if(isset($settings->app_update_hide_show) AND $settings->app_update_hide_show=='true') selected @endif>True</option>
                                <option value="false" @if(isset($settings->app_update_hide_show) AND $settings->app_update_hide_show=='false') selected @endif>False</option>                            
                            </select>
                      </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.app_update_new_version')}}</label>
                    <div class="col-sm-8">
                      <input type="number" name="app_update_version_code" value="{{ isset($settings->app_update_version_code) ? $settings->app_update_version_code : null }}" class="form-control" placeholder="1" min="1">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.description')}}</label>
                    <div class="col-sm-8">
                      <textarea name="app_update_desc" class="form-control" placeholder="Please update new app">{{ isset($settings->app_update_desc) ? stripslashes($settings->app_update_desc) : null }}</textarea>
                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.app_update_link')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="app_update_link" value="{{ isset($settings->app_update_link) ? $settings->app_update_link : null }}" class="form-control" placeholder="https://play.google.com/store/apps/details?id=com.posts365.brandingapp">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.app_update_cancel_option')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="app_update_cancel_option">                               
                                <option value="true" @if(isset($settings->app_update_cancel_option) AND $settings->app_update_cancel_option=='true') selected @endif>True</option>
                                <option value="false" @if(isset($settings->app_update_cancel_option) AND $settings->app_update_cancel_option=='false') selected @endif>False</option>                            
                            </select>
                      </div>
                  </div>

                   <div class="form-group row mb-0">
                    <label class="col-sm-12 col-form-label">{{trans('words.terms_of_us')}}</label>
                    <div class="col-sm-12">
                      <div class="card-box pl-0 description_box">
                      <textarea id="elm1_terms" name="app_terms" class="elm1_editor">{{ isset($settings->app_terms) ? stripslashes($settings->app_terms) : null }}</textarea>
                    </div>
                    </div>
                  </div> 
                  
                  <div class="form-group">
                    <div class="offset-sm-8 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> {{trans('words.save_settings')}} </button>                      
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

    if(requestingField=="app_logo")
    {
      var target_preview = $('#app_logo_holder');
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