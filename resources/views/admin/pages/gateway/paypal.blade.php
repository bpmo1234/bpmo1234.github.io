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
                      <a href="{{ URL::to('admin/payment_gateway') }}"><h4 class="header-title m-t-0 m-b-30 text-primary pull-left" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> {{trans('words.back')}}</h4></a>
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
                

                 {!! Form::open(array('url' => array('admin/payment_gateway/paypal'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($post_info->id) ? $post_info->id : null }}">
  
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.title')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="gateway_name" value="{{ isset($post_info->gateway_name) ? stripslashes($post_info->gateway_name) : null }}" class="form-control">
                    </div>
                  </div>
                   
                   <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.payment_mode')}}</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="mode">                                
                                <option value="sandbox" @if($gateway_info->mode=="sandbox") selected @endif>Sandbox</option>
                                <option value="live" @if($gateway_info->mode=="live") selected @endif>Live</option>
                                              
                            </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.paypal_client_id')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="paypal_client_id" value="{{ isset($gateway_info->paypal_client_id) ? stripslashes($gateway_info->paypal_client_id) : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.paypal_secret')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="paypal_secret" value="{{ isset($gateway_info->paypal_secret) ? stripslashes($gateway_info->paypal_secret) : null }}" class="form-control">
                    </div>
                  </div>
                  <hr/>
                  <h5 class="mb-4" style="color: #f9f9f9;"><b>Braintree Settings for App</b></h5>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Braintree Merchant ID</label>
                    <div class="col-sm-8">
                      <input type="text" name="braintree_merchant_id" value="{{ isset($gateway_info->braintree_merchant_id) ? stripslashes($gateway_info->braintree_merchant_id) : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Braintree Public Key</label>
                    <div class="col-sm-8">
                      <input type="text" name="braintree_public_key" value="{{ isset($gateway_info->braintree_public_key) ? stripslashes($gateway_info->braintree_public_key) : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Braintree Private Key</label>
                    <div class="col-sm-8">
                      <input type="text" name="braintree_private_key" value="{{ isset($gateway_info->braintree_private_key) ? stripslashes($gateway_info->braintree_private_key) : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Braintree Merchant Account ID</label>
                    <div class="col-sm-8">
                      <input type="text" name="braintree_merchant_account_id" value="{{ isset($gateway_info->braintree_merchant_account_id) ? stripslashes($gateway_info->braintree_merchant_account_id) : null }}" class="form-control">
                    </div>
                  </div>

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
                    <div class="offset-sm-3 col-sm-9 pl-1">
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