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
                

                 {!! Form::open(array('url' => array('admin/subscription_plan/add_edit_plan'),'class'=>'form-horizontal','name'=>'slider_form','id'=>'slider_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($plan_info->id) ? $plan_info->id : null }}">
  
                   
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.plan_name')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="plan_name" value="{{ isset($plan_info->plan_name) ? $plan_info->plan_name : null }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.duration')}}*</label>
                    <div class="col-sm-4">
                      <input type="number" name="plan_duration" value="{{ isset($plan_info->plan_duration) ? $plan_info->plan_duration : null }}" class="form-control" placeholder="7">
                    </div>
                    <div class="col-sm-4">
                        <select name="plan_duration_type" class="form-control">
                         <option value="1" @if(isset($plan_info->plan_duration_type) AND $plan_info->plan_duration_type=='1') selected @endif>Day(s)</option>
                         <option value="30" @if(isset($plan_info->plan_duration_type) AND $plan_info->plan_duration_type=='30') selected @endif>Month(s)</option>
                         <option value="365" @if(isset($plan_info->plan_duration_type) AND $plan_info->plan_duration_type=='365') selected @endif>Year(s)</option>
                        </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.price')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="plan_price" value="{{ isset($plan_info->plan_price) ? $plan_info->plan_price : null }}" class="form-control" placeholder="9.99">
                      <small id="emailHelp" class="form-text text-muted mb-2">The minimum amount for processing a transaction through Stripe in USD is $0.50. For more info <a href="https://support.chargebee.com/support/solutions/articles/228511-transaction-amount-limit-in-stripe" target="_blank">click here</a></small>
                    </div>
                  </div>   

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{trans('words.status')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" @if(isset($plan_info->status) AND $plan_info->status==1) selected @endif>{{trans('words.active')}}</option>
                                <option value="0" @if(isset($plan_info->status) AND $plan_info->status==0) selected @endif>{{trans('words.inactive')}}</option>                            
                            </select>
                      </div>
                  </div>

                  <div class="form-group row mb-0">
                     
                  </div>

                  <div class="form-group">
                    <div class="offset-sm-2 col-sm-9 pl-1">
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