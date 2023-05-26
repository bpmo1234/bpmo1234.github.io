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
                      <a href="{{ URL::to('admin/ad_list') }}"><h4 class="header-title m-t-0 m-b-30 text-primary pull-left" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> {{trans('words.back')}}</h4></a>
                 </div>                  
                 <div class="col-sm-6">
                    &nbsp;
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
                

                 {!! Form::open(array('url' => array('admin/ad_list/startapp'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($post_info->id) ? $post_info->id : null }}">
  
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.title')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="ads_name" value="{{ isset($post_info->ads_name) ? stripslashes($post_info->ads_name) : null }}" class="form-control">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Startapp Publisher ID</label>
                    <div class="col-sm-8">
                      <input type="text" name="publisher_id" value="{{ isset($ads_info->publisher_id) ? stripslashes($ads_info->publisher_id) : null }}" class="form-control">
                    </div>
                  </div>
                  <hr/>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Banner ON/OFF</label>
                    <div class="col-sm-8">

                           <input type="checkbox" name="banner_on_off" value="1" data-plugin="switchery" data-color="#28a745" data-size="small" @if(isset($ads_info->banner_on_off) && $ads_info->banner_on_off==1) {{ 'checked' }} @endif />                                         
  
                    </div>
                  </div>

                  <hr/>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Interstitial ON/OFF</label>
                    <div class="col-sm-8">

                      <input type="checkbox" name="interstitial_on_off" value="1" data-plugin="switchery" data-color="#28a745" data-size="small" @if(isset($ads_info->interstitial_on_off) && $ads_info->interstitial_on_off==1) {{ 'checked' }} @endif />
 
                       
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Interstitial Ad Clicks</label>
                    <div class="col-sm-8">
                      <input type="text" name="interstitial_clicks" value="{{ isset($ads_info->interstitial_clicks) ? stripslashes($ads_info->interstitial_clicks) : null }}" class="form-control">
                    </div>
                  </div>
                  <hr/>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Native ON/OFF</label>
                    <div class="col-sm-8">

                      <input type="checkbox" name="native_on_off" value="1" data-plugin="switchery" data-color="#28a745" data-size="small" @if(isset($ads_info->native_on_off) && $ads_info->native_on_off==1) {{ 'checked' }} @endif />

                       
                    </div>
                  </div>
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Native Ad Position</label>
                    <div class="col-sm-8">
                      <input type="text" name="native_position" value="{{ isset($ads_info->native_position) ? stripslashes($ads_info->native_position) : null }}" class="form-control">
                    </div>
                  </div>
                  
                  <hr/>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.status')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" @if(isset($post_info->status) AND $post_info->status==1) selected @endif>{{trans('words.active')}}</option>
                                <option value="0" @if(isset($post_info->status) AND $post_info->status==0) selected @endif>{{trans('words.inactive')}}</option>                            
                            </select>
                      </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> {{trans('words.save')}}</button>                      
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