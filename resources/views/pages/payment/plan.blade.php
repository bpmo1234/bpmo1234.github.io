@extends('site_app')

@section('head_title', trans('words.subscription_plan').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<!-- Start Breadcrumb -->
<div class="breadcrumb-section bg-xs" style="background-image: url('{{ URL::asset('site_assets/images/breadcrum-bg.jpg') }}')">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12"> 
        <h2>{{trans('words.subscription_plan')}} </h2>
        
        <nav id="breadcrumbs">
            <ul>
              <li><a href="{{ URL::to('/') }}" title="{{trans('words.home')}}">{{trans('words.home')}}</a></li>
               <li>{{trans('words.subscription_plan')}}</li>

            </ul>
          </nav>
     </div>
      </div>
    </div>
  </div>
<!-- End Breadcrumb --> 

 <!-- Start Membership Plan Page -->
<div class="vfx-item-ptb vfx-item-info">
  <div class="container-fluid">
     <div class="row">
        
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">             
                {!! $message !!}
            </div>

            <?php Session::forget('success');?>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">            
                {!! $message !!}
            </div>
            <?php Session::forget('error');?>
            @endif
          </div>
        </div>

        @foreach($plan_list as $plan_data)
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="membership-plan-list">
            <h3>{{$plan_data->plan_name}}</h3>
            <h1><span>{{html_entity_decode(getCurrencySymbols(getcong('currency_code')))}}</span><?php echo htmlspecialchars_decode(plan_decimal_price($plan_data->plan_price));?></h1>
            <p></p>
            <h4>{{ App\SubscriptionPlan::getPlanDuration($plan_data->id) }}</h4>
            <a href="{{ URL::to('payment_method/'.$plan_data->id) }}" class="vfx-item-btn-danger text-uppercase mb-30" title="plan">{{trans('words.select_plan')}}</a>
          </div>
        </div>
        @endforeach  
      
      </div>
    <div class="row">
      <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
            <div class="apply-coupon-code">
            <h2>{{trans('words.have_coupon_code')}}</h2>
            {!! Form::open(array('url' => 'apply_coupon_code','class'=>'','id'=>'apply_coupon','role'=>'form')) !!}
 

              <div class="apply-now-item">
                 
                  <input type="text" name="coupon_code" id="enterCode" class="form-control" placeholder="" required="">
                  <button class="vfx-item-btn-danger text-uppercase" type="submit">{{trans('words.apply_coupon')}}</button>
                 
              </div>
            {!! Form::close() !!}  
          </div>
        </div>    
     </div>
  </div>
</div>
<!-- End Membership Plan Page -->
 
@endsection