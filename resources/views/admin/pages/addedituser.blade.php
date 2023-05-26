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
                

                 {!! Form::open(array('url' => array('admin/users/add_edit_user'),'class'=>'form-horizontal','name'=>'user_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($user->id) ? $user->id : null }}">
 
                   
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.name')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="name" value="{{ isset($user->name) ? $user->name : null }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.email')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="email" value="{{ isset($user->email) ? $user->email : null }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.password')}}</label>
                    <div class="col-sm-8">
                      <input type="password" name="password" value="" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.phone')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="phone" value="{{ isset($user->phone) ? $user->phone : null }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.address')}}</label>
                    <div class="col-sm-8">
                       
                      <textarea name="user_address" class="form-control">{{ isset($user->user_address) ? $user->user_address : null }}</textarea>
                    </div>
                  </div>
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.image')}}</label>
                    <div class="col-sm-8">
                      <input type="file" name="user_image" class="form-control">                     
                    </div>
                  </div>

                  @if(isset($user->user_image)) 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                                                                         
                           <img src="{{URL::to('upload/'.$user->user_image)}}" alt="video image" class="img-thumbnail" width="250">                        
                       
                    </div>
                  </div>
                  @endif
                  
                  <div class="form-group row">
                    <label class="control-label col-sm-3">{{trans('words.expiry_date')}}</label>
                    <div class="col-sm-8">
                      <div class="input-group"> 
                        <input type="text" id="datepicker-autoclose" name="exp_date" value="{{ isset($user->exp_date) ? date('m/d/Y',$user->exp_date) : null }}" class="form-control" placeholder="mm/dd/yyyy">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="ti-calendar"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.subscription_plan')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="subscription_plan">                               
                                @foreach($plan_list as $plan_data)
                                  <option value="{{$plan_data->id}}" @if(isset($user->plan_id) AND $user->plan_id==$plan_data->id) selected @endif>{{$plan_data->plan_name}}</option>
                                @endforeach                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.status')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" @if(isset($user->status) AND $user->status==1) selected @endif>{{trans('words.active')}}</option>
                                <option value="0" @if(isset($user->status) AND $user->status==0) selected @endif>{{trans('words.inactive')}}</option>                            
                            </select>
                      </div>
                  </div>

                  <div class="form-group row">
                     
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