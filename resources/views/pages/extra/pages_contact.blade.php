@extends('site_app')
@section('head_title', $page_info->page_title.' | '.getcong('site_name') )
@section('head_url', Request::url())
@section('content')  
 
<!-- Start Breadcrumb -->
<div class="breadcrumb-section bg-xs" style="background-image: url({{ URL::asset('site_assets/images/breadcrum-bg.jpg') }})">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12"> 
          <h2>{{stripslashes($page_info->page_title)}}</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{ URL::to('/') }}" title="{{trans('words.home')}}">{{trans('words.home')}}</a></li>
              <li>{{stripslashes($page_info->page_title)}}</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
<!-- End Breadcrumb --> 

<!-- Start Contat Page -->
<div class="contact-page-area vfx-item-ptb vfx-item-info">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
		 <div class="contact-form">
            <div class="message">
				@if (count($errors) > 0)
				<div class="alert alert-danger">				
					<ul style="list-style: none;">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
            </div>
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
           {!! Form::open(array('url' => 'contact_send','class'=>'row','id'=>'contact_form','role'=>'form')) !!}  
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group mb-3">
                <label>{{trans('words.name')}}</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group mb-3">
				<label>{{trans('words.email')}}</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group mb-3">
				<label>{{trans('words.phone')}}</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number">
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group mb-3">
				<label>{{trans('words.subject')}}</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group mb-3">
              <label>{{trans('words.your_message')}}</label>
                <textarea name="message" id="message" class="form-control" cols="30" rows="4" placeholder="Your Message..." required></textarea>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <button type="submit" class="vfx-item-btn-danger text-uppercase">{{trans('words.submit')}}</button>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
	  <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
	    @if($page_info->page_content)
        <div class="contact-form">          
            {!!stripslashes($page_info->page_content)!!}
        </div>  
        @endif
	  </div>	
    </div>
  </div>
</div>
<!-- End Contact Page --> 
@endsection