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
               
                <div class="row">

                 <div class="col-md-6"> 
 
                 {!! Form::open(array('url' => array('admin/general_settings'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($settings->id) ? $settings->id : null }}">
                  
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.site_name')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="site_name" value="{{ isset($settings->site_name) ? stripslashes($settings->site_name) : null }}" class="form-control">
                    </div>
                  </div>
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.site_logo')}}*</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="text" name="site_logo" id="site_logo" value="{{ isset($settings->site_logo) ? $settings->site_logo : null }}" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light popup_selector" data-input="site_logo" data-preview="holder_logo" data-inputid="site_logo">Select</button>                        
                        </div>
                      </div>
                      <small id="emailHelp" class="form-text text-muted">({{trans('words.recommended_resolution')}} : 180x50)</small>
                      <div id="site_logo_holder" style="margin-top:5px;max-height:100px;"></div>                     
                    </div>
                  </div>                 

                  @if(isset($settings->site_logo)) 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">                                                                         
                      <img src="{{URL::to('/'.$settings->site_logo)}}" alt="video image" class="img-thumbnail" width="160">                                               
                    </div>
                  </div>
                  @endif

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.site_favicon')}}*</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="text" name="site_favicon" id="site_favicon" value="{{ isset($settings->site_favicon) ? $settings->site_favicon : null }}" class="form-control" readonly>
                        <div class="input-group-append">                           
                            <button type="button" class="btn btn-dark waves-effect waves-light popup_selector" data-input="site_favicon" data-preview="holder_favicon" data-inputid="site_favicon">Select</button>                        
                        </div>
                      </div>
                      <small id="emailHelp" class="form-text text-muted">({{trans('words.recommended_resolution')}} : 16x16, 32X32)</small>
                      <div id="site_favicon_holder" style="margin-top:5px;max-height:100px;"></div>                     
                    </div>
                  </div>

                  @if(isset($settings->site_favicon)) 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">                                                                         
                      <img src="{{URL::to('/'.$settings->site_favicon)}}" alt="video image" class="img-thumbnail" width="32">                                               
                    </div>
                  </div>
                  @endif
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.email')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="site_email" value="{{ isset($settings->site_email) ? $settings->site_email : null }}" class="form-control">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.description')}}</label>
                    <div class="col-sm-8">
                      <textarea name="site_description" class="form-control">{{ isset($settings->site_description) ? stripslashes($settings->site_description) : null }}</textarea>
                       
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.site_keywords')}}</label>
                    <div class="col-sm-8">
                      <textarea name="site_keywords" class="form-control">{{ isset($settings->site_keywords) ? stripslashes($settings->site_keywords) : null }}</textarea>
                       
                    </div>
                  </div>

                  <div class="form-group row">
                     
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Header Code</label>
                    <div class="col-sm-8">
                      <textarea name="site_header_code" class="form-control" placeholder="Custom CSS OR JS script">{{ isset($settings->site_header_code) ? stripslashes($settings->site_header_code) : null }}</textarea>
                       
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Footer Code</label>
                    <div class="col-sm-8">
                      <textarea name="site_footer_code" class="form-control" placeholder="Custom CSS OR JS script">{{ isset($settings->site_footer_code) ? stripslashes($settings->site_footer_code) : null }}</textarea>
                       
                    </div>
                  </div>
                  
                  <div class="form-group row" id="omdbapi_id">
                    <label class="col-sm-3 col-form-label">{{trans('words.site_copyright_text')}}</label>
                    <div class="col-sm-8">
                      <textarea name="site_copyright" class="form-control">{{ isset($settings->site_copyright) ? stripslashes($settings->site_copyright) : null }}</textarea>                      
                    </div>
                  </div>

                </div>
                  <div class="col-md-6">   
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.default_timezone')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="time_zone">                               
                                @foreach(generate_timezone_list() as $key=>$tz_data)
                                <option value="{{$key}}" @if($settings->time_zone==$key) selected @endif>{{$tz_data}}</option>
                                @endforeach                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.default_language')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="default_language">                               
                                 
                                <option value="en" @if($settings->default_language=="en") selected @endif>English</option>
                                <option value="es" @if($settings->default_language=="es") selected @endif>Spanish</option>
                                <option value="fr" @if($settings->default_language=="fr") selected @endif>French</option>
                                <option value="pt" @if($settings->default_language=="pt") selected @endif>Portuguese</option>             
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.site_style')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="styling">                               
                                 
                                <option value="style-one" @if($settings->styling=="style-one") selected @endif>Style 1</option>
                                <option value="style-two" @if($settings->styling=="style-two") selected @endif>Style 2</option>
                                <option value="style-three" @if($settings->styling=="style-three") selected @endif>Style 3</option>
                                <option value="style-four" @if($settings->styling=="style-four") selected @endif>Style 4</option>
                                <option value="style-five" @if($settings->styling=="style-five") selected @endif>Style 5</option>
                                <option value="style-six" @if($settings->styling=="style-six") selected @endif>Style 6</option>
                                  
                            </select>
                      </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.currency_code')}}* </label>
                    <div class="col-sm-8">                       
                      <select name="currency_code" id="currency_code" class="form-control select2">
                        @foreach(getCurrencyList() as $index => $currency_list)
                        <option value="{{$index}}" @if($settings->currency_code==$index) selected @endif>{{$index}} - {{$currency_list}}</option>
                        @endforeach
                          
                      </select>

                    </div>
                  </div> 
                  <hr/>
                  <h4 class="m-t-0 header-title">OMDb API</h4>
                  <br/>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">API Key</label>
                    <div class="col-sm-8">
                      <input type="text" name="omdb_api_key" value="{{ isset($settings->omdb_api_key) ? $settings->omdb_api_key : null }}" class="form-control">
                      <small id="emailHelp" class="form-text text-muted pt-1">If you don't know <a href="http://www.omdbapi.com/apikey.aspx" target="_blank">click here</a></small>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">External Libraries From</label>
                      <div class="col-sm-8">
                          <select class="form-control" name="external_css_js">                                                              
                            <option value="LOCAL" @if($settings->external_css_js=="LOCAL") selected @endif>LOCAL</option>
                            <option value="CDN" @if($settings->external_css_js=="CDN") selected @endif>CDN (recommended)</option>                              
                          </select>
                          <small id="emailHelp" class="form-text text-muted pt-1">LOCAL: Web related libraries call from server <br/> CDN: CDN for web related libraries to speed up your websites! </small>
                      </div>
                  </div>

                  <hr/>
                  <h4 class="m-t-0 header-title">{{trans('words.footer_icon')}}</h4>

                  <br/>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Facebook URL</label>
                    <div class="col-sm-8">
                      <input type="text" name="footer_fb_link" value="{{ isset($settings->footer_fb_link) ? stripslashes($settings->footer_fb_link) : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Twitter URL</label>
                    <div class="col-sm-8">
                      <input type="text" name="footer_twitter_link" value="{{ isset($settings->footer_twitter_link) ? stripslashes($settings->footer_twitter_link) : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Instagram URL</label>
                    <div class="col-sm-8">
                      <input type="text" name="footer_instagram_link" value="{{ isset($settings->footer_instagram_link) ? stripslashes($settings->footer_instagram_link) : null }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Google Play URL</label>
                    <div class="col-sm-8">
                      <input type="text" name="footer_google_play_link" value="{{ isset($settings->footer_google_play_link) ? stripslashes($settings->footer_google_play_link) : null }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Apple Store URL</label>
                    <div class="col-sm-8">
                      <input type="text" name="footer_apple_store_link" value="{{ isset($settings->footer_apple_store_link) ? stripslashes($settings->footer_apple_store_link) : null }}" class="form-control">
                    </div>
                  </div>


                </div>
                
            </div>      

                  
                  <hr/>
                  <h4 class="m-t-0 mb-4 header-title">{{trans('words.gdpr_cookie_consent')}}</h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.gdpr_cookie_title')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="gdpr_cookie_title" value="{{ isset($settings->gdpr_cookie_title) ? stripslashes($settings->gdpr_cookie_title) : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.gdpr_cookie_text')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="gdpr_cookie_text" value="{{ isset($settings->gdpr_cookie_text) ? stripslashes($settings->gdpr_cookie_text) : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.gdpr_cookie_url')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="gdpr_cookie_url" value="{{ isset($settings->gdpr_cookie_url) ? stripslashes($settings->gdpr_cookie_url) : null }}" class="form-control">
                    </div>
                  </div>

                  <hr/>
                  <h4 class="m-t-0 mb-4 header-title">Envato Buyer Details</h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Envato Username</label>
                    <div class="col-sm-8">
                      <input type="text" name="envato_buyer_name" value="{{ isset($settings->envato_buyer_name) ? stripslashes($settings->envato_buyer_name) : null }}" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Buyer Purchase Code</label>
                    <div class="col-sm-8">
                      <input type="text" name="envato_purchase_code" value="{{ isset($settings->envato_purchase_code) ? stripslashes($settings->envato_purchase_code) : null }}" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9 pl-1">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> {{trans('words.save_settings')}} </button>                      
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

    if(requestingField=="site_logo")
    {
      var target_preview = $('#site_logo_holder');
      target_preview.html('');
      target_preview.append(
              $('<img>').css('height', '5rem').attr('src', elfinderUrl + filePath.replace(/\\/g,"/"))
            );
      target_preview.trigger('change');
    }

    if(requestingField=="site_favicon")
    {
      var target_preview = $('#site_favicon_holder');
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