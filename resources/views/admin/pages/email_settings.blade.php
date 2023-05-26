@extends("admin.admin_app")

@section("content")

 
 
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
                

                 {!! Form::open(array('url' => array('admin/email_settings'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($settings->id) ? $settings->id : null }}">
  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.host')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="smtp_host" value="{{ isset($settings->smtp_host) ? $settings->smtp_host : null }}" class="form-control" placeholder="mail.example.com">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.port')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="smtp_port" value="{{ isset($settings->smtp_port) ? $settings->smtp_port : null }}" class="form-control" placeholder="587">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.email')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="smtp_email" value="{{ isset($settings->smtp_email) ? $settings->smtp_email : null }}" class="form-control" placeholder="info@example.com">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.password')}}*</label>
                    <div class="col-sm-8">
                      <input type="password" name="smtp_password" value="{{ isset($settings->smtp_password) ? $settings->smtp_password : null }}" class="form-control" placeholder="****">
                    </div>
                  </div>   
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.encryption')}}</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="smtp_encryption">                                                                
                            <option value="TLS" @if($settings->smtp_encryption=="TLS") selected @endif>TLS</option>
                            <option value="SSL" @if($settings->smtp_encryption=="SSL") selected @endif>SSL</option>                                  
                        </select>
                      </div>
                  </div>                    
                  <div class="form-group">
                    <div class="offset-sm-2 col-sm-9 pl-1">
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
 
 


@endsection