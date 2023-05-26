@extends('site_app')

@section('head_title', trans('words.payment_method').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
 
<style type="text/css">
#loading {
    background: url('{{ URL::asset('site_assets/images/LoaderIcon.gif') }}') no-repeat center center;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 9999999;
    opacity: 1;
}  
.payment_loading{
  opacity: 0.5;
}
</style>  

<div id="loading" style="display: none;"></div>

 
<!-- Start Breadcrumb -->
<div class="breadcrumb-section bg-xs" style="background-image: url('{{ URL::asset('site_assets/images/breadcrum-bg.jpg') }}')">
    <div class="container-fluid">
      <div class="row">
         
        <div class="col-xl-12"> 
 
        <h2>{{trans('words.payment_method')}}</h2>
        <nav id="breadcrumbs">
            <ul>
              <li><a href="{{ URL::to('/') }}" title="{{trans('words.home')}}">{{trans('words.home')}}</a></li>
              <li><a href="{{ URL::to('/dashboard') }}" title="{{trans('words.dashboard_text')}}">{{trans('words.dashboard_text')}}</a></li>
              <li>{{trans('words.payment_method')}}</li>
            </ul>
          </nav>
     </div>
      </div>
    </div>
  </div>
<!-- End Breadcrumb --> 

<!-- Start Payment Method -->
<div class="vfx-item-ptb vfx-item-info pb-3">
  <div class="container-fluid">
   <div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

       @if(Session::has('flash_message'))
          <div class="alert alert-success">
           
              {{ Session::get('flash_message') }}
          </div>
        @endif
 
 
    @if(Session::has('error_flash_message'))
      <div class="alert alert-danger">
       
          {{ Session::get('error_flash_message') }}
      </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="custom-alerts alert alert-danger fade in">
         
        {!! $message !!}
    </div>
    <?php Session::forget('error');?>
    @endif

      <div class="payment-details-area">
        <h3>{{trans('words.payment_method')}}</h3>
        <div class="select-plan-text">{{trans('words.you_have_selected')}}<span>{{$plan_info->plan_name}}</span></div>
        <p>{{trans('words.you_are_logged')}} <a href="#" title="user_email">{{Auth::User()->email}}</a> {{trans('words.if_you_would_like')}} {{trans('words.different_account_subscription')}}, <a href="{{ URL::to('logout') }}" title="logout">{{trans('words.logout')}}</a> {{trans('words.now')}}.</p>
        <div class="mt-3"><a href="{{ URL::to('membership_plan') }}" class="vfx-item-btn-danger text-uppercase">{{trans('words.change_plan')}}</a></div>
      </div>
    </div>
   </div> 
     <div class="row">
    @if(Auth::User()->phone!='')

      @if(getPaymentGatewayInfo(1)->status)
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="select-payment-method">
            <h1>{{getPaymentGatewayInfo(1)->gateway_name}}</h1>
            <h4>{{trans('words.pay_with_paypal')}}</h4>
               {!! Form::open(array('url' => 'paypal/pay','class'=>'','id'=>'','role'=>'form','method'=>'POST')) !!}
                 <input id="plan_id" type="hidden" class="form-control" name="plan_id" value="{{$plan_info->id}}">
                <input id="amount" type="hidden" class="form-control" name="amount" value="{{$plan_info->plan_price}}">
                <input id="plan_name" type="hidden" class="form-control" name="plan_name" value="{{$plan_info->plan_name}}">
                <button type="submit" class="vfx-item-btn-danger text-uppercase">{{trans('words.pay_now')}}</button>
                {!! Form::close() !!}
            </div>
        </div>
      @endif

    @if(getPaymentGatewayInfo(2)->status)  
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
          <div class="select-payment-method">
          <h1>{{getPaymentGatewayInfo(2)->gateway_name}}</h1>
          <h4>{{trans('words.pay_with_stripe')}}</h4>           
          <a href="{{ URL::to('stripe/pay') }}" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>
          <!-- <button type="button" class="vfx-item-btn-danger text-uppercase" data-bs-toggle="modal" data-bs-target="#stripeModal">{{trans('words.pay_now')}}</button> -->               
          </div>
      </div>
    @endif 
    @if(getPaymentGatewayInfo(3)->status) 
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
        <h1>{{getPaymentGatewayInfo(3)->gateway_name}}</h1>
        <h4>{{trans('words.pay_with_razorpay')}}</h4> 

        <button type="button" id="razorpayId" class="vfx-item-btn-danger text-uppercase" data-bs-toggle="modal">{{trans('words.pay_now')}}</button>    
         
        </div>
    </div>
    @endif
    @if(getPaymentGatewayInfo(4)->status)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
          <h1>{{getPaymentGatewayInfo(4)->gateway_name}}</h1>
          <h4>{{trans('words.pay_with_paystack')}}</h4>
          {!! Form::open(array('url' => 'pay','class'=>'','id'=>'','role'=>'form','method'=>'POST')) !!}          
          <input type="hidden" name="amount" value="{{number_format($plan_info->plan_price,2)}}">

          <button type="submit" class="vfx-item-btn-danger text-uppercase">{{trans('words.pay_now')}}</button>
          {!! Form::close() !!}
        </div>
    </div>
    @endif

    @if(getPaymentGatewayInfo(5)->status)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
          <h1>{{getPaymentGatewayInfo(5)->gateway_name}}</h1>
          <h4>{{trans('words.pay_with_instamojo')}}</h4>
          {!! Form::open(array('url' => 'instamojo/pay','class'=>'','id'=>'','role'=>'form','method'=>'POST')) !!}          
           
          <button type="submit" class="vfx-item-btn-danger text-uppercase">{{trans('words.pay_now')}}</button>
          {!! Form::close() !!}
        </div>
    </div>
    @endif

    @if(getPaymentGatewayInfo(6)->status)

    <?php 
    $payu_mode=getPaymentGatewayInfo(6,'mode');

    $key=getPaymentGatewayInfo(6,'payu_key'); //posted merchant key from client
    $salt=getPaymentGatewayInfo(6,'payu_salt'); // add salt here from your credentials in payUMoney dashboard
    $txnId=substr(hash('sha256', mt_rand() . microtime()), 0, 20); //posted txnid from client
    $amount=$plan_info->plan_price; 
    $productName=$plan_info->plan_name; 
    $firstName=Auth::User()->name; 
    $email=Auth::User()->email; 


    /***************** USER DEFINED VARIABLES GOES HERE ***********************/
    //all varibles posted from client
    $udf1="";
    $udf2="";
    $udf3="";
    $udf4="";
    $udf5="";

    /***************** DO NOT EDIT ***********************/
    $payhash_str = $key . '|' . $txnId . '|' .$amount  . '|' .$productName  . '|' . $firstName . '|' . $email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||'. $salt;
     

    $hash = strtolower(hash('sha512', $payhash_str));
    /***************** DO NOT EDIT ***********************/

    if($payu_mode=="live")
    {
      $payu_url="https://secure.payu.in/_payment";
    }
    else
    {
      $payu_url="https://test.payu.in/_payment";
    }

    ?>

    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
          <h1>{{getPaymentGatewayInfo(6)->gateway_name}}</h1>
          <h4>{{trans('words.pay_with_payu')}}</h4>
          {!! Form::open(array('url' => $payu_url,'class'=>'','id'=>'payu_form','role'=>'form','method'=>'POST')) !!}          
           
          <input type="hidden" name="key" value="<?php echo $key;?>" />
          <input type="hidden" name="txnid" value="<?php echo $txnId;?>" />
          <input type="hidden" name="productinfo" value="<?php echo $productName;?>" />
          <input type="hidden" name="amount" value="<?php echo $amount;?>" />
          <input type="hidden" name="email" value="<?php echo $email;?>" />
          <input type="hidden" name="firstname" value="<?php echo $firstName;?>" />
 
          <input type="hidden" name="udf1" value="" />
          <input type="hidden" name="udf2" value="" />
          <input type="hidden" name="udf3" value="" />
          <input type="hidden" name="udf4" value="" />
          <input type="hidden" name="udf5" value="" />

          <input type="hidden" name="surl" value="{{\URL::to('payu_success/')}}" />
          <input type="hidden" name="furl" value="{{\URL::to('payu_fail/')}}" />
          <input type="hidden" name="phone" value="{{Auth::User()->phone}}" />
          <input type="hidden" name="hash" value="<?php echo $hash;?>"/>

 
          <button type="submit" class="vfx-item-btn-danger text-uppercase">{{trans('words.pay_now')}}</button>
          {!! Form::close() !!}
        </div>
    </div>
    @endif


    @if(getPaymentGatewayInfo(7)->status)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
          <h1>{{getPaymentGatewayInfo(7)->gateway_name}}</h1>
          <h4>{{trans('words.pay_with_mollie')}}</h4>
          {!! Form::open(array('url' => 'mollie/pay','class'=>'','id'=>'','role'=>'form','method'=>'POST')) !!}          
           
          <button type="submit" class="vfx-item-btn-danger text-uppercase">{{trans('words.pay_now')}}</button>
          {!! Form::close() !!}
        </div>
    </div>
    @endif

    @if(getPaymentGatewayInfo(8)->status)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
          <h1>{{getPaymentGatewayInfo(8)->gateway_name}}</h1>
          <h4>{{trans('words.pay_with_flutterwave')}}</h4>
          {!! Form::open(array('url' => 'flutterwave/pay','class'=>'','id'=>'','role'=>'form','method'=>'POST')) !!}          
           
          <button type="submit" class="vfx-item-btn-danger text-uppercase">{{trans('words.pay_now')}}</button>
          {!! Form::close() !!}
        </div>
    </div>
    @endif

    @if(getPaymentGatewayInfo(9)->status)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
          <h1>{{getPaymentGatewayInfo(9)->gateway_name}}</h1>
          <h4>{{trans('words.pay_with_paytm')}}</h4>
          
          <a href="{{ URL::to('paytm/pay') }}" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>
          
        </div>
    </div>
    @endif

    @if(getPaymentGatewayInfo(10)->status)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
          <h1>{{getPaymentGatewayInfo(10)->gateway_name}}</h1>
          <h4>{{trans('words.pay_with_cashfree')}}</h4>
          
          <a href="{{ URL::to('cashfree/pay') }}" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>
          
        </div>
    </div>
    @endif

  @else
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
        <h1>{{getPaymentGatewayInfo(1)->gateway_name}}</h1>
        <h4>{{trans('words.pay_with_paypal')}}</h4> 

        <a href="Javascript:void(0);" data-bs-toggle="modal" data-bs-target="#phone_update" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>    
         
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
        <h1>{{getPaymentGatewayInfo(2)->gateway_name}}</h1>
        <h4>{{trans('words.pay_with_stripe')}}</h4> 

        <a href="Javascript:void(0);" data-bs-toggle="modal" data-bs-target="#phone_update" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>    
         
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
        <h1>{{getPaymentGatewayInfo(3)->gateway_name}}</h1>
        <h4>{{trans('words.pay_with_razorpay')}}</h4> 

        <a href="Javascript:void(0);" data-bs-toggle="modal" data-bs-target="#phone_update" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>    
         
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
        <h1>{{getPaymentGatewayInfo(4)->gateway_name}}</h1>
        <h4>{{trans('words.pay_with_paystack')}}</h4> 

        <a href="Javascript:void(0);" data-bs-toggle="modal" data-bs-target="#phone_update" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>    
         
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
        <h1>{{getPaymentGatewayInfo(5)->gateway_name}}</h1>
        <h4>{{trans('words.pay_with_instamojo')}}</h4> 

        <a href="Javascript:void(0);" data-bs-toggle="modal" data-bs-target="#phone_update" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>    
         
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
        <h1>{{getPaymentGatewayInfo(6)->gateway_name}}</h1>
        <h4>{{trans('words.pay_with_payu')}}</h4> 

        <a href="Javascript:void(0);" data-bs-toggle="modal" data-bs-target="#phone_update" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>    
         
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
        <h1>{{getPaymentGatewayInfo(7)->gateway_name}}</h1>
        <h4>{{trans('words.pay_with_mollie')}}</h4> 

        <a href="Javascript:void(0);" data-bs-toggle="modal" data-bs-target="#phone_update" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>    
         
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
        <h1>{{getPaymentGatewayInfo(8)->gateway_name}}</h1>
        <h4>{{trans('words.pay_with_flutterwave')}}</h4> 

        <a href="Javascript:void(0);" data-bs-toggle="modal" data-bs-target="#phone_update" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>    
         
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
        <h1>{{getPaymentGatewayInfo(9)->gateway_name}}</h1>
        <h4>{{trans('words.pay_with_paytm')}}</h4> 

        <a href="Javascript:void(0);" data-bs-toggle="modal" data-bs-target="#phone_update" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>    
         
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="select-payment-method">
        <h1>{{getPaymentGatewayInfo(10)->gateway_name}}</h1>
        <h4>{{trans('words.pay_with_cashfree')}}</h4> 

        <a href="Javascript:void(0);" data-bs-toggle="modal" data-bs-target="#phone_update" class="vfx-item-btn-danger text-uppercase" title="{{trans('words.pay_now')}}">{{trans('words.pay_now')}}</a>    
         
        </div>
    </div>

  @endif  

  </div>
  </div>
</div>
<!-- End Payment Method --> 

  
  <div id="phone_update" class="modal fade stripe-payment-block" role="dialog" aria-labelledby="phone_update" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        
        <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">{{trans('words.update')}} {{trans('words.phone')}}</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_trailer_pop"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body">
            <div class="edit-profile-form">  
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

            {!! Form::open(array('url' => 'phone_update','class'=>'row"','name'=>'profile_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
              <input name="" value="" type="hidden">
              
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group mb-4">
                  <label>{{trans('words.phone')}}</label>
                  <input type="number" name="phone" id="phone" value="" class="form-control" placeholder="" required>
                </div>
              </div>
             
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group d-flex align-items-end flex-column mt-30">
                  <button type="submit" class="vfx-item-btn-danger text-uppercase">{{trans('words.update')}}</button>
                </div>   
              </div>           
              
            {!! Form::close() !!}

          </div>  
    
        </div>
        
      </div>

    </div>
   
  </div> 

<script src="{{ URL::asset('site_assets/js/jquery-3.3.1.min.js') }}"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<script type="text/javascript">
  $("#razorpayId").click(function(e) {
    e.preventDefault();

    $('.vfx-item-ptb').addClass('payment_loading');
    $("#loading").show();

    $.ajax({
        type: "POST",
        url: "{{ URL::to('razorpay_get_order_id') }}",
        data: { 
            id: $(this).val(), // < note use of 'this' here
            _token: "{{ csrf_token() }}" 
        },
        success: function(result) {
            //$('#paymentWidget').attr("data-order_id",'111');
            
            //alert(result);
            $('.vfx-item-ptb').removeClass('payment_loading');
            $("#loading").hide();

            var options = {
                      "key": "{{getcong('razorpay_key')}}", // Enter the Key ID generated from the Dashboard
                      "amount": "{{$plan_info->plan_price}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                      "currency": "INR",
                      "name": "{{getcong('site_name')}}",
                      "description": "{{$plan_info->plan_name}}",
                      "image": "{{ URL::asset('/'.getcong('site_logo')) }}",
                      "order_id": result, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                      "callback_url": "{{ URL::to('razorpay-success') }}",
                      "prefill": {
                          "name": "{{Auth::user()->name}}",
                          "email": "{{Auth::user()->email}}",
                          "contact": "{{Auth::user()->phone}}"
                      },                       
                      "theme": {
                          "color": "#3399cc"
                      }
                  };

            var rzp1 = new Razorpay(options);

            rzp1.open();  

            //alert(result);
        },
        error: function(result) {
            alert('error');
        }
    });
});
</script>

<script type="text/javascript">
 
 $('#open_phone_update').on('click', function(e) {    
    $('#phone_update').modal('show');
 }); 

</script>
 
@endsection