<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="{{getcong('site_name')}} Admin">
  <meta name="author" content="Viaviwebtech">
  
  @if(getcong('site_favicon'))
  <link rel="shortcut icon" href="{{ URL::asset('/'.getcong('site_favicon')) }}">
  @else
  <link rel="shortcut icon" href="{{ URL::asset('site_assets/images/favicon.png') }}">
  @endif
  <title>{{getcong('site_name')}} Admin</title>

  <!-- App css -->
  @if(getcong('external_css_js')=="CDN")

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('admin_assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('admin_assets/css/style.css') }}" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <script src="{{ URL::asset('admin_assets/js/modernizr.min.js') }}"></script>
  @else
  <link href="{{ URL::asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('admin_assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('admin_assets/css/style.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('admin_assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ URL::asset('admin_assets/js/modernizr.min.js') }}"></script>
  @endif
  
</head>

<body>
  <div class="account-pages"></div>
  <div class="clearfix"></div>
  <div class="wrapper-page">
    <div class="text-center">
       
      @if(getcong('site_logo'))
        <a class="navbar-brand" href="{{ URL::to('/') }}" target="_blank"> <img src="{{ URL::asset('/'.getcong('site_logo')) }}" alt="Site Logo" width="150"> </a> 
      @else
        <a class="navbar-brand" href="{{ URL::to('/') }}" target="_blank"> <img src="{{ URL::asset('site_assets/images/logo.png') }}" alt="Site Logo"> </a>          
      @endif
     
    </div>
    <div class="m-t-20 card-box">
      <div class="text-center">
        <h3 class="text-uppercase font-bold m-b-0" style="color: #f9f9f9;">{{trans('words.sign_in')}}</h3>
 
        <div class="message">                                                 
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
        </div>

      </div>
      <div class="p-10">
         {!! Form::open(array('url' => 'admin/login','class'=>'form-horizontal m-t-20','id'=>'loginform','role'=>'form')) !!}    
          <div class="form-group">
            <div class="col-xs-12">
              <input name="email" class="form-control" type="text" required placeholder="{{trans('words.email')}}">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input name="password" class="form-control" type="password" required placeholder="{{trans('words.password')}}">
            </div>
          </div>
          <div class="form-group ">
            <div class="col-xs-12">
              <div class="checkbox checkbox-custom">
                <input id="checkbox-signup" type="checkbox" name="remember" value="remember">
                <label for="checkbox-signup"> {{trans('words.remember_me')}} </label>
              </div>
            </div>
          </div>
          <div class="form-group text-center m-t-10">
            <div class="col-xs-12">
              <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">{{trans('words.login_text')}}</button>
            </div>
          </div>
          <div class="form-group m-t-20 m-b-0 text-center">
            <div class="col-sm-12"> <a href="{{ URL::to('password/email') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i>
                {{trans('words.forgot_pass_text')}}</a> </div>
          </div>
           
        {!! Form::close() !!} 
      </div>
    </div>
  </div>

  @if(getcong('external_css_js')=="CDN")
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="{{ URL::asset('admin_assets/js/popper.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script> 

  @else  
  <script src="{{ URL::asset('admin_assets/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('admin_assets/js/popper.min.js') }}"></script>
  <script src="{{ URL::asset('admin_assets/js/bootstrap.min.js') }}"></script>  
  @endif
     
  

  <!-- App js -->
  <script src="{{ URL::asset('admin_assets/js/jquery.core.js') }}"></script>
  <script src="{{ URL::asset('admin_assets/js/jquery.app.js') }}"></script>
</body>

</html>