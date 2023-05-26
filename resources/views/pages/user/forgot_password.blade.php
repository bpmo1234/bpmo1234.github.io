@extends('site_app')

@section('head_title', trans('words.forgot_password').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 <!-- Forgot Password Wrapper Start -->
<div id="main-wrapper">
  <div class="container-fluid px-0 m-0 h-100 mx-auto">
    <div class="row g-0 min-vh-100 overflow-hidden"> 
      <!-- Welcome Text -->
      <div class="col-md-12">
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('{{ URL::asset('site_assets/images/login-signup-bg-img.jpg') }}');"></div>
          <div class="hero-content mx-auto w-100 h-100 d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-12 col-lg-5 col-xl-5 mx-auto">
                <div class="logo mt-40 mb-20 mb-md-0 justify-content-center d-flex text-center"> 
                  @if(getcong('site_logo'))                 
                    <a href="{{ URL::to('/') }}" title="logo" class="d-flex"><img src="{{ URL::asset('/'.getcong('site_logo')) }}" alt="logo" title="logo" class="login-signup-logo"></a>
                  @else
                    <a href="{{ URL::to('/') }}" title="logo" class="d-flex"><img src="{{ URL::asset('site_assets/images/logo.png') }}" alt="logo" title="logo" class="login-signup-logo"></a>                          
                  @endif
                </div>
              </div>
            </div>
            <!-- Login Form -->
        <div class="col-lg-4 col-md-6 col-sm-6 mx-auto d-flex align-items-center login-item-block">
        <div class="container login-part">
          <div class="row">
          <div class="col-12 col-lg-12 col-xl-12 mx-auto">
            <h2 class="form-title-item mb-4">{{trans('words.forgot_password')}}?</h2>

            <div class="message">                                                 
                @if (count($errors) > 0)
                    <div class="alert alert-danger">                         
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif   

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
            </div>

            {!! Form::open(array('url' => 'password/email','class'=>'','id'=>'forget_pass_form','role'=>'form')) !!}
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" required placeholder="{{trans('words.email')}}">
            </div>                
            <button class="btn-submit btn-block my-4 mb-4 mt-1" type="submit">{{trans('words.reset_password')}}</button>
            {!! Form::close() !!} 
            <p class="text-3 text-center mb-0">{{trans('words.dont_have_account')}} <a href="{{ url('signup') }}" class="btn-link" title="signup">{{trans('words.sign_up')}}</a></p>
          </div>
          </div>
        </div>
        </div>
        <!-- Login Form End --> 
          </div>
        </div>
      </div>
      <!-- Welcome Text End -->       
    </div>
  </div>
</div>
<!-- End Forgot Password Wrapper -->  
 
@endsection